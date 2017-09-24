# The ISO PHP Framework

http://www.isophp.org.uk

The first true Isomorphic Framework entirely in PHP. Write appications for the Server or any Mobile or Desktop platform,
all using the same code, and written in HTML with PHP Front End Logic, and CSS.


## Examples

Our main example is the ISO PHP Website, itself an ISO PHP Application running as a Web Client, and which includes
examples of itself running as a Mobile Application for Android  or iOS, and also as Desktop Applications for Linux, OSx
and Windows. Download and try any of the example Applications on the [Get Started](http://www.isophp.org.uk/GetStarted).


## Installation

To install the application locally, 
``
sudo ptconfigure auto x --af=build/development.dsl.php --start-dir=`pwd` --vars=vars/default.php
``

## Usage

When you run the packaged Virtual Machine, you'll see the development site www.isophp.tld.
Using Simply go to the URL www.isophp.tld


## Development

When you make changes to front end logic, you'll need to rebuild them. To
Rebuild any changes to your Uniter PHP Assets
``
ptconfigure auto x --af=build/build-assets.dsl.php --start-dir=`pwd` --vars=vars/default.php
``
To build for Desktop
``
ptconfigure auto x --af=build/build-assets.dsl.php --start-dir=`pwd` --vars=vars/default.php
``



Part of the Pharaoh Tools group of Websites

Built By Laughing Babies

Kudos to

Uniter PHP
Cordova
Electron
