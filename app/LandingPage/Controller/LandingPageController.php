<?php

Namespace Controller ;

class LandingPageController extends \Controller\Base {

    public function execute($pageVars) {
        \ISOPHP\console::log('LandingPageController Execute Method', $pageVars) ;
        $page_model = new \Model\LandingPage\PageModel() ;
        $page = $page_model->getPage() ;
        $res = new \Controller\Result() ;
        $res->page = $page ;
        $res->view = 'LandingPage.php' ;
        $res->type = 'view' ;
        $res->view_control = 'LandingPage' ;
        $post_template = $res->post_template ;
        $post_template[] = $page_model->bindButtons() ;
        $post_template[] = $page_model->bindChatApplication() ;
        $res->post_template = $post_template ;
        \ISOPHP\console::log('LandingPage Con', $res) ;
        return $res ;
    }

}