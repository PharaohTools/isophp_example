<?php

\Core\View::$template = function() {
    $html = '

		<div class="fh5co-loader"></div>
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

		<header id="fh5co-header" class="fh5co-cover" role="banner" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="display-t">
							<div class="display-tc animate-box" data-animate-effect="fadeIn">
								<h1>Isomorphic <strong>PHP</strong></h1>
								<p>
									<a href="#" class="btn btn-primary btn-lg with-arrow">
										PHP <strong>client and server</strong> code
									</a>
								</p>
								<p>
									<a class="btn btn-primary btn-lg with-arrow">
										The Desktop Application
									</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div id="fh5co-services" class="fh5co-bg-section">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>How it Works</h2>
						<p class="larger_paragraph">
                            Write Code that can run on your
							server, in your browser, mobile, desktop or all of the above - seamlessly. An ISO PHP
							application while part of a website runs as both a server side web site and a single page
							application at the same time, from the same code. It also runs natively for Mobile/Desktop.
							The isophp Framework combines some of the latest and greatest Web technology available,
                            to bring you a PHP development platform like no other - the first truly Isomorphic PHP
                            Framework. Combining PHP Server Code with Client side Transpilation from
                            <a href="http://www.github.com/asmblah/uniter">Uniter PHP</a>, MVC Design Patterns, and
                            bonus libraries, we bring you Isomorphic PHP. 
						</p>
					</div>
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>Why its useful</h2>
						<p class="larger_paragraph">
							Lots of Web Applications use a PHP Back End with a Front End built in one of the Javascript
                            Frameworks for interface building. Now that we can build the same functionality
                            in the browser side with PHP that we can with the server side, we can build libraries and
                            Frameworks that support all the same clever development patterns and principles.
                            Think Angular PHP, React PHP for Front End, Meteor PHP or Derby PHP. We can have them all
                            working in browser, and it would be great to see those projects appear on the Internet
                            over the coming months. Isomorphic PHP is the first one off starting blocks I believe.
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="row services-inner">
							<div class="col-md-12 col-sm-12">
								<div class="feature-center animate-box" data-animate-effect="fadeIn">
									<span class="feature_icon icon">
										<i class="icon-air-play"></i>
									</span>
									<h2>Real Time Data</h2>
									<p>
										We aim to provide simple helper classes for dealing with Sockets on both the
										front and back end in PHP. The Chat application below is based on the
<a href="https://repositories.internal.pharaohtools.com/index.php?control=RepositoryHome&action=show&item=uniter_php_socketio">
                                            <strong>Uniter PHP Sockets Demo</strong>
                                        </a>. Use the Chat Application below to see an example of real time page updates
                                        using WebSockets. Open this page in multiple windows, browsers, or from multiple
                                        computers to see messages change in real time. Remember, everything in the front
                                        and back end is written in PHP.
									</p>


                                    <div class="col-sm-12">
                                        <h2 class="link_title">Real Time Chat Application</h2>
                                    </div>
                                    <div id="ChatApplicationWrapper" class="col-md-12 col-sm-12">
                                        <div class="col-md-12 col-sm-12">
                                            <ul id="messages" class="ChatMessages"></ul>
                                        </div>
                                        <div class="col-md-12 col-sm-12 applicationTitle">
                                            <div class="col-sm-4" id="choose_chat_name_wrapper">
                                                <span id="choose_chat_name" class="btn btn-default btn-lg">
                                                    1) Choose Name
                                                </span>
                                            </div>
                                            <div class="col-sm-4" id="choose_chat_msg_wrapper">
                                                <span id="choose_chat_msg" class="btn btn-default btn-lg disabled">
                                                    2) Choose Message
                                                </span>
                                            </div>
                                            <div class="col-sm-4" id="send_chat_msg_wrapper">
                                                <span id="send_chat_message" class="btn btn-default btn-lg disabled">
                                                    3) Send
                                                </span>
                                            </div>
                                        </div>
                                    </div>

								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="feature-center animate-box" data-animate-effect="fadeIn">
                                    <span class="feature_icon icon">
                                        <i class="icon-image"></i>
                                    </span>
                                    <h2>PHP Logic in HTML text/x-uniter tags</h2>
                                    <p>
                                        We introduce a new script type for the script tag, that will execute PHP
                                        Logic. This type is <strong>text/x-uniter</strong>, and can be used just as
                                        you would the traditional text/javascript type. All of the code
                                        below is executed in browser, written in PHP, and requires no PHP server.
                                    </p>
                                </div>
                                <div class="feature-center animate-box" data-animate-effect="fadeIn">
                                    <div class="col-sm-6">
                                        <pre class="CodeExample">&lt;p&gt;
&nbsp;&nbsp;&nbsp;&nbsp;Some content
&lt;/p&gt;
&lt;<span style="color: blue;">script</span> type="<span style="color: green;">text/x-uniter</span>"&gt;
&nbsp;&nbsp;&nbsp;&nbsp;echo "Hello from PHP Land&lt;br /&gt;";
&nbsp;&nbsp;&nbsp;&nbsp;var_dump("Hello again from PHP Land") ;
&lt;<span style="color: blue;">/script</span>&gt;</pre>
                                    </div>
                                    <div class="col-sm-6">
                                       <!-- <pre class="CodeExample"><iframe src="iframe.html"></iframe></pre> -->
                                    </div>
                                    <div class="col-sm-12">
                                        <h2 class="link_title">
                                            <a target="_blank" href="https://jsfiddle.net/sxqscesz/2/">
                                                <strong>
                                                    Click here to see it in a JSFiddle
                                                </strong>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
							</div>
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-12 feature-center animate-box" data-animate-effect="fadeIn">
									<span class="feature_icon icon">
										<div class="fullWidth">
                                            <i class="icon-laptop"></i>
                                        </div>
										<div class="fullWidth">
                                            <i class="icon-tablet"></i>
                                        </div>
									</span>
                                </div>
                                <div class="col-md-12 feature-center animate-box" data-animate-effect="fadeIn">
                                    <h2>Fully Responsive</h2>
                                    <p>
                                        The ISO PHP Framework includes <strong>Twitter Bootstrap</strong> by
                                        default, providing us smooth, responsive and highly structured interfaces.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="feature-center animate-box" data-animate-effect="fadeIn">
									<span class="feature_icon icon">
										<i class="icon-code"></i>
									</span>
                                    <h2>Automate Development and Deployment</h2>
                                    <p>
                                        We&apos;re all about simple, agile Web Apps. ISO PHP should involve Little to no
                                        learning or effort for a developer to begin writing code, while still providing
                                        the flexibility and power to build amazing at scale. Easy access and setup for
                                        development and testing environments, and equally easy to build and deploy out
                                        to the cloud or other servers.
                                    </p>
                                </div>
                            </div>
							<div class="col-md-12 col-sm-12">
								<div class="feature-center animate-box" data-animate-effect="fadeIn">
									<span class="feature_icon icon">
										<i class="icon-image"></i>
									</span>
									<h2>Front and Back End Request Handling</h2>
                                    <p>
                                        We want requests to be handled in browser, and where possible, a controller and
                                        view that are in front end code should handle the whole request. This will
                                        allow for much faster user interfaces, since we can change pages without server
                                        requests. All pages requests should still be handled by the server also when
                                        directly visiting URLs.
                                    </p>
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="feature-center animate-box" data-animate-effect="fadeIn">
									<span class="feature_icon icon">
										<i class="icon-image"></i>
									</span>
									<h2>Browser and Server View Rendering</h2>
                                    <p>
                                        Templates that have previously only been rendered on the server, can now be
                                        rendered directly in browser, without making further server requests. Load or
                                        Update pages far more quickly, search engine support/direct url requests by
                                        handing templating logic directly to the browser.
                                    </p>
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="feature-center animate-box" data-animate-effect="fadeIn">
									<span class="feature_icon icon">
										<i class="icon-image"></i>
									</span>
									<h2>View Bindings</h2>
                                    <div class="col-sm-12">
                                        <div class="col-sm-8">
                                            <p>
                                                Organize your code into Components with designer-friendly HTML templates.
                                                Easily specify live bindings between the view and model so that when data
                                                changes, the view updates instantly.
                                            </p>
                                        </div>
                                        <div class="col-sm-4">
                                            <img src="app/ISOPHPExample/Assets/images/coming-soon.png" class="coming_soon_banner" />
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-started">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>Lets Get Started</h2>
						<p>We&apos;re building the Framework and
			<a href="https://repositories.internal.pharaohtools.com/index.php?control=RepositoryHome&action=show&item=isophp">
						<strong>hosting it here</strong></a>. Soon, well build you guys a simple but highly functional
							Boilerplate that you can create <strong>Isomorphic</strong>, beautiful, smooth, fast Web
							Experiences with in minutes. For now, you can
	<a href="https://repositories.internal.pharaohtools.com/index.php?control=RepositoryHome&action=show&item=iso_php_example_application">
        <strong>download the code for this Website</strong></a>, which
							will include the parts as and when we make them. If youve made it this
							far, you know you want to...</p>
					</div>
				</div>
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center">
						<p>
			                <span class= href="/GetStarted" class="btn btn-default btn-lg">Get Started</a>
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
							<li><span class="link link_docs">Documentation</span></li>
							<li><a href="https://repositories.internal.pharaohtools.com/index.php?control=RepositoryReleases&action=show&item=isophp">Downloads</a></li>
							<li><a href="https://repositories.internal.pharaohtools.com/index.php?control=RepositoryHome&action=show&item=isophp">Source Code</a></li>
							<li><a href="https://github.com/asmblah/uniter">Uniter Github</a></li>
							<li><a href="https://github.com/PharaohTools">Pharaoh Tools Github</a></li>
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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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