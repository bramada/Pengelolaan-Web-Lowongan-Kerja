<?php 
require_once("include/initialize.php"); 
$content='home.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) { 
	case 'apply' :
        $title="Kirim Lamaran";	
		$content='formlamaran.php';		
		break;
	case 'login' : 
        $title="Login Pelamar";	
		$content='login.php';
	case 'company' :
        $title="Perusahaan";	
		$content='perusahaan.php';		
		break;
	case 'hiring' :
		$title = isset($_GET['search']) ? 'Lamar Pada '.$_GET['search'] :"Lamar Kerja"; 
		$content='lamar.php';		
		break;		
	case 'category' :
        $title='Cari Untuk '. $_GET['search'];	
		$content='kategori.php';		
		break;
	case 'viewjob' :
        $title="Detail Pekerjaan";	
		$content='lihatpekerjaan.php';		
		break;
	case 'success' :
        $title="Berhasil";	
		$content='berhasil.php';		
		break;

	case 'register' :
        $title="Registrasi Pelamar";	
		$content='register.php';		
		break;
	case 'registerp' :
        $title="Registrasi Perusahaan";	
		$content='registerp.php';		
		break;

	case 'Contact' :
        $title='Hubungi Kami';	
		$content='kontak.php';		
		break;	
	case 'About' :
        $title='Tentang Kami';	
		$content='tentang.php';		
		break;	
	case 'advancesearch' :
        $title='Cari Cepat';	
		$content='carisemua.php';		
		break;	

	case 'result' :
        $title='Hasil Cari';	
		$content='hasilcari.php';		
		break;
	case 'search-company' :
        $title='Cari Sesuai Perusahaan';	
		$content='cariperusahaan.php';		
		break;	
	case 'search-function' :
        $title='Cari Sesuai Fungsi';	
		$content='cariprofesi.php';		
		break;	
	case 'search-jobtitle' :
        $title='Cari Semua';	
		$content='cari.php';		
		break;	
	case 'sk' :
        $title='Syarat dan Ketentuan';	
		$content='S&K.php';		
		break;					
	default :
	    $active_home='active';
	    $title="Home";	
		$content ='home.php';		
}
require_once("theme/templates.php");
?>