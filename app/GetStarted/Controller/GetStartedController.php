<?php

Namespace Controller ;

class GetStartedController extends \Controller\Base {

    public function execute($pageVars) {
        $page_model = new \Model\GetStarted\PageModel() ;
        $page = $page_model->getPage() ;
        \ISOPHP\console::log('ICP', $page) ;
        \ISOPHP\js_core::$window->document->title = 'ISOPHP Getting Started - The Isomorphic PHP Framework' ;
        $res = new \Controller\Result() ;
        $res->page = $page ;
        $res->view = 'GetStarted.php' ;
        $res->type = 'view' ;
        $res->view_control = 'GetStarted' ;
        $res->post_template[] = $page_model->bindButtons() ;
        \ISOPHP\console::log('LandingPage Con', $res) ;
        return $res ;
    }

}