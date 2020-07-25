
<?php
require_once ("../../include/initialize.php");
 	 if (!isset($_SESSION['PER_USERID'])){
      redirect(web_root."perusahaan/index.php");
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

 
	}


	function doInsert(){
		if(isset($_POST['save'])){
 
		if ( $_POST['COMPANYID'] == "None") {
			$messageStats = false;
			message("Harus diisi semua!","error");
			redirect('index.php?view=add');
		}else{	

			$category = New Category();
			$ca = $category->single_category($_POST['CATEGORY']);

			$job = New Jobs();
			$job->IDPERUSAHAAN						= $_POST['COMPANYID']; 
			$job->IDKATEGORI						= $_POST['CATEGORY']; 
			$job->KATEGORI							= $ca->KATEGORI;
			$job->BIDANG							= $_POST['OCCUPATIONTITLE'];
			$job->JML_BTH_PEGAWAI					= $_POST['REQ_NO_EMPLOYEES'];
			$job->GAJI								= $_POST['SALARIES'];
			$job->LAMA_KERJA						= $_POST['DURATION_EMPLOYEMENT'];
			$job->PENGALAMAN_KERJA					= $_POST['QUALIFICATION_WORKEXPERIENCE'];
			$job->DESKRIPSI_KERJA					= $_POST['JOBDESCRIPTION'];
			$job->JENIS_KELAMIN						= $_POST['PREFEREDSEX'];
			$job->LOWONG							= $_POST['SECTOR_VACANCY']; 
			$job->WAKTU_POST						= date('Y-m-d H:i');
			$job->create();

			message("Berhasil menambah Lowongan Kerja!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
		if(isset($_POST['save'])){
			if ( $_POST['COMPANYID'] == "None") {
				$messageStats = false;
				message("Harus diisi semua!","error");
				redirect('index.php?view=add');
			}else{	
				$job = New Jobs();
				$job->IDPERUSAHAAN						= $_POST['COMPANYID']; 
				$job->KATEGORI							= $_POST['CATEGORY']; 
				$job->BIDANG							= $_POST['OCCUPATIONTITLE'];
				$job->JML_BTH_PEGAWAI					= $_POST['REQ_NO_EMPLOYEES'];
				$job->GAJI								= $_POST['SALARIES'];
				$job->LAMA_KERJA						= $_POST['DURATION_EMPLOYEMENT'];
				$job->PENGALAMAN_KERJA					= $_POST['QUALIFICATION_WORKEXPERIENCE'];
				$job->DESKRIPSI_KERJA					= $_POST['JOBDESCRIPTION'];
				$job->JENIS_KELAMIN						= $_POST['PREFEREDSEX'];
				$job->LOWONG							= $_POST['SECTOR_VACANCY']; 
				$job->update($_POST['JOBID']);

				message("Berhasil Update Lowongan Kerja!", "success");
				redirect("index.php");
			}
		}

	}


	function doDelete(){
		// if (isset($_POST['selector'])==''){
		// message("Select a records first before you delete!","error");
		// redirect('index.php');
		// }else{

			$id = $_GET['id'];

			$job = New Jobs();
			$job->delete($id);

			message("Lowongan berhasil dihapus!","info");
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