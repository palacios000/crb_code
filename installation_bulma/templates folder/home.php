<?php require 'inc/head.php' ?>
	</head>

	<body class="<?php echo $page->template ?>">

		<?php require 'inc/navMenu.php' ?>

		<section class="hero foto is-large">
			<div class="hero-body">
				<div class="container">
					.
				</div>
			</div>
		</section>

		<section class="section">
			<div class="container content has-background-white ">
				<div class="columns">
					<div class="column is-7">
						<h1 class="title is-size-3 is-uppercase"><?php echo $page->title ?></h1>
						<h2 class="subtitle is-size-3 monoBold"><?php echo $page->h1 ?></h2>
						
						<div class="quando is-size-3 monoLight">
							<?php echo $page->quando ?>
						</div>

						<?php echo $page->body ?>
						<br>
					</div>
					<div class="column is-5">
						<img src="<?php echo $page->images->first->url ?>" alt="semi scambio Sondrio">
					</div>
				</div>
			</div>
		</section>

		<section class="level has-background-primary borderGreta">
				<div class="container ">
					<div class="level ">
						<div class="level-left pattern">
							<img class="is-hidden-mobile" src="<?php echo $config->urls->templates ?>styles/separatori.svg" alt="semi" style="height: 200px;">
						</div>
						<div class="level-item has-text-centered ">
							<div class="avviso">
									
								<p class="title is-size-2 is-uppercase has-text-white ">Giornata aperta a tutti!</p>
								<p class=" is-size-3 has-text-white">Se non hai semi da scambiare, te li doniamo noi!</p>
							</div>
						</div>	
						<div class="level-right pattern">
							<img class="is-hidden-mobile" src="<?php echo $config->urls->templates ?>styles/separatori.svg" alt="semi" style="height: 200px;">
						</div>
					</div>

				</div>
		</section>

		<section class="section parallaxBG">
			<div class="container has-background-white bigIntro">
				<?php echo $page->body_extra ?>
			</div>
		</section>
	
<?php require 'inc/footer.php' ?>	