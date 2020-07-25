 
     <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal" type=
                  "button">×</button>

                  <h4 class="modal-title" id="myModalLabel">Login Pelamar</h4>
                </div>

                <!-- <form action="process.php?action=login" enctype="multipart/form-data" method="post"> -->
                  <div class="modal-body hold-transition login-page">
                    <div id="loginerrormessage"></div>
                    <div class="login-box"> 
                        <div class="login-box-body" style="border: solid 1px #ddd;padding: 30px;min-height: 150px;"> 

                          <form action="" method="post">
                            <div class="form-group has-feedback">
                              <input type="text" class="form-control" placeholder="Username" name="user_email" id="user_email">
                              <span class="fa fa-user form-control-feedback" style="margin-top: -22px;"></span>
                            </div>
                            <div class="form-group has-feedback">
                              <input type="password" class="form-control" placeholder="Password" name="user_pass" id="user_pass">
                              <span class="fa fa-lock form-control-feedback" style="margin-top: -22px;"></span>
                            </div>
                            <!--<div class="row">
                              <div class="col-xs-8">
                                <div class="checkbox icheck">
                                  <label>
                                    <input type="checkbox"> Tetap masuk
                                  </label>
                                </div>
                              </div>
                               /.col -->
                              <!-- /.col
                            </div> -->
                          </form> 
                          
                          <!--<a href="#">Lupa password</a><br>-->
                          <a href="<?php echo web_root; ?>index.php?q=register" class="text-center">Daftar Member Baru</a>

                        </div>
                            <br>
                          <a href="<?php echo web_root; ?>index.php?q=registerp" class="text-center">Daftar Perusahaan</a> | 
                          <a href="<?php echo web_root; ?>/perusahaan" class="text-center">Login Perusahaan</a> | 
                          <a href="<?php echo web_root; ?>/admin" class="text-center">Admin</a>
                        <!-- /.login-box-body -->
                      </div>
                  </div>

                  <div class="modal-footer">
                    <button class="btn btn-primary" name="btnlogin" id="btnlogin">Login</button>
                    <button class="btn btn-default" data-dismiss="modal">Batal</button> 
                    
                  </div>
                <!-- </form> -->
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->