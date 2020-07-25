<?php
    if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }


  $companyid = $_GET['id'];
  $company = New Company();
  $res = $company->single_company($companyid);

?> 
 <form class="form-horizontal span6" action="controller.php?action=confirm" method="POST">
      
            <div class="row">
         <div class="col-lg-11">
            <h1 class="page-header">Konfirmasi Perusahaan</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 
                    <div class="col-sm-3">
                      <a href="<?php echo web_root.'perusahaan/user/'.$res->FOTOP; ?>"><img style="max-width: 200px;"  src="<?php echo web_root.'perusahaan/user/'.$res->FOTOP; ?>"> </a> 
                    </div>

                    <div class="col-sm-8">
                      <label class="col-sm-3 " for=
                      "COMPANYNAME">Nama Perusahaan</label>
                      <div class="col-sm-6  ">
                        <input type="hidden" name="COMPANYID" value="<?php echo $res->IDPERUSAHAAN ;?>">
                         :  <?php echo $res->NAMA_PERUSAHAAN ;?>
                      </div>
                  </div>
                    <div class="col-sm-8">
                      <label class="col-md-3 " for=
                      "NIB">Nomor Induk Berusaha</label>
                      <div class="col-sm-6">
                        <input type="hidden" name="NIB" value="<?php echo $res->NIB ;?>">
                         :  <?php echo $res->NIB ;?>
                      </div>
                  </div>
                    <div class="col-sm-8">
                      <label class="col-md-3 " for=
                      "COMPANYADDRESS">Alamat Perusahaan</label> 
                      <div class="col-md-8">
                        :  <?php echo $res->ALAMAT_PERUSAHAAN ;?>
                      </div>
                  </div> 
                    <div class="col-sm-8">
                      <label class="col-md-3 " for=
                      "COMPANYCONTACTNO">Kontak Perusahaan</label>
                      <div class="col-md-8">
                         :  <?php echo $res->KONTAK_PERUSAHAAN ;?>
                      </div>
                  </div>
                    <div class="col-sm-8">
                      <label class="col-md-3 " for=
                      "COMPANYCONTACTNO">Email Perusahaan</label>
                      <div class="col-md-8">
                        <input type="hidden" name="Email" value="<?php echo $res->EMAIL_PERUSAHAAN ;?>">
                         :  <?php echo $res->EMAIL_PERUSAHAAN ;?>
                      </div>
                  </div>
                    <div class="col-sm-8">
                      <label class="col-md-3 " for=
                      "VM">Visi & Misi Perusahaan</label>
                      <div class="col-md-8">
                         :  <?php echo $res->VISI_MISI ;?>
                      </div>
                  </div>
            
             <div class="form-group">
                      <div class="col-sm-11">
                        <hr>
                      <div class="col-md-8">
                        <center>
                      <button class="btn btn-success btn-sm" name="confirm" type="submit" ><span class="fa fa-check-square-o fw-fa"></span> Konfirmasi</button>&nbsp;&nbsp;&nbsp;
                      <a href="index.php" class="btn btn-danger  btn-sm"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Kembali</strong></a>
                        </center>
                      </div>
                   
                      </div>
                  </div>

              
   
        </form>
       