RunCommand execute
  label "Remove the node modules directory"
  command "cd {{{ param::start-dir }}}/clients/web && sudo rm -rf node_modules"
  guess

RunCommand execute
  label "Run the Node NPM Install"
  command "cd {{{ param::start-dir }}}/clients/web && sudo npm install --no-bin-links"
  guess

RunCommand execute
  label "Run the Composer Install"
  command "cd {{{ param::start-dir }}}/clients/web && sudo composer install"
  guess

Logging log
  log-message "Our Custom Branch is : $$custom_branch"

Logging log
  log-message "Our Uniter build level is : $$uniter_build_level"

RunCommand execute
  label "Build to our Target Client - Uniter Development Settings"
  command "cd {{{ param::start-dir }}} && php build/build_to_uniter.php web fephp > /dev/null"
  guess
  not_when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "Build to our Target Client - Uniter Production Settings"
  command "cd {{{ param::start-dir }}} && php build/build_to_uniter.php web php > /dev/null"
  guess
  when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "(fephp ext) Add our back end application variable set, cp {{{ param::start-dir }}}/vars/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/web/core/ && mv {{{ param::start-dir }}}/clients/web/core/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/web/core/app_vars.fephp"
  command "cp {{{ param::start-dir }}}/vars/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/web/core/ && mv {{{ param::start-dir }}}/clients/web/core/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/web/core/app_vars.fephp"
  guess
  not_when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "(php ext) Add our back end application variable set, cp {{{ param::start-dir }}}/vars/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/web/core/ && mv {{{ param::start-dir }}}/clients/web/core/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/web/core/app_vars.php"
  command "cp {{{ param::start-dir }}}/vars/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/web/core/ && mv {{{ param::start-dir }}}/clients/web/core/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/web/core/app_vars.php"
  guess
  when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "(fephp ext) Always add our default application variable set, cp {{{ param::start-dir }}}/vars/default.php {{{ param::start-dir }}}/clients/web/core/default.fephp "
  command "cp {{{ param::start-dir }}}/vars/default.php {{{ param::start-dir }}}/clients/web/core/default.fephp "
  guess
  not_when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "(php ext) Always add our default application variable set, cp {{{ param::start-dir }}}/vars/default.php {{{ param::start-dir }}}/clients/web/core/default.php "
  command "cp {{{ param::start-dir }}}/vars/default.php {{{ param::start-dir }}}/clients/web/core/default.php "
  guess
  when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "Run the Development Node NPM Build"
  command "cd {{{ param::start-dir }}}/clients/web && sudo npm run build"
  guess
  not_when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "Ensure Webpack is executable"
  command "cd {{{ param::start-dir }}}/clients/web && chmod +x ./node_modules/webpack/bin/webpack.js"
  guess
  when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "Run the Production Node NPM Build"
  command "cd {{{ param::start-dir }}}/clients/web && sudo npm run build-production"
  guess
  when "{{{ param::uniter_build_level }}}"
  equals "production"

File create
  label "Add or Overwrite the Uniter build level to web server settings file"
  file "{{{ param::start-dir }}}/clients/web/uniter_build_level"
  data "{{{ param::uniter_build_level }}}"
  overwrite-existing

RunCommand execute
  command "cd {{{ param::start-dir }}}/clients/web && ptdeploy vhe add -yg --vhe-url=$$webclientsubdomain.$$domain --vhe-ip-port=0.0.0.0:80 --vhe-default-template-name=docroot-no-suffix"
  guess

RunCommand execute
  command "ptdeploy he add -yg --host-name={{{ var::webclientsubdomain }}}.$$domain"
  guess

RunCommand execute
  label "Enable Site and restart Apache"
  command "a2ensite {{{ var::webclientsubdomain }}}.$$domain.conf && service apache2 restart"
  guess

RunCommand execute
  command "ptdeploy apachecontrol restart -yg"
  guess