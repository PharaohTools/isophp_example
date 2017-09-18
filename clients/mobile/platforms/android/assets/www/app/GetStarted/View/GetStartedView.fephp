<?php

Namespace View ;

class GetStartedView extends \Core\View {

    public function display($data) {
//        \ISOPHP\js_core::$console->log('data', $data ) ;
        \ISOPHP\js_core::$window->document->title = 'Get Started' ;
        $tplfunc = \Core\View::$template ;
        $tpl_data = \Core\View::parse_view_template($tplfunc) ;
        \Core\View::execute_view_template('#template', $tpl_data) ;
        \ISOPHP\js_core::$console->log('davey ravey don') ;
        \ISOPHP\js_core::$console->log($tpl_data) ;
    }

}