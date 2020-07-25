
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
   
	function doInsert(){
		if(isset($_POST['save'])){

 // `COMPANYNAME`, `COMPANYADDRESS`, `COMPANYCONTACTNO`
		if ( $_POST['COMPANYNAME'] == "" || $_POST['COMPANYADDRESS'] == "" || $_POST['COMPANYCONTACTNO'] == "" ) {
			$messageStats = false;
			message("Harus diisi semua!","error");
			redirect('index.php?view=add');
		}else{	
			$company = New Company();
			$company->NAMA_PERUSAHAAN	= $_POST['COMPANYNAME'];
			$company->ALAMAT_PERUSAHAAN	= $_POST['COMPANYADDRESS'];
			$company->KONTAK_PERUSAHAAN	= $_POST['COMPANYCONTACTNO'];
			// $company->COMPANYMISSION	= $_POST['COMPANYMISSION'];
			$company->create();

			message("Berhasil menambahkan perusahaan!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
		if(isset($_POST['save'])){

			$company = New Company();
			$company->NAMA_PERUSAHAAN	= $_POST['COMPANYNAME'];
			$company->NIB	= $_POST['NIB'];
			$company->ALAMAT_PERUSAHAAN	= $_POST['COMPANYADDRESS'];
			$company->KONTAK_PERUSAHAAN	= $_POST['COMPANYCONTACTNO'];
			$company->EMAIL_PERUSAHAAN	= $_POST['COMPANYEMAIL'];
			$company->USERNAMEP			= $_POST['P_USERNAME'];
			$company->PASSP				= sha1($_POST['P_PASS']);
			$company->VISI_MISI			= $_POST['VM'];
			$company->update($_POST['COMPANYID']);

			message("Perusahaan berhasil diupdate!", "success");
			redirect("index.php");
		}

	}


	function doConfirm(){
		if(isset($_POST['confirm'])){

			$company = New Company();
			$company->STATUS_PERUSAHAAN	= 1;
			$company->update($_POST['COMPANYID']);
			$email=$_POST['Email'];

			require_once("sendmail.php");

			message("Perusahaan berhasil dikonfirmasi!", "success");
			redirect("index.php");
		}

	}


	function doDelete(){
		// if (isset($_POST['selector'])==''){
		// message("Select a records first before you delete!","error");
		// redirect('index.php');
		// }else{

			$id = $_GET['id'];

			$company = New Company();
			$company->delete($id);

			message("Perusahaan dihapus!","info");
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