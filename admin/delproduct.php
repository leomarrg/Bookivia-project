<?php
  require_once '../connections.php';
	if(!isset($_SESSION['aEmail']) & empty($_SESSION['aEmail'])){
		header('location: login.php');
	}

if(isset($_GET['id']) & !empty($_GET['id'])){
  $id = $_GET['id'];
  $sql = "SELECT Book_Image FROM bookivia_books WHERE Book_ISBN=$id";
  $res = mysqli_query($db, $sql);
  $r = mysqli_fetch_assoc($res);
  if(!empty($r['Book_Image'])){
    if(unlink($r['Book_Image'])){
      $delsql = "DELETE FROM bookivia_books WHERE Book_ISBN=$id";
        if(mysqli_query($db, $delsql)){
          header("location:dashboard_products_inventory.php");
        }
      }
    }else{
      $delsql = "DELETE FROM bookivia_books WHERE Book_ISBN=$id";
      if(mysqli_query($db, $delsql)){
        header("location:dashboard_products_inventory.php");
      }
      header('location:dashboard_products_inventory.php');
}
}
