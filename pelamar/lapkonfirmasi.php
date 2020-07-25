<style type="text/css">
  
  hr.new {
  border: 1px solid black;
  }

.imag {
  width: 100%;
  max-width: 2480px;
  height: auto;
  }

</style>

<?php
require_once("../include/initialize.php");  
  $id = isset($_GET['id']) ? $_GET['id'] :0;

$sql = "SELECT * FROM `tbperusahaan` c,`tblamaran` jr,  `tbpekerjaan` j  WHERE c.`IDPERUSAHAAN`=jr.`IDPERUSAHAAN` AND jr.`IDPEKERJAAN`=j.`IDPEKERJAAN` AND `IDLAMARAN`='{$id}'";
$mydb->setQuery($sql);
$res = $mydb->loadSingleResult();

$applicant = new Applicants();
$appl  = $applicant->single_applicant($_SESSION['APPLICANTID']);



$company = New jobregistration();
$company->HPRINT = 1;
$company->update($id);



?> 

<center>

<img src="<?php echo web_root; ?>dist/img/kop.png" class="imag"/>
<hr class="new" noshade="">
<h4><br><br><u>SURAT KONFIRMASI LAMPIRAN</u></h4>
<br>
<br>
  <table border="0" style="width: 100%">
    <tr>
        <td width="30%">Perusahaan</td>
        <td width="30%">: <?php  echo $res->NAMA_PERUSAHAAN; ?></td>
        <td width="40%"></td>
    </tr>
    <tr>
        <td>Alamat<br><br></td>
        <td>: <?php  echo $res->ALAMAT_PERUSAHAAN; ?><br><br></td>
        <td></td>
    </tr>
    <tr>
        <td>Kepada Yth.</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td><b><?php  echo $res->PELAMAR; ?></b><br><br></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="2">Dengan ini kami memberitahukan bahwa:</td>
        <td></td>
    </tr>
    <tr>
        <td width="10%">Nama</td>
        <td width="10%">: <b><u><?php  echo $res->PELAMAR; ?></u></b></td>
        <td width="80%"></td>
    </tr>
    <tr>
        <td>No. KTP<br><br></td>
        <td>: 0000000000000<br><br></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="3">Dipersilakan untuk datang ke Perusahaan secara langsung demi melakukan interview kerja.</td>
    </tr>

    <tr>
        <td colspan="3">Demikian surat konfirmasi ini, mohon surat ini dibawa dan ditunjukkan saat akan melakukan interview. Terima kasih<br><br></td>
    </tr>
    
        <td></td>
        <td></td>
        <td>Tertanda :<b><?php  echo $res->NAMA_PERUSAHAAN;?></b>, <?php echo date_format(date_create($res->WAKTU_DISETUJUI),'d M. Y'); ?></td>
    </tr>
  </table>
    <script>
    window.print();
  </script>
</center>
                