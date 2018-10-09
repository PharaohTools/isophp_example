RunCommand execute
  label "Empty the Node NPM Modules"
  command "cd {{{ param::start-dir }}}/clients/mobile && rm -rf node_modules/*"
  guess

RunCommand execute
  label "Update NPM"
  command "npm cache clean -f && npm install -g n & n stable"
  ignore_errors
  guess

RunCommand execute
  label "Install Global NPM Packages"
  command "npm install -g uglify-js browserify cordova@7.1.0 || true"
  ignore_errors
  guess

RunCommand execute
  label "Run the Node NPM Install"
  command "cd {{{ param::start-dir }}}/clients/mobile && npm install --no-bin-links"
  guess

RunCommand execute
  label "Run the Composer Install"
  command "cd {{{ param::start-dir }}}/clients/mobile && composer install"
  guess

Logging log
  log-message "Our Custom Branch is : $$custom_branch"

Logging log
  log-message "Our Uniter build level is : $$uniter_build_level"

RunCommand execute
  label "Build to our Target Client - Uniter Development Settings"
  command "cd {{{ param::start-dir }}} && php build/build_to_uniter.php mobile fephp > /dev/null"
  guess
  not_when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "Build to our Target Client - Uniter Production Settings"
  command "cd {{{ param::start-dir }}} && php build/build_to_uniter.php mobile php > /dev/null"
  guess
  when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "(fephp ext) Add our back end application variable set, cp {{{ param::start-dir }}}/vars/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/mobile/www/core/ && mv {{{ param::start-dir }}}/clients/mobile/www/core/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/mobile/www/core/app_vars.fephp"
  command "cp {{{ param::start-dir }}}/vars/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/mobile/www/core/ && mv {{{ param::start-dir }}}/clients/mobile/www/core/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/mobile/www/core/app_vars.fephp"
  guess
  not_when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "(php ext) Add our back end application variable set, cp {{{ param::start-dir }}}/vars/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/mobile/www/core/ && mv {{{ param::start-dir }}}/clients/mobile/www/core/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/mobile/www/core/app_vars.php"
  command "cp {{{ param::start-dir }}}/vars/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/mobile/www/core/ && mv {{{ param::start-dir }}}/clients/mobile/www/core/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/mobile/www/core/app_vars.php"
  guess
  when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "(fephp ext) Always add our default application variable set, cp {{{ param::start-dir }}}/vars/default.php {{{ param::start-dir }}}/clients/mobile/www/core/default.fephp "
  command "cp {{{ param::start-dir }}}/vars/default.php {{{ param::start-dir }}}/clients/mobile/www/core/default.fephp "
  guess
  not_when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "(php ext) Always add our default application variable set, cp {{{ param::start-dir }}}/vars/default.php {{{ param::start-dir }}}/clients/mobile/www/core/default.php "
  command "cp {{{ param::start-dir }}}/vars/default.php {{{ param::start-dir }}}/clients/mobile/www/core/default.php "
  guess
  when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "Run the Development Node NPM Build"
  command "cd {{{ param::start-dir }}}/clients/mobile && sudo npm run build-development"
  guess
  not_when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "Ensure Webpack is executable"
  command "cd {{{ param::start-dir }}}/clients/mobile && chmod +x ./node_modules/webpack/bin/webpack.js"
  guess
  when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "Run the Production Node NPM Build"
  command "cd {{{ param::start-dir }}}/clients/mobile && sudo npm run build-production"
  guess
  when "{{{ param::uniter_build_level }}}"
  equals "production"

File create
  label "Add or Overwrite the Uniter build level to web server settings file"
  file "{{{ param::start-dir }}}/clients/web/uniter_build_level"
  data "{{{ param::uniter_build_level }}}"
  overwrite-existing

RunCommand execute
  label "Copy icons from application"
  command "cd {{{ param::start-dir }}} && cp -r {{{ param::start-dir }}}/app/DefaultModule/Assets/icons/*.png {{{ param::start-dir }}}/clients/mobile/res/icon/android/"
  guess
  ignore_errors

RunCommand execute
  label "Tell Cordova no usage statistics"
  command 'cordova > /dev/null | xargs echo'
  guess

RunCommand execute
  label "Force remove the platforms"
  command "source {{{ param::start-dir }}}/build/$$android_shell_script && cd {{{ param::start-dir }}}/clients/mobile && cordova platform remove {{ loop }}"
  guess
  loop "ios,android"
  ignore_errors

RunCommand execute
  label "Force install the android platforms"
  command "source {{{ param::start-dir }}}/build/$$android_shell_script && cd {{{ param::start-dir }}}/clients/mobile && cordova platform add android"
  guess
  when "{{{ param::create_apk_only }}}"

RunCommand execute
  label "Force install the ios platforms"
  command "source {{{ param::start-dir }}}/build/$$android_shell_script && cd {{{ param::start-dir }}}/clients/mobile && cordova platform add ios"
  guess
  when "{{{ param::create_ipa_only }}}"

RunCommand execute
  label "Build and run the executable applications"
  command "source {{{ param::start-dir }}}/build/$$android_shell_script && cd {{{ param::start-dir }}}/clients/mobile && cordova run android"
  guess
  when "{{{ param::emulator }}}"

RunCommand execute
  label "Remove any existing ios executable applications"
  command "cd {{{ param::start-dir }}}/clients/mobile && rm -f platforms/ios/build/emulator/*.app"
  guess
  when "{{{ param::create_ipa_only }}}"

RunCommand execute
  label "Remove any existing android executable applications"
  command "cd {{{ param::start-dir }}}/clients/mobile && rm -f platforms/android/build/outputs/apk/*.apk"
  guess
  when "{{{ param::create_apk_only }}}"

RunCommand execute
  label "Always turn Cordova Telemetry off"
  command "source {{{ param::start-dir }}}/build/$$android_shell_script && cd {{{ param::start-dir }}}/clients/mobile && cordova telemetry off"
  guess

RunCommand execute
  label "Just create the android executable applications source {{{ param::start-dir }}}/build/$$android_shell_script && cd {{{ param::start-dir }}}/clients/mobile && cordova build android | xargs echo"
  command "source {{{ param::start-dir }}}/build/$$android_shell_script && cd {{{ param::start-dir }}}/clients/mobile && cordova build android | xargs echo"
  guess
  when "{{{ param::create_apk_only }}}"

RunCommand execute
  label "Just create the iOS executable applications"
  command "source /etc/profile && cd {{{ param::start-dir }}}/clients/mobile && cordova build ios > /tmp/ios_logme"
  guess
  when "{{{ param::create_ipa_only }}}"

Mkdir path
  label "Ensure Temp Directory before using"
  path "/tmp/exe-mobile/"
  recursive

RunCommand execute
  label "Empty Temp Directory before using"
  command "rm -rf /tmp/exe-mobile/* "
  guess
  when "{{{ param::create_ipa_only }}}"

RunCommand execute
  label "Move the iOS executable applications to expected location cd {{{ param::start-dir }}}/clients/mobile/platforms/ios/build/emulator/ && mv *.app /tmp/exe-mobile/"
  command "cd {{{ param::start-dir }}}/clients/mobile/platforms/ios/build/emulator/ && mv *.app /tmp/exe-mobile/ "
  guess
  when "{{{ param::create_ipa_only }}}"

RunCommand execute
  label "Zip the iOS executable application"
  command "cd /tmp/exe-mobile/ && zip -q -r $$env_level.{{{ param::repo_slug }}}.ipa.app.zip {{{ param::repo_slug }}}.app "
  guess
  when "{{{ param::create_ipa_only }}}"

Process kill
  label "Stop any node server"
  name "node"
  use-pkill
  when "{{{ param::webserver }}}"
  ignore_errors

RunCommand execute
  label "Build and run the mobile app web server"
  command "(source {{{ param::start-dir }}}/build/$$android_shell_script && cd {{{ param::start-dir }}}/clients/mobile && (nohup cordova serve > /dev/null 2>&1 &))"
  guess
  when "{{{ param::webserver }}}"

Port until-responding
  label "Wait for the mobile app web server to start"
  port "8000"
  guess
  when "{{{ param::webserver }}}"