<?php 
	  if (!isset($_SESSION['PER_USERID'])){
      redirect(web_root."prrusahaan/index.php");
     } 
?>
	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">Daftar Pelamar Kerja
            </h1>
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
				  		<th>Status Pelamar</th>
				  		<th>Minat Kategori Profesi</th>
				  		 <th width="8%" align="center">Aksi</th>
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * FROM `tbpelamar` a, `tbkategori` ca WHERE a.`IDKATEGORI`=ca.`IDKATEGORI`");
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
				  		echo '<tr>';
				  			echo '<td>' . $result->NAMAD .' '. $result->NAMAT .' '. $result->NAMAB .'</td>';
				  			echo '<td>' . $result->ALAMAT.'</td>';
				  			echo '<td>' . $result->TELP.'</td>';
				  			echo '<td>' . $result->EMAIL.'</td>';
				  			if(empty($result->NIK) AND empty($result->FOTO_KTP) ){
				  				echo "<td>Pendaftar baru</td>";
				  			}else if($result->STATUS_PELAMAR==1){
				  				echo "<td>	<span class=bg-yellow>&nbsp&nbsp Mencari kerja &nbsp&nbsp</span></td>";
				  			}else{
				  				echo "<td><span class=bg-green>&nbsp&nbsp Sudah diterima kerja &nbsp&nbsp</span></td>";
				  			}
				  			echo '<td>' . $result->KATEGORI.'</td>';
				  		echo '<td align="center">
				  				<a title="Lihat" href="index.php?view=view&id='.$result->IDPELAMAR.'"  class="btn btn-info btn-xs  "> <span class="fa fa-info fw-fa"></span> Lihat</a>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
			
			
				</form>
	
 <div class="table-responsive">	 