<nav class="level">
	<p class="level-item has-text-centered">
		<a href="<?php echo $homepage->url ?>"><img class="logo" src="<?php echo $config->urls->templates ?>dist/images/logo-smocks-company2.svg" alt="<?php echo $homepage->titleH1 ?>"></a>
	</p>
</nav>

<nav class="navbar is-white" role="navigation" aria-label="main navigation">
	<div class="navbar-brand">
<!-- 		<a class="navbar-item" href="<?php echo $homepage->url ?>">
	<img src="<?php echo $config->urls->templates ?>dist/images/logo-smocks-company.svg" alt="<?php echo $homepage->titleH1 ?>">
</a>
 -->
		<div class="navbar-burger burger" aria-label="menu" aria-expanded="false"  data-target="mainMenu">
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
		</div>
	</div>
	<div id="mainMenu" class="navbar-menu level">
		<div class="level-item">
			<?php 
			if ($page->editable()) {
				echo "<a class='navbar-item button is-black' href=$page->editURL>EDIT</a>";
			}
			foreach ($homepage->children as $menu) {
				$active = "";
				if ($menu->id == $page->id) { $active = "is-active"; };
				if ($menu->rootParent()->template == "products" && $page->rootParent()->template == "products") { $active = "is-active"; };
				echo "<a class='navbar-item is-size-4 is-uppercase $active' href=$menu->url>$menu->title</a>"; 
				
			} ?>
		</div>
		<div class="level-right">
			<a target="_blank" href="https://www.instagram.com/hampsteadsmockcompany/"><i class="fab fa-2x fa-instagram"></i></a>
		</div>
	</div>
</nav>
