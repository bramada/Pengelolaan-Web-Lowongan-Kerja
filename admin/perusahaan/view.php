<?php 
global $mydb;
	$red_id = isset($_GET['id']) ? $_GET['id'] : '';


	$company= new Company();
	$co = $company->single_company($red_id);

	$lowker = New Jobs();
	$lok= $lowker->single_job($co->IDPERUSAHAAN);



?> 
<style type="text/css">
.content-header {
	min-height: 50px;
	border-bottom: 1px solid #ddd;
	font-size: 15px;
	font-weight: bold;
}
.content-body {
	min-height: 350px;
	/*border-bottom: 1px solid #ddd;*/
}
.content-body >p {
	padding:10px;
	font-size: 12px;
	font-weight: bold;
	border-bottom: 1px solid #ddd;
}
.content-footer {
	min-height: 100px;
	border-top: 1px solid #ddd;

}
.content-footer > p {
	padding:5px;
	font-size: 15px;
	font-weight: bold; 
}
 
.content-footer textarea {
	width: 100%;
	height: 200px;
}
.content-footer  .submitbutton{  
	margin-top: 20px;
	/*padding: 0;*/

}
</style>
<form action="controller.php?action=approve" method="POST">
<div class="col-sm-12 content-header" style="">Lihat Detail</div>
<div class="col-sm-12 content-body" > 
	<p><span class=bg-blue>&nbsp&nbsp&nbsp&nbspInformasi Perusahaan&nbsp&nbsp&nbsp&nbsp</span></p> 
	<div class="col-sm-4"> 
        <a href="<?php echo web_root.'perusahaan/user/'.$co->FOTOP; ?>"><img style="max-width: 200px;"  src="<?php echo web_root.'perusahaan/user/'.$co->FOTOP; ?>"> </a> 
	</div>
	<h3> <?php echo $co->NAMA_PERUSAHAAN;?></h3>
	<ul> 
		<li>Alamat : <?php echo $co->ALAMAT_PERUSAHAAN; ?></li>
		<li>No Telepon : <?php echo $co->KONTAK_PERUSAHAAN?></li>
		<li>Alamat Email : <?php echo $co->EMAIL_PERUSAHAAN;?></li>
	</ul>
	<div class="col-sm-12"> 
		<br>
	</div>
	<div class="col-sm-12"> 
	</div>
	<div class="col-sm-12"> 
		<p>NIB : <b><?php echo $co->NIB;?></b></p>
	</div>
	<div class="col-md-12"> 
		<p>Visi & Misi: </p>
		<textarea readonly=""><?php echo $co->VISI_MISI;?></textarea>
	</div>

	<div class="col-md-12">
	<hr> 
		<p><i class="fa fa-paperclip"></i>  Surat-surat Perusahaan</p>
		<a href="<?php echo web_root.'perusahaan/user/'.$co->FILE_PERUSAHAAN; ?>" ><span class="glyphicon glyphicon-arrow-down"></span>&nbsp; Download</a>
	</div>

	</div>
	<div class="col-sm-12"> 
		<hr>
<b><span class=bg-blue>&nbsp&nbsp&nbsp&nbspDaftar lowongan yang dibuat&nbsp&nbsp&nbsp&nbsp</span></b> <hr>
<div class="table-responsive">					
				<table id="data-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>

				  		<!-- <th>No.</th> -->
				  		<th>Bidang Pekerjaan</th> 
				  		<th>Jumlah Pegawai Dibutuhkan</th> 
				  		<th>Gaji</th> 
				  		<th>Deskripsi Kerja</th> 
				  		<th>Jenis Kelamin</th> 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * FROM `tbpekerjaan` j, `tbperusahaan` c WHERE j.`IDPERUSAHAAN`=c.`IDPERUSAHAAN` AND c.`IDPERUSAHAAN`='{$co->IDPERUSAHAAN}' ORDER BY WAKTU_POST DESC LIMIT 10");
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
				  		echo '<tr>';
				  			echo '<td>' . $result->BIDANG.'</td>';
				  			echo '<td>' . $result->JML_BTH_PEGAWAI.'</td>';
				  			echo '<td>' . $result->GAJI.'</td>';
				  			echo '<td>' . $result->DESKRIPSI_KERJA.'</td>';
				  			echo '<td>' . $result->JENIS_KELAMIN.'</td>';
				  		// echo '<td></td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
				</div>
				<hr>

		<a href="index.php" class="btn btn-danger  btn-sm"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Kembali</strong></a> 
	</div>


</div> 
</form>