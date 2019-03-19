/*!

 */

 //  Start script - lazy load -->


jQuery(function ($) {


     /* Every time the window is scrolled ... */
     $(window).scroll( function(){

         /* Check the location of each desired element */
         $('.lazys').each( function(i){


             var bottom_of_object = $(this).position().top + ( $(this).outerHeight() / 4 );
             var bottom_of_window = $(window).scrollTop() + $(window).height();

             /* If the object is completely visible in the window, fade it it */
             if( bottom_of_window > bottom_of_object ){

                 $(this).animate({'opacity':'1'},1000);

             }

         });

     });



 // <!-- The end script - lazy load -->

//  Start script - sticky menu -->


  var stickyNavTop = $('.top_menu').offset().top;

  var stickyNav = function(){
  var scrollTop = $(window).scrollTop();

  if (scrollTop > stickyNavTop) {
      $('.top_menu').addClass('sticky');
  } else {
      $('.top_menu').removeClass('sticky');
  }
  };

  stickyNav();

  $(window).scroll(function() {
    stickyNav();
  });

//  The end script - sticky menu -->



//  Start script - artists nav -->


    $(".artists li").each(function(e) {
        if (e != 0)
            $(this).hide();
    });

    $("#next").click(function(){
        if ($(".artists li:visible").next().length != 0)
            $(".artists li:visible").next().show().prev().hide();
        else {
            $(".artists li:visible").hide();
            $(".artists li:first").show();
        }
        return false;
    });

    $("#prev").click(function(){
        if ($(".artists li:visible").prev().length != 0)
            $(".artists li:visible").prev().show().next().hide();

        else {
            $(".artists li:visible").hide();
            $(".artists li:last").show();

        }
        return false;
    });

//  The end script - artists nav -->

//  Start script - gallery slider -->


    $(".gallery-slider li").each(function(e) {
        if (e != 0)
            $(this).hide();
    });

    $("#next").click(function(){
        if ($(".gallery-slider li:visible").next().length != 0)
            $(".gallery-slider li:visible").next().show().prev().hide();
        else {
            $(".gallery-slider li:visible").hide();
            $(".gallery-slider li:first").show();
        }
        return false;
    });

    $("#prev").click(function(){
        if ($(".gallery-slider li:visible").prev().length != 0)
            $(".gallery-slider li:visible").prev().show().next().hide();

        else {
            $(".gallery-slider li:visible").hide();
            $(".gallery-slider li:last").show();

        }
        return false;
    });


  /* lighbox galery */

  var $gallery = $('.img_gal ul li a').simpleLightbox();
  var $gallery = $('.lightboxes').simpleLightbox();
  $gallery.on('show.simplelightbox', function(){
    console.log('Requested for showing');
  })
  .on('shown.simplelightbox', function(){
    console.log('Shown');
  })
  .on('close.simplelightbox', function(){
    console.log('Requested for closing');
  })
  .on('closed.simplelightbox', function(){
    console.log('Closed');
  })
  .on('change.simplelightbox', function(){
    console.log('Requested for change');
  })
  .on('next.simplelightbox', function(){
    console.log('Requested for next');
  })
  .on('prev.simplelightbox', function(){
    console.log('Requested for prev');
  })
  .on('nextImageLoaded.simplelightbox', function(){
    console.log('Next image loaded');
  })
  .on('prevImageLoaded.simplelightbox', function(){
    console.log('Prev image loaded');
  })
  .on('changed.simplelightbox', function(){
    console.log('Image changed');
  })
  .on('nextDone.simplelightbox', function(){
    console.log('Image changed to next');
  })
  .on('prevDone.simplelightbox', function(){
    console.log('Image changed to prev');
  })
  .on('error.simplelightbox', function(e){
    console.log('No image found, go to the next/prev');
    console.log(e);
  });
});
//  The end script - gallery slider -->

/* Open the sidenav */
function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

/* Close/hide the sidenav */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

/* responsive menu */

function openNav2() {
    document.getElementById("mySidenav2").style.width = "100%";
}

/* Close/hide the sidenav */
function closeNav2() {
    document.getElementById("mySidenav2").style.width = "0";
}

/* number count */
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(minutes + ":" + seconds);

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}


/* video background */

var vid = document.getElementById("bgvid");
var pauseButton = document.querySelector("#polina button");

if (window.matchMedia('(prefers-reduced-motion)').matches) {
    vid.removeAttribute("autoplay");
    vid.pause();
    pauseButton.innerHTML = "Paused";
}

function vidFade() {
  vid.classList.add("stopfade");
}

// vid.addEventListener('ended', function()
// {
// only functional if "loop" is removed
// vid.pause();
// to capture IE10
// vidFade();
// });