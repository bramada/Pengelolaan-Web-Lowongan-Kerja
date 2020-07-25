<?php
	 if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?> 
	<div class="row">
    <div class="col-lg-12">
            <h1 class="page-header">Daftar Pelamar Diterima Pegawai </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
                
 
						<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">   	<div class="table-responsive">
							<table id="dash-table" class="table table-striped table-bordered  table-hover " style="font-size:12px" cellspacing="0">

							  <thead>
							  	<tr>
							  		 <th>Nama</th>
							  		<th>Alamat</th>
							  		 <th>Jenis Kelamin</th>
							  		 <th>Usia</th>
							  		 <th>Telepon</th>
							  		 <th>Perusahaan</th>
							  		 <th>Posisi</th>
							  	 	<th width="14%" >Aksi</th> 
							  	</tr>	
							  </thead> 
							  <tbody>
							  	<?php   
							  		$mydb->setQuery("SELECT * FROM `tbpegawai` e, `tbperusahaan` c WHERE e.`IDPERUSAHAAN`=c.`IDPERUSAHAAN` ");
							  		$cur = $mydb->loadResultList();

									foreach ($cur as $result) { 
							  		echo '<tr>';
							  		echo '<td>'. $result->NAMAD.' '. $result->NAMAT.' '. $result->NAMAB.'</td>';
							  		echo '<td>'. $result->ALAMAT.'</td>';
							  		echo '<td>'. $result->JENIS_KELAMIN.'</td>';
							  		echo '<td>'. $result->USIA.'</td>';
							  		echo '<td>'. $result->TELP.'</td>';
							  		echo '<td>'. $result->NAMA_PERUSAHAAN.'</td>';
							  		echo '<td>'. $result->BIDANG.'</td>'; 
					  				echo '<td>    
					  		             <a title="Edit" href="index.php?view=edit&id='.$result->IDPEGAWAI.'"  class="btn btn-info btn-xs  ">
					  		             <span class="fa fa-edit fw-fa"> Edit</span></a> 
					  		             <a title="Hapus" href="controller.php?action=delete&id='.$result->IDPEGAWAI.'"  class="btn btn-danger btn-xs  ">
					  		             <span class="fa fa-trash-o fw-fa"></span></a> 
					  					 </td>';
							  		echo '</tr>';
							  	} 
							  	?>
							  </tbody>
								
							</table>
 							</div>
							 
							</form>
       
                 
 