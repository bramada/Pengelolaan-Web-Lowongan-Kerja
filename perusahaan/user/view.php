<?php  
      if (!isset($_SESSION['PER_USERID'])){
      redirect(web_root."perusahaan/index.php");
     }
  @$USERID = $_SESSION['PER_USERID'];
    if($USERID==''){
  redirect("index.php");
}
  $user = New company();
  $singleuser = $user->single_company($USERID);

 
  ?>
<div class="container">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-4">
         <a  data-target="#myModal" data-toggle="modal" href="" title="Click here to Change Image." >
            <img alt="" style="width:400px; height:400px;>"
             title="" class="img-circle img-thumbnail isTooltip" src="<?php echo web_root.'perusahaan/user/'. $singleuser->FOTOP;?>" data-original-title="Usuario"> 
         </a>  
        </div>
        <div class="col-md-6">
            <h1><strong>Profil Perusahaan</strong></h1><br>
             <form class="form-horizontal span6" action="controller.php?action=edit&view=" method="POST">
 
                   
                    <!-- <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "user_id">User Id:</label> -->

                      <!-- <div class="col-md-8"> -->
                        
                         <input id="COMPANYID" name="COMPANYID" type="Hidden" value="<?php echo $singleuser->IDPERUSAHAAN; ?>">
                   <!--    </div>
                    </div>
                  </div>      -->      
                  
                  <div class="form-group">
                    <div class="col-md-11 ">
                      <label class="col-md-4 control-label" for=
                      "P_NAME">Nama Perusahaan:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="COMPANYNAME" name="COMPANYNAME" placeholder=
                            "Nama Akun" type="text" value="<?php echo $singleuser->NAMA_PERUSAHAAN; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-4 control-label" for=
                      "AL">Alamat:</label>
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="COMPANYADDRESS" name="COMPANYADDRESS" placeholder=
                            "Username" type="text" value="<?php echo $singleuser->ALAMAT_PERUSAHAAN; ?>">
                      </div>
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-4 control-label" for=
                      "KON">Kontak Perusahaan:</label>
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="COMPANYCONTACTNO" name="COMPANYCONTACTNO" placeholder=
                            "Username" type="text" value="<?php echo $singleuser->KONTAK_PERUSAHAAN; ?>">
                      </div>
                      
                    </div>
                  </div>

              <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-4 control-label" for=
                      "COMPANYEMAIL">Email Perusahaan :</label>

                      <div class="col-md-8">
                        
                         <input type="email" class="form-control input-sm" id="COMPANYEMAIL" name="COMPANYEMAIL" placeholder=
                            "Email perusahaan" type="text" value="<?php echo $singleuser->EMAIL_PERUSAHAAN ;?>" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-4 control-label" for=
                      "P_USERNAME">Username:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="P_USERNAME" name="P_USERNAME" placeholder=
                            "Username" type="text" value="<?php echo $singleuser->USERNAMEP; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-11">
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
                    <div class="col-md-11">
                      <label class="col-md-4 control-label" for=
                      "VM">Visi & Misi Perusahaan:</label>
                      <div class="col-md-8">
                         <textarea class="form-control input-sm" id="VM" name="VM" placeholder=
                            "Username" type="text" value="<?php echo $singleuser->VISI_MISI; ?>">
                              
                            </textarea>
                      </div>
                      
                    </div>
                  </div>

            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                         <button class="btn btn-primary " name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Simpan</button>&nbsp;&nbsp;&nbsp;
                      <a href="../index.php" class="btn btn-danger  btn-sm"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Kembali</strong></a>
                      </div>
                    </div>
                  </div>

               
          
        </form>
      
             
        </div>
    </div>
</div>
</div>
            

     <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal" type=
                  "button">×</button>

                  <h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
                </div>

                <form action="controller.php?action=photos" enctype="multipart/form-data" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <div class="rows">
                        <div class="col-md-12">
                          <div class="rows">
                            <div class="col-md-8">
                            <input class="mealid" type="hidden" name="mealid" id="mealid" value="">
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
                    <button class="btn btn-default" data-dismiss="modal">Close</button> <button class="btn btn-primary"
                    name="savephoto" type="submit">Upload Photo</button>
                  </div>
                </form>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

 