<footer class="uk-section uk-section-small ">
	<div class="uk-container">
		<div class="uk-grid uk-child-width-1-2@m" uk-grid>
			<div>
				<p>
					<span uk-icon="location"></span><a class="showroom" href="<?php echo $showroompage->url ?>#map">Showroom Fabio Gavazzi</a> <br>
					Fureco Srl <br>
					Via Montenapoleone, 21 - Milano<br>
					TEL: +39 02 87038516 <br>
					<a href="mailto:montenapoleone@fureco.it" uk-icon="icon: mail"></a> 
					<a target="_blank" href="https://www.instagram.com/fabiogavazziofficial/" uk-icon="icon: instagram"></a> 
				</p>
			</div>
			<div class="uk-text-right">
				<ul class="sitemap ">
					<?php foreach ($homepage->children->prepend($homepage) as $sitemap) {
						$active = ($sitemap->id == $page->id) ? "is-active-sitemap" : "";
						echo "<li><a class='$active' href='$sitemap->url'>$sitemap->title</a></li>";
						$active = "";
					} ?>
				</ul>
				<p class="companyinfo uk-text-small ">&copy; <?php echo date('Y') ?> Fureco Srl. <?php echo $traduzioni->tr_diritti ?> <br>
				 <!-- VAT IT00794320960 | --> 
					<a class="uk-link-reset" href="https://www.fureco.it/company-info/">Company Info</a> | 
					<a class="uk-link-reset" target="_blank" href="https://www.iubenda.com/privacy-policy/17268700">Privacy Policy</a>
				</p>
				
				<!-- <p class="socialicons">
					<a href="" uk-icon="icon: mail"></a> 
					<a href="" uk-icon="icon: instagram"></a> 
				</p> -->
			</div>
		</div>
		<div class="uk-text-center">
			<?php echo $traduzioni->tr_apertura ?>
		</div>
	

	</div>


</footer>
