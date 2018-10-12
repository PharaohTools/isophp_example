/*
 * Demo of UI interaction with jQuery+Uniter
 *
 * MIT license.
 */
'use strict';

console.log('In prod app webpack js: 1a') ;

var jQuery = require('jquery'),
    php = require('phpjs'),
    file_index = require('./uniter_bundle/file_index.js') ;
    // electron = require('electron') ;
// var electron_remote = electron.remote ;
var electron_remote = null ;
var this_console = console ;
var this_window = window ;

const binderModule = require('./binder.php')();
//
// Hook stdout and stderr up to the console
binderModule.getStdout().on('data', function (data) {
    // console.info(data);
    document.body.insertAdjacentHTML('beforeEnd', data);
});
binderModule.getStderr().on('data', function (data) {
    console.warn(data);
});

// Run the PHP module, capture its result Closure
// and cast it to a JavaScript function we can call
const binder = binderModule.execute().getNative();



// Call the PHP closure function returned from binder.php, from JavaScript!
binder(jQuery, this_window, this_console, php, file_index, electron_remote);