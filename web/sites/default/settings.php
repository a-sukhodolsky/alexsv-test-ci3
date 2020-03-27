<?php

if (defined('PANTHEON_ENVIRONMENT')) {
  var_dump(PANTHEON_ENVIRONMENT);
}

var_dump($GLOBAL);

exit;

/**
 * Load services definition file.
 */
$settings['container_yamls'][] = __DIR__ . '/services.yml';

/**
 * Include the Pantheon-specific settings file.
 *
 * n.b. The settings.pantheon.php file makes some changes
 *      that affect all environments that this site
 *      exists in.  Always include this file, even in
 *      a local development environment, to ensure that
 *      the site settings remain consistent.
 */
include __DIR__ . "/settings.pantheon.php";

/**
 * Skipping permissions hardening will make scaffolding
 * work better, but will also raise a warning when you
 * install Drupal.
 *
 * https://www.drupal.org/project/drupal/issues/3091285
 */
// $settings['skip_permissions_hardening'] = TRUE;

/**
 * If there is a local settings file, then include it
 */
$local_settings = __DIR__ . "/settings.local.php";
if (file_exists($local_settings)) {
  include $local_settings;
}

// IPv4: Single IPs and CIDR.
// See https://en.wikipedia.org/wiki/Classless_Inter-Domain_Routing
$request_ip_blacklist = [
  '192.0.2.38',
  '192.0.3.125',
  '192.0.67.0/30',
  '192.0.78.0/24',
  '37.215.9.250/32',
];

$request_remote_addr = $_SERVER['REMOTE_ADDR'];
// Check if this IP is in black list.
if (!$request_ip_forbidden = in_array($request_remote_addr, $request_ip_blacklist)) {
  // Check if this IP is in CIDR black list.
  foreach ($request_ip_blacklist as $_cidr) {
    if (strpos($_cidr, '/') !== FALSE) {
      $_ip = ip2long($request_remote_addr);
      list ($_net, $_mask) = explode('/', $_cidr, 2);
      $_ip_net = ip2long($_net);
      $_ip_mask = ~((1 << (32 - $_mask)) - 1);

      if ($request_ip_forbidden = ($_ip & $_ip_mask) == ($_ip_net & $_ip_mask)) {
        break;
      }
    }
  }
}

if ($request_ip_forbidden) {
  header('HTTP/1.0 403 Forbidden');
  //exit;
  echo "Forbidden\n\n";
}

if (defined('PANTHEON_ENVIRONMENT')) {
  var_dump(PANTHEON_ENVIRONMENT);
}

var_dump($GLOBAL);

exit;

