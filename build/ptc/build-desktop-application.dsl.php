RunCommand execute
  label "Run the Node NPM Install"
  command "cd {{{ param::start-dir }}}/clients/desktop && sudo npm install --no-bin-links"
  guess

RunCommand execute
  label "Run the Composer Install"
  command "cd {{{ param::start-dir }}}/clients/desktop && sudo composer install"
  guess

RunCommand execute
  label "Run the Node NPM Build"
  command "cd {{{ param::start-dir }}}/clients/desktop && npm run build"
  guess

RunCommand execute
  label "Build to our Target Client"
  command "cd {{{ param::start-dir }}} && php build/build_to_uniter.php desktop > /dev/null"
  guess

RunCommand execute
  label "Add our back end application variable set, cp {{{ param::start-dir }}}/vars/$$mobilebackend.php {{{ param::start-dir }}}/clients/desktop/web/core/ && mv {{{ param::start-dir }}}/clients/desktop/web/core/$$mobilebackend.php {{{ param::start-dir }}}/clients/desktop/web/core/app_vars.fephp"
  command "cp {{{ param::start-dir }}}/vars/$$mobilebackend.php {{{ param::start-dir }}}/clients/desktop/web/core/ && mv {{{ param::start-dir }}}/clients/desktop/web/core/$$mobilebackend.php {{{ param::start-dir }}}/clients/desktop/web/core/app_vars.fephp"
  guess

RunCommand execute
  label "Build the executable applications"
  command "cd {{{ param::start-dir }}}/clients/desktop && electron-packager . $$desktop_app_slug --arch=ia32,x64 --out=/tmp/exe --overwrite --platform=darwin,linux"
  guess
