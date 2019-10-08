
		<footer class="footer">
			<div class="container">
				<div class="level">

					<div class="level-left">
						<div class="notification is-white">
							<p class=''>
								<strong> <i class="fas fa-copyright"></i> <?php echo date('Y') ?> <a class="is-disabled " href="<?php echo $config->urls->admin ?>">The Hampstead Smock Company </a></strong><br>
							</p>
							<!-- <a href="https://www.iubenda.com/privacy-policy/7954625" class="iubenda-black iubenda-embed " title="Privacy Policy">Privacy Policy</a> <script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>  -->
						</div>
					</div>
					
				</div>
			</div>		
		</footer>

		<script>
			document.addEventListener('DOMContentLoaded', function () {
		
				// Get all "navbar-burger" elements
				var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
			
				// Check if there are any navbar burgers
				if ($navbarBurgers.length > 0) {
			
					// Add a click event on each of them
					$navbarBurgers.forEach(function ($el) {
						$el.addEventListener('click', function () {
				
						// Get the target from the "data-target" attribute
						var target = $el.dataset.target;
						var $target = document.getElementById(target);
				
						// Toggle the class on both the "navbar-burger" and the "navbar-menu"
						$el.classList.toggle('is-active');
						$target.classList.toggle('is-active');
			
						});
					});

				};
				
				var carousels = bulmaCarousel.attach(); // carousels now contains an array of all Carousel instances
		});
		</script> 

	</body>
</html>

