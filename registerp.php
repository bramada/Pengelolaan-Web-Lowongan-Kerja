<section id="content">
    <div class="container content">    
     <p> <?php check_message();?></p>      
		<form class="row form-horizontal span6  wow fadeInDown" action="proses.php?action=registerp" method="POST" enctype="multipart/form-data">
		<h2 class=" ">Info Perusahaan</h2>
		<div class="row"> 

			<div class="form-group">
				<div class="col-md-8">
				<label class="col-md-4 control-label" for=
					"FNAME">Nama Perusahaan:</label>
					<div class="col-md-8">
					   <input class="form-control input-sm" id="CNAME" name="CNAME" required="" placeholder=
					      "Nama Perusahaan" type="text" value=""  autocomplete="off">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
				<label class="col-md-4 control-label" for=
					"FNAME">Nomor Induk Berusaha <font color="red">* </font>:</label>
					<div class="col-md-8">
					   <input class="form-control input-sm" id="NIB" name="NIB" required="" placeholder=
					      "NIB" type="text" value=""  autocomplete="off">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
				<label class="col-md-4 control-label" for=
					"FOTOPE">Foto/Logo Perusahaan:</label>
					<div class="col-md-8">
						<input id="FOTOP" name="FOTOP" type="file">
                        <input name="MAX_FILE_SIZE" type="hidden" value="1000000">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
					<label class="col-md-4 control-label" for=
					"CADDRESS">Alamat Perusahaan:</label>
					<div class="col-md-8">
					 <textarea class="form-control input-sm" id="CADDRESS" name="CADDRESS" placeholder=
					    "Alamat Perusahaan" type="text" value="" required autocomplete="off"></textarea>
					</div>
				</div>
			</div> 

			 <div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "TELNOC">Telepon:</label>
			    <div class="col-md-8">
			       <input class="form-control input-sm" id="TELNOC" name="TELNOC" placeholder=
			          "No. Telepon" type="text" any value="" required autocomplete="off">
			    </div>
			  </div>
			</div> 

			<div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "EMAILP">Email Perusahaan:</label>
			    <div class="col-md-8">
			       <input type="Email" class="form-control input-sm" id="EMAILP" name="EMAILP" placeholder=
			          "Email" type="text" any value="" required autocomplete="off">
			    </div>
			  </div>
			</div> 

			 <div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "CTELNO">Visi & Misi:</label>
			    <div class="col-md-8">
			       <textarea class="form-control input-sm" id="VM" name="VM" placeholder=
			          "Visi & Misi" type="text" any value="" required autocomplete="off"></textarea>
			    </div>
			  </div>
			</div> 

			<div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "USERNAMEP">Username:</label>
			    <div class="col-md-8">
			      <input  class="form-control input-sm" id="USERNAMEP" name="USERNAMEP" placeholder=
			          "Username"  required  autocomplete="off">
			      </div>
			  </div>
			</div>

			<div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "PASSP">Password:</label>
			    <div class="col-md-8">
			      <input  class="form-control input-sm" id="PASSP" name="PASSP" placeholder=
			          "Password" type="password" required  autocomplete="off">
			    </div>
			  </div>
			</div> 

			<div class="form-group">
				<div class="col-md-8">
				<label class="col-md-4 control-label" for=
					"FILEP">Surat-surat Perusahaan (SIUP,TDP,AKTE) <font color="red">* </font>:</label>
					<div class="col-md-8">
						<input id="LMP" name="LMP" type="file" required="">
                        <input name="MAX_FILE_SIZE" type="hidden" value="1000000">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
				<label class="col-md-4 control-label"> </label>
					<div class="col-md-8">
						<font color="red"><b><i>* Jika tidak memiliki salah satunya, silakan menghubungi dinas ketenagakerjaan secara langsung </i></b></font>
					</div>
				</div>
			</div>
			 
			<div class="form-group">
			    <div class="col-md-8">
			      <label class="col-md-4 control-label" for=
			      ""></label>  

			      <div class="col-md-8"> 
			      		<label><hr><input type="checkbox" required=""> Dengan ini maka saya setuju dengan <a href="<?php echo web_root;?>index.php?q=sk">syarat dan ketentuan yang berlaku</a></label>
			     </div>
			    </div>
			</div>    
			<div class="form-group">
			    <div class="col-md-8">
			      <label class="col-md-4 control-label" for=
			      "idno"></label>  

			      <div class="col-md-8">
			         <button class="btn btn-primary btn-sm" name="btnRegisterp" type="submit" ><span class="fa fa-save fw-fa"></span> Simpan</button> 
			     
			     </div>
			    </div>
			</div>    
		</form>
	</div>
</section>