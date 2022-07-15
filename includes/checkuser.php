<?php
  session_start();
  $GLOBALS['sesions']->check_browser = true;
  $GLOBALS['sesions']->check_ip_blocks = 2;
  $GLOBALS['sesions']->secure_word = GetConfig('AdminSecureWord');
  $GLOBALS['sesions']->regenerate_id = true;
  
 if (!$GLOBALS['sesions']->Check() || !isset($_SESSION['Uadmin_Id']) || !$_SESSION['Uadmin_Id'])
  {
    header('Location: index.php');
    die();
  }
  
  
  
?>