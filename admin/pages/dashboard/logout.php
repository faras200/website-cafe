<?php

session_start();
$_SESSION = [];
session_unset();
echo "<script>alert('Selamat Tinggal');
document.location='/WEBSITE_CAFE/admin'</script>";
?>