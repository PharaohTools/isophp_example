<?php

Namespace Controller ;

class LandingPageController extends \Controller\Base {

    public function execute($pageVars) {
        $page_model = new \Model\LandingPage\PageModel() ;
        $page = $page_model->getPage() ;
        \ISOPHP\console::log('ICP', $page) ;
//        \ISOPHP\js_core::$window->document->title = 'ISOPHP Home - The Isomorphic PHP Framework' ;
        $res = new \Controller\Result() ;
        $res->page = $page ;
        $res->view = 'LandingPage.phptpl' ;
        $res->type = 'view' ;
        $res->view_control = 'LandingPage' ;
        $res->post_template[] = $page_model->bindButtons() ;
        $res->post_template[] = $page_model->bindChatApplication() ;
        \ISOPHP\console::log('LandingPage Con', $res) ;
        return $res ;
    }

}