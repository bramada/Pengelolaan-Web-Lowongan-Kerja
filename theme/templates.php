 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>LokerBB / <?php echo $title;?></title>
<link href='<?php echo web_root; ?>dist/img/fav.png' rel='shortcut icon'>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- css -->
<link href="<?php echo web_root; ?>plugins/home-plugins/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo web_root; ?>plugins/home-plugins/css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
<link href="<?php echo web_root; ?>plugins/home-plugins/css/flexslider.css" rel="stylesheet" /> 
<link href="<?php echo web_root; ?>plugins/home-plugins/css/style.css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="<?php echo web_root;?>plugins/datatables/dataTables.bootstrap.css">  --> 
<link rel="stylesheet" href="<?php echo web_root;?>plugins/font-awesome/css/font-awesome.min.css"> 

<link rel="stylesheet" href="<?php echo web_root;?>plugins/datatables/jquery.dataTables.min.css"> 
<link rel="stylesheet" href="<?php echo web_root;?>plugins/datatables/jquery.dataTables_themeroller.css"> 
<!-- datetime picker CSS -->
<link href="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link href="<?php echo web_root; ?>plugins/datepicker/datepicker3.css" rel="stylesheet" media="screen">
 
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<style type="text/css">

  #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
 
  #content {
    min-height: 400px;
    color: #000;
  }

  .imag {
  width: 100%;
  max-width: 35px;
  height: auto;
  }

  .logo {
  width: 100%;
  max-width: 130px;
  height: auto;
  }

  .imag3 {
  width: 100%;
  max-width: 550px;
  height: auto;
  }

  .foto {
  width: 100%;
  max-width: 200px;
  height: auto;
  }

  .contentbody p {
    font-weight: bold;
  }
  .login a:hover{ 
    color: #00bcd4;
    text-decoration: none;

  }
  .login a:focus{ 
    color: #00bcd4;
    text-decoration: none;

  }
  .login a { 
     font-size: 14px;
    color: #fff;
    padding:0px;
  }
</style>

</head>
<body>
<div id="wrapper" class="home-page">
 
  <!-- start header -->
  <header>
        <div class="topbar navbar-fixed-top">
          <div class="container">
            <div class="row">
              <div class="col-md-12">      
                <p class="pull-left"><i class="fa fa-phone"></i>Telp. (0276) 322130</p>
                <?php if (isset($_SESSION['APPLICANTID'])) { 

                    $sql = "SELECT count(*) as 'COUNTNOTIF' FROM `tbpekerjaan` j, tbpelamar a WHERE j.`IDKATEGORI`=a.`IDKATEGORI` AND a.`IDPELAMAR`='{$_SESSION['APPLICANTID']}' ORDER BY `WAKTU_POST` DESC";
                    $mydb->setQuery($sql);
                    $showNotif = $mydb->loadSingleResult();
                    $notif =isset($showNotif->COUNTNOTIF) ? $showNotif->COUNTNOTIF : 0;


                    $applicant = new Applicants();
                    $appl  = $applicant->single_applicant($_SESSION['APPLICANTID']);

                    $sql ="SELECT count(*) as 'COUNT' FROM `tblamaran` WHERE `MENUNGGU`=0 AND `HVIEW`=0 AND `IDPELAMAR`='{$appl->IDPELAMAR}'";
                    $mydb->setQuery($sql);
                    $showMsg = $mydb->loadSingleResult();
                    $msg =isset($showMsg->COUNT) ? $showMsg->COUNT : 0;

                    echo ' <p class="pull-right login"><a title="Lihat Notif" href="'.web_root.'pelamar/index.php?view=notification"> <i class="fa fa-bell-o"></i> <span class="label label-success">'.$notif.'</span></a> 
                    | <a title="Lihat Pesan" href="'.web_root.'pelamar/index.php?view=message"> <i class="fa fa-envelope-o"></i> <span class="label label-success">'.$msg.'</span></a> 
                    | <a title="Lihat Profil" href="'.web_root.'pelamar/"> <i class="fa fa-user"></i> '. $appl->NAMAD. ' '.$appl->NAMAB .' </a> | <a href="'.web_root.'logout.php">  <i class="fa fa-sign-out"> </i>Logout</a> </p>';

                    }else{ ?>
                      <p class="pull-right login"><a data-target="#myModal" data-toggle="modal" href=""> <i class="fa fa-lock"></i> Login </a></p>
                <?php } ?>
              
              </div>
            </div>
          </div>
        </div> 
        <div style="min-height: 30px;"></div>
        <div class="navbar navbar-default navbar-static-top" > 
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> 
                    <a class="navbar-brand" href="<?php echo web_root; ?>index.php">
                      <!--<img src="<?php echo web_root; ?>dist/img/boyolali.png" class="imag" alt="logo"/> &nbsp -->
                      <img src="<?php echo web_root; ?>dist/img/logo.png" class="logo" alt="logo"/>&nbsp 
                    BOYOLALI</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="<?php echo !isset($_GET['q'])? 'active' :''?>"><a href="<?php echo web_root; ?>index.php">Home</a></li> 
                        <li class="dropdown">
                          <a href="#" data-toggle="dropdown" class="dropdown-toggle">Cari Kerja <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                              <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='advancesearch'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="<?php echo web_root; ?>index.php?q=advancesearch">Cari Cepat</a></li>
                              <li><a href="<?php echo web_root; ?>index.php?q=search-company">Sesuai Perusahaan</a></li>
                              <li><a href="<?php echo web_root; ?>index.php?q=search-function">Sesuai Profesi</a></li>
                              <li><a href="<?php echo web_root; ?>index.php?q=search-jobtitle">Cari Kata Kunci</a></li>
                          </ul>
                       </li> 
                      <li class="dropdown <?php  if(isset($_GET['q'])) { if($_GET['q']=='category'){ echo 'active'; }else{ echo ''; }}  ?>">
                          <a href="#" data-toggle="dropdown" class="dropdown-toggle">Profesi Populer <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <?php 
                            $sql = "SELECT * FROM `tbkategori` LIMIT 10";
                            $mydb->setQuery($sql);
                            $cur = $mydb->loadResultList();

                            foreach ($cur as $result) {
                              # code...

                                if (isset($_GET['search'])) {
                                  # code...
                                   if ($result->KATEGORI==$_GET['search']) {
                                     # code...
                                    $viewresult = '<li class="active"><a href="'.web_root.'index.php?q=category&search='.$result->KATEGORI.'">'.$result->KATEGORI.'</a></li>';
                                   }else{
                                    $viewresult = '<li><a href="'.web_root.'index.php?q=category&search='.$result->KATEGORI.'">'.$result->KATEGORI.'</a></li>';
                                   }
                                }else{
                                    $viewresult = '<li><a href="'.web_root.'index.php?q=category&search='.$result->KATEGORI.'">'.$result->KATEGORI.'</a></li>';
                                } 

                                echo $viewresult;

                              } 

                            ?> 
                          </ul>
                       </li> 
                        <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='company'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="<?php echo web_root; ?>index.php?q=company">Perusahaan</a></li>
                        <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='hiring'){ echo 'active'; }else{ echo ''; }} ?>"><a href="<?php echo web_root; ?>index.php?q=hiring">Lamar Kerja</a></li>
                        <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='About'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="<?php echo web_root; ?>index.php?q=About">Tentang kami</a></li>
                        <li class="dropdown">
                          <a href="#" data-toggle="dropdown" class="dropdown-toggle">Daftar <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                              <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='advancesearch'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="<?php echo web_root; ?>index.php?q=register">Daftar Pencari Kerja</a></li>
                              <li><a href="<?php echo web_root; ?>index.php?q=registerp">Daftar Perusahaan</a></li>
                          </ul>
                       </li> 

                    </ul>
                </div>
            </div>
        </div>
  </header>
  <!-- end header -->  

  <?php
    if (!isset($_SESSION['APPLICANTID'])) { 
      include("login.php");
    }
  ?>
      <?php

      if (isset($_GET['q'])) {
        # code...
        echo '<section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="pageTitle">'.$title.'</h2>
                    </div>
                </div>
            </div>
            </section>';
      }


       require_once $content;

        ?>   
 

  <footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <div class="widget">
          <h5 class="widgetheading">Kontak Kami</h5>
          <address>
          <strong>Alamat Dinas</strong><br>
          Kompleks Perkantoran Terpadu,<br>
          Jl. Merdeka Timur, Kemiri, Mojosongo, 
          <br>
          Boyolali.</address>
          <p>
            <i class="icon-phone"></i> (0276) 322130 <br>
            <i class="icon-envelope-alt"></i> bramada77@gmail.com
          </p>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="widget">
          <h5 class="widgetheading">Akses Cepat</h5>
          <ul class="link-list">
            <li><a href="<?php echo web_root; ?>index.php">Home</a></li>
            <li><a href="<?php echo web_root; ?>index.php?q=company">Perusahaan</a></li>
            <li><a href="<?php echo web_root; ?>index.php?q=hiring">Lamar Kerja</a></li>
            <li><a href="<?php echo web_root; ?>index.php?q=About">Tentang Kita</a></li>
            <li><a href="<?php echo web_root; ?>index.php?q=Contact">Kontak</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="widget">
          <h5 class="widgetheading">Lowongan Terkini</h5>
          <ul class="link-list">
            <?php 
                  $sql = "SELECT * FROM `tbperusahaan` c,`tbpekerjaan` j WHERE c.`IDPERUSAHAAN`=j.`IDPERUSAHAAN`   ORDER BY WAKTU_POST DESC LIMIT 3" ;
                  $mydb->setQuery($sql);
                  $cur = $mydb->loadResultList();


                  foreach ($cur as $result) {
                    echo ' <li><a href="'.web_root.'index.php?q=viewjob&search='.$result->IDPEKERJAAN.'">'.$result->NAMA_PERUSAHAAN . ' &nbsp <span class="fa fa-arrow-circle-right"> &nbsp '. $result->BIDANG .'</a></li>';
                  } 
              ?> 
          </ul>
        </div>
      </div>
<!--       <div class="col-md-3 col-sm-3">
        <div class="widget">
          <h5 class="widgetheading">Recent News</h5>
          <ul class="link-list">
            <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
            <li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
            <li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
          </ul>
        </div>
      </div> -->
    </div>
  </div>
  <div id="sub-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="copyright">
            <p>
              <span>Dev by: Bramada HB. 2019.
            </p>
          </div>
        </div>
        <div class="col-lg-5">
          <ul class="social-network">
            <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#" data-placement="top" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#" data-placement="top" title="Youtube"><i class="fa fa-youtube-play"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>


<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.easing.1.3.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/bootstrap.min.js"></script>
 

<script type="text/javascript" src="<?php echo web_root; ?>plugins/datatables/dataTables.bootstrap.min.js" ></script>  
<script src="<?php echo web_root; ?>plugins/datatables/jquery.dataTables.min.js"></script> 

<script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.js"></script> 
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script> 
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script> 

<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.fancybox-media.js"></script>  
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.flexslider.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/animate.js"></script>


<!-- Vendor Scripts -->
<script src="<?php echo web_root; ?>plugins/home-plugins/js/modernizr.custom.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.isotope.min.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/animate.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/custom.js"></script> 
<script src="<?php echo web_root; ?>plugins/paralax/paralax.js"></script> 

<!-- <script>
  $('xModal').modal('show');
</script> -->

 <script type="text/javascript">
   
     $(function () {
    $("#dash-table").DataTable();
    $('#dash-table2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });


     $("#btnlogin").click(function(){
        var username = document.getElementById("user_email");
        var pass = document.getElementById("user_pass");

        // alert(username.value)
        // alert(pass.value)
        if(username.value=="" && pass.value==""){   
          $('#loginerrormessage').fadeOut(); 
                $('#loginerrormessage').fadeIn();  
                $('#loginerrormessage').css({ 
                        "background" :"red",
                        "color"      : "#fff",
                        "padding"    : "5px;"
                    }); 
          $("#loginerrormessage").html("Username dan Password Tidak Sesuai!");
          //  $("#loginerrormessage").css(function(){ 
          //   "background-color" : "red";
          // });
        }else{

          $.ajax({    //create an ajax request to load_page.php
              type:"POST",  
              url: "proses.php?action=login",    
              dataType: "text",  //expect html to be returned  
              data:{USERNAME:username.value,PASS:pass.value},               
              success: function(data){   
                // alert(data);
                $('#loginerrormessage').fadeOut(); 
                $('#loginerrormessage').fadeIn();  
                $('#loginerrormessage').css({ 
                        "background" :"red",
                        "color"      : "#fff",
                        "padding"    : "5px;"
                    }); 
               $('#loginerrormessage').html(data);   
              } 
              }); 
          }
        });


$('input[data-mask]').each(function() {
  var input = $(this);
  input.setMask(input.data('mask'));
});


$('#BIRTHDATE').inputmask({
  mask: "2/1/y",
  placeholder: "mm/dd/yyyy",
  alias: "date",
  hourFormat: "24"
});
$('#HIREDDATE').inputmask({
  mask: "2/1/y",
  placeholder: "mm/dd/yyyy",
  alias: "date",
  hourFormat: "24"
});

$('.date_picker').datetimepicker({
  format: 'mm/dd/yyyy',
  startDate : '01/01/1950', 
  language:  'en',
  weekStart: 1,
  todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1, 
  startView: 2,
  minView: 2,
  forceParse: 0 

});
 </script>
 
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='<?php echo web_root; ?>plugins/Chat/tawk.js';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>
</html>
 