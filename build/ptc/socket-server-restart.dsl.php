Process kill
  label "Kill any running socketserve.js server"
  name "socketserve.js"
  use-pkill
  yes

RunCommand execute
  label "Start socket server bash -c 'node {{{ param::start-dir }}}/server/node_socket_server/socketserve.js &' & \n"
  command "bash -c 'node {{{ param::start-dir }}}/server/node_socket_server/socketserve.js &' & \n"
  nohup
  guess

Port until-responding
  label "Wait for the socket server to start"
  port "3000"
  guess