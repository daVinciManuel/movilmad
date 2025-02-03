<?php

require './movconfig.php';
require './sql/connect.php';
require './model/queries.php';
require './model/verifyLogin.php';
require './cookies/checkToken.php';
if (!checkToken()) {
    header('Location: ./movlogin.php');
} else {
    header('Location: ./movwelcome.php');
}
