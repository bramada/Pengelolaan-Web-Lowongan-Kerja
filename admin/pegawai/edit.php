<?php  
  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }
  
// $autonum = New Autonumber();
// $res = $autonum->single_autonumber(2);
 @$empid = $_GET['id'];
    if($empid==''){
  redirect("index.php");
}
 

  $employee = New Employee();
  $emp = $employee->single_employee($empid);
 

  if ($emp->JENIS_KELAMIN == 'Laki-laki') {
    # code...
   $radio =  '<div class="col-md-8">
             <div class="col-lg-5">
                <div class="radio">
                  <label><input   id="optionsRadios1" name="optionsRadios" type="radio" value="Perempuan">Perempuan</label>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="radio">
                  <label><input id="optionsRadios2"  checked="True" name="optionsRadios" type="radio" value="Laki-laki">Laki-laki</label>
                </div>
              </div> 
             
          </div>';
  }else{
       $radio =  '<div class="col-md-8">
             <div class="col-lg-5">
                <div class="radio">
                  <label><input   id="optionsRadios1"  checked="True" name="optionsRadios" type="radio" value="Perempuan"> Perempuan</label>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="radio">
                  <label><input id="optionsRadios2"  name="optionsRadios" type="radio" value="Laki-laki"> Laki-laki</label>
                </div>
              </div> 
             
          </div>';

  }

   switch ($emp->STATUS) {

     case 'Belum Menikah':
       # code...
        $civilstatus =' <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                                      <option value="none" >Pilih</option>
                                      <option SELECTED value="Belum Menikah">Single</option>
                                      <option value="Menikah">Menikah</option>
                                      <option value="Janda" >Janda</option>
                                      <!-- <option value="Fourth" >Fourth</option> -->
                                  </select> ';
       break;
     case 'Menikah':
       # code...
         $civilstatus=' <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                                      <option value="none" >Pilih</option>
                                      <option value="Belum Menikah">Single</option>
                                      <option SELECTED value="Menikah">Menikah</option>
                                      <option value="Janda" >Janda</option>
                                      <!-- <option value="Fourth" >Fourth</option> -->
                                  </select> ';

       break;
     case 'Janda':
       # code...
       $civilstatus=' <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                                      <option value="none" >Pilih</option>
                                      <option value="Belum Menikah">Single</option>
                                      <option value="Menikah">Menikah</option>
                                      <option SELECTED value="Janda" >Janda</option>
                                      <!-- <option value="Fourth" >Fourth</option> -->
                                  </select> ';
       break;
     default:
         $civilstatus=' <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                                      <option SELECTED value="none" >Pilih</option>
                                      <option value="Belum Menikah">Single</option>
                                      <option value="Menikah">Menikah</option>
                                      <option value="Janda" >Janda</option>
                                  </select> ';
         break;     
       
   }
  
 ?> 
 
       <div class="center wow fadeInDown">
             <h2 class="page-header">Update Pegawai</h2>
            <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
        </div>
 

                 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST"> 
              

                <input  id="EMPLOYEEID" name="EMPLOYEEID" type="hidden" value="<?php echo $emp->IDPEGAWAI;?>"  >
                   
                
                 <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "FNAME">Nama Depan:</label>

                        <div class="col-md-8"> 
                           <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
                              "Nama Depan" type="text" value="<?php echo $emp->NAMAD;?>"   autocomplete="off">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "LNAME">Nama Belakang:</label>

                        <div class="col-md-8"> 
                          <input  class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
                              "Nama Belakang"   value="<?php echo $emp->NAMAB;?>"    autocomplete="off">
                          </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "MNAME">Nama Tengah:</label>

                        <div class="col-md-8"> 
                          <input  class="form-control input-sm" id="MNAME" name="MNAME" placeholder=
                              "Nama Tengah"   value="<?php echo $emp->NAMAT;?>"     autocomplete="off">
                           <!-- <input class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
                              "Description" type="text" value=""> -->
                        </div>
                      </div>
                    </div> 

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "ADDRESS">Alamat:</label>

                      <div class="col-md-8">
                        
                         <textarea class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder=
                            "Alamat" type="text" value="" required   autocomplete="off"><?php echo $emp->ALAMAT;?></textarea>
                      </div>
                    </div>
                  </div> 


                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Gender">Jenis Kelamin:</label>

                      <?php
                        echo $radio;
                      ?>
 
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "BIRTHDATE">Tanggal Lahir:</label>

                      <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon"> 
                             <i class="fa fa-calendar"></i> 
                            </span>  
                            <div class="input-group date  " data-provide="datepicker" data-date="2012-12-21T15:25:00Z">
                             <input class="form-control input-sm date_picker" id="BIRTHDATE" name="BIRTHDATE" placeholder="Bulan/Hari/Tahun" type="text"    value="<?php echo date_format(date_create($emp->TGL_LAHIR),'m/d/Y');?>" required  autocomplete="off">
                           </div>
                        </div>
                      </div>
                    </div>
                  </div> 

                    <div class="form-group">
                                <div class="col-md-8">
                                  <label class="col-md-4 control-label" for=
                                  "BIRTHPLACE">Tempat Lahir:</label>

                                  <div class="col-md-8">
                                    
                                     <textarea class="form-control input-sm" id="BIRTHPLACE" name="BIRTHPLACE" placeholder=
                                        "Tempat Lahir" type="text" value="" required   
                                        autocomplete="off"><?php echo $emp->TMP_LAHIR;?></textarea>
                                  </div>
                                </div>
                              </div> 


                             <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "TELNO">Telepon:</label>

                                <div class="col-md-8">
                                  
                                   <input class="form-control input-sm" id="TELNO" name="TELNO" placeholder=
                                      "Telepon" type="text" any value="<?php echo $emp->TELP;?>" required   autocomplete="off">
                                </div>
                              </div>
                            </div> 

                             <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "CIVILSTATUS">Status:</label>

                                <div class="col-md-8">
                                  <?php echo $civilstatus; ?>
                                </div>
                              </div>
                            </div> 

                            <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "POSITION">Posisi:</label>

                                <div class="col-md-8">
                                  
                                   <input class="form-control input-sm" id="POSITION" name="POSITION" placeholder=
                                      "Posisi" type="text" any value="<?php echo $emp->BIDANG;?>" required   autocomplete="off">
                                </div>
                              </div>
                            </div>


                             
                            <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for= "EMP_HIREDDATE">Hired Date:</label>

                                <div class="col-md-8">
                                  <div class="input-group">
                                    <span class="input-group-addon"> 
                                     <i class="fa fa-calendar"></i> 
                                    </span> 
                                    <div class="input-group date  " data-provide="datepicker" data-date="2012-12-21T15:25:00Z">
                                   <input type="input" class="form-control input-sm date_picker" id="HIREDDATE" name="EMP_HIREDDATE" placeholder="Bulan/Hari/Tahun"   autocomplete="false" value="<?php echo date_format(date_create($emp->WAKTU_KERJA),'m/d/Y'); ?>"/> 
                                 </div>
                                 </div>
                                </div>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "EMP_EMAILADDRESS">Alamat Email:</label> 
                                <div class="col-md-8">
                                   <input type="Email" class="form-control input-sm" id="EMP_EMAILADDRESS" name="EMP_EMAILADDRESS" placeholder="Email"   autocomplete="false" value="<?php echo  $emp->PEG_EMAIL; ?>"/> 
                                </div>
                              </div>
                            </div>  


                         <div class="form-group">
                            <div class="col-md-8">
                              <label class="col-md-4 control-label" for=
                              "COMPANYNAME">Nama Perusahaan:</label>

                              <div class="col-md-8"> 
                                <select class="form-control input-sm" id="COMPANYID" name="COMPANYID">
                                  <option value="None">Pilih</option>
                                  <?php 
                                    $sql ="Select * From tbperusahaan WHERE IDPERUSAHAAN=".$emp->IDPERUSAHAAN;
                                    $mydb->setQuery($sql);
                                    $result  = $mydb->loadResultList();
                                    foreach ($result as $row) {
                                      # code...
                                      echo '<option SELECTED value='.$row->IDPERUSAHAAN.'>'.$row->NAMA_PERUSAHAAN.'</option>';
                                    }
                                    $sql ="Select * From tbperusahaan WHERE IDPERUSAHAAN!=".$emp->IDPERUSAHAAN;
                                    $mydb->setQuery($sql);
                                    $result  = $mydb->loadResultList();
                                    foreach ($result as $row) {
                                      # code...
                                      echo '<option value='.$row->IDPERUSAHAAN.'>'.$row->NAMA_PERUSAHAAN.'</option>';
                                    }

                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>  
 
               
                  
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                       <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Simpan</button> &nbsp
                          <a href="index.php" class="btn btn-danger btn-sm"><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>Kembali</strong></a>
                       </div>
                    </div>
                  </div> 
        </form>


             