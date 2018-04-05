<?php
if (isset($_POST['LoginButton'])){
  $username = $_POST['LoginUsername'];
  $password = $_POST['LoginPassword'];

  //LoginFunction
  $result = $account->login($username,$password);
  if($result ==true){
      $_SESSION['userLoggedIn']=$username;
      header("Location:index.php");
  }


}

?>
