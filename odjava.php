<?php
session_start();
?>
<?php
if(empty($_SESSION)){
	header("location:prijava1.php");
}else{
	session_destroy();
	session_unset();
	header("location:početna.php");
}
?>
