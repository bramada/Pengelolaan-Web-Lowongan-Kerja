
    <section id="content">
        <div class="container content">     
        <!-- Service Blcoks -->  
<div class="table-responsive">   
 <table id="dash-table" class="table table-hover">
     <thead>
         <th>Bidang Kerja</th>
         <th>Perusahaan</th>
         <th>Lokasi</th>
         <th>Tanggal Pembuatan</th>
     </thead>
     <tbody>
        <?php
 if (isset($_GET['search'])) {
     # code...
    $COMPANYNAME = $_GET['search'];
 }else{
     $COMPANYNAME = '';

 }
    $sql = "SELECT * FROM `tbperusahaan` c,`tbpekerjaan` j WHERE c.`IDPERUSAHAAN`=j.`IDPERUSAHAAN` AND NAMA_PERUSAHAAN LIKE '%" . $COMPANYNAME ."%' ORDER BY WAKTU_POST DESC" ;
    $mydb->setQuery($sql);
    $cur = $mydb->loadResultList();


    foreach ($cur as $result) {
        echo '<tr>';
        echo '<td><a href="'.web_root.'index.php?q=viewjob&search='.$result->IDPEKERJAAN.'">'.$result->BIDANG.'</a></td>';
        echo '<td>'.$result->NAMA_PERUSAHAAN.'</td>';
        echo '<td>'.$result->ALAMAT_PERUSAHAAN.'</td>';
        echo '<td>'.date_format(date_create($result->WAKTU_POST),'m/d/Y').'</td>';
        echo '</tr>';

    }
        ?> 
     </tbody>
 </table>
</div>
     
   </div>
    </section> 