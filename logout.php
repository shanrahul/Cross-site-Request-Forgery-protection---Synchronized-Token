<?php
session_start();
setcookie("session_id",'',time()-3600);
header("Location: ./");
?>
