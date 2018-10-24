<?php

Namespace Model\Docs ;

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
                \ISOPHP\console::log('Binding buttons for Documents page') ;
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
                $hide_all = $jQuery('#hide_all') ;
                $hide_all->on('click', function () use ($jQuery) {
                    $slider_content_divs = $jQuery('.slider_content') ;
                    \ISOPHP\console::log('Hide all page') ;
                    $slider_content_divs->css("display", 'none') ;
                }) ;
                $expand_all = $jQuery('#expand_all') ;
                $expand_all->on('click', function () use ($jQuery) {
                    $slider_content_divs = $jQuery('.slider_content') ;
                    \ISOPHP\console::log('Expand all page') ;
                    $slider_content_divs->css("display", 'block') ;
                }) ;
                $one_slider = $jQuery('.docs_toggle_slider') ;
                $one_slider->on('click', function ($jqThis) use ($jQuery, $one_slider) {
                    \ISOPHP\console::log('sliding one') ;
                    $this_id = $jqThis->currentTarget->id ;
                    $source_jq_object = $jQuery('#'.$this_id) ;
                    $target_string = $source_jq_object->attr('data-slide_target') ;
                    $slider_target = $jQuery('.slider_content_'.$target_string) ;
                    $target_display_value = $slider_target->css('display') ;
//                    \ISOPHP\console::log('target display', $target_display_value) ;
                    $is_displayed = false ;
                    if ($target_display_value === 'block') {
                        $is_displayed = true ;
                    }
                    if ($is_displayed === true) {
//                        \ISOPHP\console::log('Hide slider content '.$target_string) ;
                        $slider_target->css("display", 'false') ;
                        if ($source_jq_object->hasClass('slider_down')) {
                            $source_jq_object->removeClass('slider_down') ;
                            $source_jq_object->addClass('slider_up') ;
                        }
                    }
                    if ($is_displayed === false) {
//                        \ISOPHP\console::log('Expand slider content '.$target_string) ;
                        $slider_target->css("display", 'block') ;
                        if ($source_jq_object->hasClass('slider_up')) {
                            $source_jq_object->removeClass('slider_up') ;
                            $source_jq_object->addClass('slider_down') ;
                        }
                    }
                }) ;
                $one_sub_slider = $jQuery('.single_issue_toggle') ;
                $one_sub_slider->on('click', function ($jqThis) use ($jQuery, $one_sub_slider) {
                    \ISOPHP\console::log('sliding one sub') ;
                    $this_id = $jqThis->currentTarget->id ;
                    $source_jq_object = $jQuery('#'.$this_id) ;
                    $target_string = $source_jq_object->attr('data-slide_target') ;
                    $is_displayed = false ;
                    $slider_target = $jQuery('#'.$target_string) ;
                    $target_display_value = $slider_target->css('display') ;
                    \ISOPHP\console::log('target display', $target_display_value) ;
                    if ($target_display_value === 'block') {
                        $is_displayed = true ;
                    }
                    if ($is_displayed === true) {
                        \ISOPHP\console::log('Hide slider content '.$target_string) ;
                        $slider_target->css("display", 'false') ;
                        $source_jq_object->removeClass('slider_down') ;
                        $source_jq_object->addClass('slider_up') ;
                    }
                    if ($is_displayed === false) {
                        \ISOPHP\console::log('Expand slider content '.$target_string) ;
                        $slider_target->css("display", 'block') ;
                        $source_jq_object->removeClass('slider_up') ;
                        $source_jq_object->addClass('slider_down') ;
                    }
                }) ;

            }
        } ;
    }

}