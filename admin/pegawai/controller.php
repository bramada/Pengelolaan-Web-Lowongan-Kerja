<?php
require_once ("../../include/initialize.php");
 if(!isset($_SESSION['ADMIN_USERID'])){
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

	case 'photos' :
	doupdateimage();
	break;
   
   
    case 'addfiles' :
	doAddFiles();
	break;

	case 'checkid' :
	Check_StudentID();
	break;
	

	}
   
	function doInsert(){
		global $mydb;
		if(isset($_POST['save'])){


		if ( $_POST['FNAME'] == "" OR $_POST['LNAME'] == ""
			OR $_POST['MNAME'] == ""  OR $_POST['ADDRESS'] == "" 
			OR $_POST['TELNO'] == "") {
			$messageStats = false;
			message("Harus diisi semua!","error");
			redirect('index.php?view=add');
		}else{	

			$birthdate =  date_format(date_create($_POST['BIRTHDATE']),'Y-m-d');

			$age = date_diff(date_create($birthdate),date_create('today'))->y;

			if ($age < 18){
			message("Belum cukup usia. Harus berusia 18 tahun keatas.", "error");
			redirect("index.php?view=add");

			}else{
			 


				$sql = "SELECT * FROM tbpegawai WHERE IDPEGAWAI='" .$_POST['EMPLOYEEID']. "'";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
				$maxrow = $mydb->num_rows($cur);


				// $res = mysqli_query($sql) or die(mysql_error());
				// $maxrow = mysql_num_rows($res);
				if ($maxrow > 0) { 
					# code... 
					message("Id pegawai sudah digunakan!", "error");
					redirect("index.php?view=add");
				}else{

					@$datehired = date_format(date_create($_POST['EMP_HIREDDATE']),'Y-m-d');

					$emp = New Employee(); 
					$emp->IDPEGAWAI 		= $_POST['EMPLOYEEID'];
					$emp->NAMAD				= $_POST['FNAME']; 
					$emp->NAMAB				= $_POST['LNAME'];
					$emp->NAMAT 	   		= $_POST['MNAME'];
					$emp->ALAMAT			= $_POST['ADDRESS'];  
					$emp->TGL_LAHIR	 		= $birthdate;
					$emp->TMP_LAHIR			= $_POST['BIRTHPLACE'];  
					$emp->USIA			    = $age;
					$emp->JENIS_KELAMIN 	= $_POST['optionsRadios']; 
					$emp->TELP				= $_POST['TELNO'];
					$emp->STATUS			= $_POST['CIVILSTATUS']; 
					$emp->POSISI			= trim($_POST['POSITION']);
					$emp->PEG_EMAIL			= $_POST['EMP_EMAILADDRESS'];
					$emp->PEGUSERNAME		= $_POST['EMPLOYEEID'];
					$emp->PEGPASSWORD		= sha1($_POST['EMPLOYEEID']);
					$emp->TGL_KERJA			=  @$datehired;
					$emp->IDPERUSAHAAN		= $_POST['COMPANYID'];
					$emp->create(); 



					$user = New User();
					$user->IDUSER 			= $_POST['EMPLOYEEID'];
					$user->NAMA_LENGKAP 	= $_POST['FNAME'] . ' ' .$_POST['LNAME'];
					$user->USERNAME			= $_POST['LNAME'];
					$user->PASS				= sha1($_POST['EMPLOYEEID']);
					$user->PERANAN			= 'Pegawai';
					$user->create();
			 
						
					$autonum = New Autonumber(); 
					$autonum->auto_update('employeeid');

					message("Data pegawai baru berhasil dibuat!", "success");
					redirect("index.php");

				}
				
			}
		 }
		}

	}

	function doEdit(){
	if(isset($_POST['save'])){

		if ( $_POST['FNAME'] == "" OR $_POST['LNAME'] == ""
			OR $_POST['MNAME'] == "" OR $_POST['ADDRESS'] == "" 
			OR $_POST['TELNO'] == "") {
			$messageStats = false;
			message("Harus Diisi Semua!","error");
			redirect('index.php?view=add');
		}else{	

			$birthdate =  date_format(date_create($_POST['BIRTHDATE']),'Y-m-d');

			$age = date_diff(date_create($birthdate),date_create('today'))->y;
		 	if ($age < 20 ){
		       message("Belum cukup usia. Harus berusia 18 tahun keatas.", "error");
		       redirect("index.php?view=edit&id=".$_POST['EMPLOYEEID']);

		    }else{

		    	@$datehired = date_format(date_create($_POST['EMP_HIREDDATE']),'Y-m-d');

					$emp = New Employee(); 
					$emp->IDPEGAWAI 		= $_POST['EMPLOYEEID'];
					$emp->NAMAD				= $_POST['FNAME']; 
					$emp->NAMAB				= $_POST['LNAME'];
					$emp->NAMAT 	   		= $_POST['MNAME'];
					$emp->ALAMAT			= $_POST['ADDRESS'];  
					$emp->TGL_LAHIR	 		= $birthdate;
					$emp->TMP_LAHIR			= $_POST['BIRTHPLACE'];  
					$emp->USIA			    = $age;
					$emp->JENIS_KELAMIN 	= $_POST['optionsRadios']; 
					$emp->TELP				= $_POST['TELNO'];
					$emp->STATUS			= $_POST['CIVILSTATUS']; 
					$emp->POSISI			= trim($_POST['POSITION']);
					$emp->PEG_EMAIL			= $_POST['EMP_EMAILADDRESS'];
					$emp->PEGUSERNAME		= $_POST['EMPLOYEEID'];
					$emp->PEGPASSWORD		= sha1($_POST['EMPLOYEEID']);
					$emp->TGL_KERJA			=  @$datehired;
					$emp->IDPERUSAHAAN		= $_POST['COMPANYID']; 
					$emp->update($_POST['EMPLOYEEID']);


					$user = New User(); 
					$u_res = $user->single_user($_POST['EMPLOYEEID']);

					if (isset($u_res)) {
						# code...
						$user->NAMA_LENGKAP		= $_POST['FNAME'] . ' ' .$_POST['LNAME'];
						$user->USERNAME			= $_POST['LNAME'];
						$user->PASS				= sha1($_POST['EMPLOYEEID']); 
						$user->update($_POST['EMPLOYEEID']);
					}else{
						$user = New User();
						$user->IDUSER 			= $_POST['EMPLOYEEID'];
						$user->NAMA_LENGKAP 	= $_POST['FNAME'] . ' ' .$_POST['LNAME'];
						$user->USERNAME			= $_POST['LNAME'];
						$user->PASS				= sha1($_POST['EMPLOYEEID']);
						$user->PERANAN			= 'Pegawai';
						$user->create();
					}
 

				message("Data Pegawai Berhasil Diupdate!", "success");
				// redirect("index.php?view=view&id=".$_POST['EMPLOYEEID']);
		       redirect("index.php?view=edit&id=".$_POST['EMPLOYEEID']);
	    	}


		}
  	
	 
	}

} 
	function doDelete(){
		
		// if (isset($_POST['selector'])==''){
		// message("Select the records first before you delete!","error");
		// redirect('index.php');
		// }else{

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$subj = New Student();
		// 	$subj->delete($id[$i]);

		
				$id = 	$_GET['id'];

				$emp = New Employee();
	 		 	$emp->delete($id);
			 
		
		// }
			message("Data pegawai berhasil dihapus!","success");
			redirect('index.php');
		// }

		
	}

 
 
  function UploadImage(){
			$target_dir = "../../pegawai/photos/";
			$target_file = $target_dir . date("dmYhis") . basename($_FILES["picture"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			
			if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"
		|| $imageFileType != "gif" ) {
				 if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
					return  date("dmYhis") . basename($_FILES["picture"]["name"]);
				}else{
					echo "Error Upload File";
					exit;
				}
			}else{
					echo "File Tidak Didukung";
					exit;
				}
} 

	function doupdateimage(){
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="photo/".$myfile;


		if ( $errofile > 0) {
				message("Belum Memilih Gambar!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
		}else{
	 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("Upload file harus file gambar!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
			}else{
					//uploading the file
					move_uploaded_file($temp,"photo/" . $myfile);
		 	
					 

						$stud = New Student();
						$stud->StudPhoto	= $location;
						$stud->studupdate($_POST['StudentID']);
						redirect("index.php?view=view&id=". $_POST['StudentID']);
						 
							
					}
			}
			 
		}

 
?>