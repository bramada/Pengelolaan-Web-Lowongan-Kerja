 
<style type="text/css">
#content {
	min-height: 500px; 
}
#content .panel {
	padding: 10px;
}

 .panel-body label {
 	font-size: 20px; 
 }
 .panel-body input {
 	font-size: 15px;
 }
  .panel-body > .row {
  	margin-bottom:10px;
  }
</style>
<form action="index.php?q=result&searchfor=advancesearch" method="POST"> 
 <section id="content">
	<div class="container content">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
					<div class="panel">
						<div class="panel-header"></div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 search1">
									<label class="col-sm-3">CARI:</label>
									<div class="col-sm-9">
										<input class="form-control" type="" name="SEARCH" placeholder="Tulis pencarian...">
									</div>
								</div>
							</div>  
							<div class="row">
								<div class="col-sm-12 search1">
									<label class="col-sm-3">PERUSAHAAN:</label>
									<div class="col-sm-9">
										<select class="form-control" name="COMPANY">
											<option value="">Semua</option>
											<?php
												$sql = "SELECT * FROM tbperusahaan";
												$mydb->setQuery($sql);
												$res = $mydb->loadResultList();
												foreach ($res as $row) { 
													echo '<option>'.$row->NAMA_PERUSAHAAN.'</option>';
												}
											?>
										</select>
									</div>
								</div>
							</div>   
							<div class="row">
								<div class="col-sm-12 search1">
									<label class="col-sm-3">PROFESI:</label>
									<div class="col-sm-9">
										<select class="form-control" name="CATEGORY">
											<option value="">Semua</option>
											<?php
												$sql = "SELECT * FROM `tbkategori`";
												$mydb->setQuery($sql);
												$res = $mydb->loadResultList();
												foreach ($res as $row) { 
													echo '<option>'.$row->KATEGORI.'</option>';
												}
											?>
										</select>
									</div>
								</div>
							</div>  
								<div class="row">
								<div class="col-sm-12 search1">
									<label class="col-sm-3"></label>
									<div class="col-sm-9">
										 <input type="submit" name="submit" class="btn btn-success">
									</div>
								</div>
							</div>  
						</div>
					</div> 
		</div>
		<div class="col-sm-2"></div> 
	</div>
 </section>
 </form>