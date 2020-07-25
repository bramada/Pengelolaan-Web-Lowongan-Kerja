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
              <h3 class="box-title">Daftar Interview Kerja</h3> 
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
                      <th>Waktu Disetujui</th>
                      <th>Tanggapan</th>
                      <th><center>Konfirmasi</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $sql="SELECT * FROM `tbperusahaan` c,`tblamaran` r, `tbpekerjaan` j, `tbpelamar` a WHERE c.`IDPERUSAHAAN`=r.`IDPERUSAHAAN` AND r.`IDPEKERJAAN`=j.`IDPEKERJAAN` AND r.`IDPELAMAR`='{$_SESSION['APPLICANTID']}' AND r.`HPRINT`=1 AND a.`IDPELAMAR`= r.`IDPELAMAR`";
                      $mydb->setQuery($sql);
                      $cur = $mydb->loadResultList();  
                      foreach ($cur as $result) {
                        # code...
                          echo '<tr>';
                          echo '<td class="mailbox-attachment">'.$result->BIDANG.'</td>';
                          echo '<td class="mailbox-attachment">'.$result->NAMA_PERUSAHAAN.'</td>';
                          echo '<td class="mailbox-attachment">'.$result->WAKTU_DISETUJUI.'</td>';
                          echo '<td class="mailbox-attachment"><a href="index.php?view=message&p=readmessage&id='.$result->IDLAMARAN.'"><i class="fa fa-pencil-o text-yellow"></i><u>lihat tanggapan</u></a></td>'; 
                      
                          if ($result->STATUS_PELAMAR==1){

                            echo '<td align="center" >    
                                <a title="Diterima Kerja" href="acc.php?id='.$result->IDLAMARAN.'"  class="btn btn-info btn-xs  ">
                                <span class="fa  fa-exclamation-triangle "></span><b> &nbsp Klik jika sudah diterima</b>  </a> 
                                </td>';
                          }else{
                            echo '<td align="center" >     
                                <a title="Sudah diterima bekerja" href="#"  class="  ">
                                <span class="fa fa-check-square-o"></span><b> Anda sudah diterima kerja</b></a> 
                                </td>';
                          }
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
   
 