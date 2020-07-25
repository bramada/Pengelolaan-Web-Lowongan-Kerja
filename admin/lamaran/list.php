<?php
	 if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?> 
	<div class="row">
    <div class="col-lg-12">
            <h1 class="page-header">Daftar Lamaran Kerja  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
                
 
						<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">   	<div class="table-responsive">
							<table id="dash-table" class="table table-striped table-bordered table-hover" style="font-size:12px" cellspacing="0">

							  <thead>
							  	<tr>
									<th>Pelamar</th>
									<th>Bidang Pekerjaan</th>
									<th>Perusahaan</th>
									<th>Waktu Melamar</th> 
									<th>Tanggapan</th>
									<th width="14%">Status Pesan</th>
									<th>Waktu Disetujui</th>
									<th>Proses Interview</th>
									<th width="10%" >Aksi</th> 
							  	</tr>	
							  </thead> 
							  <tbody>
							  	<?php   
							  		// $mydb->setQuery("SELECT * 
											// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
							  		$mydb->setQuery("SELECT * FROM `tbperusahaan` c  , `tblamaran` j, `tbpekerjaan` j2, `tbpelamar` a WHERE c.`IDPERUSAHAAN`=j.`IDPERUSAHAAN` AND  j.`IDPEKERJAAN`=j2.`IDPEKERJAAN` AND j.`IDPELAMAR`=a.`IDPELAMAR` AND a.`STATUS_PELAMAR`=1 ");
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
							  		echo '<td>' . $result->NAMA_PERUSAHAAN.'</a></td>'; 
							  		echo '<td>'. $result->TGL_MELAMAR.'</td>';
							  		echo '<td>'. $result->TANGGAPAN.'</td>';
							  		echo '<td>'. $baca.'</td>'; 

							  		$tgl = $result->WAKTU_DISETUJUI;
									$tanggal = new DateTime($tgl);
							  		$now = new DateTime();
							  		$selisih = $tanggal->diff($now)->format("%a");
							  		if($selisih>3){
							  			echo '<td><font color=red><b>'. $result->WAKTU_DISETUJUI.'<b></font></td>';
							  		}else{
							  			echo '<td>'. $result->WAKTU_DISETUJUI.'</td>';
							  		}

							  		
							  		if($result->HPRINT==1){
							  			$interview="<span class=bg-green>&nbsp&nbsp Dalam proses &nbsp&nbsp</span";
							  		}else{
							  			$interview="-";
							  		}
							  		echo '<td>'. $interview . '</td>';
					  				echo '<td align="center" >    
					  		             <a title="Lihat" href="index.php?view=view&id='.$result->IDLAMARAN.'"  class="btn btn-info btn-xs  ">
					  		             <span class="fa fa-info fw-fa"></span> Lihat</a> 
					  		             <a title="Hapus" href="controller.php?action=delete&id='.$result->IDLAMARAN.'"  class="btn btn-danger btn-xs  ">
					  		             <span class="fa fa-trash-o fw-fa"></span></a> 
					  					 </td>';
							  		echo '</tr>';
							  	} 
							  	?>
							  </tbody>
								
							</table>
							</div>
 
							 
							</form>
       
                 
 