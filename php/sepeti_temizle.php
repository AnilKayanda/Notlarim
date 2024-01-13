<?php
session_start();

// Sepeti temizle
unset($_SESSION['cart']);

// Ana sayfaya yönlendir
header("Location: index.php");
exit();
