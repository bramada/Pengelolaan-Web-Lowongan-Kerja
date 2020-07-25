
    <section id="content">
        <div class="container content">     
        <!-- Service Blcoks -->  
        <div class="row">
            <?php 
                  $sql = "SELECT * FROM `tbperusahaan`";
                  $mydb->setQuery($sql);
                  $comp = $mydb->loadResultList(); 

                  foreach ($comp as $company ) { 
            ?>
                    <div class="col-sm-4 info-blocks">
                        <i class="icon-info-blocks fa fa-building-o"></i>
                        <div class="info-blocks-in">
                            <h3><?php echo '<a href="'.web_root.'index.php?q=hiring&search='.$company->NAMA_PERUSAHAAN.'">'.$company->NAMA_PERUSAHAAN.'</a>';?></h3>
                            <!-- <p><?php echo $company->COMPANYMISSION;?></p> -->
                            <p>Alamat :<?php echo $company->ALAMAT_PERUSAHAAN;?></p>
                            <p>Kontak :<?php echo $company->KONTAK_PERUSAHAAN;?></p>
                        </div>
                    </div>

            <?php } ?>

 
 
         </div> 
        </div>
    </section>
    <br>