<?php
session_start();
session_unset();
session_destroy();

echo "<script>alert('You are logged out successfully!!')</script>";
echo "<script>window.location.href='login.php'</script>";
?>