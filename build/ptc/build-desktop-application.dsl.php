RunCommand execute
  label "Update NPM"
  command "npm update -g --silent || true"
  guess

RunCommand execute
  label "Install Global NPM Packages"
  command "npm install -g globby uglify-js uglifyify browserify electron-packager electron@1.6.2 || true"
  guess

RunCommand execute
  label "Empty the Node NPM Modules"
  command "cd {{{ param::start-dir }}}/clients/mobile && rm -rf node_modules/*"
  guess

RunCommand execute
  label "Run the Node NPM Install"
  command "cd {{{ param::start-dir }}}/clients/desktop && npm install --silent > /dev/null"
  guess

RunCommand execute
  label "Run the Composer Install"
  command "cd {{{ param::start-dir }}}/clients/desktop && composer install"
  guess

RunCommand execute
  label "Run the Node NPM Uglify Install"
  command "cd {{{ param::start-dir }}}/clients/mobile && npm install --save uglify-js"
  guess

RunCommand execute
  label "Run the Composer Install"
  command "cd {{{ param::start-dir }}}/clients/desktop && sudo composer install"
  guess

RunCommand execute
  label "Build to our Target Client"
  command "cd {{{ param::start-dir }}} && php build/build_to_uniter.php desktop > /dev/null"
  guess

Logging log
  log-message "Our Custom Branch is : $$custom_branch"

Mkdir path
  label "Ensure Directory before using"
  path "{{{ param::start-dir }}}/clients/desktop/web/core/"
  recursive

RunCommand execute
  label "Always Add our back end application variable set, cp {{{ param::start-dir }}}/vars/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/desktop/web/core/ && mv {{{ param::start-dir }}}/clients/desktop/web/core/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/desktop/web/core/app_vars.fephp"
  command "cp {{{ param::start-dir }}}/vars/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/desktop/web/core/ && mv {{{ param::start-dir }}}/clients/desktop/web/core/configuration_$$backendenv.php {{{ param::start-dir }}}/clients/desktop/web/core/app_vars.fephp"
  guess

RunCommand execute
  label "Always add our default application variable set, cp {{{ param::start-dir }}}/vars/default.php {{{ param::start-dir }}}/clients/desktop/core/default.fephp "
  command "cp {{{ param::start-dir }}}/vars/default.php {{{ param::start-dir }}}/clients/desktop/core/default.fephp "
  guess

RunCommand execute
  label "Run the Node FS "
  command "cd {{{ param::start-dir }}}/clients/mobile && sudo node fs > /dev/null"
  guess

Mkdir path
  label "Ensure Directory before using"
  path "{{{ param::start-dir }}}/clients/desktop/uniter_bundle/"
  recursive

RunCommand execute
  label "Run the Node NPM Build"
  command "cd {{{ param::start-dir }}}/clients/desktop && npm run build"
  guess

RunCommand execute
  label "Build the OSx executable application"
  command "cd {{{ param::start-dir }}}/clients/desktop && electron-packager . $$desktop_app_slug --arch=x64 --out=/tmp/exe --overwrite --platform=darwin"
  guess
  when "{{{ param::include-osx }}}"

RunCommand execute
  label "Package the OSx executable application as Zip"
  command "cd /tmp/exe/{{{ var::desktop_app_slug }}}-darwin-x64 && zip -q -r {{{ var::desktop_app_slug }}}.app.zip {{{ var::desktop_app_slug }}}.app"
  guess
  when "{{{ param::include-osx }}}"

RunCommand execute
  label "Build the Linux ia32 executable application"
  command "cd {{{ param::start-dir }}}/clients/desktop && electron-packager . $$desktop_app_slug --arch=ia32 --out=/tmp/exe --overwrite --platform=linux"
  guess
  when "{{{ param::include_linux }}}"

RunCommand execute
  label "Package the Linux ia32 executable application as Zip"
  command "cd /tmp/exe && zip -q -r {{{ var::desktop_app_slug }}}-linux-ia32.zip {{{ var::desktop_app_slug }}}-linux-ia32 "
  guess
  when "{{{ param::include_linux }}}"

RunCommand execute
  label "Build the Linux x64 executable application"
  command "cd {{{ param::start-dir }}}/clients/desktop && electron-packager . $$desktop_app_slug --arch=x64 --out=/tmp/exe --overwrite --platform=linux"
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
