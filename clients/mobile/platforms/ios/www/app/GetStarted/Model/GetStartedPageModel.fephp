<?php

Namespace Model\LandingPage ;

class PageModel extends \Model\Base {

    public function getPage() {
        $page = array() ;
        $page['title'] = 'Get Started With the ISO PHP Framework' ;
        $page['heading'] = 'The only PHP Framework aimed at all platforms and devices Modern Applications require' ;
        \ISOPHP\console::log('GetStarted Mod', $page) ;
        return $page ;
    }

    public static function bindButtons() {
        return function () {
            if (ISOPHP_EXECUTION_ENVIRONMENT === 'UNITER') {
                \ISOPHP\console::log('Binding buttons') ;
                $jQuery = \ISOPHP\js_core::$jQuery ;
                $go_landing_page = $jQuery('.link_home') ;
                $go_landing_page->on('click', function ($jqThis) {
                    $jqThis->preventDefault();
                    $navigate = new \Model\Navigate() ;
                    $navigate->route('LandingPage', 'show', array(), '/') ;
                }) ;
                $go_docs = $jQuery('.link_Docs') ;
                $go_docs->on('click', function ($jqThis) {
                    $jqThis->preventDefault();
                    $navigate = new \Model\Navigate() ;
                    $navigate->route('Docs', 'show', array(), '/Docs') ;
                }) ;
                $go_get_started = $jQuery('.link_GetStarted') ;
                $go_get_started->on('click', function ($jqThis) {
                    $jqThis->preventDefault();
                    $navigate = new \Model\Navigate() ;
                    $navigate->route('GetStarted', 'show', array(), '/GetStarted') ;
                }) ;
            }
        } ;
    }

}