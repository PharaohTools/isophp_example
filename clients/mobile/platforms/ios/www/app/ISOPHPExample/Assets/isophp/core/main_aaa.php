<?php

$console->log("PHPFE Started") ;
\js_core::$jQuery = $jQuery ;
\js_core::$console = $console ;
\js_core::$window = $window ;
\js_core::$Math = $Math ;
\core::$php = $php ;

$isophp = new isophp() ;
$isophp->mobileMenuOutsideClick();
$isophp->offcanvasMenu();
$isophp->burgerMenu();
//$isophp->contentWayPoint();
$isophp->dropdown();
$isophp->goToTop();
$isophp->loaderPage();
//$isophp->counterWayPoint();
$isophp->parallax();
$isophp->testimonialCarousel();

$console->log("js class inititialized") ;

class js_core {
    public static $jQuery ;
    public static $console ;
    public static $window ;
    public static $Math ;
}

class core {
    public static $php ;
}

class isophp {

    public function mobileMenuOutsideClick() {
        $jQuery = \js_core::$jQuery ;
        $jQuery(\js_core::$window->document)->click(function ($e) use ($jQuery) {
            $container = $jQuery("#fh5co-offcanvas, ->js-fh5co-nav-toggle");
            if (!$container->is($e->target) && $container->has($e->target)->length === 0) {
                if ( $jQuery('body')->hasClass('offcanvas') ) {
                    $jQuery('body')->removeClass('offcanvas');
                    $jQuery('->js-fh5co-nav-toggle')->removeClass('active');
                }
            }
        });
    }

    public function offcanvasMenu() {

        $jQuery = \js_core::$jQuery;
        $jQuery('#page')->prepend('<div id="fh5co-offcanvas" />');
        $jQuery('#page')->prepend('<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle fh5co-nav-white"><i></i></a>');
        $clone1 = $jQuery('.menu-1 > ul')->clone();
        $jQuery('#fh5co-offcanvas')->append($clone1);
        $clone2 = $jQuery('.menu-2 > ul')->clone();
        $jQuery('#fh5co-offcanvas')->append($clone2);

        $jQuery('#fh5co-offcanvas .has-dropdown')->addClass('offcanvas-has-dropdown');
        $jQuery('#fh5co-offcanvas')
            ->find('li')
            ->removeClass('has-dropdown');

        // Hover dropdown menu on mobile
        $jQuery('.offcanvas-has-dropdown')->mouseenter(function () use ($this, $jQuery) {
            $jqthis = $jQuery($this);

            $jqthis
                ->addClass('active')
                ->find('ul')
                ->slideDown(500, 'easeOutExpo');
        })->mouseleave(function () use ($this, $jQuery) {

            $jqthis = $jQuery($this);
            $jqthis
                ->removeClass('active')
                ->find('ul')
                ->slideUp(500, 'easeOutExpo');
        });

    }


        public function isMobile() {
//            $jQuery = \js_core::$jQuery ;
//            $jQuery($window)->resize(function() use ($this, $jQuery) {
//
//                if ( $jQuery('body')->hasClass('offcanvas') ) {
//
//                    $jQuery('body')->removeClass('offcanvas');
//                    $jQuery('.js-fh5co-nav-toggle')->removeClass('active');
//
//                }
//            });
            return false ;
        }


        public function burgerMenu() {
            $jQuery = \js_core::$jQuery ;
            $jQuery('body')->on('click', '.js-fh5co-nav-toggle', function($event) use ($this, $jQuery) {
                if ( $jQuery('body')->hasClass('overflow offcanvas') ) {
                    $jQuery('body')->removeClass('overflow offcanvas');
                } else {
                    $jQuery('body')->addClass('overflow offcanvas');
                }
                $jqthis = $jQuery($this);
                $jqthis->toggleClass('active');
                $event->preventDefault();

            });
        }



//public function contentWayPoint() {
//    i = 0;
//    $jQuery('.animate-box')->waypoint( function( direction ) {
//
//        if( direction === 'down' && !$jQuery(this->element)->hasClass('animated-fast') ) {
//
//            i++;
//
//            $jQuery(this->element)->addClass('item-animate');
//            setTimeout(function(){
//
//                $jQuery('body .animate-box.item-animate')->each(function(k){
//                    el = $jQuery(this);
//                    setTimeout( function () {
//                        effect = el->data('animate-effect');
//                        if ( effect === 'fadeIn') {
//                            el->addClass('fadeIn animated-fast');
//                        } else if ( effect === 'fadeInLeft') {
//                            el->addClass('fadeInLeft animated-fast');
//                        } else if ( effect === 'fadeInRight') {
//                            el->addClass('fadeInRight animated-fast');
//                        } else {
//                            el->addClass('fadeInUp animated-fast');
//                        }
//
//                        el->removeClass('item-animate');
//                    },  k * 200, 'easeInOutExpo' );
//                });
//
//            }, 100);
//
//        }
//
//    } , { offset: '85%' } );
//	};


        public function dropdown() {
            $jQuery = \js_core::$jQuery ;
            $jQuery('.has-dropdown')->mouseenter(function() use ($this, $jQuery) {
                $jqthis = $jQuery($this);
                $jqthis
                    ->find('.dropdown')
                    ->css('display', 'block')
                    ->addClass('animated-fast fadeInUpMenu');
            })->mouseleave(function() use ($this, $jQuery) {
                $jqthis = $jQuery($this);

                $jqthis
                    ->find('.dropdown')
                    ->css('display', 'none')
                    ->removeClass('animated-fast fadeInUpMenu');
            });
        }

        public function goToTop() {
            $jQuery = \js_core::$jQuery ;
            $move_browser = function ($event) use ($jQuery) {
                $event->preventDefault();
                $animate_settings = array ('scrollTop' => $jQuery('html')->offset()->top) ;
                $jQuery('html, body')->animate($animate_settings, 500, 'easeInOutExpo');
                return false;
            } ;
            $jQuery('.js-gotop')->on('click', $move_browser);
            $scroll_action = function() use ($jQuery) {
                $win = $jQuery(\js_core::$window);
                if ($win->scrollTop() > 200) {
                    $jQuery('.js-top')->addClass('active');
                } else {
                    $jQuery('.js-top')->removeClass('active');
                }
            } ;
            $jQuery(\js_core::$window)->scroll($scroll_action);
        }

        // Loading page
        public function loaderPage() {
            $jQuery = \js_core::$jQuery ;
            $jQuery(".fh5co-loader")->fadeOut("slow");
        }

//        public function counter() {
//            $jQuery = \js_core::$jQuery ;
//            $jQuery('.js-counter')->countTo(    {
//			 formatter: function (value, options) {
//                return value->toFixed(options->decimals);
//    },
//		});
//}

//        public function counterWayPoint() {
//            $jQuery = \js_core::$jQuery ;
//            if ($jQuery('#fh5co-counter')->length > 0 ) {
//                $jQuery('#fh5co-counter')->waypoint( $waypoint , { offset: '90%' } );
//    }
//        }
//
//        public function getWaypoint() {
//            return function( $direction ) {
//                if( $direction === 'down' && !$jQuery($this->element)->hasClass('animated') ) {
//                    setTimeout( $counter , 400);
//                    $jQuery($this->element)->addClass('animated');
//                }
//            }
//}


        public function parallax() {
            $jQuery = \js_core::$jQuery ;
//            if ( !$this->isMobile->any() ) {
                $parallax_settings = array(
                    'horizontalScrolling' => false,
                    'hideDistantElements' => false,
                    'responsive' => true
                );
                $jQuery(\js_core::$window)->stellar($parallax_settings);
//            }
        }



        public function testimonialCarousel() {
            $jQuery = \js_core::$jQuery ;
            $owl = $jQuery('.owl-carousel-fullwidth');
            $owl_settings = array(
                'items' => 1,
                'loop' => true,
                'margin' => 0,
                'nav' => false,
                'dots' => true,
                'smartSpeed' => 800,
                'autoHeight' => true) ;
            $owl->owlCarousel($owl_settings);
        }


}

