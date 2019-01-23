<?php

/**
 * _init.php - Initialize site variables and includes. 
 *
 * This file is called before any template files are rendered
 * This behavior was defined in /site/config.php - $config->prependTemplateFile
 *
 */
 
$homepage = $pages->get('/'); 
$contactpage = $pages->get(1034);

//h1 title
function getH1($page){
	$h1 = ($page->titleH1) ? $page->titleH1 : $page->title;
	return $h1;
}

/* my funcitons*/

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