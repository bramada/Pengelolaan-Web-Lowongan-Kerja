<?php
    if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }


  $idpelamar = $_GET['id'];
  $pelamar = New Applicants();
  $res = $pelamar->single_applicant($idpelamar);

?> 
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

       
            <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Edit Pelamar</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 

<div class="form-group">
<div class="col-md-8">

<div class="form-group">
  <div class="col-md-11">

<input type="hidden" name="APPLICANTID" value="<?php echo $res->IDPELAMAR ;?>">
  <label class="col-md-4 control-label" for=
    "FNAME">Nama Depan:</label>

    <div class="col-md-8">
       <input required class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
          "Nama Depan" type="text" value="<?php echo $res->NAMAD ;?>"  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "MNAME">Nama Tengah:</label>

    <div class="col-md-8">
      <input name="deptid" type="hidden" value="">
      <input  class="form-control input-sm" id="MNAME" name="MNAME" value="<?php echo $res->NAMAT ;?>" placeholder=
          "Nama Tengah"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
       <!-- <input class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
          "Description" type="text" value=""> -->
    </div>
  </div>
</div> 

<div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "LNAME">Nama Belakang:</label>

    <div class="col-md-8">
      <input name="deptid" type="hidden" value="">
      <input  class="form-control input-sm" id="LNAME" name="LNAME" value="<?php echo $res->NAMAB ;?>" placeholder=
          "Nama Belakang"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
      </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for="ADDRESS">Alamat:</label>

    <div class="col-md-8">

     <textarea class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder=
        "Alamat" type="text" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $res->ALAMAT ;?></textarea>
    </div>
  </div>
</div> 

                <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-4 control-label" for="PREFEREDSEX">Jenis Kelamin:</label> 
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
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "BIRTHDATE">Tanggal Lahir:</label>
              <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon"> 
                         <i class="fa fa-calendar"></i> 
                        </span>  
                         <input class="form-control input-sm date_picker" id="BIRTHDATE" name="BIRTHDATE" placeholder="Tanggal Lahir" type="text"    value="<?php echo date_format(date_create($res->TGL_LAHIR),'m/d/Y');?>" required  autocomplete="off">
                    </div>
                  </div>
                    </div>
                  </div>


 <div class="form-group">
    <div class="col-md-11">
      <label class="col-md-4 control-label" for="BIRTHPLACE">Tempat Lahir:</label>

      <div class="col-md-8">
        
         <textarea class="form-control input-sm" id="BIRTHPLACE" name="BIRTHPLACE" placeholder=
            "Tempat kelahiran" type="text" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $res->TMP_LAHIR ;?></textarea>
      </div>
    </div>
  </div> 


 <div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "TELNO">Telepon:</label>

    <div class="col-md-8">
      
       <input class="form-control input-sm" id="TELNO" name="TELNO" placeholder=
          "No. telepon" type="text" any value="<?php echo $res->TELP ;?>" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
    </div>
  </div>
</div> 

 <div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "CIVILSTATUS">Status:</label>

    <div class="col-md-8">
      <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
          <option value="none" >Pilih</option>
          <option <?php echo ($res->STATUS=='Belum Menikah') ? "SELECTED" :"" ?>>Belum Menikah</option>
          <option <?php echo ($res->STATUS=='Menikah') ? "SELECTED" :"" ?>>Menikah</option>
          <option <?php echo ($res->STATUS=='Janda') ? "SELECTED" :"" ?> >Janda</option>
          <!-- <option value="Fourth" >Fourth</option> -->
      </select> 
    </div>
  </div>
</div>  

 <div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "EMAILADDRESS">Alamat Email:</label> 
    <div class="col-md-8">
      <input type="Email" class="form-control input-sm" id="EMAILADDRESS" name="EMAILADDRESS" value="<?php echo $res->EMAIL ;?>" placeholder="Email Address"   autocomplete="false"/>
    </div>
  </div>
</div>  
<div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "USERNAME">Username:</label>

    <div class="col-md-8">
      <input name="deptid" type="hidden" value="">
      <input  class="form-control input-sm" id="USERNAME" name="USERNAME" placeholder=
          "Username"  value="<?php echo $res->USERNAME ;?>"  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
      </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "PASS">Password:</label>

    <div class="col-md-8">
      <input name="deptid" type="hidden" value="">
      <input  class="form-control input-sm" id="PASS" name="PASS" placeholder=
          "Password" type="password" value=""  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
       <!-- <input class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
          "Description" type="text" value=""> -->
    </div>
  </div>
</div> 
<div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "DEGREE">Pendidikan Terakhir:</label>

    <div class="col-md-8">
      <input name="deptid" type="hidden" value="">
      <input  class="form-control input-sm" id="DEGREE" name="DEGREE" placeholder=
          "Riwayat pendidikan terakhir"  value="<?php echo $res->GELAR ;?>"  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
      </div>
  </div>
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
       