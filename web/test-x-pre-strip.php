<?php

if (isset($_SERVER['HTTP_X_PRE_STRIP'])) {
  //echo $_SERVER['HTTP_X_PRE_STRIP'];
  if (isset($_GET['utm_campaign'])) {
    echo 'utm_campaign=developers_2015';
  }
  elseif (isset($_GET['Utm_Campaign'])) {
    echo 'utm_campaign=enterprise_devops';
  }
  else {
    echo $_SERVER['HTTP_X_PRE_STRIP'];
  }
}
else {
  phpinfo();
}
