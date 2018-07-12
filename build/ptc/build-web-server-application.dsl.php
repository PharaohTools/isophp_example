RunCommand execute
  label "Remove old DB"
  command "cd {{{ param::start-dir }}}/server && sudo rm -f data/base.db"
  guess

RunCommand execute
  label "Run DB Migrations to create a new DB"
  command "cd {{{ param::start-dir }}}/server && sudo php vendor/bin/phinx migrate -e development"
  guess

RunCommand execute
  label "Run DB Seed for DB Sample Data"
  command "cd {{{ param::start-dir }}}/server && sudo php vendor/bin/phinx seed:run -e development"
  guess

RunCommand execute
  command "cd {{{ param::start-dir }}}/server && ptdeploy vhe add -yg --vhe-url=$$server_subdomain.$$domain --vhe-ip-port=0.0.0.0:80 --vhe-default-template-name=docroot-no-suffix"
  guess

RunCommand execute
  command "ptdeploy he add -yg --host-name=$$server_subdomain.$$domain"
  guess

RunCommand execute
  label "Enable Site and restart Apache"
  command "a2ensite $$server_subdomain.$$domain.conf && service apache2 restart"
  guess

RunCommand execute
  command "ptdeploy apachecontrol restart -yg"
  guess
