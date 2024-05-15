<?php
session_start();
include "../../controllers/db.php";

  $login_auth=$_POST['login_auth'];
  $pass_auth=$_POST['pass_auth'];
  $auth_admin=$_POST['auth_admin'];
  $auth_client=$_POST['auth'];

  $str_auth_data="SELECT * FROM `users` WHERE `login`='$login_auth' AND `password`='$pass_auth'";
  $run_auth_data=mysqli_query($connect,$str_auth_data);
  $auth_data=mysqli_num_rows($run_auth_data);

  if ($auth_admin) {
     $str_auth_role="SELECT * FROM `users` WHERE `login`='$login_auth' AND `password`='$pass_auth' AND role=2";
    $run_auth_role=mysqli_query($connect,$str_auth_role);
    $auth_role=mysqli_num_rows($run_auth_role);
     if ($auth_data==1) {
     	if ($auth_role==1) {
            $auth=mysqli_fetch_array($run_auth_role);
            $_SESSION['user']=array(
            	'id' => $auth['id'], 
            	'login' => $auth['login'],
            	'pass' => $auth['password'],
            	'name' => $auth['name'],
            	'surname' => $auth['surname'],
            	'l_name' => $auth['l_name'],
            	'status' => $auth['status'],
            	'role' => $auth['role']
            );
            header("Location:../dashboard.php");
        }
        else {
            $_SESSION['message_auth']="Недостаточно прав!";
            header("Location:../");
        }
    }
        else {
            $_SESSION['message_auth']="Данные не верны!";
            header("Location:../");
        }
  }
  elseif ($auth_client) {
    if ($auth_data==1) {
        $auth=mysqli_fetch_array($run_auth_data);
            $_SESSION['client']=array(
                'id' => $auth['id'], 
                'login' => $auth['login'],
                'pass' => $auth['password'],
                'name' => $auth['name'],
                'surname' => $auth['surname'],
                'l_name' => $auth['l_name'],
                'status' => $auth['status'],
                'role' => $auth['role']
            );
            header("Location:../../profile.php");
        }
        else {
            $_SESSION['message_auth']="Данные не верны!";
            header("Location:../../");
        }
  }
?>