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

if (ISOPHP_EXECUTION_ENVIRONMENT == 'UNITER') {
    \ISOPHP\js_core::$console->log('before loop') ;
    \ISOPHP\js_core::$console->log($variables) ;
    $temp_config = \Model\Configuration::$config ;
    foreach ($variables as $this_key => $this_value) {
        \ISOPHP\js_core::$console->log('this key is ' . $this_key) ;
        \ISOPHP\js_core::$console->log('this value is ' . $this_value) ;
        \ISOPHP\js_core::$console->log('config is ', $temp_config) ;
        $temp_config[$this_key] = $this_value ;
    }
    \Model\Configuration::$config = $temp_config ;
    \ISOPHP\js_core::$console->log('registry dump') ;
    \ISOPHP\js_core::$console->log(\Model\Configuration::$config) ;
}
