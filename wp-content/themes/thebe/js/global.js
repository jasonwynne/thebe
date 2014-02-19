$(document).ready(function(){ 

	
	$( window ).resize(function() {
		setDivHeight();
		setFwHeight();
	});
	
	$('.mobile-header-container').click(function(){
	  var $mobileHeader = $('.mobile-header-img');
	  if($mobileHeader.hasClass('open')){	  
     $('.mobile-menu').slideUp(150,function(){
        $mobileHeader.removeClass('open');
      });
      
	  }else{	  
      
	     $('.mobile-menu').slideDown(300,function(){
	      $mobileHeader.addClass('open');
	     });
	  
	  }
	  
	});
	
	$('.close-mobile-menu').click(function(e){
    e.preventDefault();
	   var $mobileHeader = $('.mobile-header-img');
      $('.mobile-menu').slideUp(150,function(){
        $mobileHeader.removeClass('open');
      });
	});
	
	
	
	
	// all slideshows
	var isAnimating = 0;
	var slideCount = $('.home-hero-single').length;
	var slideTotal = slideCount-1;
	var currSlide = 0;
	var nextSlide;
	var fadeSpeed = 1000;
	var tweenTime = 4500;

	
	$('.home-hero-single').each(function(i){
		$(this).addClass('hero'+i);	
	});	
			
	$('.hero0').css({'z-index': 100, 'display' : 'block'});
	$('.hh-total').html(slideCount);
	
	
	$('.hh-link').click(function(){
	  var hSlide = $(this);
	  var linkType = hSlide.data('linkType');
    var hhLink = hSlide.data('link');
    
    if(linkType=='offsite'){
      window.open(hhLink, '_blank');
    } else if(linkType=='page'){
      window.location = hhLink;
    } else if(linkType=='video'){
      $('.video-container').html('<iframe src="//player.vimeo.com/video/'+hhLink+'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="700" height="393" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
      $('#video-model').modal('show')
    }
    
	});
	
	
	
	if(slideCount>2){		
	
		var hhsTimer = setInterval(function(){fadeAway()},tweenTime);
		
	
		$('.arrow-holder').click(function(e){
		  if(isAnimating == 0){
        clearInterval(hhsTimer);
        isAnimating = 1;
        var $arrow = $(this);
        var dir = $arrow.attr('data-direction');
      
        if(dir=="r" && currSlide != slideTotal) {
          nextSlide = currSlide+1;
        } else if(dir=="r" && currSlide == slideTotal){
          nextSlide = 0;
        } else if(dir=="l" && currSlide != 0) {
          nextSlide = currSlide-1;
        } else if(dir=="l" && currSlide == 0){
          nextSlide = slideTotal;
        }
      
        $('.hero'+nextSlide).css({'z-index': 50, 'display' : 'block'});
        $('.hero'+currSlide).fadeOut(fadeSpeed, function(){
          $(this).css({'z-index': 10, 'display' : 'block'});
          animationComplete();
        });
      
        var setslideNum = nextSlide+1;
        $('.hh-curr-num').html(setslideNum);
	    }
	    
	  });
		
		
			
		function fadeAway(x){
		
			if(currSlide < slideTotal){
				nextSlide = currSlide+1;
			}else{
				nextSlide = 0;
			}
	
			$('.hero'+nextSlide).css({'z-index': 50, 'display' : 'block'});
			$('.hero'+currSlide).fadeOut(fadeSpeed, function(){
				$(this).css({'z-index': 10, 'display' : 'block'});
				animationComplete();
			});
			
			var setslideNum = nextSlide+1;
			$('.hh-curr-num').html(setslideNum);
	
		}		
	
		function animationComplete(){
			$('.hero'+nextSlide).css({'z-index': 100});	
			currSlide = nextSlide;
			isAnimating = 0;
		}
	}else{
	  $('.slide-count-holder').addClass('hidden');
	}		
	
	
});

// this is a function that returns true or false for has attribute	
$.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};	


// this is a function to get the height on the div to hide slideshow images

function setDivHeight() {
	var setHeight = $('.hcount0').height();
	$('.home-hero-holder').css('height', setHeight+'px');
}

function setFwHeight() {
	var setHeight = $('.fcount0').height();
	$('.fi-holder').css('height', setHeight+'px');
}
