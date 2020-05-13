<pre>
<?php

error_reporting (E_ALL);

var_dump($_POST);

foreach ($_POST as $key => $value) {
  var_dump($key);
  echo "'" . $key[0] . "'\n";
  if ($key !== '' && $key[0] == '#' && !empty($value)) {
    $output = $value;
    if (is_array($value)) {
      $output = print_r($value, TRUE);
    }
    $message = $key . ' ' . escapeshellarg($output);
    echo $message;
  }
}


?>
</pre>
