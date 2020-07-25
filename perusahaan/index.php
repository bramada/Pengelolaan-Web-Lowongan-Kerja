<?php 
require_once("../include/initialize.php");
 if(!isset($_SESSION['PER_USERID'])){
    redirect(web_root."perusahaan/login.php");
  }

$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
  case '1' :

    if ($_SESSION['PER_NAME']==$_SESSION['PER_NAME']) {
        # code... 

      redirect('perusahaan/');

    } 
    break;  
  default :
 
      $title="Home"; 
    $content ='home.php';    
}
require_once("theme/templates.php");
?>