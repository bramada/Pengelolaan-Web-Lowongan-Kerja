<?php
    if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }


  $jobid = $_GET['id'];
  $job = New Jobs();
  $res = $job->single_job($jobid);

?> 
<form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

  <div class="row">
                   <div class="col-lg-12">
                      <h1 class="page-header">Update Lowongan Kerja</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                 </div> 

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYNAME">Nama Perusahaan:</label>

                      <div class="col-md-8">
                        <input type="hidden" name="JOBID" value="<?php echo $res->IDPEKERJAAN;?>">
                        <select class="form-control input-sm" id="COMPANYID" name="COMPANYID">
                          <option value="None">Pilih</option>
                          <?php 
                            $sql ="Select * From tbperusahaan WHERE IDPERUSAHAAN=".$res->IDPERUSAHAAN;
                            $mydb->setQuery($sql);
                            $result  = $mydb->loadResultList();
                            foreach ($result as $row) {
                              # code...
                              echo '<option SELECTED value='.$row->IDPERUSAHAAN.'>'.$row->NAMA_PERUSAHAAN.'</option>';
                            }
                            $sql ="Select * From tblcompany WHERE IDPERUSAHAAN!=".$res->IDPERUSAHAAN;
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
                      "CATEGORY">Kategori:</label>

                      <div class="col-md-8"> 
                        <select class="form-control input-sm" id="CATEGORY" name="CATEGORY">
                          <option value="None">Pilih</option>
                          <?php 
                            $sql ="SELECT * FROM `tbkategori` WHERE KATEGORI='".$res->KATEGORI."'";
                            $mydb->setQuery($sql);
                            $cur  = $mydb->loadResultList();
                            foreach ($cur as $result) {
                              # code...
                              echo '<option SELECTED value='.$result->KATEGORI.'>'.$result->KATEGORI.'</option>';
                            }
                            $sql ="SELECT * FROM `tbkategori` WHERE KATEGORI!='".$res->KATEGORI."'";
                            $mydb->setQuery($sql);
                            $cur  = $mydb->loadResultList();
                            foreach ($cur as $result) {
                              # code...
                              echo '<option value='.$result->KATEGORI.'>'.$result->KATEGORI.'</option>';
                            }

                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "OCCUPATIONTITLE">Bidang Pekerjaan:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="OCCUPATIONTITLE" name="OCCUPATIONTITLE" placeholder="Bidang Pekerjaan"   autocomplete="none" value="<?php echo $res->BIDANG; ?>"/> 
                      </div>
                    </div>
                  </div>  

                    <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "REQ_NO_EMPLOYEES">Jumlah Butuh Pegawai:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="REQ_NO_EMPLOYEES" name="REQ_NO_EMPLOYEES" placeholder="Jumlah Butuh Pegawai"   autocomplete="none" value="<?php echo $res->JML_BTH_PEGAWAI ?>"/> 
                      </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SALARIES">Gaji:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="SALARIES" name="SALARIES" placeholder="Gaji"   autocomplete="none" value="<?php echo $res->GAJI ?>"/> 
                      </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "DURATION_EMPLOYEMENT">Lama Kontrak:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="DURATION_EMPLOYEMENT" name="DURATION_EMPLOYEMENT" placeholder="Lama Kontrak"   autocomplete="none" value="<?php echo $res->LAMA_KERJA ?>"/> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "QUALIFICATION_WORKEXPERIENCE">Pengalaman Kerja:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="QUALIFICATION_WORKEXPERIENCE" name="QUALIFICATION_WORKEXPERIENCE" placeholder="Pengalaman Kerja"   autocomplete="none" ><?php echo $res->PENGALAMAN_KERJA ?></textarea> 
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "JOBDESCRIPTION">Deskripsi Kerja:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="JOBDESCRIPTION" name="JOBDESCRIPTION" placeholder="Deskripsi Kerja"   autocomplete="none"><?php echo $res->DESKRIPSI_KERJA ?></textarea> 
                      </div>
                    </div>
                  </div>  

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PREFEREDSEX">Jenis Kelamin:</label> 
                      <div class="col-md-8">
                          <select class="form-control input-sm" id="PREFEREDSEX" name="PREFEREDSEX">
                          <option value="None">Pilih</option>
                           <option <?php echo ($res->JENIS_KELAMIN=='Laki-laki') ? "SELECTED" :"" ?>>Laki-laki</option>
                           <option <?php echo ($res->JENIS_KELAMIN=='Perempuan') ? "SELECTED" :"" ?>>Perempuan</option>
                        </select>
                      </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SECTOR_VACANCY">Sektor Lowongan:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="SECTOR_VACANCY" name="SECTOR_VACANCY" placeholder="Sektor Lowongan"   autocomplete="none"><?php echo $res->LOWONG ?></textarea> 
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
       