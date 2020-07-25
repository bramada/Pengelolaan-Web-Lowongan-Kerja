
<?php
require_once ("../../include/initialize.php");
 	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }


$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'confirm' :
	doConfirm();
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
					$applicant->update($_POST['APPLICANTID']);

					message("Akun Berhasil Diupdate!", "success");
					redirect("index.php?view=accounts");
	    	}
	}




	function doDelete(){
		// if (isset($_POST['selector'])==''){
		// message("Select a records first before you delete!","error");
		// redirect('index.php');
		// }else{

			$id = $_GET['id'];

			$company = New Applicants();
			$company->delete($id);

			message("Pelamar dihapus!","info");
			redirect('index.php');

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$category = New Category();
		// 	$category->delete($id[$i]);

		// 	message("Category already Deleted!","info");
		// 	redirect('index.php');
		// }
		// }
		
	}
?>