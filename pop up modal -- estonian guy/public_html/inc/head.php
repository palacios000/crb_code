<!DOCTYPE html>
<html lang="it">
	<head>
		<!-- <title>Fabio Gavazzi - <?php echo $page->title ?></title> -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo $config->urls->templates?>styles/uikit.min.css" />
		<script src="<?php echo $config->urls->templates?>js/uikit.min.js"></script>
		<script src="<?php echo $config->urls->templates?>js/uikit-icons.min.js"></script>

		<link rel="shortcut icon" type="image/png" href="<?php echo $config->urls->templates?>styles/img/fg.png"/>

		<!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-Bx4pytHkyTDy3aJKjGkGoHPt3tvv6zlwwjc3iqN7ktaiEMLDPqLSZYts2OjKcBx1" crossorigin="anonymous"> -->


		<?php if ($page->template == 'contatti' ): ?>
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

			<script>

				/* Italian initialisation for the jQuery UI date picker plugin. */
				/* Written by Antonello Pasella (antonello.pasella@gmail.com). */
				( function( factory ) {
					if ( typeof define === "function" && define.amd ) {

						// AMD. Register as an anonymous module.
						define( [ "../widgets/datepicker" ], factory );
					} else {

						// Browser globals
						factory( jQuery.datepicker );
					}
				}( function( datepicker ) {

				datepicker.regional.it = {
					closeText: "Chiudi",
					prevText: "&#x3C;Prec",
					nextText: "Succ&#x3E;",
					currentText: "Oggi",
					monthNames: [ "Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno",
						"Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre" ],
					monthNamesShort: [ "Gen","Feb","Mar","Apr","Mag","Giu",
						"Lug","Ago","Set","Ott","Nov","Dic" ],
					dayNames: [ "Domenica","Lunedì","Martedì","Mercoledì","Giovedì","Venerdì","Sabato" ],
					dayNamesShort: [ "Dom","Lun","Mar","Mer","Gio","Ven","Sab" ],
					dayNamesMin: [ "Do","Lu","Ma","Me","Gi","Ve","Sa" ],
					weekHeader: "Sm",
					dateFormat: "dd/mm/yy",
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: false,
					yearSuffix: "" };
				datepicker.setDefaults( datepicker.regional.it );

				return datepicker.regional.it;

				} ) );


			$( function() {
			  $( "#datepicker" ).datepicker({
			  	dateFormat: 'dd/mm/yy',
			  });
			 
			} );
			</script>
		<?php endif ?>
		
		<?php echo $page->seo; ?>

		<!-- language  -->
		<?php
		// handle output of 'hreflang' link tags for multi-language
		// https://processwire.com/talk/topic/12332-dynamic-hreflang-link-tags/#comment-114239
		foreach($languages as $language) {
			// if this page is not viewable in the language, skip it
			if(!$page->viewable($language)) continue;
			// get the http URL for this page in the given language
			$url = $page->localHttpUrl($language); 
			$hreflang = $language->country_code;
			echo "\n\t<link rel='alternate' hreflang='$hreflang' href='$url' />";
		}
		?>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141530740-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-141530740-1');
		</script>
		
		<!-- iubenda -->
		<script type="text/javascript">
		var _iub = _iub || [];
		_iub.csConfiguration = {"lang":"it","siteId":1609494,"gdprAppliesGlobally":false,"cookiePolicyId":17268700, "banner":{ "position":"float-top-center","textColor":"black","backgroundColor":"white" }};
		</script><script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>