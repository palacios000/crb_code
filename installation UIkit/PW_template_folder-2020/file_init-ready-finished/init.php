<?php 
//h1 title
function getH1($page){
	$h1 = ($page->titleH1) ? $page->titleH1 : $page->title;
	return $h1;
}


function getHomepage (){
	$pages = wire('pages');
	$homepage = $pages->get('/');
	return $homepage;
}

function listPagesCard ($cards, $columns = 2, $news = false){
	$sanitizer = wire('sanitizer');
	$counter = 1;
	$openDiv = '<div class="uk-child-width-1-'.$columns.'@m" uk-grid>';

	$listPages = $openDiv;
	foreach ($cards as $card) {

		if (count($cards) % $columns == 1) {
			$listPages .= '</div>'.$openDiv;
		}						

		$listPages .= '
			<a href="'.$card->url.'">
		    <div>
		        <div class="uk-card uk-card-default">';
		        if (!$news) {
		        	$listPages .= '
		            <div class="uk-card-media-top">
		                <img src="'.$card->images->first->url.'" alt="'.$card->titleH1.'">
		            </div>';
		        }
		        $listPages .= '
		            <div class="uk-card-body">
		                <h3 class="uk-card-title">'.getH1($card).'</h3>';
		                if ($news) {
		                	$listPages .= '<p class="uk-text-meta ">'.$card->giorno.'</p>';
		                }
		            $listPages .= '    
		                '.$sanitizer->truncate($card->body, 250, ['type' => 'word', 'more' => ' ...']).'
		            </div>
		        </div>
		    </div>
		    </a>';
		    $counter++;
		}
	$listPages .= '</div>';
	return $listPages;
}
?>