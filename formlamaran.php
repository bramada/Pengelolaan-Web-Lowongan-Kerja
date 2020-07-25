<section id="content">
  <div class="container content">     
 <?php
if (isset($_GET['search'])) {
# code...
$jobid = $_GET['search'];
}else{
$jobid = '';

}
$sql = "SELECT * FROM `tbperusahaan` c,`tbpekerjaan` j WHERE c.`IDPERUSAHAAN`=j.`IDPERUSAHAAN` AND IDPEKERJAAN LIKE '%". $jobid ."%' ORDER BY WAKTU_POST DESC" ;
$mydb->setQuery($sql);
$result = $mydb->loadSingleResult();

?> 
<p> <?php check_message();?></p>     
<?php 
if (isset($_SESSION['APPLICANTID'])) {
    $appl = New Applicants();
    $applicant = $appl->single_applicant($_SESSION['APPLICANTID']); 
?>
<!-- Jika sudah login dan melakukan lamaran -->
    <div class="col-sm-12">
                   <div class="row">
                    <h2 class=" " >Detail Pekerjaan</h2>
                     <div class="panel">
                         <div class="panel-header">
                              <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;"><a href="<?php echo web_root.'index.php?q=viewjob&search='.$result->IDPEKERJAAN;?>"><?php echo $result->BIDANG ;?></a> 
                              </div> 
                         </div>
                         <div class="panel-body">
                                  <div class="row contentbody">
                                        <div class="col-sm-6">
                                            <ul>
                                                <li><i class="fp-ht-bed"></i>Jumlah Lowongan Kerja : <?php echo $result->JML_BTH_PEGAWAI; ?></li>
                                                <li><i class="fp-ht-food"></i>Gaji : <?php echo number_format($result->GAJI,2);  ?></li>
                                                <li><i class="fa fa-sun-"></i>Lama Kontrak Kerja : <?php echo $result->LAMA_KERJA; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul> 
                                                <li><i class="fp-ht-tv"></i>Jenis Kelamin: <?php echo $result->JENIS_KELAMIN; ?></li>
                                                <li><i class="fp-ht-computer"></i>Sektor Lowongan : <?php echo $result->LOWONG; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-12">
                                            <p>Pengalaman Kerja :</p>
                                             <ul style="list-style: none;"> 
                                                <li><?php echo $result->PENGALAMAN_KERJA ;?></li> 
                                            </ul> 
                                        </div>
                                        <div class="col-sm-12"> 
                                            <p>Deskripsi Kerja:</p>
                                            <ul style="list-style: none;"> 
                                                 <li><?php echo $result->DESKRIPSI_KERJA ;?></li> 
                                            </ul> 
                                         </div>
                                        <div class="col-sm-12">
                                            <p>Perusahaan :  <?php echo  $result->NAMA_PERUSAHAAN; ?></p> 
                                            <p>Lokasi :  <?php echo  $result->ALAMAT_PERUSAHAAN; ?></p>
                                        </div>
                                    </div>
                         </div>
                         <div class="panel-footer">
                              Kategori : <b><?php echo  $result->KATEGORI; ?> </b> | Waktu Pembuatan :  <?php echo date_format(date_create($result->WAKTU_POST),'M d, Y'); ?>
                         </div>
                     </div>
                     
                       
                </div>
            </div> 
             <form class="form-horizontal span6 " action="proses.php?action=submitapplication&JOBID=<?php echo $result->IDPEKERJAAN; ?>"  enctype="multipart/form-data"  method="POST">
            <div class="col-sm-12">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-header">
                            <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;">Bukti Data Dribadi
                                <input name="JOBID" type="hidden" value="<?php echo $_GET['job'];?>">
                            </div>
                        </div>

                        <div class="panel-body"> 
                            <label class="col-md-2" for="nik" style="padding: 0;margin: 0;">Nama Lengkap:</label> 
                            <div class="col-md-10" style="padding: 0;margin: 0;">
                                <div class="form-group">
                                <div class="col-md-8">
                                <b><?php echo $applicant->NAMAD .' '. $applicant->NAMAT .' '. $applicant->NAMAB; ?></b>
                                </div>
                                </div>
                            </div> 
                        </div>

                        <div class="panel-body"> 
                            <label class="col-md-2" for="nik" style="padding: 0;margin: 0;">Foto Wajah <font color="red">* </font>:</label>
                             <div id="image-container">
                                <img style="max-width: 200px;" title="profile image"  data-target="#myModal"  data-toggle="modal"  src="<?php echo web_root.'pelamar/'.$applicant->FOTO_PELAMAR; ?>">  
                            </div>
                        </div>

                        <div class="panel-body"> 
                            <label class="col-md-2" for="nik" style="padding: 0;margin: 0;">Nomor KTP:</label> 
                            <div class="col-md-10" style="padding: 0;margin: 0;">
                                <div class="form-group">
                                <div class="col-md-8">
                                <input class="form-control input-sm " name="NIK" value="<?php echo $applicant->NIK; ?>" required="" placeholder="<?php echo $applicant->NIK; ?>"> 
                                </div>
                                </div>
                            </div> 
                        </div>
                        <div class="panel-body"> 
                            <label class="col-md-2" for="picture" style="padding: 0;margin: 0;">Unggah Foto KTP:</label> 
                            <div class="col-md-10" style="padding: 0;margin: 0;">
                                <input id="ktp" name="ktp" type="file" required="">
                                <input name="MAX_FILE_SIZE" type="hidden" value="1000000"> 
                            </div> 
                            <label class="col-md-6" style="padding: 0;margin: 0;"> <font color="red"><br><br><i>* Foto Wajah harus asli, klik foto untuk merubah Foto Wajah </i></font>
                        </div>
                    </div> 
                </div> 
            </div>
           <div class="form-group">
            <div class="col-md-12"> 
                 <button class="btn btn-primary btn-sm pull-right" name="submit" type="submit" ><strong>Lamar </strong><span class="fa fa-arrow-right"></span></button>
              <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp;<strong> Kembali</strong></a> 
            </div>
           </div> 
        </form>
<?php }else{ ?>




<!-- melamar jika belum daftar -->
  <form class="form-horizontal span6  wow fadeInDown" action="proses.php?action=submitapplication&JOBID=<?php echo $result->IDPEKERJAAN; ?>"  enctype="multipart/form-data"  method="POST">
			<div class="col-sm-8"> 
                <div class="row">
                    <h2 class=" ">Info Pribadi</h2>   
                        <?php require_once('formpelamar.php') ?>   
                 </div>
			</div>
			<div class="col-sm-4">
				   <div class="row">
                    <h2 class=" " >Detail Pekerjaan</h2>
                     <div class="panel">
                         <div class="panel-header">
                              <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;"><a href="<?php echo web_root.'index.php?q=viewjob&search='.$result->IDPEKERJAAN;?>"><?php echo $result->BIDANG ;?></a> 
                              </div> 
                         </div>
                         <div class="panel-body">
                                  <div class="row contentbody">
                                        <div class="col-sm-6">
                                            <ul>
                                                <li><i class="fp-ht-bed"></i>Jumlah Lowongan Kerja: <?php echo $result->JML_BTH_PEGAWAI; ?></li>
                                                <li><i class="fp-ht-food"></i>Gaji : <?php echo number_format($result->GAJI,2);  ?></li>
                                                <li><i class="fa fa-sun-"></i>Lama Kontrak Kerja : <?php echo $result->LAMA_KERJA; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul> 
                                                <li><i class="fp-ht-tv"></i>Jenis Kelamin : <?php echo $result->JENIS_KELAMIN; ?></li>
                                                <li><i class="fp-ht-computer"></i>Sektor Lowongan : <?php echo $result->LOWONG; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-12">
                                            <p>Pengalaman Kerja :</p>
                                             <ul style="list-style: none;"> 
                                                <li><?php echo $result->PENGALAMAN_KERJA ;?></li> 
                                            </ul> 
                                        </div>
                                        <div class="col-sm-12"> 
                                            <p>Deskripsi Kerja:</p>
                                            <ul style="list-style: none;"> 
                                                 <li><?php echo $result->DESKRIPSI_KERJA ;?></li> 
                                            </ul> 
                                         </div>
                                        <div class="col-sm-12">
                                            <p>Perusahaan :  <?php echo  $result->NAMA_PERUSAHAAN; ?></p> 
                                            <p>Lokasi :  <?php echo  $result->ALAMAT_PERUSAHAAN; ?></p>
                                        </div>
                                    </div>
                         </div>
                         <div class="panel-footer">
                              Kategori : <b><?php echo  $result->KATEGORI; ?> </b> <br> Waktu Pembuatan :  <?php echo date_format(date_create($result->WAKTU_POST),'M d, Y'); ?>
                         </div>
                     </div>
                     
                       
                </div>
			</div>

              <div class="col-sm-12">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-header">
                            <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;">Bukti Data Dribadi
                            </div>
                        </div>

                        <div class="panel-body"> 
                            <label class="col-md-2" for="nik" style="padding: 0;margin: 0;">Foto Wajah <font color="red">* </font>:</label>
                             <input id="foto" name="foto" type="file">
                            <input name="MAX_FILE_SIZE" type="hidden" value="1000000">
                        </div>

                        <div class="panel-body"> 
                            <label class="col-md-2" for="nik" style="padding: 0;margin: 0;">Nomor KTP:</label> 
                            <div class="col-md-10" style="padding: 0;margin: 0;">
                                <div class="form-group">
                                <div class="col-md-8">
                                <input class="form-control input-sm " name="NIK" required="" placeholder="NIK"> 
                                </div>
                                </div>
                            </div> 
                        </div>

                        <div class="panel-body"> 
                            <label class="col-md-2" for="picture" style="padding: 0;margin: 0;">Unggah Foto KTP:</label> 
                            <div class="col-md-10" style="padding: 0;margin: 0;">
                                <input id="ktp" name="ktp" type="file">
                                <input name="MAX_FILE_SIZE" type="hidden" value="1000000"> 
                            </div> 
                            <label class="col-md-6" style="padding: 0;margin: 0;"> <font color="red"><br><br><i>* Foto Wajah harus asli </i></font>
                        </div>
                    </div> 
                </div> 
            </div>
          <div class="form-group">
            <div class="col-md-12"> 
                 <button class="btn btn-primary btn-sm pull-right" name="submit" type="submit" ><strong>Lamar</strong> <span class="fa fa-arrow-right"></span></button>
              <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp;<strong>Kembali</strong></a> 
            </div>
           </div>   
        </form> 
<?php } ?>
		</div> 
</section> 

 <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">×</button>

                                    <h4 class="modal-title" id="myModalLabel">Pilih Gambar</h4>
                                </div>

                                <form action="proses.php?action=photos&JOBID=<?php echo $result->IDPEKERJAAN; ?>" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8">
                                                          <input name="MAX_FILE_SIZE" type=
                                                            "hidden" value="1000000"> <input id=
                                                            "photo" name="photo" type=
                                                            "file">
                                                        </div>

                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button  class="btn btn-primary"
                                        name="savephoto" type="submit">Upload Foto</button>
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Keluar</button> 
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->