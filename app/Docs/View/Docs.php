<?php

\Core\View::$template = function() {
    $html = '
    		
		<div class="fh5co-loader app-loader"></div>
		<div id="message_overlay"></div>

		<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-right">
							<ul class="fh5co-social">
								<li><a href="http://twitter.com/isophp"><i class="icon-twitter"></i></a></li>
								<li><a href="http://github.com/pharaohtools/isophp"><i class="icon-github"></i></a></li>
								<li><a href="http://facebook.com/isophp"><i class="icon-facebook"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
							<div id="fh5co-logo">
								<span class="link link_home">
									<img src="app/ISOPHPExample/Assets/images/tron_female_iso_logo.png" class="header_logo" />
								</span>
							</div>
						</div>
						<div class="col-xs-8 text-right menu-1">
							<ul>
								<li>
									<span class="link link_menu link_get_started">
										Get Started
									</span>
								</li>
								<li class="btn-cta">
									<span class="link link_menu link_docs">
										Docs
									</span>
								</li>
								<li class="has-dropdown">
									<a>Download</a>
									<ul class="dropdown">
										<li><a target="_blank" href="https://repositories.internal.pharaohtools.com/index.php?control=RepositoryReleases&action=show&item=isophp">Latest Package</a></li>
										<li><a target="_blank" href="https://repositories.internal.pharaohtools.com/index.php?control=RepositoryHome&action=show&item=isophp">Pharaoh Cloud</a></li>
										<li><a target="_blank" href="http://github.com/PharaohTools">Github</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</nav>

		<header id="fh5co-header" class="fh5co-cover header-narrow" role="banner" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="display-t">
						    &nbsp;
						</div>
					</div>
				</div>
			</div>
		</header> ';


    $html = $html . '

		<div id="fh5co-services" class="fh5co-bg-section docs_content">
			<div class="container">
				<div>
                    <div class="col-md-4 text-center">
                    </div>
                    <div class="col-md-4 text-center">
                        <span id="expand_all" class="btn btn-success">Expand All</span>
                        <span id="hide_all" class="btn btn-success">Hide All</span>
                    </div>
                    <div class="col-md-4 text-center">
                    </div>
				    <div class="slider_wrap">		    
                        <div class="col-md-12 text-center">
                            <div class="col-md-4 text-center">
                            </div>
                            <div class="col-md-4 section_title">
                                <span id="docs_toggle_slider_beginners" class="docs_toggle_slider docs_title" data-slide_target="beginners">For Beginners</span>
                                <span id="docs_toggle_slider_beginners_2" class="docs_toggle_slider slider_up" data-slide_target="beginners"></span>
                            </div>
                            <div class="col-md-4 text-center">
                            </div>                           
                        </div>
                        <div class="col-md-12 text-center slider_content slider_content_beginners">   
                            <div class="text-center single_issue">
                                <h3 id="create_isophp_project_slider" class="single_issue_toggle" data-slide_target="create_isophp_project">How do I create an ISOPHP Project?</h3>
                                <div id="create_isophp_project" class="text-center single_issue_content">                                
                                    <p class="larger_paragraph">
                                        You can create a new project at the command line with the following:
                                    </p>
                                    <pre> ptdeploy isophp create -yg </pre>
                                    <p>For a full list of available options during the creation process, use:</p>
                                    <pre> ptdeploy isophp help </pre>
                                    <p>
                                     The example below shows an example of the minimum required to create a new
                                     ISOPHP project in a single line:</p>
                                    <pre> ptdeploy isophp create -yg --email="example@isophp.org.uk" --web_link="http://isophp.example.com" --project_name="A New Example Project" --domainid="com.example.isophp" --author_name="Dave the Developer" --description="An Example of a new test Application being created" </pre>  
                                </div>
                            </div>
                            <div class="text-center single_issue">
                                <h3 id="run_isophp_project_slider" class="single_issue_toggle" data-slide_target="run_isophp_project">I want to run an ISOPHP Project</h3>
                                <div id="run_isophp_project" class="text-center single_issue_content">                                
                                    <p class="larger_paragraph">
                                        First you should use your command line to navigate to the directory your project is in.
                                        There is a development Virtual Machine that can build and run your application; with the Web 
                                        Server, Web Client, Mobile Emulators, Desktop Package and Mobile Application Package
                                        You can run the project locally with the following:
                                    </p>
                                    <pre>ptvirtualize up now --provision</pre>
                                    <p class="larger_paragraph">
                                        The above step should end with output like the following, which will detail where your new 
                                        applications are running on your machine.
                                    </p>
                                    <pre>
[Pharaoh Logging] [Up] Your ISOPHP Virtualize Box has been brought up. 

The Example Application for the ISO PHP Framework


You now have the following urls:


http://build.isophpexampleapplication.vm:8078/ - Build Server

http://www.isophpexampleapplication.vm:8078/ - Web Client Application

http://www.isophpexampleapplication.vm:8878/ - Mobile Application Web Emulator 

http://server.isophpexampleapplication.vm:8078/ - Web Server Application


******************************
Pharaoh Tools - Virtualize
******************************


Up Successful
In Pharaoh Virtualize Up
******************************
</pre>
                                </div>
                            </div>
                            <div class="col-md-ls text-center">
                                <h3 id="update_isophp_project_version_slider" class="single_issue_toggle" data-slide_target="update_isophp_project_version"> I want to update the ISOPHP version in my project?</h3>                                
                                <div id="update_isophp_project_version" class="text-center single_issue_content">  
                                    <p class="larger_paragraph">
                                        Navigate to the directory containing your project. Then,
                                        you can update your project at the command line with the following:
                                    </p>
                                    <pre> ptdeploy isophp update -yg </pre>
                                    For a full list of available options during the update process, use
                                    <pre> ptdeploy isophp help </pre>                
                                </div>                                
                            </div>
                        </div>
                    </div> ';


    $html = $html . '
                    
				    <div class="slider_wrap">
                        <div class="col-md-12 text-center">
                            <div class="col-md-4 text-center">
                            </div>
                            <div class="col-md-4 section_title">
                                <span id="docs_toggle_slider_devops" class="docs_toggle_slider docs_title">For DevOps</span>
                                <span id="docs_toggle_slider_devops_2" class="docs_toggle_slider slider_up" data-slide_target="devops"></span>
                            </div>
                            <div class="col-md-4 text-center">
                            </div>
                        </div>             
                        <div class="col-md-12 text-center slider_content slider_content_devops">   
                            <div class="text-center single_issue">
                                <h3 id="provision_running_machine_slider" class="single_issue_toggle" data-slide_target="provision_running_machine">How do I provision a running machine?</h3>                              
                                <div id="provision_running_machine" class="text-center single_issue_content">                                
                                    <p class="larger_paragraph">
                                        You can create a new project at the command line with the following:
                                    </p>
                                    <pre> ptvirualize pro now </pre>
                                    <p>For more detailed output during the provision process, use:</p>
                                    <pre> ptvirualize pro now --step-times --step-numbers </pre>
                                </div>
                            </div>
                        </div>
                    </div> ';


    $html = $html . '
                    
				    <div class="slider_wrap">
                        <div class="col-md-12 text-center">
                            <div class="col-md-4 text-center">
                            </div>
                            <div class="col-md-4 section_title">
                                <span id="docs_toggle_slider_testers" class="docs_toggle_slider docs_title">For Testers</span>
                                <span id="docs_toggle_slider_testers_2" class="docs_toggle_slider slider_up" data-slide_target="testers"></span>
                            </div>
                            <div class="col-md-4 text-center">
                            </div>
                        </div>                        
                        <div class="col-md-12 text-center slider_content slider_content_testers">   
                            <div class="text-center single_issue">
                                <h3 class="single_issue_toggle" data-slide_target="execute_functional_web_tests">How do I run the Functional tests for the Web Application?</h3>                            
                                <div id="execute_functional_web_tests" class="text-center single_issue_content">
                                    <p class="larger_paragraph">
                                        Open up your build server in the development Virtual Machine, at
                                        http://build.isophpexamplepplication.vm:8078. There, you&apos;ll find a build job
                                        named <strong>Functional Testing</strong>. When you run that build job, Your Behat
                                        Functional Test suite will execute against the Web Application.
                                    </p>
                                    <p class="larger_paragraph">
                                        Once your tests have run, you can view their output in friendly HTML format, by
                                        going to the home page of that build job, and clicking on the <strong>Behat HTML
                                        Reports</strong> feature.
                                    </p>
                                </div>
                            </div>
                            <div class="text-center single_issue">
                                <h3 class="single_issue_toggle" data-slide_target="execute_unit_tests_code">How do I run the Unit tests for the Application Code?</h3>                          
                                <div id="execute_unit_tests_code" class="text-center single_issue_content">
                                    <p class="larger_paragraph">
                                        Open up your build server in the development Virtual Machine, at
                                        http://build.isophpexamplepplication.vm:8078. There, you&apos;ll find a build job
                                        named <strong>Unit Testing</strong>. When you run that build job, Your PHPUnit
                                        Unit Test suite will execute against the Code in the app Directory.
                                    </p>
                                    <p class="larger_paragraph">
                                        Once your tests have run, you can view their output in friendly HTML format, by
                                        going to the home page of that build job, and clicking on the <strong>PHP Unit HTML
                                        Reports</strong> feature.
                                    </p>
                                </div>
                            </div>
                            <div class="text-center single_issue">
                                <h3 class="single_issue_toggle" data-slide_target="run_functional_desktop_mobile_tests">How do I run the Functional tests for the Desktop or Mobile Application?</h3>                          
                                <div id="run_functional_desktop_mobile_tests" class="text-center single_issue_content">
                                    <p class="larger_paragraph">
                                        We&apos;re currently working on integrating Behat inside the Virtual Machine with
                                        ChromeDriver for the Mobile Emulator and Electron/PHPDesktop. This functionality
                                        isn&apos;t currently available, but when we have it ready we&apos;ll update here.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> ';


    $html = $html . '

				</div>
			</div>
		</div>

		<footer id="fh5co-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">

					<div class="col-md-4 fh5co-widget">
						<h3>A Little About ISOPHP</h3>
						<p>
							This framework is built and brought to you by Pharaoh Tools, dedicated to building
							Enterprise Level development and infrastructure solutions native to the PHP Ecosystem.
						</p>
						<p>
							<a class="btn btn-primary btn-outline with-arrow" href="http://www.pharaohtools.com">
								Pharaoh Tools<i class="icon-arrow-right"></i>
							</a>
						</p>
					</div>

					<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">

					</div>

					<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
						<ul class="fh5co-footer-links">
							<li><a class="link_get_started">Get Started</a></li>
							<li><a href="https://repositories.internal.pharaohtools.com/index.php?control=RepositoryReleases&action=show&item=isophp">Downloads</a></li>
							<li><a href="https://repositories.internal.pharaohtools.com/index.php?control=RepositoryHome&action=show&item=isophp">Source Code</a></li>
							<li><a href="https://github.com/asmblah/uniter">Uniter Github</a></li>
							<li><a href="https://github.com/PharaohTools">Pharaoh Github</a></li>
						</ul>
					</div>

				</div>

				<div class="row copyright">
					<div class="col-md-12 text-center">
						<p>
							<small class="block">&copy; 2016 Pharaoh Tools. All Rights Reserved.</small>
						</p>
						<p>
							<ul class="fh5co-social-icons">
								<li><a href="http://twitter.com/pharaohtools"><i class="icon-twitter"></i></a></li>
								<li><a href="http://facebook.com/pharaohtools"><i class="icon-facebook"></i></a></li>
								<li><a href="http://linkedin.com/pharaohtools"><i class="icon-linkedin"></i></a></li>
							</ul>
						</p>
					</div>
				</div>

			</div>
		</footer>
		</div>

		<div class="gototop js-top">
			<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
		</div>

		<!-- jQuery -->
		<script src="app/ISOPHPExample/Assets/js/jquery.min.js"></script>
		<!-- jQuery Easing -->
		<script src="app/ISOPHPExample/Assets/js/jquery.easing.1.3.js"></script>

        <!-- jquery ui -->
        <link rel="stylesheet" href="app/ISOPHPExample/Assets/css/jquery-ui.css">
        <script src="app/ISOPHPExample/Assets/js/jquery-ui.js"></script>

		<!-- Bootstrap -->
		<script src="app/ISOPHPExample/Assets/js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="app/ISOPHPExample/Assets/js/jquery.waypoints.min.js"></script>
		<!-- Stellar Parallax -->
		<script src="app/ISOPHPExample/Assets/js/jquery.stellar.min.js"></script>
		<!-- Carousel -->
		<script src="app/ISOPHPExample/Assets/js/owl.carousel.min.js"></script>

        <script src="app/ISOPHPExample/Assets/js/socket.io-1.2.0.js"></script>

		 <!--Main JS-->
		<script src="app/ISOPHPExample/Assets/js/main.js"></script>

		<!-- Site style  -->
		<link rel="stylesheet" href="app/ISOPHPExample/Assets/fephp/css/fephp.css">
		<link rel="stylesheet" href="app/ISOPHPExample/Assets/css/site.css">    
    
    
    ' ;
    return $html ;

} ;

/*
 * 					<div class="col-md-8 col-md-offset-2 text-center">
						<h2>I want to add an icon set across devices and platforms in my project?</h2>
						<p class="larger_paragraph">
							clients/mobile/res/icon/android/
                            clients/mobile/res/icon/ios/
                            clients/desktop/icon/
                            clients/web/icon/
						</p>
						<pre>ptdeploy isophp help </pre>
					</div>
 */