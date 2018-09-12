<?php
include (__DIR__.DIRECTORY_SEPARATOR.'default.php') ;
$variables['vmname'] = $variables['application_slug'] ;
$variables['domain'] = $variables['vmname'].'.vm' ;
$variables['desktop_app_slug'] = $variables['vmname'] ;
$variables['android_shell_script'] = 'vm-android-shell.bash' ;
$variables['custom_branch'] = 'production' ;
$variables['env_level'] = 'production' ;
$variables['description_vm_image'] = 'The PTV VM Image for '.$variables['description'] ;

$variables['backendenv'] = 'production' ;
$variables['custom_branch'] = $variables['backendenv'] ;

$variables['pharaoh_repo_auth_user'] = '' ;
$variables['pharaoh_repo_auth_pw'] = '' ;
$variables['pharaoh_repo_auth_url'] = '' ;

# Developer build (Virtual Machine) can use a back end of either local (VM) or devcloud
//var_dump('vm vars', __DIR__.DIRECTORY_SEPARATOR.'default.php', $variables) ;
$variables['uniter_build_level'] = 'production' ;