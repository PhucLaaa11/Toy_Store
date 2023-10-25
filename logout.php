<?php
setcookie("cc_username", "", time() - 3600);
header("Location: login.php");
?>