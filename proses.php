<?php  
require_once ("include/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
	case 'submitapplication' :
	doSubmitApplication();
	break;
  
	case 'register' :
	doRegister();
	break;  

	case 'registerp' :
	doRegisterp();
	break; 

	case 'photos' :
	doupdateimage();
	break;

	case 'login' :
	doLogin();
	break; 
	}

function doSubmitApplication() { 
	global $mydb;   
		$jobid  = $_GET['JOBID'];
		

		$autonum = New Autonumber();
		$applicantid = $autonum->set_autonumber('PELAMAR');
		$autonum = New Autonumber();
		$fileid = $autonum->set_autonumber('IDFILE');

		@$picture = UploadImage();


		@$location = "photos/". $picture ;
		if ($picture=="") {
			# code...
			redirect(web_root."index.php?q=apply&job=".$jobid."&view=personalinfo");
		}else{ 
			
			if (isset($_SESSION['APPLICANTID'])) {

				$sql = "INSERT INTO `tblampiran` (IDFILE,`IDLAMPIRANUSER`, `NAMA_FILE`, `LOKASI_FILE`, `IDPEKERJAAN`) 
				VALUES ('". date('Y').$fileid->AUTO."','{$_SESSION['APPLICANTID']}','Resume','{$location}','{$jobid}')";
				$mydb->setQuery($sql); 
				$res = $mydb->executeQuery(); 

				doUpdate($jobid,$fileid->AUTO);
				
			}else{
				 
				$sql = "INSERT INTO `tblampiran` (IDFILE,`IDLAMPIRANUSER`, `NAMA_FILE`, `LOKASI_FILE`, `IDPEKERJAAN`)  
				VALUES ('". date('Y').$fileid->AUTO."','". date('Y').$applicantid->AUTO."','Resume','{$location}','{$jobid}')";
				$mydb->setQuery($sql); 
				$res = $mydb->executeQuery(); 

				doInsert($jobid,$fileid->AUTO); 

				$autonum = New Autonumber();
				$autonum->auto_update('PELAMAR');
			}
		}

		$autonum = New Autonumber();
	    $autonum->auto_update('IDFILE'); 
	 
}

function doInsert($jobid=0,$fileid=0) {
	if (isset($_POST['submit'])) {  
	global $mydb; 

			$birthdate =  $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

			$age = date_diff(date_create($birthdate),date_create('today'))->y;

			if ($age < 18){
			message("Belum cukup umur. Harus berusia 18 tahun keatas.", "error");
			redirect("index.php?q=apply&view=personalinfo&job=".$jobid);

			}else{


	$target_dir2 = "pelamar/photos/";
	$target_file2 = $target_dir2  . basename($_FILES["foto"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file2,PATHINFO_EXTENSION);
	
	$target_dir7 = "pelamar/file/";
	$target_file7 = $target_dir7  . basename($_FILES["CV"]["name"]);
	$uploadOk = 1;
	$FileType = pathinfo($target_file7,PATHINFO_EXTENSION);
	
	if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"|| $imageFileType != "gif"|| $FileType != "pdf" ) {
		 if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file2) AND move_uploaded_file($_FILES["CV"]["tmp_name"], $target_file7)) {
						$ok 	= "photos/".$_FILES["foto"]["name"];
						$cv 	= "file/".$_FILES["CV"]["name"];

		


			$autonum = New Autonumber();
			$auto = $autonum->set_autonumber('PELAMAR');
			 
			$applicant =New Applicants();
			$applicant->IDPELAMAR = date('Y').$auto->AUTO;
			$applicant->NAMAD = $_POST['FNAME'];
			$applicant->NAMAT = $_POST['LNAME'];
			$applicant->NAMAB = $_POST['MNAME'];
			$applicant->ALAMAT = $_POST['ADDRESS'];
			$applicant->JENIS_KELAMIN = $_POST['optionsRadios'];
			$applicant->STATUS = $_POST['CIVILSTATUS'];
			$applicant->TGL_LAHIR = $birthdate;
			$applicant->TMP_LAHIR = $_POST['BIRTHPLACE'];
			$applicant->USIA = $age;
			$applicant->USERNAME = $_POST['USERNAME'];
			$applicant->PASS = sha1($_POST['PASS']);
			$applicant->EMAIL = $_POST['EMAILADDRESS'];
			$applicant->TELP = $_POST['TELNO'];
			$applicant->GELAR = $_POST['DEGREE'];
			$applicant->IDKATEGORI = $_POST['KATEGORI'];
			$applicant->STATUS_PELAMAR = 1;
			$applicant->NIK = $_POST['NIK'];
			$applicant->FOTO_PELAMAR	= $ok;
			$applicant->FOTO_KTP 	= $_FILES["ktp"]["name"];
			$applicant->FILE_PELAMAR	= $cv;
			$applicant->create();

		


			$sql = "SELECT * FROM `tbperusahaan` c,`tbpekerjaan` j WHERE c.`IDPERUSAHAAN`=j.`IDPERUSAHAAN` AND IDPEKERJAAN = '{$jobid}'" ;
			$mydb->setQuery($sql);
			$result = $mydb->loadSingleResult();


			$jobreg = New JobRegistration(); 
			$jobreg->IDPERUSAHAAN 		= $result->IDPERUSAHAAN;
			$jobreg->IDPEKERJAAN     	= $result->IDPEKERJAAN;
			$jobreg->IDPELAMAR 			= date('Y').$auto->AUTO;
			$jobreg->PELAMAR   			= $_POST['FNAME'] . ' ' . $_POST['LNAME'];
			$jobreg->TGL_MELAMAR 		= date('Y-m-d');
			$jobreg->IDFILE 			= date('Y').$fileid;
			$jobreg->TANGGAPAN 			= 'Menunggu';
			$jobreg->MENUNGGU			= 1;
			$jobreg->HVIEW				= 0;
			$jobreg->WAKTU_DISETUJUI 	= date('Y-m-d H:i');
			$jobreg->create();
  

			message("Lamaran anda sudah dikirim. Silahkan menunggu konfirmasi dari Perusahaan.","success");
			redirect("index.php?q=success&job=".$result->IDPEKERJAAN);


				}else{
			message("Foto KTP belum dipilih","error");
			// redirect(web_root."index.php?q=apply&job=".$jobid."&view=personalinfo");
			// exit;
		}
	}else{
			message("File tidak mendukung","error");
			// redirect(web_root."index.php?q=apply&job=".$jobid."&view=personalinfo");
			// exit;
		}

			
	 }
}
}
function doUpdate($jobid=0,$fileid=0) {
	if (isset($_POST['submit'])) {
	global $mydb;   

			$applicant =New Applicants();
			$appl  = $applicant->single_applicant($_SESSION['APPLICANTID']);

			$applicant->NIK	= $_POST['NIK'];
			$applicant->update($_SESSION['APPLICANTID']);


			$sql = "SELECT * FROM `tbperusahaan` c,`tbpekerjaan` j WHERE c.`IDPERUSAHAAN`=j.`IDPERUSAHAAN` AND IDPEKERJAAN = '{$jobid}'" ;
			$mydb->setQuery($sql);
			$result = $mydb->loadSingleResult();

			$jobreg = New JobRegistration(); 
			$jobreg->IDPERUSAHAAN 		= $result->IDPERUSAHAAN;
			$jobreg->IDPEKERJAAN     	= $result->IDPEKERJAAN;
			$jobreg->IDPELAMAR 			= $_SESSION['APPLICANTID'];//date('Y').$auto->AUTO;
			$jobreg->PELAMAR   			= $appl->NAMAD . ' ' . $appl->NAMAB;//$_POST['FNAME'] . ' ' . $_POST['LNAME'];
			$jobreg->TGL_MELAMAR 		= date('Y-m-d');
			$jobreg->IDFILE 			= date('Y').$fileid;
			$jobreg->TANGGAPAN 			= 'Menunggu';
			$jobreg->HVIEW				= 0;
			$jobreg->MENUNGGU			= 1;
			$jobreg->WAKTU_DISETUJUI 	= date('Y-m-d H:i');
			$jobreg->create();

  
			message("Lamaran anda sudah dikirim. Silahkan menunggu konfirmasi dari Perusahaan.","success");
			redirect("index.php?q=success&job=".$result->IDPEKERJAAN);
 
	}
}

function doRegisterp(){
	global $mydb;
	if (isset($_FILES['FOTOP']['name']) ) { 

	$target_dir3 = "perusahaan/user/photos/";
	$target_file3 = $target_dir3  . basename($_FILES["FOTOP"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file3,PATHINFO_EXTENSION);

	$target_dir4 = "perusahaan/user/file/";
	$target_file4 = $target_dir4  . basename($_FILES["LMP"]["name"]);
	$uploadOk = 1;
	$FileType = pathinfo($target_file4,PATHINFO_EXTENSION);
	
	
	if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"|| $imageFileType != "gif"|| $FileType != "pdf" ) {
		 if (move_uploaded_file($_FILES["FOTOP"]["tmp_name"], $target_file3) AND move_uploaded_file($_FILES["LMP"]["tmp_name"], $target_file4)) {
						$FOTOPER 	= "photos/".$_FILES["FOTOP"]["name"];
						$L 	= "file/".$_FILES["LMP"]["name"];


			$autonum = New Autonumber();
			$auto = $autonum->set_autonumber('PERUSAHAAN');
			 
			$comp =New Company();
			$comp->IDPERUSAHAAN = date('Y').$auto->AUTO;
			$comp->NAMA_PERUSAHAAN = $_POST['CNAME'];
			$comp->NIB = $_POST['NIB'];
			$comp->FOTOP = $FOTOPER;
			$comp->ALAMAT_PERUSAHAAN = $_POST['CADDRESS'];
			$comp->KONTAK_PERUSAHAAN = $_POST['TELNOC'];
			$comp->EMAIL_PERUSAHAAN = $_POST['EMAILP'];
			$comp->VISI_MISI = $_POST['VM'];
			$comp->USERNAMEP = $_POST['USERNAMEP'];
			$comp->PASSP = sha1($_POST['PASSP']);
			$comp->STATUS_PERUSAHAAN = 0;
			$comp->FILE_PERUSAHAAN = $L;
			$comp->create();

 
			$autonum = New Autonumber();
			$autonum->auto_update('PERUSAHAAN');


			message("Akun perusahaan berhasil dibuat. Tunggu konfirmasi oleh Admin untuk bisa Login","success");
			redirect("index.php?q=success");


		}else{
			message("Foto Perusahaan belum dipilih","error");
			// redirect(web_root."index.php?q=apply&job=".$jobid."&view=personalinfo");
			// exit;
		}

	}else{
		message("File tidak mendukung","error");
		// redirect(web_root."index.php?q=apply&job=".$jobid."&view=personalinfo");
		// exit;
	}

			
	 }else{
	 	echo "Pendaftaran gagal";
	 }
}


function doRegister(){
	global $mydb;
	if (isset($_POST['btnRegister'])) { 
			$birthdate =  $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

			$age = date_diff(date_create($birthdate),date_create('today'))->y;

			if ($age < 18){
			message("Belum cukup umur. Harus berusia 18 tahun keatas.", "error");
			redirect("index.php?q=register");

			}else{

				if ( isset($_FILES['FOTO']['name']) AND isset($_FILES['CV']['name']) ) { 

				$target_dir5 = "pelamar/photos/";
				$target_file5 = $target_dir5  . basename($_FILES["FOTO"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file5,PATHINFO_EXTENSION);

				$target_dir6 = "pelamar/file/";
				$target_file6 = $target_dir6  . basename($_FILES["CV"]["name"]);
				$uploadOk = 1;
				$FileType = pathinfo($target_file6,PATHINFO_EXTENSION);
	
				if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"|| $imageFileType != "gif"||$FileType != "pdf" ) {
					 if (move_uploaded_file($_FILES["FOTO"]["tmp_name"], $target_file5) AND move_uploaded_file($_FILES["CV"]["tmp_name"], $target_file6)) {
									$FOTO 	= "photos/".$_FILES["FOTO"]["name"];
									$CV 	= "file/".$_FILES["CV"]["name"];

			$autonum = New Autonumber();
			$auto = $autonum->set_autonumber('PELAMAR');
			 
			$applicant =New Applicants();
			$applicant->IDPELAMAR = date('Y').$auto->AUTO;
			$applicant->IDKATEGORI = $_POST['CATEGORY'];
			$applicant->NAMAD = $_POST['FNAME'];
			$applicant->NAMAT = $_POST['LNAME'];
			$applicant->NAMAB = $_POST['MNAME'];
			$applicant->ALAMAT = $_POST['ADDRESS'];
			$applicant->JENIS_KELAMIN = $_POST['optionsRadios'];
			$applicant->STATUS = $_POST['CIVILSTATUS'];
			$applicant->TGL_LAHIR = $birthdate;
			$applicant->TMP_LAHIR = $_POST['BIRTHPLACE'];
			$applicant->USIA = $age;
			$applicant->USERNAME = $_POST['USERNAME'];
			$applicant->PASS = sha1($_POST['PASS']);
			$applicant->EMAIL = $_POST['EMAILADDRESS'];
			$applicant->TELP = $_POST['TELNO'];
			$applicant->GELAR = $_POST['DEGREE'];
			$applicant->FOTO_PELAMAR = $FOTO;//"photos/noface.jpg";
			// $applicant->FOTO_KTP = "NoKTP.png";
			$applicant->STATUS_PELAMAR = 1;
			$applicant->FILE_PELAMAR = $CV;
			$applicant->create();

 
			$autonum = New Autonumber();
			$autonum->auto_update('PELAMAR');


			message("Anda berhasil registrasi di web ini. Sekarang anda dapat melakukan Login!","success");
			redirect("index.php?q=success");

					}else{
					message("Foto Perusahaan belum dipilih","error");
					// redirect(web_root."index.php?q=apply&job=".$jobid."&view=personalinfo");
					// exit;
				}

			}else{
				message("File tidak mendukung","error");
				// redirect(web_root."index.php?q=apply&job=".$jobid."&view=personalinfo");
				// exit;
			}
		}else{
			echo "Pendaftaran gagal";
	 	}
	}
}
}


function doLogin(){
	
	$email = trim($_POST['USERNAME']);
	$upass  = trim($_POST['PASS']);
	$h_upass = sha1($upass);
 
  //it creates a new objects of member
    $applicant = new Applicants();
    //make use of the static function, and we passed to parameters
    $res = $applicant->applicantAuthentication($email, $h_upass);
    if ($res==true) { 

       	message("Anda telah berhasil login!","success");
       
       // $sql="INSERT INTO `tbllogs` (`USERID`,USERNAME, `LOGDATETIME`, `LOGROLE`, `LOGMODE`) 
       //    VALUES (".$_SESSION['USERID'].",'".$_SESSION['FULLNAME']."','".date('Y-m-d H:i:s')."','".$_SESSION['UROLE']."','Logged in')";
       //    mysql_query($sql) or die(mysql_error()); 
         redirect(web_root."pelamar/");
     
    }else{
    	 echo "Akun tidak ditemukan! Silakan menghubungi Admin."; 
    } 
}
	
function UploadImage($jobid=0){
	$target_dir = "pelamar/ktp/";
	$target_file = $target_dir  . basename($_FILES["ktp"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	
	if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"|| $imageFileType != "gif" ) {
		 if (move_uploaded_file($_FILES["ktp"]["tmp_name"], $target_file)) {
						$applicant = New Applicants();
						$applicant->FOTO_KTP 	= $_FILES["ktp"]["name"];
						$applicant->update($_SESSION['APPLICANTID']);
			return  date("dmYhis") . basename($_FILES["ktp"]["name"]);

		}else{
			message("Foto KTP belum dipilih","error");
			// redirect(web_root."index.php?q=apply&job=".$jobid."&view=personalinfo");
			// exit;
		}
	}else{
			message("File tidak mendukung","error");
			// redirect(web_root."index.php?q=apply&job=".$jobid."&view=personalinfo");
			// exit;
		}
}


function doupdateimage(){

			$jobid  = $_GET['JOBID'];
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="photos/".$myfile;


		if ( $errofile > 0) {
				message("Tidak Ada Gambar Dipilih!", "error");
				redirect(web_root."index.php?q=apply&search=".$jobid."&view=personalinfo");
		}else{
	 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("Unggah File Harus Berupa Gambar!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
			}else{
					//uploading the file
					move_uploaded_file($temp,"pelamar/photos/" . $myfile);
		 	
					 

						$applicant = New Applicants();
						$applicant->FOTO_PELAMAR 			= $location;
						$applicant->update($_SESSION['APPLICANTID']);
						redirect(web_root."index.php?q=apply&search=".$jobid."&view=personalinfo");
						 
							
					}
			}
			 
		}


?>

