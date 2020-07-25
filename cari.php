 
<style type="text/css">
#content {
	min-height: 500px; 
}
 #custom-search-input{
    padding: 3px;
    border: solid 1px #E4E4E4;
    border-radius: 6px;
    background-color: #fff;
}

#custom-search-input input{
    border: 0;
    box-shadow: none;
}

#custom-search-input button{
    margin: 2px 0 0 0;
    background: none;
    box-shadow: none;
    border: 0;
    color: #666666;
    padding: 0 8px 0 10px;
    border-left: solid 1px #ccc;
}

#custom-search-input button:hover{
    border: 0;
    box-shadow: none;
    border-left: solid 1px #ccc;
}

#custom-search-input .glyphicon-search{
    font-size: 23px;
}
</style>
<form action="index.php?q=result&searchfor=bytitle" method="POST"> 
 <section id="content">
 <div class="container">
	<div class="row">
		<div class="col-md-2"></div>
        <div class="col-md-8">
    		<h2>PENCARIAN KERJA</h2>
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" name="SEARCH" class="form-control input-lg" placeholder="Masukkan kata kunci..." />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div> 
		<div class="col-md-2"></div>
	</div>
</div>
 </section>
 </form>