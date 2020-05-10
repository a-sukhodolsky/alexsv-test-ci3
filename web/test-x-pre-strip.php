<?php

if (isset($_SERVER['HTTP_X_PRE_STRIP'])) {
  //echo $_SERVER['HTTP_X_PRE_STRIP'];
  echo 'utm_campaign=developers_2015';
}
else {
  phpinfo();
}
