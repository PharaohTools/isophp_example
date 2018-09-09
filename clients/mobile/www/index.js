// deviceready Event Handler
//
// Bind any cordova events here. Common events are:
// 'pause', 'resume', etc.
function on_device_ready() {
//     console.log('device ready notify') ;
    'use strict';

    console.log('In prod app webpack js: 1a') ;

    var jQuery = require('jquery'),
        php = require('phpjs'),
        file_index = require('./uniter_bundle/file_index.js') ;

    var this_console = console ;
    var this_window = window ;

    const binderModule = require('./binder.php')();

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
    binder(jQuery, this_window, this_console, php, file_index);

    navigator.splashscreen.hide() ;

}

document.addEventListener("deviceready", on_device_ready, false);