
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
    $cur = $mydb->loadResultList();


    foreach ($cur as $result) {
        # code...
 
 // `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `PREFEREDSEX`, `SECTOR_VACANCY`, `DATEPOSTED`
  ?> 
           <div class="container">
             <div class="mg-available-rooms">
                    <h5 class="mg-sec-left-title">Waktu Post :  <?php echo date_format(date_create($result->WAKTU_POST),'M d, Y'); ?></h5>
                        <div class="mg-avl-rooms">
                            <div class="mg-avl-room">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a href="#"><span class="fa fa-building-o" style="font-size: 50px"></span><!-- <img src="img/room-1.png" alt="" class="img-responsive"> --></a>
                                    </div>
                                    <div class="col-sm-10">
                                        <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;"><?php echo $result->BIDANG ;?> 
                                        </div> 
                                        <div class="row contentbody">
                                            <div class="col-sm-6">
                                                <ul>
                                                    <li><i class="fp-ht-bed"></i>Jumlah Lowongan Kerja : <?php echo $result->JML_BTH_PEGAWAI; ?></li>
                                                    <li><i class="fp-ht-food"></i>Gaji : <?php echo number_format($result->GAJI,2);  ?></li>
                                                    <li><i class="fa fa-sun-"></i>Lama Kerja : <?php echo $result->LAMA_KERJA; ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6">
                                                <ul>
                                                    <!-- <li><i class="fp-ht-dumbbell"></i>Qualification/Work Experience : <?php echo $result->QUALIFICATION_WORKEXPERIENCE; ?></li> -->
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
                                          <!-- <a href="<?php echo web_root; ?>index.php?q=apply&search=<?php echo $result->IDPEKERJAAN;?>&view=personalinfo" class="btn btn-main btn-next-tab">Lamar Kerja !</a> -->
                                          <a data-target="#myModal" data-toggle="modal" href="" class="btn btn-main btn-next-tab"> Lamar Kerja ! </a>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
            </div>                        

     
<?php  } ?>    </div>
    </section> 