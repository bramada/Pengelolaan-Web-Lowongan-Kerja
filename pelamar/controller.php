<?php
require_once ("../include/initialize.php");
	  if (!isset($_SESSION['APPLICANTID'])){
      redirect(web_root."index.php");
     }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	

	case 'photos' :
	doupdateimage();
	break;

 
	}

	

	function doEdit(){
		$birthdate =  date_format(date_create($_POST['BIRTHDATE']),'Y-m-d');

			$age = date_diff(date_create($birthdate),date_create('today'))->y;
		 	if ($age < 18 ){
		       message("Invalid age. 20 years old and above is allowed.", "error");
		       redirect("index.php?view=accounts");

		    }else{ 
					$applicant =New Applicants(); 
					$applicant->NAMAD = $_POST['FNAME'];
					$applicant->NAMAB = $_POST['LNAME'];
					$applicant->NAMAT = $_POST['MNAME'];
					$applicant->ALAMAT = $_POST['ADDRESS'];
					$applicant->JENIS_KELAMIN = $_POST['PREFEREDSEX'];
					$applicant->STATUS = $_POST['CIVILSTATUS'];
					$applicant->TGL_LAHIR = $birthdate;
					$applicant->TMP_LAHIR = $_POST['BIRTHPLACE'];
					$applicant->USIA = $age; 
					$applicant->EMAIL = $_POST['EMAILADDRESS'];
					$applicant->TELP = $_POST['TELNO'];
					$applicant->GELAR = $_POST['DEGREE'];
					$applicant->update($_SESSION['APPLICANTID']);

					message("Akun Berhasil Diupdate!", "success");
					redirect("index.php?view=accounts");
	    	}
	}
   
	function doupdateimage(){
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="photos/".$myfile;


		if ( $errofile > 0) {
				message("Tidak Ada Gambar Dipilih!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
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
					move_uploaded_file($temp,"photos/" . $myfile);
		 	
					 

						$applicant = New Applicants();
						$applicant->FOTO_PELAMAR 			= $location;
						$applicant->update($_SESSION['APPLICANTID']);
						redirect(web_root."pelamar/");
						 
							
					}
			}
			 
		}



function doAddFiles(){
global $mydb;
 // `JOBID`, `FILE_NAME`, `FILE_LOCATION`, `USERATTACHMENTID`
		$picture = UploadImage();
		$location = "photos/". $picture ;

		$sql = "INSERT INTO `tblamiran` (`IDPEKERJAAN`, `NAMA_FILE`, `LOKASI_FILE`, `IDLAMPIRANUSER`) 
		VALUES ('".$_SESSION['APPLICANTID']."','','Resume','{$location}','".$_SESSION['APPLICANTID']."')";
		$mydb->setQuery($sql); 
		$res = $mydb->executeQuery();

		message("File Berhasil Diupload!", "success");
		redirect("index.php?tab=files");
	 



} 

function UploadImage(){
	$target_dir = "photos/";
	$target_file = $target_dir . date("dmYhis") . basename($_FILES["picture"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	
	if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"|| $imageFileType != "gif" ) {
		 if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
			return  date("dmYhis") . basename($_FILES["picture"]["name"]);
		}else{
			echo "Error Upload File";
			exit;
		}
	}else{
			echo "File Tidak Mendukung";
			exit;
	}
} 


// function doDelete(){

// 			$id = $_GET['id'];

// 			$jr = New jobregistration();
// 			$jr->delete($id);

// 			message("Lamaran dihapus!","info");
// 			redirect('index.php');
		
// }

?>