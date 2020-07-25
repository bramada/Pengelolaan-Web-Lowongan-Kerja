  <section id="banner">
   
  <!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/1.jpg" alt="" />
                <div class="flex-caption">
                    <!--<h3>inovasi</h3> 
                    <p>kami membuka peluang kerja</p>
                </div> -->
              </li>
              <li>
                <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/2.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Cari Kerja</h3> 
                    <p>Pilih sesuai kriteria anda</p> 
                </div>
              </li>

              <!--<li>
                <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/3.jpg" alt="" />
                <div class="flex-caption">
                    <h3>inovasi</h3> 
                    <p>kami membuka peluang kerja</p>
           
                </div>
              </li>
              <li>
                <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/4.jpg" alt="" />
                <div class="flex-caption">
                    <h3>inovasi</h3> 
                    <p>kami membuka peluang kerja</p>
           
                </div>
              </li>-->

            </ul>
        </div>
  <!-- end slider -->
 
  </section> 
  <section id="call-to-action-2">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-9">
          <h3>Cari Lowongan Sesuai Passion Anda</h3>
          <p>Saat ini banyak sekali lowongan kerja ditawarkan. Namun untuk bisa mendapat yang sesuai dengan kemampuan sekaligus bisa mendapat pendapatan sesuai dengan keinginan tidak mudah. Kadang kala, kita mendapat informasi pekerjaan sesuai dengan kemampuan tetapi pendapatan tidak sesuai. Sebaliknya, kita mendapat informasi pekerjaan dengan gaji tinggi tetapi tidak sesuai dengan kemampuan. Oleh karena itu, sistem kami menyediakan pencarian kerja yang akurat sehingga anda tidak perlu bingung dengan hal tersebut. </p>
        </div>
       <!--  <div class="col-md-2 col-sm-3">
          <a href="#" class="btn btn-primary">Read More</a>
        </div> -->
      </div>
    </div>
  </section>
  
  <section id="content">
  
  
                  <!-- Modal -->
                    <!-- <div class="modal fade" id="Modal" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Perhatian !</h4>
                                </div>

                                    <div class="modal-body">
                                       Web ini masih dalam pengembangan
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Keluar</button> 
                                    </div> -->
                            <!-- </div>modal-content
                        </div>modal-dialog
                    </div>modal -->


  <div class="container">
        <div class="row">
      <div class="col-md-12">
        <div class="aligncenter"><hr><h2 class="aligncenter">Perusahaan</h2><!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus ovident, doloribus omnis minus temporibus perferendis nesciunt.. --><hr></div>
        <br/>
      </div>
    </div>

    <?php 
      $sql = "SELECT * FROM `tbperusahaan` LIMIT 9";
      $mydb->setQuery($sql);
      $comp = $mydb->loadResultList();


      foreach ($comp as $company ) {
        # code...
    
    ?>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-building-o"></i>
                <div class="info-blocks-in">
                    <h3><?php echo $company->NAMA_PERUSAHAAN;?></h3>
                    <p>Alamat :<?php echo $company->ALAMAT_PERUSAHAAN;?></p>
                    <p>Kontak :<?php echo $company->KONTAK_PERUSAHAAN;?></p>
                </div>
            </div>

    <?php } ?> 

  </div> 
  </section>
  <br><br>
  <center><a href="index.php?q=company" class="btn btn-danger"> Semua perusahaan..<a></center>
  <section class="section-padding gray-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center">
            <hr>
            <h2 >Pekerjaan Populer</h2>  
            <hr>  
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 ">
          <?php 
            $sql = "SELECT * FROM `tbkategori`";
            $mydb->setQuery($sql);
            $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
              echo '<div class="col-md-3" style="font-size:15px;padding:5px">* <a href="'.web_root.'index.php?q=category&search='.$result->KATEGORI.'">'.$result->KATEGORI.'</a></div>';
            }

          ?>
        </div>
      </div>
 
    </div>
  </section>    
  <section id="content-3-10" class="content-block data-section nopad content-3-10">
  <!--<div class="image-container col-sm-6 col-xs-12 pull-left">
    <div class="background-image-holder">

    </div>
  </div>-->

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-0 col-sm-offset-0 col-xs-12 content">
      <!--<div class="editContent">
          <h3>Team Kita </h3>
        </div>
        <div class="editContent"  style="height:235px;">
          <p> 
          &nbsp;&nbsp;Team kami memecah masalah dan membantu terlibat secara langsung dan efektif ke garis depan. Gaya kerja kolaboratif kami menekankan kerja tim, kepercayaan, dan toleransi untuk pendapat yang berbeda. Orang memberi tahu kami bahwa kami bersahaja, mudah didekati, dan menyenangkan.<br/><br/>

          &nbsp;&nbsp;Kami memiliki hasrat untuk hasil sejati klien kami dan dorongan pragmatis untuk bertindak yang dimulai Senin pagi jam 8 pagi dan tidak berhenti. Kami mengumpulkan klien dengan energi menular kami, untuk membuat perubahan.<br/><br/>

          &nbsp;&nbsp;Adan kita tidak pernah melakukannya secara personal. Kami mendukung dan didukung untuk mengembangkan kisah hasil team kami. Kami menyeimbangkan tantangan dan penciptaan bersama dengan klien kami, membangun kemampuan internal yang diperlukan bagi mereka untuk menciptakan hasil yang berulang. </p>
        </div> 
      </div>
    </div> /.row-->
  </div><!-- /.container -->
</section>
  
  <div class="about home-about">
        <div class="container">
            
            <div class="row">
              <div class="col-md-4">
                <!-- Heading and para -->
                <div class="block-heading-two">
                  <h3><span>Program Kami</span></h3>
                </div>
                <p>Membantu masyarakat dalam hal pencarian pekerjaan. Web ini bertujuan untuk memudahkan bagi para pencari kerja dalam mendapatkan pekerjaan yang sesuai diinginkan termasuk dalam hal untuk meminimalkan biaya dan waktu yang dibutuhkan untuk mencari lowongan pekerjaan.  <br>
              </div>
              <div class="col-md-4">
                <div class="block-heading-two">
                  <h3><span>Berita Terbaru</span></h3>
                </div>    
                <!-- Accordion starts -->
                <div class="panel-group" id="accordion-alt3">
                 <!-- Panel. Use "panel-XXX" class for different colors. Replace "XXX" with color. -->
                  <div class="panel"> 
                  <!-- Panel heading -->
                   <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseOne-alt3">
                      <i class="fa fa-angle-right"></i> Investasi Tinggi Dorong Pertumbuhan Ekonomi dan  Lapangan Kerja?
                      </a>
                    </h4>
                   </div>
                   <div id="collapseOne-alt3" class="panel-collapse collapse">
                    <!-- Panel body -->
                    <div class="panel-body">
                      Dilihat dari visinya, Presiden Jokowi sangat yakin investasi terutama PMA akan mendorong pertumbuhan ekonomi dan menyerap banyak tenaga kerja. Faktanya?
                    <a href=#>read more...</a>
                    </div>
                   </div>
                  </div>
                  <div class="panel">
                   <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseTwo-alt3">
                      <i class="fa fa-angle-right"></i> Mau Jadi Negara Maju, RI Perlu Tingkatkan Angkatan Kerja Perempuan
                      </a>
                    </h4>
                   </div>
                   <div id="collapseTwo-alt3" class="panel-collapse collapse">
                    <div class="panel-body">
                      Kepala Bappenas Bambang Brodjonegoro mengatakan jumlah angka angkatan kerja perempuan Indonesia saat ini jauh lebih rendah dibanding laki-laki.
                    <a href=#>read more...</a>
                    </div>
                   </div>
                  </div>
                  <div class="panel">
                   <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseThree-alt3">
                      <i class="fa fa-angle-right"></i> Hasil Survei BI: Urus Izin Usaha di Daerah Masih Lambat
                      </a>
                    </h4>
                   </div>
                   <div id="collapseThree-alt3" class="panel-collapse collapse">
                    <div class="panel-body">
                      Bank Indonesia (BI) menyurvei proses investasi di Indonesia. Hasilnya, masih ada kendala dalam kecepatan penerbitan izin usaha dan kendalan aturan tenaga kerja.
                    <a href=#>read more...</a>
                    </div>
                   </div>
                  </div>
                  <div class="panel">
                   <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseFour-alt3">
                      <i class="fa fa-angle-right"></i> Revisi UU Ketenagakerjaan Masih Tarik Ulur
                    </a>
                    </h4>
                   </div>
                   <div id="collapseFour-alt3" class="panel-collapse collapse">
                    <div class="panel-body">
                      Undang-undang nomor 13 tahun 2003 tentang ketenagakerjaan rencananya akan direvisi, namun hingga saat ini belum juga berjalan.
                    <a href=#>read more...</a>
                    </div>
                   </div>
                  </div>
                </div>
                <!-- Accordion ends -->
                
              </div>
              
              <div class="col-md-4">
                <div class="block-heading-two">
                  <h3><span>Testimoni</span></h3>
                </div>  
                     <div class="testimonials">
                    <div class="active item">
                      <blockquote><p>Sangat bagus sekali web ini membantu pencari kerja dalam hal mencari lowongan kerja. Prosesnya sangat mudah dan cepat. Selain itu informasi sangat up to date.</p></blockquote>
                      <div class="carousel-info">
                      <img alt="" src="dist/img/noface.jpg" class="pull-left">
                      <div class="pull-left">
                        <span class="testimonials-name">Bang Iwok</span>
                        <span class="testimonials-post">Vokalis HC</span>
                      </div>
                      </div>
                    </div>
                  </div>
              </div>
              
            </div>
            
                        
             
            <br>
           
            </div>
            
          </div>