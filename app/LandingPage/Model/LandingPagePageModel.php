<?php

Namespace Model\LandingPage ;

class PageModel extends \Model\Base {

    public function getPage() {
        $page = array() ;
        $page['title'] = 'Welcome to the ISO PHP Framework' ;
        $page['heading'] = 'The only PHP Framework aimed at all platforms and devices Modern Applications require' ;
        \ISOPHP\js_core::$console->log('ISO PHP Mod', $page) ;
        return $page ;
    }

    public static function bindButtons() {
        return function () {
            if (ISOPHP_EXECUTION_ENVIRONMENT === 'UNITER') {
                \ISOPHP\js_core::$console->log('Binding buttons') ;
                $jQuery = \ISOPHP\js_core::$jQuery ;
                $go_landing_page = $jQuery('.link_docs') ;
                $go_landing_page->on('click', function () {
                    $navigate = new \Model\Navigate() ;
                    $navigate->route('Docs', 'show', array(), '/docs') ;
                }) ;
                $go_get_started = $jQuery('.link_GetStarted') ;
                $go_get_started->on('click', function () {
                    $navigate = new \Model\Navigate() ;
                    $navigate->route('GetStarted', 'show', array(), '/GetStarted') ;
                }) ;
            }
        } ;
    }

}