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
         <div class="col-lg-12">
            <h1 class="page-header">Konfirmasi Perusahaan</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYNAME">Nama Perusahaan:</label>

                      <div class="col-md-8">

                        <input type="hidden" name="COMPANYID" value="<?php echo $res->IDPERUSAHAAN ;?>">
                         <?php echo $res->NAMA_PERUSAHAAN ;?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYADDRESS">Alamat Perusahaan:</label> 
                      <div class="col-md-8">
                        <?php echo $res->ALAMAT_PERUSAHAAN ;?>
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYCONTACTNO">Kontak Perusahaan:</label>

                      <div class="col-md-8">
                         <?php echo $res->KONTAK_PERUSAHAAN ;?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYCONTACTNO">Email Perusahaan:</label>

                      <div class="col-md-8">
                         <?php echo $res->EMAIL_PERUSAHAAN ;?>
                      </div>
                    </div>
                  </div>
            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                      <!-- <a href="index.php" class="btn btn_fixnmix"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                      <button class="btn btn-success btn-sm" name="confirm" type="submit" ><span class="fa fa-check-square-o fw-fa"></span> Konfirmasi</button>
                   
                      </div>
                    </div>
                  </div>

              
   
        </form>
       