<?php 
  $id = isset($_GET['id']) ? $_GET['id'] :0;

$sql="UPDATE `tblamaran` SET HVIEW=1 WHERE `IDLAMARAN`='{$id}'";
$mydb->setQuery($sql);
$mydb->executeQuery();


$sql = "SELECT * FROM `tbperusahaan` c,`tblamaran` jr,  `tbpekerjaan` j  WHERE c.`IDPERUSAHAAN`=jr.`IDPERUSAHAAN` AND jr.`IDPEKERJAAN`=j.`IDPEKERJAAN` AND `IDLAMARAN`='{$id}'";
$mydb->setQuery($sql);
$res = $mydb->loadSingleResult();

$applicant = new Applicants();
$appl  = $applicant->single_applicant($_SESSION['APPLICANTID']);


?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Main content -->
    <section class="content">
      <div class="row"> 
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Baca Pesan</h3> 
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="col-sm-14"><!--left col-->
            <div class="panel panel-default">            
            <div class="panel-body">

            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><?php  echo $res->BIDANG; ?></h3>
                <h5>Dari: <?php  echo $res->NAMA_PERUSAHAAN; ?>
                  <span class="mailbox-read-time pull-right"><?php  echo date_format(date_create($res->WAKTU_DISETUJUI),'d M. Y h:i a'); ?></span></h5>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <hr>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p>Halo <?php  echo $appl->NAMAD; ?>,</p>  
                  <p><?php  echo $res->TANGGAPAN; ?></p>

                <p>Terima Kasih,<br><?php  echo $res->NAMA_PERUSAHAAN; ?></p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            
            <!-- /.box-footer -->
            <div class="box-footer">
         <!--      <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
              </div> -->
              <hr>
              <button class="btn btn-danger btn-sm" type="cancel" onclick="javascript:window.location='index.php?view=message'">
                <span class="fa fa-chevron-left fw-fa"></span> Batal</button>
              <a href="lapkonfirmasi.php?id=<?php echo "$id"; ?>" type="button" class="btn btn-danger btn-sm"  target="_blank">
                <i class="fa fa-print"></i> Print</a> 
            </div>

            </div>
          </div>
        </div>

            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  