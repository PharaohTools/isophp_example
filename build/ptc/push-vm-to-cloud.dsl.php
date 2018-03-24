RunCommand execute
  label "Create latest ISO PHP PTV Image"
  command "cd {{{ param::start-dir }}}/ && ptv auto x ptvirtualize box package --name='ISO PHP Example App' --vmname='iso_php_example_application' --group=ptvirtualize --description='$$description' -yg "
  guess

RunCommand execute
  label "Push it to Pharaoh Repos"
  command "curl -F file=@/opt/p  -F control=BinaryServer -F action=serve -F item=iso_php_virtualize_boxes -F auth_user=$$pharaoh_repo_auth_user -F auth_pw=$$pharaoh_repo_auth_pw $$pharaoh_repo_url --start-dir=`pwd` --vars=vars/vm.php "
  guess
