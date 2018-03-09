# The ISO PHP Website and Example Application

http://www.isophp.org.uk

The first true Isomorphic Framework entirely in PHP. Write applications for the Web or any Mobile or Desktop platform,
all using the same code, and written in HTML with PHP Front End Logic, and CSS. 


## Examples

Our main example is the ISO PHP Website, itself an ISO PHP Application running as a Web Client, and which includes
examples of itself running as a Mobile Application for Android  or iOS, and also as Desktop Applications for Linux, OSx
and Windows. Download and try any of the native Applications on the [Get Started](http://www.isophp.org.uk/GetStarted).

<img src="http://devcloud.isophp.org.uk/app/ISOPHPExample/Assets/images/example_images/web-client.png" alt="Web Client Application" style="width: 500px; height: 200px;" />
<img src="http://devcloud.isophp.org.uk/app/ISOPHPExample/Assets/images/example_images/iphone-emulator-1.png" alt="IPhone Emulator 1" style="width: 200px; height: 200px;" />
<img src="http://devcloud.isophp.org.uk/app/ISOPHPExample/Assets/images/example_images/iphone-emulator-2.png" alt="IPhone Emulator 2" style="width: 200px; height: 200px;" />


## Installation

To install and run this application locally, we'll be using Pharaoh Tools

First, download the Pharaoh Tools installer from https://www.pharaohtools.com/install for your operating system. Unzip
the package and install Pharaoh Virtualize. It will automatically install any dependencies it needs.

Secondly, Download this repository. You can use the git clone link [here](https://source.internal.pharaohtools.com/index.php?control=RepositoryHome&action=show&item=iso_php_example_application)
to get the code.



Third, open a terminal/command prompt in the directory you've just downloaded, and run...

``
ptvirtualize up now
``

... That's it. In a few minutes time, the URLS in the below section will be available


## Usage

When you run the packaged Virtual Machine, you'll see the development site www.isophp.tld.
Using Simply go to the URL www.isophp.tld

``
http://www.isophpexampleapplication.vm:8078
``
Where your development version of the Web Client Application can be seen.


``
http://build.isophpexampleapplication.vm:8078 
``
Where your associated build server can be seen. Use Build Server for tasks such as deploying the latest
Web Client code, Building an installable Mobile Package, building a Desktop Package, Rebuilding a Database,
Running Tests and more.



## Development

When you make changes to front end logic, you'll need to rebuild them. To
Rebuild any changes to your Uniter PHP Assets
``
ptconfigure auto x --af=build/build-assets.dsl.php --start-dir=`pwd` --vars=vars/default.php
``
To build for Desktop
``
ptconfigure auto x --af=build/build-desktop-application.dsl.php --start-dir=`pwd` --vars=vars/vm.php --include_linux
ptconfigure auto x --af=build/build-desktop-application.dsl.php --start-dir=`pwd` --vars=vars/vm.php --include_osx
ptconfigure auto x --af=build/build-desktop-application.dsl.php --start-dir=`pwd` --vars=vars/vm.php --include_windows
``



Part of the Pharaoh Tools group of Websites

Built By Laughing Babies

Kudos to

Uniter PHP

Cordova

Electron
