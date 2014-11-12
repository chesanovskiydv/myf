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