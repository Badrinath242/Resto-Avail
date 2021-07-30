<?php
session_start();
echo 'SORRY FOR THE INCONVINIENCE CAUSED!<br>';
echo 'PLEASE CONTACT THE CUSTOMER <br>';
echo 'CUSTOMER DETAILS: <br>';
echo 'Name: ',$_SESSION['cname'],'<br>';
echo 'Phone: ',$_SESSION['phoned'],'<br>';
?>
<!DOCTYPE HTML>
<html>
<head><title>DID'NT SHOW UP</title></head></html>