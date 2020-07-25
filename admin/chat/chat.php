<?php
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?> 
       	 <div class="col-lg-12">
            <h1 class="page-header">Live Chat    </h1>
       		</div>
        	<!-- /.col-lg-12 --> 
   		 
 <section class="content">

			<iframe width="100%" height="700px" src="https://dashboard.tawk.to/login"></iframe>

    </section>