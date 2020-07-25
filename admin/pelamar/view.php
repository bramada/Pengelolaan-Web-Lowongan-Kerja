<?php 
global $mydb;
	$red_id = isset($_GET['id']) ? $_GET['id'] : '';


	$applicant = new Applicants();
	$appl = $applicant->single_applicant($red_id);

	$category = New Category();
	$ca = $category->single_category($appl->IDKATEGORI);



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
	<p><span class=bg-blue>&nbsp&nbsp&nbsp&nbspInformasi Pelamar&nbsp&nbsp&nbsp&nbsp</span></p> 
	<div class="col-sm-4"> 
        <a href="<?php echo web_root.'pelamar/'.$appl->FOTO_PELAMAR; ?>"><img style="max-width: 200px;"  src="<?php echo web_root.'pelamar/'.$appl->FOTO_PELAMAR; ?>"> </a> 
	</div>
	<h3> <?php echo $appl->NAMAD. ', ' .$appl->NAMAT . ' ' . $appl->NAMAB;?></h3>
	<ul> 
		<li>Alamat : <?php echo $appl->ALAMAT; ?></li>
		<li>No Telepon : <?php echo $appl->TELP;?></li>
		<li>Alamat Email : <?php echo $appl->EMAIL;?></li>
		<li>Jenis Kelamin : <?php echo $appl->JENIS_KELAMIN;?></li>
		<li>Usia : <?php echo $appl->USIA;?></li> 
	</ul>
	<div class="col-sm-12"> 
		<br>
	</div>
	<div class="col-sm-12"> 
		<p>Pendidikan Terakhir : <b></b><?php echo $appl->GELAR;?></p>
	</div>
	<div class="col-sm-12"> 
		<p>NIK : <b><?php echo $appl->NIK;?></b></p>
	</div>
	<div class="col-sm-12"> 
		<p>KTP Pelamar : </p>
        <a href="
        <?php 
        if (empty($appl->FOTO_KTP)){
        	echo web_root.'pelamar/KTP/NoKTP.png'; 
        }else{
        echo web_root.'pelamar/KTP/'.$appl->FOTO_KTP;
        }
        ?>"><img style="max-width: 200px;"  src="
        <?php 
        if (empty($appl->FOTO_KTP)){
        	echo web_root.'pelamar/KTP/NoKTP.png'; 
        }else{
        echo web_root.'pelamar/KTP/'.$appl->FOTO_KTP;
        }
        ?>"></a> 
	</div>
	<div class="col-sm-12"> 
		<p><br>Kategori yang diminati : <b><?php echo $ca->KATEGORI;?></b></p>
	</div>

	<div class="col-md-12">
	<hr> 
		<p><i class="fa fa-paperclip"></i>  File Pendukung Pelamar (CV/dll..)</p>
		<a href="<?php echo web_root.'pelamar/'.$appl->FILE_PELAMAR; ?>" ><span class="glyphicon glyphicon-arrow-down"></span>&nbsp; Download</a>
	</div>

	<div class="col-sm-12"> 
		<hr>
<b><span class=bg-blue>&nbsp&nbsp&nbsp&nbspDaftar lowongan yang sesuai&nbsp&nbsp&nbsp&nbsp</span></b> <hr>
<div class="table-responsive">					
				<table id="data-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>

				  		<!-- <th>No.</th> -->
				  		<th>Nama Perusahaan</th> 
				  		<th>Bidang Pekerjaan</th> 
				  		<th>Jumlah Pegawai Dibutuhkan</th> 
				  		<th>Gaji</th> 
				  		<th>Deskripsi Kerja</th> 
				  		<th>Jenis Kelamin</th> 
				  		 <th width="10%"><center>Aksi</center></th>
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * FROM `tbpekerjaan` j, `tbperusahaan` c, tbpelamar a WHERE j.`IDKATEGORI`=a.`IDKATEGORI` AND j.`IDPERUSAHAAN`=c.`IDPERUSAHAAN`AND a.`IDPELAMAR`='{$appl->IDPELAMAR}' ORDER BY WAKTU_POST DESC LIMIT 10");
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
				  		echo '<tr>';
				  			echo '<td>' . $result->NAMA_PERUSAHAAN.'</td>';
				  			echo '<td>' . $result->BIDANG.'</td>';
				  			echo '<td>' . $result->JML_BTH_PEGAWAI.'</td>';
				  			echo '<td>' . $result->GAJI.'</td>';
				  			echo '<td>' . $result->DESKRIPSI_KERJA.'</td>';
				  			echo '<td>' . $result->JENIS_KELAMIN.'</td>';
				  		echo '<td align="center"><a title="Otomatis mengirim email ke pelamar" href="sendmail.php?id='.$appl->IDPELAMAR.'" class="btn btn-info btn-sm  ">  <span class="fa fa-send">&nbsp&nbsp Tawarkan lowongan</a></a></td>';
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