/*
 * Demo of UI interaction with jQuery+Uniter
 *
 * MIT license.
 */
'use strict';

console.log('Start app js') ;

var jq = require('jquery') ,
    php = require('phpjs') ,
    file_data = require('./www/uniter_bundle/file_data.js') ,
    file_index = require('./www/uniter_bundle/file_index.js') ,
    hasOwn = {}.hasOwnProperty ,
    uniter = require('uniter') ,
    phpEngine = uniter.createEngine('PHP') ;

var file_require_string = 'require("/core/constants.fephp") ; ' ;
file_require_string += 'require("/core/app_vars.fephp") ; ' ;
file_require_string += 'require("/core/isophp.fephp") ; ' ;
file_require_string += '\\ISOPHP\\cordova_core::$cordova = $cordova ; ' ;
file_require_string += '\\ISOPHP\\cordova_core::$navigator = $navigator ; ' ;
file_require_string += '\\ISOPHP\\core::$php = $php ; ' ;
file_require_string += 'require("/core/init.fephp") ; ' ;
file_require_string += 'require("/core/WindowMessage.fephp") ; ' ;
file_require_string += 'require("/core/bootstrap.fephp") ; ' ;
file_require_string += 'require("/core/index.fephp") ; ' ;

console.log('mainfiles app js', 'file data', file_data) ;
// console.log('mainfiles app js', 'file data', file_data) ;

function getFileData(path) {

    var pref_path = path.substr(1);
    console.log('gfd find path: ', pref_path) ;
    if (pref_path === 'uniter_bundle/file_index.fephp') {
        console.log('app js loading file index: ', file_index) ;
        var file_string = "" ;
        file_string += '<?php\n\n$file_index = array(\n' ;
        file_index.forEach(function (one_short_path) {
            file_string += '\t"' + one_short_path + '",\n' ;
        }) ;
        file_string += '\n) ;' ;
        file_string += '\n\n\\ISOPHP\\core::$file_index = $file_index ;\n' ;
        console.log('app js parsed file index: ', file_string) ;
        return file_string ;
    } else {
        if (!hasOwn.call(file_data, pref_path)) {
            throw new Error('Unknown file "' + pref_path + '"');
        }
        // console.log('gfd return: ', file_data[pref_path]) ;
        return file_data[pref_path];
    }

}

// Set up a PHP module loader
phpEngine.configure({
    include: function (path, promise) {
        promise.resolve(getFileData(path));
        // promise.reject(console.log("Unable to locate file : " + path));
    }
});

console.log('engine configure app js') ;

var this_console = console ;
var this_window = window ;

console.log('engine expose start app js') ;
console.log('cordova vars', cordova, navigator) ;

phpEngine.expose(jq, 'jQuery');
phpEngine.expose(php, 'php');
phpEngine.expose(this_window, 'window');
phpEngine.expose(this_console, 'console');
phpEngine.expose(window.app, 'app');
phpEngine.expose(cordova, 'cordova');
phpEngine.expose(navigator, 'navigator');

console.log('engine expose end app js') ;

// Write content HTML to the DOM
phpEngine.getStdout().on('data', function (data) {
    document.body.insertAdjacentHTML('beforeEnd', data);
});

// this is looking in the filedata file which is all the php compressed in a key value with path keys
var php_code_string = '<?php '+file_require_string+' ?>' ;
console.log('code string', php_code_string) ;

// Go!
phpEngine.execute(php_code_string).fail(function (error) {
    console.warn('ERROR: ' + error.toString());
});

console.log('find tags') ;

[].forEach.call(document.querySelectorAll('script[type="text/x-uniter"]'), function (script) {
    console.log('found this ' + script.textContent)  ;
    phpEngine.execute('<?php ' + script.textContent).fail(function (error) {
        console.error(error);
    });
});
console.log('End app js') ;
