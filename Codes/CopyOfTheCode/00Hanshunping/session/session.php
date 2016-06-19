<?php
session_start();
$_SESSION['name']='李一帆';
unset($_SESSION['name']);
session_unset();