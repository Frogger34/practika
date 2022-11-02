<?php
   include("config.php");
   session_start();

   if(!isset($_SESSION['login_user']) || !isset($_SESSION['user_type']) && !$_SESSION['login_user'] || !$_SESSION['user_type']){
      $user_check = $_SESSION['login_user'] = 0;
      $usrTypeChk = $_SESSION['user_type'] = 0;
      $_SESSION['adminTrue'] = 0;
      return 0;
   }

   $user_check = $_SESSION['login_user'];
   $usrTypeChk = $_SESSION['user_type'];

   $ses_sql = mysqli_query($conn, "SELECT login, user_type FROM users WHERE login = '$user_check' AND user_type = '$usrTypeChk'");
   $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

   $login_session = $row['login'];
   $usertype = $row['user_type'];

   if ($_SESSION['adminTrue'] == 0) {
      if ($usertype == 2) {
      $_SESSION['adminTrue'] = 1;
      header("Location: ../admin/index.php");
   }
      else if ($usertype == 1) {
         $_SESSION['adminTrue'] = 0;
      }
      else {
         return 0;
      }
   }
   else {
      return 0;
   }
?>