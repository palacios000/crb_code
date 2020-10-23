<?php

/**
 * _init.php - Initialize site variables and includes. 
 *
 * This file is called before any template files are rendered
 * This behavior was defined in /site/config.php - $config->prependTemplateFile
 *
 */
 
$homepage = $pages->get('/'); 
//$contactpage = $pages->get(1034);

$bookingButton = "
<div class='uk-flex uk-flex-center'>
	<button class='uk-button uk-button-default '>BOOKING</button>
</div>";

//h1 title
function getH1($page){
	$h1 = ($page->titleH1) ? $page->titleH1 : $page->title;
	return $h1;
}

function menuBoxItem($page, $width, $height){
	$out = "
	<a href='$page->url' uk-scrollspy='cls:uk-animation-fade' class='uk-animation-toggle' tabindex='0'>
		<img src='{$page->images->first()->size($width,$height)->url}' alt=$page->title class='uk-animation-fade'>
		<h3 class='simH5'>$page->title</h3>
	</a>";
	return $out;
}

/* my funcitons*/
/* ########### UIkit ############*/
function UIgallery($images){
	$config = wire('config');
	$out = '
	<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: fade">

		<ul class="uk-slideshow-items">';
		foreach ($images as $image) {
			$out .= '
			<li>
				<img src="'.$image->url.'" alt="'.$image->description.'" uk-cover>
			</li>';
		}
		$out .= '
		</ul>

		<a class="uk-position-center-left  uk-hidden-hover" href="#"  uk-slideshow-item="previous">
			<img src="'.$config->urls->templates.'styles/img/freccia_sx.svg" alt="next" width="55px">
		</a>
		<a class="uk-position-center-right  uk-hidden-hover" href="#"  uk-slideshow-item="next">
			<img src="'.$config->urls->templates.'styles/img/freccia_dx.svg" alt="next" width="55px">
		</a>

	</div>';
	return $out;
}

function UIgrid3images($images){
	$out = "";
	$out = "
		<div class='uk-child-width-1-2 uk-flex-center pictureBoxGrid3' uk-grid>
			<div>
				<img class=imgPadding src='{$images->first->size(489, 655)->url}' alt='{$images->first->description}'>
			</div>
			
			<div>
				<img class=imgPadding src='{$images->eq(1)->size(489, 305)->url}' alt='{$images->eq(1)->description}'>
				
				<img src='{$images->last->size(489, 305)->url}' alt='{$images->last->description}' class='last'>
			</div>
		</div>";
	return $out;
}


// display all project in grid
function folioList($projects, $showTag){
	$counter = 0;
	$output = "<div class=columns>";
	foreach ($projects as $project) {	
		if (count($project->images)>=1) {
			$image     = $project->images->first()->size(400,400);
		}
		$category  = $project->parent->title;
		if ($counter % 3 == 0) {
			$output .= "</div><div class=columns>";
		}
			$output .= "<div class='column is-4'>";
			$output .= 		"<a href='$project->url'>";
			$output .= 			"<img alt='$project->title' src='$image->url'>";
			$output .= 			"<div class=columns>";
			$output .= 			"<div class='column'><h3 class='has-text-centered is-size-3'>$project->title</h3></div>";
			$output .= 			"</div>";

			$output .= 		"</a>";
			
			$output .= "</div>";
		$counter++;
	}
	$output .= "</div>";
	return $output;

}

function bulmaCarousel($images){
	if (count($images)>=1) {
	$output = "
	<div class='section'>
	<div class='container'>
		<div class='carousel carousel-animated carousel-animate-slide'>
			<div class='carousel-container'>";
				foreach ($images as $carousel) { 
				$output .= " 
				<div class='carousel-item has-background is-active'>
					<img class='is-background' src='$carousel->url' alt='' width='' height='' />";
					if ($carousel->description) {
					$output .= "<div class='title'>$carousel->description</div>";
					}
				$output .= 
				"</div>";
				}
			$output .= '	
			</div>
			<div class="carousel-navigation is-overlay">
				<div class="carousel-nav-left">
					<i class="fa fa-chevron-left" aria-hidden="true"></i>
				</div>
				<div class="carousel-nav-right">
					<i class="fa fa-chevron-right" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</div>
	</div>';
	return $output;
	}
}