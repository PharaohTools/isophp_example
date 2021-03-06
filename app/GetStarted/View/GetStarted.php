<?php

\Core\View::$template = function() {
    $configuration = new \Model\Configuration() ;
    $current_env_level = $configuration->variable('env_level') ;
    if ($current_env_level == null || $current_env_level == 'dev') {
        $current_env_level = 'development' ;
    }
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
								<!--<li><a href="http://twitter.com/isophp"><i class="icon-dribbble"></i></a></li>-->
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
								<li class="btn-cta">
									<span class="link link_menu link_get_started">
										Get Started
									</span>
								</li>
								<li>
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
		</header>

		<div id="fh5co-services" class="fh5co-bg-section">
			<div class="container">
				<div>
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>Try out the Demo Apps</h2>
						<p class="larger_paragraph">
						    We have demo versions of the ISO PHP Example Application, for every platform and device.
						    Try them out - Web (Here), Desktop or Mobile. Get a feel of how apps built with ISO PHP
						    will work for you.
						</p>
						<p class="larger_paragraph">
							The code for this Website is Isomorphic, and also our Demo application. Our demonstration
							application for our Framework is this Website. It works as a Website, as a Mobile
							application, and as a Desktop Application compatible with any major Platform. We have example
							versions for all the platforms.
						</p>
					</div>
					<div class="col-md-12 fh5co-heading">
					    <div class="panel panel-default col-md-4 text-center">
                            <div class="col-sm-12 text-center">
                            
                                <a href="http://repositories.internal.pharaohtools.com/index.php?control=BinaryServer&action=serve&item=iso_php_android_'.$current_env_level.'_application">
                                    Android Mobile Application
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <a href="http://repositories.internal.pharaohtools.com/index.php?control=BinaryServer&action=serve&item=iso_php_android_'.$current_env_level.'_application">
                                    <img class="download_app_logo" src="app/ISOPHPExample/Assets/images/app_logos/android-play-store.png" />
                                </a>
                            </div>
					    </div>
					    <div class="panel panel-default col-md-4 text-center">
                            <div class="col-sm-12 text-center">
                                <a href="http://repositories.internal.pharaohtools.com/index.php?control=BinaryServer&action=serve&item=iso_php_osx_'.$current_env_level.'_application">
                                    Apple MacOS Desktop Application
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <a href="http://repositories.internal.pharaohtools.com/index.php?control=BinaryServer&action=serve&item=iso_php_osx_'.$current_env_level.'_application"">
                                    <img class="download_app_logo" src="app/ISOPHPExample/Assets/images/app_logos/mac.png" />
                                </a>
                            </div>
					    </div>
					    <div class="panel panel-default col-md-4 text-center">
                            <div class="col-sm-12 text-center">
                                <a href="http://repositories.internal.pharaohtools.com/index.php?control=BinaryServer&action=serve&item=iso_php_ios_'.$current_env_level.'_application"">
                                    IPhone Mobile Application
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <a href="http://repositories.internal.pharaohtools.com/index.php?control=BinaryServer&action=serve&item=iso_php_ios_'.$current_env_level.'_application"">
                                    <img class="download_app_logo" src="app/ISOPHPExample/Assets/images/app_logos/iphone-app-store.png" />
                                </a>
                            </div>
					    </div>
					    <div class="panel panel-default col-md-4 text-center">
                            <div class="col-sm-12 text-center">
                                <a href="http://repositories.internal.pharaohtools.com/index.php?control=BinaryServer&action=serve&item=iso_php_linux_ia32_'.$current_env_level.'_application">
                                    Linux Desktop Application (32 Bit)
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <a href="http://repositories.internal.pharaohtools.com/index.php?control=BinaryServer&action=serve&item=iso_php_linux_ia32_'.$current_env_level.'_application">
                                    <img class="download_app_logo" src="app/ISOPHPExample/Assets/images/app_logos/linux.png" />
                                </a>
                            </div>
					    </div>
					    <div class="panel panel-default col-md-4 text-center">
                            <div class="col-sm-12 text-center">
                                <a href="http://repositories.internal.pharaohtools.com/index.php?control=BinaryServer&action=serve&item=iso_php_linux_x64_'.$current_env_level.'_application">
                                    Linux Desktop Application (64 Bit)
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <a href="http://repositories.internal.pharaohtools.com/index.php?control=BinaryServer&action=serve&item=iso_php_linux_x64_'.$current_env_level.'_application">
                                    <img class="download_app_logo" src="app/ISOPHPExample/Assets/images/app_logos/linux.png" />
                                </a>
                            </div>
					    </div>
					    <div class="panel panel-default col-md-4 text-center">
                            <div class="col-sm-12 text-center">
                                <a href="http://repositories.internal.pharaohtools.com/index.php?control=BinaryServer&action=serve&item=iso_php_windows_ia32_'.$current_env_level.'_application">
                                    Windows Desktop Application (32 Bit)
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <a href="http://repositories.internal.pharaohtools.com/index.php?control=BinaryServer&action=serve&item=iso_php_windows_ia32_'.$current_env_level.'_application">
                                    <img class="download_app_logo" src="app/ISOPHPExample/Assets/images/app_logos/windows-logo.png" />
                                </a>
                            </div>
					    </div>
					    <div class="panel panel-default col-md-4 text-center">
                            <div class="col-sm-12 text-center">
                                <a href="http://repositories.internal.pharaohtools.com/index.php?control=BinaryServer&action=serve&item=iso_php_windows_x64_'.$current_env_level.'_application">
                                    Windows Desktop Application (64 Bit)
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <a href="http://repositories.internal.pharaohtools.com/index.php?control=BinaryServer&action=serve&item=iso_php_windows_x64_'.$current_env_level.'_application">
                                    <img class="download_app_logo" src="app/ISOPHPExample/Assets/images/app_logos/windows-logo.png" />
                                </a>
                            </div>
					    </div>
					</div>
					
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>Watch us Build an Application</h2>
						<p class="larger_paragraph">
							We have a new Video of us building an ISOPHP Application in 5 minutes. Watch the video and
							code along yourself. See us walk you through how to build an ISO PHP Application.
						</p>
					</div>
					
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>Build an Application</h2>
						<p class="larger_paragraph">
							Have a read through our <span class="link link_standard link_docs">Documentation</span> section and start a
							new ISO PHP Application now in just a few commands.
						</p>
					</div>
					
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>See other Applications built with ISO PHP</h2>
						<p class="larger_paragraph">
							We have also built the Website <a class="link" href="http://www.theuniterleague.org.uk">The Uniter
							League</a>, a showcase of lot of Applications built with the use of
							<a class="link" href="https://github.com/asmblah/uniter">Uniter PHP</a class="link">. This includes
							<strong>every</strong> website or other Application that was built with
							<a class="link" href="http://www.isophp.org.uk">ISO PHP</a>, as
							<a class="link" href="https://github.com/asmblah/uniter">Uniter PHP</a> is the Core Transpilation
							Framework that makes ISO PHP possible.
						</p>
					</div>
					
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
							<li><a class="link_docs">Documentation</a></li>
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