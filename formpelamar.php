
<div class="form-group">
	<div class="col-md-11">
	<label class="col-md-4 control-label" for=
		"FNAME">Nama Depan:</label>

		<div class="col-md-8">
		  <input name="JOBID" type="hidden" value="<?php echo $_GET['job'];?>">
		   <input required class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
		      "Nama Depan" type="text" value=""  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
		</div>
	</div>
</div>

<div class="form-group">
	<div class="col-md-11">
		<label class="col-md-4 control-label" for=
		"MNAME">Nama Tengah:</label>

		<div class="col-md-8">
		  <input name="deptid" type="hidden" value="">
		  <input  class="form-control input-sm" id="MNAME" name="MNAME" placeholder=
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
      <input  class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
          "Nama Belakang"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
      </div>
  </div>
</div>

<div class="form-group">
	<div class="col-md-11">
		<label class="col-md-4 control-label" for=
		"ADDRESS">Alamat:</label>

		<div class="col-md-8">

		 <textarea class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder=
		    "Alamat" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
		</div>
	</div>
</div> 

<div class="form-group">
	<div class="col-md-11">
		<label class="col-md-4 control-label" for=
		"Gender">Jenis Kelamin:</label>

		<div class="col-md-8">
		 <div class="col-lg-5">
		    <div class="radio">
		      <label><input checked id="optionsRadios1" checked="True" name="optionsRadios" type="radio" value="Laki-laki">Laki-laki</label>
		    </div>
		  </div>

		  <div class="col-lg-4">
		    <div class="radio">
		      <label><input id="optionsRadios2"   name="optionsRadios" type="radio" value="Perempuan"> Perempuan</label>
		    </div>
		  </div> 
		 
		</div>
	</div>
</div>

<div class="form-group">
    <div class="col-md-11"> 
        <label class="col-lg-4 control-label">Tanggal Lahir:</label>
      

      <div class="col-lg-3">
        <select class="form-control input-sm" name="month">
          <option>Bulan</option>
          <?php

             $mon = array('Jan' => 1 ,'Feb'=> 2,'Mar' => 3 ,'Apr'=> 4,'May' => 5 ,'Jun'=> 6,'Jul' => 7 ,'Aug'=> 8,'Sep' => 9 ,'Oct'=> 10,'Nov' => 11 ,'Dec'=> 11 );    
          
        
            foreach ($mon as $month => $value ) {
              
                  # code...
                   echo '<option value='.$value.'>'.$month.'</option>';
                } 
          ?>
        </select>
      </div>

      <div class="col-lg-2">
        <select class="form-control input-sm" name="day">
          <option>Hari</option>
        <?php 
          $d = range(31, 1);
          foreach ($d as $day) {
            echo '<option value='.$day.'>'.$day.'</option>';
          }
        
        ?>
          
        </select>
      </div>

      <div class="col-lg-3">
        <select class="form-control input-sm" name="year">
          <option>Tahun</option>
        <?php 
          $years = range(2010, 1900);
          foreach ($years as $yr) {
            echo '<option value='.$yr.'>'.$yr.'</option>';
          }
        
        ?>
        
        </select>
      </div> 
    </div>
</div> 

 <div class="form-group">
    <div class="col-md-11">
      <label class="col-md-4 control-label" for="BIRTHPLACE">Tempat Lahir:</label>

      <div class="col-md-8">
        
         <textarea class="form-control input-sm" id="BIRTHPLACE" name="BIRTHPLACE" placeholder=
            "Tempat kelahiran" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
      </div>
    </div>
  </div> 


 <div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "TELNO">Telepon:</label>

    <div class="col-md-8">
      
       <input class="form-control input-sm" id="TELNO" name="TELNO" placeholder=
          "No. telepon" type="text" any value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
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
          <option value="Belum Menikah">Belum Menikah</option>
          <option value="Menikah">Menikah</option>
          <option value="Janda" >Janda</option>
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
      <input type="Email" class="form-control input-sm" id="EMAILADDRESS" name="EMAILADDRESS" placeholder="Email Address"   autocomplete="false"/>
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
          "Username"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
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
          "Password" type="password"   onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">

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
          "Riwayat pendidikan terakhir"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
      </div>
  </div>
</div> 
<div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "KATEGORI">Minat Kategori Pekerjaan:</label>

    <div class="col-md-8">
      <input name="deptid" type="hidden" value="">
      <input type="hidden" class="form-control input-sm" id="KATEGORI" name="KATEGORI" value="<?php echo  $result->IDKATEGORI; ?>" onkeyup="javascript:capitalize(this.id, this.value);" readonly >
      <input class="form-control input-sm" id="NKATEGORI" name="NKATEGORI" value="<?php echo  $result->KATEGORI; ?>" onkeyup="javascript:capitalize(this.id, this.value);" readonly >
      </div>
  </div>
</div> 
<div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "DEGREE">Lampiran CV (File Pendukung):</label>

    <div class="col-md-8">
      <input id="CV" name="CV" type="file">
      <input name="MAX_FILE_SIZE" type="hidden" value="1000000">
      </div>
  </div>
</div> 


<div class="form-group">
    <div class="col-md-11">
      <label class="col-md-4 control-label" for=
      "d"></label>  

      <div class="col-md-8">
        <label><input required type="checkbox"> Dengan ini maka saya setuju dengan <a href="<?php echo web_root;?>index.php?q=sk">syarat dan ketentuan yang berlaku</a></label>
     
     </div>
    </div>
</div>   
