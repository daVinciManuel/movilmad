<?php
require '../cookies/delToken.php';
// -------------------------- LOGOUT LOGIC: --------------------------------------------
foreach ($_COOKIE as $name => $v) {
  setCookie($name, '', time() - 9999999, "/");
}
header('Location: ../movlogin.php');
