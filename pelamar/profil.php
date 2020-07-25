<?php   
    $view = isset($_GET['view']) ? $_GET['view'] :"";  
	  $appl = New Applicants();
	  $applicant = $appl->single_applicant($_SESSION['APPLICANTID']); 
  ?>
  <style type="text/css">
/*    #image-container {
      width: 230px;
    }*/
    .panel-body img{
      width: 100%;
      height: 50%;
    }
    .panel-body img:hover{
      cursor: pointer;
    }
  </style>
<section id="inner-headline">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <h2 class="pageTitle">Profil</h2>
          </div>
      </div>
  </div>
</section>
<div class="container" style="margin-top: 10px;min-height: 600px;">

    <div class="row">

        <div class="col-sm-3"><!--left col-->
           <div class="panel panel-default">            
            <div class="panel-body"> 
              <div  id="image-container">
                <img title="profile image"  data-target="#myModal"  data-toggle="modal"  src="<?php echo web_root.'pelamar/'.$applicant->FOTO_PELAMAR; ?>">  
              </div>
             </div>
          <ul class="list-group">
       
         
            <li class="list-group-item text-muted">Profil</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Nama Asli</strong></span> 
             <?php echo $applicant->NAMAD .' '.substr($applicant->NAMAT, 0,1).'. '.$applicant->NAMAB; ?> 
             </li>
            
          </ul> 

          <div class="box box-solid">  
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked"> 

                <li class="<?php echo ($view=='interview') ? 'active': '';?>"><a href="<?php echo web_root.'pelamar/index.php?view=interview'; ?>"><i class="fa fa-suitcase"></i> Daftar Interview</a></li>
                   

                <li class="<?php echo ($view=='accounts') ? 'active': '';?>"><a href="<?php echo web_root.'pelamar/index.php?view=accounts'; ?>"><i class="fa fa-user"></i> Akun </a></li>

                <li class="<?php echo ($view=='message') ? 'active': '';?>"><a href="<?php echo web_root.'pelamar/index.php?view=message'; ?>"><i class="fa fa-envelope-o"></i> Pesan <span class="label label-success pull-right"><?php echo isset($showMsg->COUNT) ? $showMsg->COUNT : 0;?></span></a></li>

                <li class="<?php echo ($view=='notification') ? 'active': '';?>"><a href="<?php echo web_root.'pelamar/index.php?view=notification'; ?>"><i class="fa fa-bell-o"></i> Notifikasi<span class="label label-success pull-right"><?php echo $notif; ?></span></a></li>

                <li class="<?php echo ($view=='appliedjobs' || $view=='') ? 'active': '';?>"><a href="<?php echo web_root.'pelamar/index.php?view=appliedjobs'; ?>"><i class="fa fa-list"></i> Riwayat Lamaran</a></li>

                <!-- <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li> -->
                <!-- <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a> 
                </li>-->
                <!-- <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li> --> 
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
  
          <!-- /.box -->
          </div>
          
        </div> 
        <div class="col-sm-9">
        <?php
        check_message();  
        check_active(); 
            
        ?>

          <!-- <h1><?php echo $applicant->FNAME .' '.$applicant->MNAME.' '.$applicant->LNAME; ?>  </h1> -->
<?php 
    // if ($view =="message") { 
    //  require_once("message.php");
    // }elseif($view=='notification'){  
    //     require_once("notification.php");  
    // }elseif($view=='appliedjobs'){    
    //     require_once("appliedjobs.php"); 
    // }elseif($view=='accounts'){  
    //     require_once("accounts.php");  
    // }else{ 
    //     require_once("appliedjobs.php");
    // } 

    switch ($view) {
      case 'message':
        # code...
        require_once("pesan.php");
        break;

      case 'notification':
        # code...
        require_once("notifikasi.php");
        break;

      case 'appliedjobs':
        # code...
        require_once("pekerjaandilamar.php");
        break;

      case 'accounts':
        # code...
        require_once("akun.php");
        break;

      case 'interview':
        # code...
        require_once("interview.php");
        break;
      
      default:
        # code...
        require_once("pekerjaandilamar.php");
        break;
    }
?>  
        
        </div><!--/col-sm-9-->
    </div><!--/row-->

  </div><!--/contanier--> 

   <?php  
    unset($_SESSION['appliedjobs']);
    unset($_SESSION['accounts']); 
     ?>
 
         <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">×</button>

                                    <h4 class="modal-title" id="myModalLabel">Pilih Gambar.</h4>
                                </div>

                                <form action="controller.php?action=photos" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8">
                                                          <input name="MAX_FILE_SIZE" type=
                                                            "hidden" value="1000000"> <input id=
                                                            "photo" name="photo" type=
                                                            "file">
                                                        </div>

                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button  class="btn btn-primary"
                                        name="savephoto" type="submit">Upload Foto</button>
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Keluar</button> 
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
