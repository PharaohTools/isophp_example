RunCommand execute
  label "Restart the Node Socket Server"
  command "cd {{{ param::start-dir }}} && ptconfigure auto x --af=build/ptc/socket-server-restart.dsl.php --start-dir=`pwd` --vars=vars/vm.php "
  guess

RunCommand execute
  label "Build the ISOPHP Web Client Application"
  command "cd {{{ param::start-dir }}} && ptconfigure auto x --af=build/ptc/build-web-client-application.dsl.php --start-dir=`pwd` --vars=vars/vm.php "
  guess

RunCommand execute
  label "Build the ISOPHP Web Server Application"
  command "cd {{{ param::start-dir }}} && ptconfigure auto x --af=build/ptc/build-web-server-application.dsl.php --start-dir=`pwd` --vars=vars/vm.php "
  guess