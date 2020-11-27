<?php 
require_once("../include/initialize.php");  
if (!isset($_SESSION['APPLICANTID'])) {
	# code...
	redirect(web_root.'index.php');
}
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) { 
	case 'appliedjobs' :
	    $title="Profil";	
        $_SESSION['appliedjobs']	='active' ; 
		$content ='profil.php';
		break;

	case 'notification' :
	    $title="Profil";	
        $_SESSION['notification']	='active' ; 
		$content ='profil.php';
		break;

	case 'print' :
	    $title="Print";	 
		$content ='lap.php';
		break;
  
	case 'accounts' : 
	    $title="Profil";	
        $_SESSION['accounts']	='active' ;
        $content ='profil.php';
		break;
	 
	default : 
	    $title="Profil";	
        $_SESSION['appliedjobs']	='active' ;
		$content ='profil.php';		
}
require_once("../theme/templates.php");
?>
