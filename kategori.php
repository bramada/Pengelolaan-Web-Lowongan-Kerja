
    <section id="content">
        <div class="container content">     

     
 <?php
 if (isset($_GET['search'])) {
     # code...
    $category = $_GET['search'];
 }else{
     $category = '';

 }
    $sql = "SELECT * FROM `tbperusahaan` c,`tbpekerjaan` j WHERE c.`IDPERUSAHAAN`=j.`IDPERUSAHAAN` AND KATEGORI LIKE '%" . $category ."%' ORDER BY WAKTU_POST DESC" ;
    $mydb->setQuery($sql);
    $cur = $mydb->loadResultList();


    foreach ($cur as $result) { 
  ?>  

          <div class="panel panel-primary">
              <div class="panel-header">
                   <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 20px;font-weight: bold;color: #000;margin-bottom: 5px;"><a href="<?php echo web_root.'index.php?q=viewjob&search='.$result->IDPEKERJAAN;?>"><?php echo $result->BIDANG ;?></a> 
                  </div> 
              </div>
              <div class="panel-body contentbody">
                    <div class="col-sm-10">
   
                        <div class="col-sm-12">
                            <p>Pengalaman Kerja :</p>
                             <ul style="list-style: none;"> 
                                <li><?php echo $result->PENGALAMAN_KERJA ;?></li> 
                            </ul> 
                        </div>
                        <div class="col-sm-12"> 
                            <p>Deskripsi Pekerjaan:</p>
                            <ul style="list-style: none;"> 
                                 <li><?php echo $result->DESKRIPSI_KERJA ;?></li> 
                            </ul> 
                         </div>
                        <div class="col-sm-12">
                            <p>Perusahaan :  <?php echo  $result->NAMA_PERUSAHAAN ?></p>
                            <p>Lokasi:  <?php echo  $result->ALAMAT_PERUSAHAAN ?></p>  
                        </div>
                    </div>
                    <div class="col-sm-2"> <a href="<?php echo web_root; ?>index.php?q=apply&search=<?php echo $result->IDPEKERJAAN;?>&view=personalinfo" class="btn btn-main btn-next-tab">Lamar Kerja !</a></div>
                </div> 
              <div class="panel-footer">
                  Waktu Post :  <?php echo date_format(date_create($result->WAKTU_POST),'M d, Y'); ?>
              </div>
          </div> 
<?php  } ?>   
     </div>
    </section>  
