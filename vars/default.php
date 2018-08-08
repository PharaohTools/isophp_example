<?php

$variables = (isset($params)) ? $params : null ;
$variables['application_slug'] = 'isophpexampleapplication' ;
$variables['description'] = 'The Example Application for the ISO PHP Framework' ;
$variables['subdomain'] = 'www' ;
$variables['webclientsubdomain'] = 'www' ;
$variables['server_subdomain'] = 'server' ;
$variables['domain'] = $variables['application_slug'].'.vm' ;
$variables['friendly_app_slug'] = 'ISOPHP' ;
$variables['desktop_app_slug'] = $variables['friendly_app_slug'] ;

if (isset($params['backendenv'])) {
    $variables['backendenv'] = $params['backendenv'] ;
    if (in_array($params['backendenv'], array('local', 'devcloud'))) {
        $variables['custom_branch'] = 'development' ;
    }
} else {
    $params['backendenv'] = 'local' ;
    $variables['backendenv'] = $params['backendenv'] ;
}