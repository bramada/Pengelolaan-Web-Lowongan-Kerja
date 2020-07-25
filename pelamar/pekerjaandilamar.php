 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Main content -->
    <section class="content">
      <div class="row"> 
        <!-- /.col -->
        <?php if (!isset($_GET['p'])) {  ?>
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pekerjaan Dilamar</h3> 
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <table id="dash-table" class="table table-striped table-hover table-responsive">
                  <thead> 
                    <tr>
                      <th>Nama Pekerjaan</th>
                      <th>Perusahaan</th>
                      <th>Lokasi</th>
                      <th>Tanggapan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $sql="SELECT * FROM `tbperusahaan` c,`tblamaran` r, `tbpekerjaan` j WHERE c.`IDPERUSAHAAN`=r.`IDPERUSAHAAN` AND r.`IDPEKERJAAN`=j.`IDPEKERJAAN` AND r.`IDPELAMAR`='{$_SESSION['APPLICANTID']}'" ;
                      $mydb->setQuery($sql);
                      $cur = $mydb->loadResultList();  
                      foreach ($cur as $result) {
                        # code...
                          echo '<tr>';
                          echo '<td class="mailbox-star"><a href="index.php?view=appliedjobs&p=job&id='.$result->IDLAMARAN.'"><i class="fa fa-pencil-o text-yellow"></i> '.$result->BIDANG.'</a></td>';
                          echo '<td class="mailbox-attachment">'.$result->NAMA_PERUSAHAAN.'</td>';
                          echo '<td class="mailbox-attachment">'.$result->ALAMAT_PERUSAHAAN.'</td>';
                          echo '<td class="mailbox-attachment">'.$result->TANGGAPAN.'</td>'; 
                          echo '</tr>';
                      } 
                    ?>
       
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div> 
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <?php }else{
          require_once ("lihatkerja.php");          
        } ?>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   
 