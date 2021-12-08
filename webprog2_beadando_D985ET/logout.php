<?php
session_start();
unset($_SESSION['user']);
session_destroy();
echo '<meta http-equiv="refresh" content="0; URL=login.html">';
?>