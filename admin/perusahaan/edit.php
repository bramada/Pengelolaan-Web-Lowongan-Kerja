<?php
    if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }


  $companyid = $_GET['id'];
  $company = New Company();
  $res = $company->single_company($companyid);

?> 
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

       
            <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Update Perusahaan</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYNAME">Nama Perusahaan:</label>
                      <div class="col-md-8">
                        <input type="hidden" name="COMPANYID" value="<?php echo $res->IDPERUSAHAAN ;?>">
                         <input class="form-control input-sm" id="COMPANYNAME" name="COMPANYNAME" placeholder=
                            "Nama perusahaan" type="text" value="<?php echo $res->NAMA_PERUSAHAAN ;?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYNAME">NIB:</label>
                      <div class="col-md-8">
                        <input type="hidden" name="NIB" value="<?php echo $res->NIB ;?>">
                         <input class="form-control input-sm" id="NIB" name="NIB" placeholder=
                            "NIB" type="text" value="<?php echo $res->NIB ;?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYADDRESS">Alamat Perusahaan:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="COMPANYADDRESS" name="COMPANYADDRESS" placeholder=
                            "Alamat perusahaan" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $res->ALAMAT_PERUSAHAAN ;?></textarea>
                         <!-- <input class="form-control input-sm" id="COMPANYADDRESS" name="COMPANYADDRESS" placeholder="Company Address" value="<?php echo $res->COMPANYADDRESS ;?>" />  -->
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYCONTACTNO">Kontak Perusahaan:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="COMPANYCONTACTNO" name="COMPANYCONTACTNO" placeholder=
                            "Nomor telepon perusahaan" type="text" value="<?php echo $res->KONTAK_PERUSAHAAN ;?>">
                      </div>
                    </div>
                  </div>

               <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYEMAIL">Email Perusahaan :</label>

                      <div class="col-md-8">
                        
                         <input type="email" class="form-control input-sm" id="COMPANYEMAIL" name="COMPANYEMAIL" placeholder=
                            "Email perusahaan" type="text" value="<?php echo $res->EMAIL_PERUSAHAAN ;?>" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                      </div>
                    </div>
                  </div>

              <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "P_USERNAME">Username:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="P_USERNAME" name="P_USERNAME" placeholder=
                            "Username" type="text" value="<?php echo $res->USERNAMEP; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "P_PASS">Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="P_PASS" name="P_PASS" placeholder=
                            "Password" type="Password" value="" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "VM">Visi & Misi Perusahaan:</label>
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="VM" name="VM" placeholder=
                            "Username" type="text" value="<?php echo $res->VISI_MISI; ?>">
                      </div>
                      
                    </div>
                  </div>

            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                      <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Simpan</button>&nbsp;&nbsp;&nbsp;
                      <a href="index.php" class="btn btn-danger  btn-sm"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Kembali</strong></a>
                   
                   
                      </div>
                    </div>
                  </div>

              
   
        </form>
       