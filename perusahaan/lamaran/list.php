<?php
	 if(!isset($_SESSION['PER_USERID'])){
      redirect(web_root."perusahaan/index.php");
     }
     $userid = $_SESSION['PER_USERID'];

?> 
	<div class="row">
    <div class="col-lg-12">
            <h1 class="page-header">Daftar Pelamar  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
                
 
						<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">   	<div id="table-responsive">
							<table id="dash-table" class="table table-striped  table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">

							  <thead>
							  	<tr>
									<th>Pelamar</th>
									<th>Bidang Pekerjaan</th>
									<th>Waktu Melamar</th> 
									<th>Tanggapan</th>
									<th>Status Tanggapan</th>
									<th width="14%" >Aksi</th> 
							  	</tr>	
							  </thead> 
							  <tbody>
							  	<?php   
							  		// $mydb->setQuery("SELECT * 
											// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
							  		$mydb->setQuery("SELECT * FROM `tbperusahaan` c  , `tblamaran` j, `tbpekerjaan` j2, `tbpelamar` a WHERE c.`IDPERUSAHAAN`=j.`IDPERUSAHAAN` AND  j.`IDPEKERJAAN`=j2.`IDPEKERJAAN` AND j.`IDPELAMAR`=a.`IDPELAMAR` AND  j.`IDPERUSAHAAN`=$userid  AND a.`STATUS_PELAMAR`=1 " );
							  		$cur = $mydb->loadResultList();

									foreach ($cur as $result) { 
										if ($result->HVIEW==0){
							  				$baca="Belum Dilihat";
							  			}else{
							  				$baca="<span class=bg-green>&nbsp&nbsp Dilihat Pelamar &nbsp&nbsp</span>";}
							  		echo '<tr>';
							  		// echo '<td width="5%" align="center"></td>';
							  		echo '<td>'. $result->PELAMAR.'</td>';
							  		echo '<td>' . $result->BIDANG.'</a></td>'; 
							  		echo '<td>'. $result->TGL_MELAMAR.'</td>';
							  		echo '<td>'. $result->TANGGAPAN.'</td>';  
							  		echo '<td>'. $baca.'</td>'; 
					  				echo '<td align="center" >    
					  		             <a title="Lihat" href="index.php?view=view&id='.$result->IDLAMARAN.'"  class="btn btn-info btn-xs  ">
					  		             <span class="fa fa-info fw-fa"></span> Lihat</a> 
					  		             <a title="Hapus" href="controller.php?action=delete&id='.$result->IDLAMARAN.'"  class="btn btn-danger btn-xs  ">
					  		             <span class="fa fa-trash-o fw-fa"></span> Hapus</a> 
					  					 </td>';
							  		echo '</tr>';
							  	}
							  	?>
							  </tbody>
								
							</table>
 							</div>
							 
							</form>
       
                 
 