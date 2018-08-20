# The ISO PHP Website and Example Application

http://www.isophp.org.uk

The first true Isomorphic Framework entirely in PHP. Write applications for the Web or any Mobile or Desktop platform,
all using the same code, and written in HTML with PHP Front End Logic, and CSS. 


## Examples

Our main example is the ISO PHP Website, itself an ISO PHP Application running as a Web Client, and which includes
downadable examples of itself running as a Mobile Application for Android or iOS, and also as Desktop Applications for Linux, OSx
and Windows. Download and try any of the native Applications on the [Get Started](http://www.isophp.org.uk/GetStarted) page.

<img src="http://devcloud.isophp.org.uk/app/ISOPHPExample/Assets/images/example_images/web-client.png" alt="Web Client Application" style="width: 500px; height: 200px;" />
<div style="width:100%">
    <img src="http://devcloud.isophp.org.uk/app/ISOPHPExample/Assets/images/example_images/iphone-emulator-1-small.png" alt="IPhone Emulator 1" style="width: 200px; height: 200px;" />
    <img src="http://devcloud.isophp.org.uk/app/ISOPHPExample/Assets/images/example_images/iphone-emulator-2-small.png" alt="IPhone Emulator 2" style="width: 200px; height: 200px;" />
</div>


## Installation

More detailed instructions are available on our [Get Started](http://www.isophp.org.uk/GetStarted) page 

First, download the Pharaoh Tools installer from https://www.pharaohtools.com/install for your operating system. Unzip
the package and install Pharaoh Virtualize. It will automatically install any dependencies it needs.

Secondly, Download this repository. You can use the git clone link [here](https://source.internal.pharaohtools.com/index.php?control=RepositoryHome&action=show&item=iso_php_example_application)
to get the code.

If you're using Windows or OSX, open your PTV GUI application in your Start Menu/Applications folder. Click the button
marked "Start, Modify and Provision" by the "ISO PHP Example Application" entry.

If you're using Linux, open a terminal/command prompt in the directory you've just downloaded, and run...

``
ptvirtualize up now
``

... That's it. In a few minutes time, the Virtual Machine setup will be complete and the URLS in the below section will
be available.


## Usage

When you run the packaged Virtual Machine, the following URL's will become available.

[http://www.isophpexampleapplication.vm:8078](http://www.isophpexampleapplication.vm:8078)

Where your development version of the Web Client Application can be seen.

[http://build.isophpexampleapplication.vm:8078](http://build.isophpexampleapplication.vm:8078)

Where your associated build server can be seen. Use Build Server for tasks such as deploying the latest
Web Client code, Building an installable Mobile Package, building a Desktop Package, Rebuilding a Database,
Running Tests and more.


## Other Commands

To package your current Virtual Machine and push it to a Pharaoh Repositories Cloud

``
ptconfigure auto x --af=build/ptc/push-to-cloud.dsl.php --vars=vm.dsl.php
``

## Development

When you make changes to client side logic, you'll need to rebuild them. The build job mentioned above can
build the app for any platform for you.



Part of the Pharaoh Tools group


Kudos to

Uniter PHP

Cordova

Electron
