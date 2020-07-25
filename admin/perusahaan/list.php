<?php 
	  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     } 
?>
	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">Daftar Perusahaan Menunggu  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  	
			     <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<!-- <th>No.</th> -->
				  		<th>Nama</th> 
				  		<th>Alamat</th> 
				  		<th>Telepon</th> 
				  		<th>Email</th>
				  		 <th width="20%" align="center">Aksi</th>
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * FROM `tbperusahaan` WHERE STATUS_PERUSAHAAN=0");
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
				  		echo '<tr>';
				  			echo '<td>' . $result->NAMA_PERUSAHAAN.'</td>';
				  			echo '<td>' . $result->ALAMAT_PERUSAHAAN.'</td>';
				  			echo '<td>' . $result->KONTAK_PERUSAHAAN.'</td>';
				  			echo '<td>' . $result->EMAIL_PERUSAHAAN.'</td>';
				  		echo '<td align="center">
				  				<a title="Lihat detail" href="index.php?view=view&id='.$result->IDPERUSAHAAN.'" class="btn btn-info btn-xs  "><span class="fa fa-info fw-fa">  Lihat</a>
				  				<a title="Konfirmasi" href="index.php?view=confirm&id='.$result->IDPERUSAHAAN.'" class="btn btn-success btn-xs  "><span class="fa fa-check-square-o">  Konfirmasi</a>
				  		     	<a title="Hapus" href="controller.php?action=delete&id='.$result->IDPERUSAHAAN.'" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash-o fw-fa "></a></td>';
				  		// echo '<td></td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
						<div class="btn-group">
				 <!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->
					<?php
					if($_SESSION['ADMIN_ROLE']=='Administrator'){
					// echo '<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button'
					; }?>
				</div>
			
			
				</form>
	
 <div class="table-responsive">	 