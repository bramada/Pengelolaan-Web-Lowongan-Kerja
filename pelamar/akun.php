  <?php 
    $applicant = new Applicants();
    $appl = $applicant->single_applicant($_SESSION['APPLICANTID']);
  ?>
  <style type="text/css">
    .form-group {
      margin-bottom: 5px;
    }
  </style>
<form class="form-horizontal" method="POST" action="controller.php?action=edit">  
      <div class="container">  
            <div class="box-header with-border">
              <h3 class="box-title">Akun</h3>
 
              <!-- /.box-tools -->
            </div> 
                <div class="col-md-8">
                
                </div>
              </div>

              <div class="form-group">
              <div class="col-md-11">
                <label class="col-md-4 control-label" for=
                  "FNAME">Nama Depan:</label>

                  <div class="col-md-8">
                    <input name="JOBID" type="hidden" value="<?php echo $_GET['job'];?>">
                     <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
                        "Nama Depan" type="text" value="<?php echo $appl->NAMAD;?>"  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "MNAME">Nama Tengah:</label>

                  <div class="col-md-8"> 
                    <input  class="form-control input-sm" id="MNAME" name="MNAME" placeholder=
                        "Nama Tengah"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $appl->NAMAT;?>"> 
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "LNAME">Nama Belakang:</label>

                  <div class="col-md-8"> 
                    <input  class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
                        "Nama Belakang"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $appl->NAMAB;?>">
                    </div>
                </div>
              </div>

              

              <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "ADDRESS">Alamat:</label>

                  <div class="col-md-8">

                   <textarea class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder=
                      "Alamat" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $appl->ALAMAT;?></textarea>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "Gender">Jenis Kelamin:</label>

                  <div class="col-md-5">

                    <select class="form-control input-sm" id="PREFEREDSEX" name="PREFEREDSEX">
                          <option value="None">Pilih</option>
                           <option <?php echo ($appl->JENIS_KELAMIN=='Laki-laki') ? "SELECTED" :"" ?>>Laki-laki</option>
                           <option <?php echo ($appl->JENIS_KELAMIN=='Perempuan') ? "SELECTED" :"" ?>>Perempuan</option>
                    </select>
                    <!-- 
                    <div class="col-lg-5">
                      <div class="radio">
                        <label><input checked id="optionsRadios1" name="optionsRadios" type="radio" value="Perempuan"> Perempuan</label>
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="radio">
                        <label><input id="optionsRadios2"   name="optionsRadios" type="radio" value="Laki-laki"> Laki-laki</label>
                      </div>
                    </div>  -->
                   
                  </div>
                </div>
              </div> 

               <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "BIRTHDATE">Tanggal Lahir:</label>

                  <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon"> 
                         <i class="fa fa-calendar"></i> 
                        </span>  
                         <input class="form-control input-sm date_picker" id="BIRTHDATE" name="BIRTHDATE" placeholder="Tanggal Lahir" type="text"    value="<?php echo date_format(date_create($appl->TGL_LAHIR),'m/d/Y');?>" required  autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>  

               <div class="form-group">
                  <div class="col-md-11">
                    <label class="col-md-4 control-label" for=
                    "BIRTHPLACE">Tempat Lahir:</label>

                    <div class="col-md-8">
                      
                       <textarea class="form-control input-sm" id="BIRTHPLACE" name="BIRTHPLACE" placeholder=
                          "Tempat Lahir" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $appl->TMP_LAHIR;?></textarea>
                    </div>
                  </div>
                </div> 


               <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "TELNO">Telepon:</label>

                  <div class="col-md-8">
                    
                     <input class="form-control input-sm" id="TELNO" name="TELNO" placeholder=
                        "Telepon" type="text" any value="<?php echo $appl->TELP;?>" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                  </div>
                </div>
              </div> 

               <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "CIVILSTATUS">Status:</label>

                  <div class="col-md-5">

                    <select class="form-control input-sm" id="CIVILSTATUS" name="CIVILSTATUS">
                          <option value="None">Pilih</option>
                           <option <?php echo ($appl->STATUS=='Belum Menikah') ? "SELECTED" :"" ?>>Belum Menikah</option>
                           <option <?php echo ($appl->STATUS=='Menikah') ? "SELECTED" :"" ?>>Menikah</option>
                           <option <?php echo ($appl->STATUS=='Janda') ? "SELECTED" :"" ?>>Janda</option>
                    </select>

                    <!-- <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                        <option value="none" >Pilih</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Menikah">Menikah</option>
                        <option value="Janda" >Janda</option>
                    </select>  -->
                  </div>
                </div>
              </div>  

               <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "EMAILADDRESS">Alamat Email:</label> 
                  <div class="col-md-8">
                     <input type="Email" class="form-control input-sm" id="EMAILADDRESS" name="EMAILADDRESS" placeholder="Alamat Email"   autocomplete="off" value="<?php echo $appl->EMAIL;?>" /> 
                  </div>
                </div>
              </div>  
              
              <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "DEGREE">Pendidikan Terakhir:</label>

                  <div class="col-md-8"> 
                    <input  class="form-control input-sm" id="DEGREE" name="DEGREE" placeholder=
                        "Pendidikan Terakhir"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $appl->GELAR;?>">
                    </div>
                </div>
              </div>  
              <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "DEGREE">Minat Kategori Pekerjaan:</label>

                  <div class="col-md-5"> 
                  <select class="form-control input-sm" id="CATEGORY" name="CATEGORY">
                          <option value="None">Pilih</option>
                          <?php 
                            $sql ="Select * From tbkategori";
                            $mydb->setQuery($sql);
                            $res  = $mydb->loadResultList();
                            foreach ($res as $row) {
                              # code...
                              echo '<option value='.$row->IDKATEGORI.' >'.$row->KATEGORI.'</option>';
                            }

                          ?>
                  </select>
                   
                </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "submit"></label>

                  <div class="col-md-8">
                     <button class="btn btn-primary btn-sm" name="submit" type="submit" ><span class="fa fa-save"></span> Simpan </button>
                    </div>
                </div>
              </div>  
           
          </div>  
 </form>