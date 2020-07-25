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
	font-size: 20px;
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
	<h3><?php echo $job->BIDANG; ?></h3>
	<input type="hidden" name="JOBREGID" value="<?php echo $jobreg->IDLAMARAN;?>">

	<div class="col-sm-6">
		<ul>
            <li><i class="fp-ht-bed"></i>Jumlah Pegawai Dibutuhkan : <?php echo $job->JML_BTH_PEGAWAI; ?></li>
            <li><i class="fp-ht-food"></i>Gaji : <?php echo number_format($job->GAJI,2);  ?></li>
            <li><i class="fa fa-sun-"></i>Lama Kontrak : <?php echo $job->LAMA_KERJA; ?></li>
        </ul>
	</div> 
	<div class="col-sm-6">
		<ul> 
            <li><i class="fp-ht-tv"></i>Jenis Kelamin : <?php echo $job->JENIS_KELAMIN; ?></li>
            <li><i class="fp-ht-computer"></i>Sektor Lowongan : <?php echo $job->LOWONG; ?></li>
        </ul>
	</div>
	<div class="col-sm-12">
		<p>Deskripsi Kerja : </p>   
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
 
<div class="col-sm-12 content-footer">
 
	<div class="col-sm-12">
		<h3>Feedback</h3>
		<p><?php echo isset($jobreg->TANGGAPAN) ? $jobreg->TANGGAPAN : ""; ?></p>
	</div>
	<div class="col-sm-12  submitbutton "> 
		<a href="index.php?view=appliedjobs" class="btn btn-primary fa fa-arrow-left">  Kembali</a>
	</div> 
</div>
</form>