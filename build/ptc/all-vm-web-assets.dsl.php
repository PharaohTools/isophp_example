RunCommand execute
  label "Restart the Node Socket Server"
  command "cd {{{ param::start-dir }}} && ptconfigure auto x --af=build/ptc/socket-server-restart.dsl.php --start-dir=`pwd` --step-times --step-numbers --vars=vars/vm.php "
  guess

RunCommand execute
  label "Build the ISOPHP Web Client Application cd {{{ param::start-dir }}} && ptconfigure auto x --af=build/ptc/build-web-client-application.dsl.php --start-dir=`pwd` --step-times --step-numbers --vars=vars/vm.php --uniter_build_level=$$uniter_build_level"
  command "cd {{{ param::start-dir }}} && ptconfigure auto x --af=build/ptc/build-web-client-application.dsl.php --start-dir=`pwd` --step-times --step-numbers --vars=vars/vm.php --uniter_build_level=$$uniter_build_level"
  guess

RunCommand execute
  label "Build the ISOPHP Web Server Application"
  command "cd {{{ param::start-dir }}} && ptconfigure auto x --af=build/ptc/build-web-server-application.dsl.php --start-dir=`pwd` --step-times --step-numbers --vars=vars/vm.php --uniter_build_level=$$uniter_build_level"
  guess