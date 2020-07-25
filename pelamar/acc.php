<?php
require_once ("../include/initialize.php");
	  if (!isset($_SESSION['APPLICANTID'])){
      redirect(web_root."index.php");
     }

// $action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

// switch ($action) {
	
// 	case 'acc' :
// 	doAccept();
// 	break;

// 	case 'rjt' :
// 	doReject();
// 	break;

 
// 	// }

// function doAccept(){
if(isset($_GET['id'])){

			$id = $_GET['id'];	
			$sql = "SELECT * FROM `tblamaran` r ,`tbpelamar` a , `tbperusahaan` c , `tbpekerjaan` j WHERE r.`IDLAMARAN` ='{$id}' AND a.`IDPELAMAR` = r.`IDPELAMAR` AND r.`IDPEKERJAAN` = j.`IDPEKERJAAN` AND r.`IDPERUSAHAAN` = c.`IDPERUSAHAAN`";
			$mydb->setQuery($sql);
			$res = $mydb->loadSingleResult();

					$autonum = New Autonumber();
					$auto = $autonum->set_autonumber('IDPEG');

					$applicant =New Applicants(); 
					$applicant->STATUS_PELAMAR = 0;
					$applicant->update($_SESSION['APPLICANTID']);
		
					$Emp =New Employee(); 
					$Emp ->IDPEGAWAI = date('Y').$auto->AUTO;
					$Emp ->NAMAD = $res->NAMAD;
					$Emp ->NAMAB = $res->NAMAB;
					$Emp ->NAMAT =  $res->NAMAT;
					$Emp ->ALAMAT =  $res->ALAMAT;
					$Emp ->JENIS_KELAMIN =  $res->JENIS_KELAMIN;
					$Emp ->STATUS =  $res->STATUS;
					$Emp ->TGL_LAHIR = $res->TGL_LAHIR;
					$Emp ->TMP_LAHIR =  $res->TMP_LAHIR;
					$Emp ->USIA =  $res->USIA;
					$Emp ->PEG_EMAIL =  $res->EMAIL;
					$Emp ->TELP =  $res->TELP;
					$Emp ->TGL_KERJA = date('Y-m-d');
					$Emp ->IDPERUSAHAAN =  $res->IDPERUSAHAAN;
					$Emp ->BIDANG =  $res->BIDANG;
					$Emp ->create($_SESSION['APPLICANTID']);

					$autonum = New Autonumber();
					$autonum->auto_update('IDPEG');

					message("Data berhasil diupdate!", "success");
					redirect("index.php?view=interview");
	    	
	}
// }
?>