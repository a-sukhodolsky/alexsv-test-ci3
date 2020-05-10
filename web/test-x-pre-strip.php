<?php

if (isset($_SERVER['X-PRE-STRIP'])) {
  echo json_encode($_SERVER['X-PRE-STRIP']);
}
else {
  phpinfo();
}
