<?php 
	  if (!isset($_SESSION['PER_USERID'])){
      redirect(web_root."per/index.php");
      $userid = $_SESSION['PER_USERID'];
  }
?>
	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">Daftar Lowongan Kerja  <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Tambah Lowongan</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  	
			     <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>

				  		<!-- <th>No.</th> -->
				  		<th>Nama Perusahaan</th> 
				  		<th>Bidang Pekerjaan</th> 
				  		<th>Jumlah Pegawai Dibutuhkan</th> 
				  		<th>Gaji</th> 
				  		<th>Lama Kontrak</th> 
				  		<th>Pengalaman Kerja</th> 
				  		<th>Deskripsi Kerja</th> 
				  		<th>Jenis Kelamin</th> 
				  		<th>Sektor Lowongan</th> 
				  		 <th width="10%" align="center">Aksi</th>
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  	 // `COMPANYID`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `JOBDESCRIPTION`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`
				  		$mydb->setQuery("SELECT * FROM `tbpekerjaan` j, `tbperusahaan` c WHERE j.`IDPERUSAHAAN`=c.`IDPERUSAHAAN` AND c.`IDPERUSAHAAN`=$userid ");
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
				  		echo '<tr>';
				  		// echo '<td width="5%" align="center"></td>';
				  		// echo '<td>
				  		//      <input type="checkbox" name="selector[]" id="selector[]" value="'.$result->CATEGORYID. '"/>
				  		// 		' . $result->CATEGORIES.'</a></td>';
				  			echo '<td>' . $result->NAMA_PERUSAHAAN.'</td>';
				  			echo '<td>' . $result->BIDANG.'</td>';
				  			echo '<td>' . $result->JML_BTH_PEGAWAI.'</td>';
				  			echo '<td>' . $result->GAJI.'</td>';
				  			echo '<td>' . $result->LAMA_KERJA.'</td>';
				  			echo '<td>' . $result->PENGALAMAN_KERJA.'</td>';
				  			echo '<td>' . $result->DESKRIPSI_KERJA.'</td>';
				  			echo '<td>' . $result->JENIS_KELAMIN.'</td>';
				  			echo '<td>' . $result->LOWONG.'</td>';
				  		echo '<td align="center"><a title="Edit" href="index.php?view=edit&id='.$result->IDPEKERJAAN.'" class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></a>
				  		     <a title="Delete" href="controller.php?action=delete&id='.$result->IDPEKERJAAN.'" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash-o fw-fa "></a></td>';
				  		// echo '<td></td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
						<div class="btn-group">
				</div>
			
			
				</form>
	
 <div class="table-responsive">	 