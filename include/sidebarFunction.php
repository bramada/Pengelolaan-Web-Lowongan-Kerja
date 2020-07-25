<?php 
function get_categories(){
	$mydb->setQuery("SELECT * FROM `tbkategori`");
	$cur = $mydb->loadResultList();

	foreach ($cur as $result) {
		echo '<ul>
				<li><a href="index.php?q=product&category='.$result->KATEGORI.'" >'.$result->KATEGORI.'</a></li> 
			</ul>';
	}
}


?>