<?php
require_once 'connections.php';
	if(isset($_SESSION['cEmail']) & !empty($_SESSION['cEmail']))
  {
		header('location: index.php');
	}

	if(isset($_POST) & !empty($_POST))
	{
	  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	  $password = $_POST['password'];
	  echo $sql = "SELECT * FROM bookivia_customers WHERE cEmail='$email'";
	  $result = mysqli_query($db, $sql) or die(mysqli_error($db));
	  $r = mysqli_fetch_assoc($result);

		if($r['cStatus'] == 'Unavailable'){
			header("location: signin.php?message=3");
		}
		else{
			if(password_verify($password, $r['cPassword'])){
				$_SESSION['cEmail'] = $email;
				$_SESSION['customerid'] = $r['cAccount_ID'];
				header("location: index.php");

			}else{
				header("location: signin.php?message=1");
			}
		}
  }
?>
