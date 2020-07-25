<?php 
global $mydb;
	$red_id = isset($_GET['id']) ? $_GET['id'] : '';

	$jobregistration = New JobRegistration();
	$jobreg = $jobregistration->single_jobregistration($red_id);

	$applicant = new Applicants();
	$appl = $applicant->single_applicant($jobreg->IDPELAMAR);

	$jobvacancy = New Jobs();
	$job = $jobvacancy->single_job($jobreg->IDPEKERJAAN);

	$company = new Company();
	$comp = $company->single_company($jobreg->IDPERUSAHAAN);

	$sql = "SELECT * FROM `tblampiran` WHERE `IDFILE`=" .$jobreg->IDFILE;
	$mydb->setQuery($sql);
	$attachmentfile = $mydb->loadSingleResult();


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
<div class="col-sm-6 content-body" > 
	<p>Detail Pekerjaan</p> 
	<h3><?php echo $job->BIDANG; ?></h3>
	<input type="hidden" name="JOBREGID" value="<?php echo $jobreg->IDLAMARAN;?>">
	<input type="hidden" name="APPLICANTID" value="<?php echo $appl->IDPELAMAR;?>">

	<div class="col-sm-6">
		<ul>
            <li><i class="fp-ht-bed"></i>Jumlah Butuh Pegawai : <?php echo $job->JML_BTH_PEGAWAI; ?></li>
            <li><i class="fp-ht-food"></i>Gaji : <?php echo number_format($job->GAJI,2);  ?></li>
            <li><i class="fa fa-sun-"></i>Lama Kontrak: <?php echo $job->LAMA_KERJA; ?></li>
        </ul>
	</div> 
	<div class="col-sm-6">
		<ul> 
            <li><i class="fp-ht-tv"></i>Jenis Kelamin : <?php echo $job->JENIS_KELAMIN; ?></li>
            <li><i class="fp-ht-computer"></i>Sektor Lowongan : <?php echo $job->LOWONG; ?></li>
        </ul>
	</div>
	<div class="col-sm-12">
		<p>Deskripsi Pekerjaan : </p>   
		<p style="margin-left: 15px;"><?php echo $job->DESKRIPSI_KERJA;?></p>
	</div>
	<div class="col-sm-12"> 
		<p>Pengalaman Kerja : </p>
		<p style="margin-left: 15px;"><?php echo $job->PENGALAMAN_KERJA; ?></p>
	</div>
	<div class="col-sm-12"> 
		<p>Pegawai : </p>
		<p style="margin-left: 15px;"><?php echo $comp->NAMA_PERUSAHAAN ; ?></p> 
		<p style="margin-left: 15px;">@ <?php echo $comp->ALAMAT_PERUSAHAAN ; ?></p>
	</div>
</div>
<div class="col-sm-6 content-body" >
	<p>Informasi Pelamar</p> 
	<div class="col-sm-6"> 
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
		<p>Pendidikan Terakhir : <b><?php echo $appl->GELAR;?></b></p>
	</div>
	<div class="col-sm-12"> 
		<p>KTP Pelamar : </p>
        <a href="<?php echo web_root.'pelamar/KTP/'.$appl->FOTO_KTP; ?>"><img style="max-width: 200px;"  src="<?php echo web_root.'pelamar/KTP/'.$appl->FOTO_KTP; ?>"></a> 
	</div>
	<div class="col-sm-12"> 
		<br> 
	</div>


</div> 
<div class="col-sm-12 content-footer">

	<div class="col-sm-8">
		<p><b>Tanggapan oleh perusahaan</b></p>
		<textarea readonly="" class="input-group" name="REMARKS"><?php echo isset($jobreg->TANGGAPAN) ? $jobreg->TANGGAPAN : ""; ?></textarea>
	</div>
	<div class="col-sm-8">
	<p>pada : <?php echo $jobreg->WAKTU_DISETUJUI ?></p>
	</div>

	<div class="col-sm-12  submitbutton ">
	<hr> 

<a href="index.php" class="btn btn-danger  btn-sm"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Kembali</strong></a>&nbsp&nbsp&nbsp

	<?php 

	$tgl = $jobreg->WAKTU_DISETUJUI;
	$tanggal = new DateTime($tgl);
	$now = new DateTime();
	$selisih = $tanggal->diff($now)->format("%a");
	if($selisih>3){
		echo '<a href="sendmail.php?id='.$appl->IDPELAMAR.'" class="btn btn-primary  btn-md"><span class=" fa fa-envelope"></span>&nbsp;<strong>Kirim pemberitahuan konfirmasi !</strong></a>';
	}else{
		echo '';
	}

	?>
         
         
                   
	</div> 
</div>
</form>