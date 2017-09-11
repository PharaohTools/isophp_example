<?php

Namespace Controller ;

class DocsController extends \Controller\Base {

    public function execute($pageVars) {
        $page_model = new \Model\LandingPage\PageModel() ;
        $page = $page_model->getPage() ;
        \ISOPHP\js_core::$console->log('ICP', $page) ;
        \ISOPHP\js_core::$window->document->title = 'isophp - The Isomorphic PHP Framework' ;
        $res = new \Controller\Result() ;
        $res->page = $page ;
        $res->view = 'Docs.phptpl' ;
        $res->type = 'view' ;
        $res->view_control = 'Docs' ;
        $res->post_template[] = $page_model->bindButtons() ;
        \ISOPHP\js_core::$console->log('LandingPage Con', $res) ;
        return $res ;
    }

}