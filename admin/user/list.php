<?php
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }
$users = New User();
$user = $users->single_user($_SESSION['ADMIN_USERID']);
?> 
       	 <div class="col-lg-12">
            <h1 class="page-header">Daftar User  <?php if($user->PERANAN=='Administrator'){?><a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Tambah User </a><?php } ?>  </h1>
       		</div>
        	<!-- /.col-lg-12 --> 
   		 	<div class="col-lg-12"> 
   		 		<div class="table-responsive">
				<table id="dash-table" class="table  table-bordered table-hover" style="font-size:12px;" cellspacing="0"> 
				  <thead>
				  	<tr>
				  		<th>ID Akun</th>
				  		<th>Nama Akun</th>
				  		<th>Username</th>
				  		<th>Perananan</th>
				  		<?php if($user->PERANAN=='Administrator'){
				  		echo "<th width=10% >Aksi</th>"; } ?>
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * FROM  `tbuser`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		echo '<td>' . $result->IDUSER.'</a></td>';
				  		echo '<td>' . $result->NAMA_LENGKAP.'</a></td>';
				  		echo '<td>'. $result->USERNAME.'</td>';
				  		echo '<td>'. $result->PERANAN.'</td>';
				  		if($user->PERANAN=='Administrator') {
				  			if($user->IDUSER=='SUPERUSER' AND $result->IDUSER!='SUPERUSER'){
				  				echo '<td align="center" > 
						  		<a title="Edit" href="index.php?view=edit&id='.$result->IDUSER.'"  class="btn btn-primary btn-xs ">  <span class="fa fa-edit fw-fa"></span></a>
						  					 
						  		<a title="Hapus" href="controller.php?action=delete&id='.$result->IDUSER.'" class="btn btn-danger btn-xs"><span class="fa fa-trash-o fw-fa"></span> </a>
						  			</td>';
				  				echo '</tr>';
				  			}else if($result->IDUSER=='SUPERUSER' OR $result->PERANAN=='Administrator' AND $result->IDUSER!=$user->IDUSER){
						  		echo '<td align="center" > - </td>';
				  				echo '</tr>';
				  			}else{
				  				echo '<td align="center" > 
						  		<a title="Edit" href="index.php?view=edit&id='.$result->IDUSER.'"  class="btn btn-primary btn-xs ">  <span class="fa fa-edit fw-fa"></span></a>
						  					 
						  		<a title="Hapus" href="controller.php?action=delete&id='.$result->IDUSER.'" class="btn btn-danger btn-xs"><span class="fa fa-trash-o fw-fa"></span> </a>
						  			</td>';
				  				echo '</tr>';
				  			}

				  		}else if ($user->PERANAN=='Staff'){
				  		echo '</tr>';

				  		}
				  		
				  	} 
				  	?>
				  </tbody>
					
				</table>  
			</div>
			</div> 
 