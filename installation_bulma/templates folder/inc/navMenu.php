		<nav class="navbar" role="navigation" aria-label="main navigation">
			<div class="container">
				<div class="navbar-brand">
					<a class="navbar-item" href="<?php echo $homepage->url ?>">
						<img src="<?php echo $config->urls->templates?>styles/logo.gif" alt="Sumensadecurius | Scambi Semi Sondrio" width="330px">
					</a>

					<a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
					</a>
				</div>
				<div class="navbar-menu" id="navMenu">
					<!-- navbar start, navbar end -->
					<div class="navbar-start">
							<!-- navbar items -->
					</div>

					<div class="navbar-end">
						<?php 
						foreach ($homepage->children as $item) {
							$active = "";
							if ($item->id == $page->id) { $active = "is-active"; };
						 	echo "<a href='$item->url' class='navbar-item $active'>$item->title</a>";
						 } 
						 if($page->editable()) echo "<a class='navbar-item' href='$page->editURL'>Edit</a>"; 
						 ?>
					</div>
				</div>
			</div>
		</nav>