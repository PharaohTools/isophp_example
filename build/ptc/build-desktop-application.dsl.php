RunCommand execute
  label "Empty the Node NPM Modules"
  command "cd {{{ param::start-dir }}}/clients/desktop && rm -rf node_modules"
  guess

RunCommand execute
  label "Allow unsafe perms"
  command "npm config set unsafe-perm true"
  ignore_errors
  guess

RunCommand execute
  label "Cache Clean NPM and install N"
  command "npm cache clean -f"
  ignore_errors
  guess

RunCommand execute
  label "Install N for Node"
  command "npm install -g n & n stable"
  ignore_errors
  guess

RunCommand execute
  label "N install Node 8.9.4"
  command "n 8.9.4"
  guess

RunCommand execute
  label "Install Global NPM Packages"
  command "npm install -g globby uglify-js uglifyify browserify electron-packager"
  ignore_errors
  guess

RunCommand execute
  label "Run the Node NPM Install"
  command "cd {{{ param::start-dir }}}/clients/desktop && npm install --unsafe-perm --allow-root --no-bin-links --silent > /dev/null"
  guess

RunCommand execute
  label "Run the Composer Install"
  command "cd {{{ param::start-dir }}}/clients/desktop && composer install"
  guess

Logging log
  log-message "Our Custom Branch is : $$custom_branch"

Logging log
  log-message "Our Uniter build level is : $$uniter_build_level"

Mkdir path
  label "Ensure Directory before using"
  path "{{{ param::start-dir }}}/clients/desktop/uniter_bundle/"
  recursive

Mkdir path
  label "Ensure Directory before using"
  path "{{{ param::start-dir }}}/clients/desktop/core/"
  recursive

RunCommand execute
  label "Build to our Target Client - Uniter Development Settings"
  command "cd {{{ param::start-dir }}} && php build/build_to_uniter.php desktop fephp > /dev/null"
  guess
  not_when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "Build to our Target Client - Uniter Production Settings"
  command "cd {{{ param::start-dir }}} && php build/build_to_uniter.php desktop php > /dev/null"
  guess
  when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "(fephp ext) Add our back end application variable set, cp {{{ param::start-dir }}}/vars/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/desktop/core/ && mv {{{ param::start-dir }}}/clients/desktop/core/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/desktop/core/app_vars.fephp"
  command "cp {{{ param::start-dir }}}/vars/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/desktop/core/ && mv {{{ param::start-dir }}}/clients/desktop/core/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/desktop/core/app_vars.fephp"
  guess
  not_when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "(php ext) Add our back end application variable set, cp {{{ param::start-dir }}}/vars/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/desktop/core/ && mv {{{ param::start-dir }}}/clients/desktop/core/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/desktop/core/app_vars.php"
  command "cp {{{ param::start-dir }}}/vars/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/desktop/core/ && mv {{{ param::start-dir }}}/clients/desktop/core/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/desktop/core/app_vars.php"
  guess
  when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "(fephp ext) Always add our default application variable set, cp {{{ param::start-dir }}}/vars/default.php {{{ param::start-dir }}}/clients/desktop/core/default.fephp "
  command "cp {{{ param::start-dir }}}/vars/default.php {{{ param::start-dir }}}/clients/desktop/core/default.fephp "
  guess
  not_when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "(php ext) Always add our default application variable set, cp {{{ param::start-dir }}}/vars/default.php {{{ param::start-dir }}}/clients/desktop/core/default.php "
  command "cp {{{ param::start-dir }}}/vars/default.php {{{ param::start-dir }}}/clients/desktop/core/default.php "
  guess
  when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "Run the Development Node NPM Build"
  command "cd {{{ param::start-dir }}}/clients/desktop && sudo npm run build-development"
  guess
  not_when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "Ensure Webpack is executable"
  command "cd {{{ param::start-dir }}}/clients/desktop && chmod +x ./node_modules/webpack/bin/webpack.js"
  guess
  when "{{{ param::uniter_build_level }}}"
  equals "production"

RunCommand execute
  label "Run the Production Node NPM Build"
  command "cd {{{ param::start-dir }}}/clients/desktop && sudo npm run build-production"
  guess
  when "{{{ param::uniter_build_level }}}"
  equals "production"

File create
  label "Add or Overwrite the Uniter build level to web server settings file"
  file "{{{ param::start-dir }}}/clients/desktop/uniter_build_level"
  data "{{{ param::uniter_build_level }}}"
  overwrite-existing

RunCommand execute
  label "Build the OSx executable application"
  command "cd {{{ param::start-dir }}}/clients/desktop && electron-packager . $$desktop_app_slug --arch=x64 --out=/tmp/exe --overwrite --platform=darwin"
  guess
  when "{{{ param::include_osx }}}"

RunCommand execute
  label "Package the OSx executable application as Zip"
  command "cd /tmp/exe/{{{ var::desktop_app_slug }}}-darwin-x64 && zip -q -r {{{ var::desktop_app_slug }}}.app.zip {{{ var::desktop_app_slug }}}.app"
  guess
  when "{{{ param::include_osx }}}"

RunCommand execute
  label "Build the Linux ia32 executable application"
  command "cd {{{ param::start-dir }}}/clients/desktop && electron-packager . $$desktop_app_slug --icon=../../app/ISOPHPExample/Assets/images/iso_logo.png --arch=ia32 --out=/tmp/exe --overwrite --platform=linux --electron-version=1.6.2 --asar --prune --overwrite"
  guess
  when "{{{ param::include_linux }}}"

RunCommand execute
  label "Package the Linux ia32 executable application as Zip"
  command "cd /tmp/exe && zip -q -r {{{ var::desktop_app_slug }}}-linux-ia32.zip {{{ var::desktop_app_slug }}}-linux-ia32 "
  guess
  when "{{{ param::include_linux }}}"

RunCommand execute
  label "Build the Linux x64 executable application"
  command "cd {{{ param::start-dir }}}/clients/desktop && electron-packager . $$desktop_app_slug --icon=../../app/ISOPHPExample/Assets/images/iso_logo.png --arch=x64 --out=/tmp/exe --overwrite --platform=linux --electron-version=1.6.2 --asar --prune --overwrite"
  guess
  when "{{{ param::include_linux }}}"

RunCommand execute
  label "Package the Linux x64 executable application as Zip"
  command "cd /tmp/exe && zip -q -r {{{ var::desktop_app_slug }}}-linux-x64.zip {{{ var::desktop_app_slug }}}-linux-x64 "
  guess
  when "{{{ param::include_linux }}}"

RunCommand execute
  label "Build the Windows ia32 executable application"
  command "cd {{{ param::start-dir }}}/clients/desktop && electron-packager . $$desktop_app_slug --arch=ia32 --out=/tmp/exe --overwrite --platform=win32"
  guess
  when "{{{ param::include_windows }}}"

RunCommand execute
  label "Package the Windows ia32 executable application as Zip"
  command "cd /tmp/exe && zip -q -r {{{ var::desktop_app_slug }}}-windows-ia32.zip {{{ var::desktop_app_slug }}}-win32-ia32 "
  guess
  when "{{{ param::include_windows }}}"

RunCommand execute
  label "Build the Windows x64 executable application"
  command "cd {{{ param::start-dir }}}/clients/desktop && electron-packager . $$desktop_app_slug --arch=x64 --out=/tmp/exe --overwrite --platform=win32"
  guess
  when "{{{ param::include_windows }}}"

RunCommand execute
  label "Package the Windows x64 executable application as Zip"
  command "cd /tmp/exe && zip -q -r {{{ var::desktop_app_slug }}}-windows-x64.zip {{{ var::desktop_app_slug }}}-win32-x64 "
  guess
  when "{{{ param::include_windows }}}"
