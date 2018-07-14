/*
 * Demo of UI interaction with jQuery+Uniter
 *
 * MIT license.
 */
'use strict';

console.log('In prod app webpack js: 1a') ;

var $ = require('jquery'),
    php = require('phpjs'),
    hasOwn = {}.hasOwnProperty,
    uniter = require('uniter'),
    phpEngine = uniter.createEngine('PHP'),
    file_data = require('./uniter_bundle/file_data.js'),
    app_data = require('./uniter_bundle/app_file_data.js'),
    core_data = require('./uniter_bundle/core_file_data.js'),
    file_index = require('./uniter_bundle/file_index.js') ;

// console.log('In prod app webpack js: 1b - Superrequire', file_index) ;
//
// var files = globby.sync([
//     // __dirname + '/app/*.php',
//     // __dirname + '/app/*/*.php',
//     // __dirname + '/app/*/*/*.php',
//     // __dirname + '/app/*/*/*.php',
//     // __dirname + '/app/*/View/*.php',
//     // __dirname + '/app/*/View/desktop/*.phptpl',
//     // __dirname + '/app/*/View/mobile/*.phptpl',
//     // __dirname + '/app/*/View/web/*.phptpl',
//     // __dirname + '/app/*/View/*.phptpl',
//     __dirname + '/core/*.php'
//     // ,
//     // __dirname + '/core/*/*.php',
//     // __dirname + '/core/*/*/*.php',
//     // __dirname + '/core/*/*/*/*.php'
// ]) ;
//
//
// console.log("Super require loop\n") ;
// files.forEach(function (filePath) {
//     var short_path = filePath.replace(root, '') ;
//     console.log(short_path) ;
//     var php_requires ;
//     php_requires[short_path] = require('./'+short_path);
// });
//

//
// console.log("Single requires loop\n") ;
// var indexfile = require('./core/index.php');
// var initfile = require('./core/init.php');
// var isophpfile = require('./core/isophp.php');





console.log('In prod app webpack js: 1bx file index: ', file_index) ;
console.log('In prod app webpack js: 1by file data: ', file_data) ;
console.log('In prod app webpack js: 1by core data: ', core_data) ;
console.log('In prod app webpack js: 1by app data: ', app_data) ;

var file_require_string = 'require("/core/constants.php") ; ' ;
file_require_string += 'require("/core/app_vars.php") ; ' ;
file_require_string += 'require("/core/isophp.php") ; ' ;
file_require_string += '\\ISOPHP\\core::$php = $php ; ' ;
file_require_string += '\\ISOPHP\\core::$file_index = $file_index ; ' ;
file_require_string += 'require("/core/init.php") ; ' ;
file_require_string += 'require("/core/WindowMessage.php") ; ' ;
file_require_string += 'require("/core/bootstrap.php") ; ' ;
file_require_string += 'require("/core/index.php") ; ' ;


function getFileData(path) {
    if (path.charAt(0) === '/') {
        path = path.substring(1);
    }
    console.log('In prod app webpack js: Path is: ' + path) ;
    // console.log('In prod app js: Returning' + file_data[path]) ;

    // var last_path_index = path.lastIndexOf('/');
    // var path_before_file = path.substring(last_path_index);
    // var full_filename = path.split('/').pop();
    // var filename_pieces = full_filename.split('.') ;
    // var filename_suffix = filename_pieces[1] ;

path = path.replace("fephp", "php") ;
    // console.log('filename pieces',full_filename, filename_pieces, filename_suffix, path_before_file, path_before_file + filename_pieces[0]) ;



    if (core_data[path] !== undefined) {
        console.log('Core Data: ', path) ;
        return core_data[path] ;
    } else if (app_data[path] !== undefined) {
        console.log('App Data: ', path) ;
        return app_data[path] ;
    } else if (file_data[path] !== undefined) {
        console.log('File Data: ', path) ;
        return file_data[path] ;
    } else {
        return null ;
    }

}

// Set up a PHP module loader
phpEngine.configure({
    include: function (path, promise) {
        var fd = getFileData(path) ;
        promise.resolve(fd);
    }
});

var this_console = console ;
var this_window = window ;
var jQuery = $ ;

phpEngine.expose(jQuery, 'jQuery');
phpEngine.expose(this_window, 'window');
phpEngine.expose(this_console, 'console');
phpEngine.expose(php, 'php');
phpEngine.expose(file_index, 'file_index');
// phpEngine.expose(object_to_array, 'object_to_array');

// Write content HTML to the DOM
phpEngine.getStdout().on('data', function (data) {
    document.body.insertAdjacentHTML('beforeEnd', data);
});

// this is looking in the filedata file which is all the php compressed in a key value with path keys
var php_code_string = '<?php '+file_require_string+' ?>' ;
console.log(php_code_string) ;

// Go!
phpEngine.execute(php_code_string).fail(function (error) {
    console.warn('ERROR: ' + error.toString());
});

[].forEach.call(document.querySelectorAll('script[type="text/x-uniter"]'), function (script) {
    console.log('found this ' + script.textContent)  ;
    phpEngine.execute('<?php ' + script.textContent).fail(function (error) {
        console.error(error);
    });
});
