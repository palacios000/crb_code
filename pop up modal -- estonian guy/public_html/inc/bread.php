<!-- bread ############################################################################################# -->
<ul class="uk-breadcrumb uk-container">
<?php
	$bread = ""; 
	foreach($page->parents()->append($page) as $parent) {
		$active = ($parent->id == $page->id) ? "is-active" : "";
		$bread .= "<li class='$active'><a href='{$parent->url}'>{$parent->title}</a></li> ";
	}
echo $bread;
?>
</ul>
