<?php
require 'db.php';
session_unset();
session_destroy();
echo 'Logged out';
?>