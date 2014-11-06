<link rel="stylesheet" href="../../css/slyder_styles.css">
	
	<script src="../../js/slides.js"></script>

	<script>
		/*
			Get the curent slide
		*/
		function currentSlide( current ) {
			$(".current_slide").text(current + " of " + $("#slides").slides("status","total") );
		}
		
		$(function(){
			/*
				Initialize SlidesJS
			*/
			$("#slides").slides({
				navigateEnd: function( current ) {
					currentSlide( current );
				},
				loaded: function(){
					currentSlide( 1 );
				}
			});
			
			/*
				Play/stop button
			*/
			$(".controls").click(function(e) {
				e.preventDefault();
				
				// Example status method usage
				var slidesStatus = $("#slides").slides("status","state");
				
				if (!slidesStatus || slidesStatus === "stopped") {

					// Example play method usage
					$("#slides").slides("play");

					// Change text
					$(this).text("Stop");
				} else {
					
					// Example stop method usage
					$("#slides").slides("stop");
					
					// Change text
					$(this).text("Play");
				}
			});
		});
	</script>
<center><h1>Заголовок!</h1></center>

<div id="container">
		
		<!-- start SlidesJS slideshow -->
		<div id="slides">
				<img src="../../images/1st_slide.jpg" width="780" height="300" alt="Slide 1">
				
				<img src="../../images/2st_slide.jpg" width="780" height="300" alt="Slide 2">

				<img src="../../images/3st_slide.jpg" width="780" height="300" alt="Slide 3">

				<img src="../../images/4st_slide.jpg" width="780" height="300" alt="Slide 4">

				<img src="../../images/5st_slide.jpg" width="780" height="300" alt="Slide 5">

				<img src="../../images/6st_slide.jpg" width="780" height="300" alt="Slide 6">

				<img src="../../images/7st_slide.jpg" width="780" height="300" alt="Slide 7">
		</div>
		<!-- end SlidesJS  slideshow -->
		
		<!-- Example play/stop controls -->
		<a href="#" class="controls">Play</a>
		
		<!-- Example slide count -->
		<p class="current_slide"></p>
	</div>

		