<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
	<nav class="uk-navbar-container" uk-navbar>
		<div class="uk-navbar-left">
			<?php 
			if ($page->editable() && $user->hasRole("superuser")) {
				echo "<a class='uk-botton uk-button-small uk-button-secondary uk-margin-left' href='$page->editURL'>Edit</a><br>";
			} ?>
		</div>
		<div class="uk-navbar-center">
			<a class="uk-navbar-item uk-logo" href="<?php echo $homepage->url ?>"><img id="logo" src="<?php echo $config->urls->templates?>styles/img/logo-fabio-gavazzi.svg" width="255px" alt="Pellicce Fabio Gavazzi"></a>
		</div>
		<div class="uk-navbar-right">
			<!-- mobile menu toggle -->
			<a class="uk-navbar-toggle" href="#mobileMenu" uk-toggle>
				<span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left"></span>
			</a>
		</div>
	</nav>
</div>

<!-- side menu ######################################################################################### -->

<div id="mobileMenu" uk-offcanvas="flip: true; mode: push">
    <div class="uk-offcanvas-bar">

        <button class="uk-offcanvas-close" type="button" uk-close></button>
            <div class="uk-flex uk-flex-column uk-flex-middle">
                    
                <ul class="uk-list">
                    <?php foreach ($homepage->children as $menuitem) {
                        echo "<li class='$active'><a href='$menuitem->url'>$menuitem->title</a></li>";
                    } ?>
                </ul>

                
                <!-- //langueas -->
                <?php 
                $languageButtons = '';
                $languageButtons .= '<div class="langBox">';
                    foreach ($languages as $language) {
                        $langActive = ($user->language->id == $language->id) ? " active" : "";
                        $url = $page->localUrl($language);
                        $languageButtons .= "<div class='langItem'><a href='$url' class='$langActive '>".strtoupper($language->country_code)."</a></div>";
                    }
                $languageButtons .= '</div>';
                echo $languageButtons;
                ?>
                
            

                <!-- localhost <div class="langBox">
                    <div class="langItem"><a href="">IT</a></div>
                    <div class="langItem"><a href="">EN</a></div>
                    <div class="langItem"><a href="">RU</a></div>
                </div> -->
                <p class="uk-text-center casamadre"><?php echo $traduzioni->tr_casamadre ?> <br>
                    <a target="_blank" class="fureco" href="https://www.fureco.it/">www.fureco.it</a>
                </p>

            </div>

    </div>
</div>