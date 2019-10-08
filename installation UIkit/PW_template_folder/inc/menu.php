<div class="uk-navbar-container" uk-navbar>
	<div class="uk-navbar-left">
		<div><?php if($page->editable()) echo "<a class='uk-botton uk-button-small uk-button-secondary' href='$page->editURL'>Edit Page</a>"; ?></div>
	</div>
	<div class="uk-navbar-center">
		<a href="<?php echo $homepage->url ?>" class="uk-navbar-item uk-logo"><img src="<?php echo $config->urls->templates ?>styles/spluga_hotel_valchiavenna.svg" width="160px" alt="Hotel Spluga"></a>
	</div>
	<div class="uk-navbar-right">
		<!-- <div><a class="uk-navbar-toggle" uk-navbar-toggle-icon href="">Menu</a></div> -->
		<div>
			<img src="<?php echo $config->urls->templates ?>styles/img/bgW.gif" alt="bg_menu">
			<a class="simH2 menuButton" href="#" onclick="openNav()">Menu</a>
		</div>
	</div>
</div>
