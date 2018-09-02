/*
 * Demo of packaging PHP files up with Browserify+Uniter
 *
 * MIT license.
 */
    'use strict';

console.log("Filesystem building") ;
var fstype = process.argv[2] ;
if (fstype === 'production') {
    var extension = 'php' ;
} else {
    var extension = 'fephp' ;
}

var fs = require('fs'),
    globby = require('globby'),
    path = require('path'),
    files = globby.sync([
        __dirname + '/app/*/View/desktop/*.phptpl',
        __dirname + '/app/*/View/mobile/*.phptpl',
        __dirname + '/app/*/View/web/*.phptpl',
        __dirname + '/app/*/View/*.phptpl',
        __dirname + '/app/*.' + extension ,
        __dirname + '/app/*/*.' + extension ,
        __dirname + '/app/*/*/*.' + extension ,
        __dirname + '/app/*/*/*.' + extension ,
        __dirname + '/app/*/View/*.' + extension ,
        __dirname + '/core/*.' + extension ,
        __dirname + '/core/*/*.' + extension ,
        __dirname + '/core/*/*/*.' + extension ,
        __dirname + '/core/*/*/*/*.' + extension
    ]),
    app_files = globby.sync([
        __dirname + '/app/*/View/desktop/*.phptpl',
        __dirname + '/app/*/View/mobile/*.phptpl',
        __dirname + '/app/*/View/web/*.phptpl',
        __dirname + '/app/*/View/*.phptpl',
        __dirname + '/app/*.' + extension ,
        __dirname + '/app/*/*.' + extension ,
        __dirname + '/app/*/*/*.' + extension ,
        __dirname + '/app/*/*/*.' + extension ,
        __dirname + '/app/*/View/*.' + extension
    ]),
    core_files = globby.sync([
        __dirname + '/core/*.' + extension ,
        __dirname + '/core/*/*.' + extension ,
        __dirname + '/core/*/*/*.' + extension ,
        __dirname + '/core/*/*/*/*.' + extension
    ]),
    file_index = [],
    file_data = {},
    core_file_index = [],
    core_file_data = {},
    app_file_index = [],
    app_file_data = {},
    root = __dirname + '/' ;

console.log("filesData\n") ;
files.forEach(function (filePath) {
    var short_path = filePath.replace(root, '') ;
    console.log(short_path) ;
    file_data[short_path] = fs.readFileSync(filePath).toString() ;
    file_index.push(short_path) ;
});
core_files.forEach(function (filePath) {
    var short_path = filePath.replace(root, '') ;
    console.log(short_path) ;
    core_file_data[short_path] = fs.readFileSync(filePath).toString() ;
    core_file_index.push(short_path) ;
});
app_files.forEach(function (filePath) {
    var short_path = filePath.replace(root, '') ;
    console.log(short_path) ;
    app_file_data[short_path] = fs.readFileSync(filePath).toString() ;
    app_file_index.push(short_path) ;
});


console.log("\n\napp_data\n", JSON.stringify(app_file_data)) ;
fs.writeFileSync(
    __dirname + '/uniter_bundle/app_file_data.js',
    'module.exports = ' + JSON.stringify(app_file_data) + ';'
);
console.log("\n\ncore_data\n", JSON.stringify(core_file_data)) ;
fs.writeFileSync(
    __dirname + '/uniter_bundle/core_file_data.js',
    'module.exports = ' + JSON.stringify(core_file_data) + ';'
);
console.log("\n\nfile_data\n", JSON.stringify(file_data)) ;
fs.writeFileSync(
    __dirname + '/uniter_bundle/file_data.js',
    'module.exports = ' + JSON.stringify(file_data) + ';'
);
console.log("\n\nfile_index\n", JSON.stringify(file_index)) ;
fs.writeFileSync(
    __dirname + '/uniter_bundle/file_index.js',
    'module.exports = ' + JSON.stringify(file_index) + ' ;'
);


// File index
console.log("\n\nfile_index\n", JSON.stringify(file_index)) ;
var file_string = '' ;
file_string += '<?php\n\n$file_index = array(\n' ;
file_index.forEach(function (one_short_path) {
    file_string += '\t"' + one_short_path + '",\n' ;
}) ;
file_string += '\n) ;' ;
file_string += '\n\n\\ISOPHP\\core::$file_index = $file_index ;\n' ;
fs.writeFileSync(
    __dirname + '/uniter_bundle/file_index.fephp',
    file_string
);
fs.writeFileSync(
    __dirname + '/uniter_bundle/file_index.php',
    file_string
);
