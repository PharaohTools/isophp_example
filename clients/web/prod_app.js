//
// 'use strict';

var $ = require('jquery') ;
console.log('In prod app js: 1a', $) ;
var php = require('phpjs') ;
console.log('In prod app js: 1b', php) ;
var file_index = require('./uniter_bundle/file_index.js') ;
console.log('In prod app js: 1c', file_index) ;
var file_data = require('./uniter_bundle/file_data.js') ;
console.log('In prod app js: 1d', file_data) ;

console.log('In prod app js: 2') ;
// Fetch the PHP module (but don't actually run it yet)
const binderModule = require('./binder.php')();

console.log('In prod app js: 3') ;
function getFileData(path) {
    console.log('In prod app js: Returning') ;
    return file_data[path] ;
}

console.log('In prod app js: 4') ;
// Set up a PHP module loader
binderModule.configure({
    include: function (path, promise) {
        var fd = getFileData(path) ;
        promise.resolve(fd);
    }
});
console.log('In prod app js: 5') ;

var this_console = console ;
var this_window = window ;
var jQuery = $ ;

console.log('In prod app js: 6') ;
binderModule.expose(jQuery, 'jQuery');
binderModule.expose(this_window, 'window');
binderModule.expose(this_console, 'console');
binderModule.expose(php, 'php');
binderModule.expose(file_index, 'file_index');


console.log('In prod app js: 7a') ;

// Hook stdout and stderr up to the console
binderModule.getStdout().on('data', function (data) {
    console.info(data);
});

console.log('In prod app js: 7b') ;

binderModule.getStderr().on('data', function (data) {
    console.warn(data);
});

console.log('In prod app js: 7c') ;

// Run the PHP module, capture its result Closure
// and cast it to a JavaScript function we can call
const binder = binderModule.execute().getNative();

console.log('In prod app js: 7d') ;
// Call the PHP closure function returned from binder.php, from JavaScript!
binder(document);

console.log('In prod app js: 10') ;
// [].forEach.call(document.querySelectorAll('script[type="text/x-uniter"]'), function (script) {
//     console.log('found this ' + script.textContent)  ;
//     phpEngine.execute('<?php ' + script.textContent).fail(function (error) {
//         console.error(error);
//     });
// });

console.log('In prod app js: 11') ;
