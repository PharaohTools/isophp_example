<?php

Namespace Model\LandingPage ;

class PageModel extends \Model\Base {

    public function getPage() {
        $page = array() ;
        $page['title'] = 'Documents for the ISO PHP Framework' ;
        $page['heading'] = 'The only PHP Framework aimed at all platforms and devices Modern Applications require' ;
        \ISOPHP\console::log('Docs Mod', $page) ;
        return $page ;
    }

    public static function bindButtons() {
        return function () {
            if (ISOPHP_EXECUTION_ENVIRONMENT === 'UNITER') {
                \ISOPHP\console::log('Binding buttons') ;
                $jQuery = \ISOPHP\js_core::$jQuery ;
                $go_landing_page = $jQuery('.header_logo') ;
                $go_landing_page->on('click', function ($jqThis) {
                    $jqThis->preventDefault();
                    $navigate = new \Model\Navigate() ;
                    $navigate->route('LandingPage', 'show', array(), '/') ;
                }) ;
                $go_get_started = $jQuery('.link_get_started') ;
                $go_get_started->on('click', function ($jqThis) {
                    $jqThis->preventDefault();
                    $navigate = new \Model\Navigate() ;
                    $navigate->route('GetStarted', 'show', array(), '/GetStarted') ;
                }) ;
                $expand_all = $jQuery('#expand_all') ;
                $expand_all->on('click', function ($jqThis) use ($jQuery) {
                    $slider_content_divs = $jQuery('.slider_content') ;
//                    $slider_content_divs->slideDown("slow") ;
//                    $slider_content_divs->css("height", 255) ;
                    $slider_content_divs->css("display", 'none') ;
                }) ;

            }
        } ;
    }

}