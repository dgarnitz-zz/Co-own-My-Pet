function signIn(){
	location.href='/profile';
}

function formChanged(){
	var firstName = document.getElementsByName("firstname")[0].value;
	var lastName = document.getElementsByName("lastname")[0].value;
	var emailAddress = document.getElementsByName("emailaddress")[0].value;
	window.alert("Thank you " + firstName + " for joining our mailing list" );
}




$(document).ready(function go(){
	
	/* Account Creation Form */
	
	$('#accountCreationForm').hide();
	$('#accountCreationForm').fadeIn('slow');
	
	$('#acSecondary').click(function acSecondary(){
		$('#acSecondary').css("color","black");
		$('#acSecondary').css("text-decoration","underline");
		$('#acPrimary').css("color","white");
		$('#acPrimary').css("text-decoration","none");
		$('#acToggleText').html("Are you a pet lover and want to own a pet, but lack the time or<br>environment to properly take care of one?<br><br>Do you want to experience the joy of pet ownership on a part time basis?<br><br>Sign up today as a secondary owner and search for the perfect pet<br>to share, love and enjoy part time!");
	});
	
	$('#acPrimary').click(function acPrimary(){
		$('#acPrimary').css("color","black");
		$('#acPrimary').css("text-decoration","underline");
		$('#acSecondary').css("color","white");
		$('#acSecondary').css("text-decoration","none");
		$('#acToggleText').html("Are you having trouble with the time and financial commitments of<br>pet ownership?<br><br>Are you interested in sharing your pet with someone who will love<br>it as much as you do?<br><br>Sign up today as a primary owner and search for the perfect partner<br>to share your pet with!");
	});
	
	/* Account Sign In Form */
	
	$('#accountSignIn').hide();
	$('#accountSignIn').fadeIn('slow')
	
	/* Slider */
	
	$('.slider').each(function(){ 							//For every slider
		var $this = $(this);								//Get the current slider
		var $group = $this.find('.slide-group');			//Get the slide-group (container)
		var $slides = $this.find('.slide');					//jQuery object to hold all slides
		var buttonArray = [];								//Create array tp hold nav buttons
		var currentIndex = 0;								//Index number of current slide
		var timeout;										//Used to store the timer
	
		//move() - The function to move the slides goes here
		function move(newIndex) {						//Creates the slide from old to new
			var animateLeft, slideLeft;					//declare variables
			
			advance();				//When the slide moves, call advance() again
			
			//If current slide is showing or a slide is animating, then do nothing
			if ($group.is(':animated') || currentIndex === newIndex) {
				return;
			}
			
			buttonArray[currentIndex].removeClass('active');	//Remove class from item
			buttonArray[newIndex].addClass('active');			//Add class to new item
			
			if (newIndex > currentIndex){				//If new item > current
				slideLeft = '100%';						//Sit the new slide to the right
				animateLeft = "-100%";					//Animate the current group to the left
			}
			else {										//Otherwise
				slideLeft = '-100%';					//Sit the new slide to the left
				animateLeft = "100%";					//Animate the current group to the right
			}
			
			//Position new slide to left (if less) or right (if more) of current
			$slides.eq(newIndex).css( {left: slideLeft, display: 'block'} );
			$group.animate( {left: animateLeft} , function() {			//animate slides and
				$slides.eq(currentIndex).css( {display: 'none';} );		//Hide previous slide
				$slides.eq(newIndex).css( {left: 0;} );					//Set position of the new item
				$group.css( {left: 0;} );								//Set position of group of slides
				currentIndex = newIndex;								//Set Current Index to new image
			});	
		}
	
		function advance() {									//Sets a time between slides
			clearTimeout(timeout);								//Clear timer stored in timeout
			//Start timer to run an anonymous function every 4 seconds
			timeout = setTimeout(function(){
				if (currentIndex < ($slides.length - 1)) {		//If not the last slide
					move(currentIndex + 1);						//Move to the next slide
				}
				else {											//Otherwise
					move(0);									//Move to the first slide
				}	
			}, 4000);											//Milliseconds timer will wait
		}
	
		$.each($slides, function(index){
			//Create a button element for the button
			var $button = $('<button type="button" class="slide-btn">&bull;</button>');
			if (index === currentIndex) {						//If index is current item
				$button.addClass('active');						//Add the active class
			}
			$button.on('click', function(){						//Create event handler for the button
				move(index);									//It calls the move() function
				}).appendTo($this.find('.slide-buttons'));		//Add to the buttons holder
				buttonArray.push($button);						//Add it to the button array
		});
			
		advance();
			
	});
	
	
});