<?php

if (isset($_SERVER['HTTP_X_PRE_STRIP'])) {
  echo json_encode($_SERVER['HTTP_X_PRE_STRIP']);
}
else {
  phpinfo();
}
