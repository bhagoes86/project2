<!--Slider-->
<div id='header'>
	<div class='container'><div class='row-fluid'>
	<!--Table Search Lowongan-->
	  <div class='span3'>
		<form method='post' action='<?php echo base_url();?>front/lowongan' >
		<h3>Cari Lowongan :</h3>
		<div class="control-group">
		  <label class="control-label" for="inputProvinsi">Provinsi</label>
		  <div class="controls">
			<?php 
				$sel_provinsi = $this->model_front->sel_attributte('provinsi',true);
				$style = "class='span12'";
				echo form_dropdown("provinsi",$sel_provinsi,$this->input->post('provinsi'),$style);
			?>
		  </div>
        </div>
		<div class="control-group">
		  <label class="control-label" for="inputkeahlian">Keahlian</label>
		  <div class="controls">
			<?php 
				$sel_keahlian = $this->model_front->sel_attributte('keahlian');
				$style = "class='span12'";
				echo form_dropdown("keahlian",$sel_keahlian,$this->input->post('keahlian'),$style);
			?>
		  </div>
        </div>
		<div class="control-group">
		  <label class="control-label" for="inputsrc">Cari</label>
		  <div class="controls">
			<input class='span12' name='src' type="text" id="inputsrc" placeholder="Cari Lowongan">
		  </div>
		  <div class="controls">
			<input type="submit" name='search' value='Search' class="btn span12">
		  </div>
		</div>
		</form>
	  </div>
	  <div class="carousel slide span9">
		<div id="myCarousel" class="carousel slide">
			<ol class="carousel-indicators">
			  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			  <li data-target="#myCarousel" data-slide-to="1" class=""></li>
			  <li data-target="#myCarousel" data-slide-to="2" class=""></li>
			</ol>
			<div class="carousel-inner">
			  <div class="item active">
				<img src="assets/img/slide1.jpg" alt="">
				<div class="carousel-caption">
				  <h4>First Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
			  </div>
			  <div class="item">
				<img src="assets/img/slide2.jpg" alt="">
				<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
			  </div>
			  <div class="item">
				<img src="assets/img/slide3.jpg" alt="">
				<div class="carousel-caption">
				  <h4>Third Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
			  </div>
			</div>
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
		  </div>
	  </div>
	</div></div>
</div>
<!--Content-->
<div id='content' class='container'>
	<div class="row-fluid">
      <div class="span4">
        <img class="marketing-img" src="assets/img/bs-docs-twitter-github.png">
        <h2>By nerds, for nerds.</h2>
        <p>Built at Twitter by <a href="http://twitter.com/mdo">@mdo</a> and <a href="http://twitter.com/fat">@fat</a>, Bootstrap utilizes <a href="http://lesscss.org">LESS CSS</a>, is compiled via <a href="http://nodejs.org">Node</a>, and is managed through <a href="http://github.com">GitHub</a> to help nerds do awesome stuff on the web.</p>
      </div>
      <div class="span4">
        <img class="marketing-img" src="assets/img/bs-docs-responsive-illustrations.png">
        <h2>Made for everyone.</h2>
        <p>Bootstrap was made to not only look and behave great in the latest desktop browsers (as well as IE7!), but in tablet and smartphone browsers via <a href="./scaffolding.html#responsive">responsive CSS</a> as well.</p>
      </div>
      <div class="span4">
        <img class="marketing-img" src="assets/img/bs-docs-bootstrap-features.png">
        <h2>Packed with features.</h2>
        <p>A 12-column responsive <a href="./scaffolding.html#gridSystem">grid</a>, dozens of components, <a href="./javascript.html">JavaScript plugins</a>, typography, form controls, and even a <a href="./customize.html">web-based Customizer</a> to make Bootstrap your own.</p>
      </div>
    </div>
</div>