<html>

<body>
Welcome <?php echo $_POST["user"]; ?>!

<?php 
setcookie("user", $_POST["user"], time()+3600);
?>

</body>
</html>
