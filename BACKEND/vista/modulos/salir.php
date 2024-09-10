<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$_SESSION = array();
session_destroy();
header("Location: login");
exit();
ob_end_flush();
