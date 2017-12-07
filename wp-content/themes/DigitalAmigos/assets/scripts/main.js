/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages

        // PRELOADER
        $(window).on('load', function() {
            $('.loader').fadeOut();
            $('.loader-mask').delay(350).fadeOut('slow');
        });

        // SCROLL REVEAL
        (function () {
          window.sr = new ScrollReveal();

          var fadeInDown = {
            origin   : "top",
            distance : "24px",
            duration : 1500,
            scale    : 1.05,
          };

          var fadeInUp = {
            origin   : "bottom",
            distance : "64px",
            duration : 900,
            scale    : 1,
          };

          sr.reveal(".sr-block", fadeInUp, 200);
          sr.reveal(".sr-fadeinup", fadeInUp);
          sr.reveal(".hero-tagline", fadeInDown, 200); 
        })(); 

        // SLICK SLIDER
        (function () {          
          // hero slider
          $('#jsHeroSlider').slick({
            dots: false,
            arrows: false,
            infinite: true,
            autoplay: true,
            speed: 500,
            fade: true,
            cssEase: 'linear'
          });

          $('.case-study-slider').slick({
            dots: false,
            arrows: false,
            infinite: true,
            autoplay: true,
            speed: 500,
            fade: true,
            cssEase: 'linear'
          });
        })(); 


        // PARALLAX WINDOW
        (function () {
          $('.parallax-window').parallax();
        })(); 

        // RESPONSIVE HERO VIDEO
        (function () {
          
            // Find all YouTube videos
            var $allVideos = $("iframe[src^='//player.vimeo.com'], iframe[src^='//www.youtube.com']"),

                // The element that is fluid width
                $fluidEl = $("body");

            // Figure out and save aspect ratio for each video
            $allVideos.each(function() {

              $(this)
                .data('aspectRatio', this.height / this.width)

                // and remove the hard coded width/height
                .removeAttr('height')
                .removeAttr('width');

            });

            // When the window is resized
            $(window).resize(function() {

              var newWidth = $fluidEl.width();

              // Resize all videos according to their own aspect ratio
              $allVideos.each(function() {

                var $el = $(this);
                $el
                  .width(newWidth)
                  .height(newWidth * $el.data('aspectRatio'));

              });

            // Kick off one resize to fix all videos on page load
            }).resize();

        })();   


        // SMOOTH HASH SCROLL
        (function () {
            // Select all links with hashes
            $('a[href*="#"]')
              // Remove links that don't actually link to anything
              .not('[href="#"]')
              .not('[href="#0"]')
              .click(function(event) {
                // On-page links
                if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                  // Figure out element to scroll to
                  var target = $(this.hash);
                  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                  // Does a scroll target exist?
                  if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                      scrollTop: target.offset().top
                    }, 500, function() {
                      // Callback after animation
                      // Must change focus!
                      var $target = $(target);
                      $target.focus();
                      if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                      } else {                        
                        $target.attr('tabindex','-1').css('outline', '0'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                      }
                    });
                  }
                }
              });
        })(); 

        // INITIALIZE HEADROOM
        (function() {
            var header = document.querySelector(".site-header");
            if(window.location.hash) {
              header.classList.add("headroom--unpinned");
            }
            var headroom = new Headroom(header, {
                tolerance: {
                  down : 0,
                  up : 0
                },
                offset : 100,
                classes: {
                  initial: "animated",
                  pinned: "fadeInDown",
                  unpinned: "fadeOutUp",
                  onUnpin : function() {
                    console.log("unpinned");
                  }
                }
            });
            headroom.init();
        }());

        // PARTICLE JS
        (function () {
          var brandIconContainer = $('#jsBrandIconContainer');
          var brandIconSize = $('#jsBrandIcon').width();
          var brandIcon = document.getElementById('jsBrandIcon');

          if(brandIcon) {
            nextParticle = new NextParticle({
              image: brandIcon,              
              width: brandIconContainer.width(),
              height: brandIconContainer.width(),
              maxWidth: '400',
              maxHeight: '400',
              particleGap: '2',
              gravity: '0.05',
              mouseForce: '100'
            });

            window.onresize = function() {
              var brandIconContainer = $('#jsBrandIconContainer');
              var brandIconSize = $('#jsBrandIcon').width();

              nextParticle.width = brandIconContainer.width();
              nextParticle.height = brandIconContainer.width();
              nextParticle.maxWidth = brandIconSize;
              nextParticle.maxHeight = brandIconSize;
              nextParticle.initPosition = "none";
              nextParticle.initDirection = "none";
              nextParticle.fadePosition = "none";
              nextParticle.fadeDirection = "none";
              nextParticle.start();
            };
          }
        })(); 


        // CONTACT FORM
        (function () {
          var $form = $('.contact-form');
          var validationErrors = false;
          
          $form.find('input[type=text], input[type=email],input[type=tel], textarea')
          .each(function(index, el) {
            $(el).wrap('<div class="input-wrapper"></div>');            
          });

          function isValidEmail(email) {
              var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
              return pattern.test(email);
          }

          function isValidNumber(phone) {
              var pattern = new RegExp(/^([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/i);
              return pattern.test(phone);
          }

          $form.on('blur', '.form-control', function(event) {
            var input = $(this);
            var parent = input.parent('.input-wrapper');
            var inputValue = input.val();
            var inputRequired = input.hasClass('wpcf7-validates-as-required');
            var inputType = input.attr('type');

            validationErrors = false;
            parent.removeClass('focused');

            if(inputRequired && inputValue === '') {
              validationErrors = true;
            } else if(inputType === 'email' && !isValidEmail(inputValue)) {
              validationErrors = true;
            } else if(inputType === 'tel' && !isValidNumber(inputValue)) {
              validationErrors = true;
            }

            if(validationErrors) {
              parent.removeClass('valid');
              parent.addClass('invalid');
            } else {
              parent.addClass('valid');
              parent.removeClass('invalid');              
            }

          }).on('focus', '.form-control', function(event) {
            var input = $(this);
            var parent = input.parent('.input-wrapper');

            parent.addClass('focused');
            parent.removeClass('valid invalid');
          });
        })(); 

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
