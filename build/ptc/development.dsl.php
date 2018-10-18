SudoNoPass install
  install-user-name "ptv"
  guess

GitKeySafe ensure
  guess

Composer ensure
  guess

NodeJS install

RunCommand execute
  label "Add the Ondrej PPA"
  command "add-apt-repository ppa:ondrej/php -y"
  guess

PackageManager pkg-ensure
  package-name "{{ loop }}"
  packager Apt
  loop "php7.1,php7.1-cli,php7.1-fpm,php7.1-gd,php7.1-json,php7.1-mysql,php7.1-readline,php7.1-xml,php7.1-pdo-sqlite,php7.1-sqlite3"

RunCommand execute
  label "Install prequisite packages"
  command "apt-get install -y apache2 libapache2-mod-php7.1 sqlite3 php-sqlite zip unzip"
  guess

RunCommand execute
  label "Enable PHP 7 for FPM"
  command "a2enmod proxy_fcgi setenvif && a2enconf php7.1-fpm"
  guess

RunCommand execute
  label "Set the Apache php module to 7"
  command "a2dismod php5 || true && a2enmod php7.1 || true && service apache2 restart || true && a2enmod proxy_fcgi setenvif"
  guess

RunCommand execute
  label "Setup latest node"
  command "curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -"
  guess

RunCommand execute
  label "Latest version of NPM"
  command "apt-get install nodejs -y"
  guess

RunCommand execute
  label "NPM Install Node Version 6"
  command "npm cache clean -f && npm install -g n && n 8.9.4 && ln -sf /usr/local/n/versions/node/6.0.0/bin/node /usr/bin/nodejs"
  guess

RunCommand execute
  label "NPM Install General Packages"
  command "npm install --silent -g browserify uglifyjs uglify-js cordova-icon junit-viewer npx webpack webpack-cli > /dev/null"
  guess

RunCommand execute
  label "Check if Electron Packager and cordova are installed"
  command 'ISINSTEP=`which electron-packager > /dev/null && echo $?` && ISINSTC=`which cordova > /dev/null && echo $?` && BOTH_INST=`! (( $ISINSTEP | $ISINSTC )); echo $?` && if [ "$BOTH_INST" = "0" ] ; then echo "true" ; fi'
  guess
  ignore_errors
  register "electron_cordova_are_installed"

RunCommand execute
  label "NPM Install Electron Packager and cordova"
  command "npm install --silent -g electron-packager cordova > /dev/null"
  guess
  not_when "{{{ param::electron_cordova_are_installed }}}"
  equals "true"

Java install
  version "1.8"
  guess

PTDeploy ensure
  guess

PTBuild install
  guess
  label "Lets ensure Pharaoh Build"
  vhe-url "build.{{{ var::vmname }}}.vm"
  vhe-ip-port "0.0.0.0:80"
  version latest
  guess

RunCommand execute
  label "Check if Gradle is installed "
  command 'ISINST=`ls /opt/gradle/bin/gradle` && if [ "$ISINST" = "/opt/gradle/bin/gradle" ] ; then echo "true" ; fi '
  guess
  ignore_errors
  register "gradle_is_installed"

Download file
  label "Download Gradle"
  source "https://services.gradle.org/distributions/gradle-4.6-bin.zip"
  target "/opt/gradle.zip"
  not_when "{{{ param::gradle_is_installed }}}"
  equals "true"

RunCommand execute
  label "Unzip Gradle"
  command 'cd /opt && unzip -qq -o gradle.zip'
  guess
  not_when "{{{ param::gradle_is_installed }}}"
  equals "true"

RunCommand execute
  label "Move to generic gradle dir name and path"
  command 'cd /opt && mv gradle-* gradle'
  guess
  not_when "{{{ param::gradle_is_installed }}}"
  equals "true"

RunCommand execute
  label "Check if the Android SDK tools are installed"
  command 'ISINST=`ls /home/ptbuild/Android/Sdk/tools/bin/sdkmanager` && if [ "$ISINST" = "/home/ptbuild/Android/Sdk/tools/bin/sdkmanager" ] ; then echo "true" ; fi '
  guess
  ignore_errors
  register "android_sdk_tools_are_installed"

RunCommand execute
  label "Copy the host shared SDK tools"
  command "cp /var/www/hostshare/build/binaries/sdk-tools-linux-3859397.zip /tmp/sdk-tools.zip"
  guess
  ignore_errors
  not_when "{{{ param::android_sdk_tools_are_installed }}}"
  equals "true"

RunCommand execute
  label "Get the Android SDK tools"
  command "rm -f /tmp/sdk-tools.zip ] ; curl -o /tmp/sdk-tools.zip https://dl.google.com/android/repository/sdk-tools-linux-3859397.zip ; "
  guess
  not_when "{{{ param::android_sdk_tools_are_installed }}}"
  equals "true"

RunCommand execute
  label "Make SDK Dir - MUST RUN AFTER PTBUILD INSTALL OR USER WONT EXIST"
  command "mkdir -p /home/ptbuild/Android/Sdk && chown -R ptbuild:ptbuild /home/ptbuild/Android/Sdk"
  guess

RunCommand execute
  label "Unzip SDK Tools"
  command "cd /tmp && mv sdk-tools.zip /home/ptbuild/Android/Sdk && cd /home/ptbuild/Android/Sdk && rm -rf /home/ptbuild/Android/Sdk/tools && unzip -qq sdk-tools.zip && chown -R ptbuild:ptbuild /home/ptbuild/Android"
  guess
  not_when "{{{ param::android_sdk_tools_are_installed }}}"
  equals "true"

RunCommand execute
  label "Install the android build tools with android sdkmanager"
  command "source /etc/profile && source /var/www/hostshare/build/vm-android-shell.bash && echo y | sdkmanager 'build-tools;26.0.0'"
  guess
  ignore_errors

SudoNoPass install
  label "Sudo ability for Pharaoh Build user"
  install-user-name ptbuild

Logging log
  log-message "Lets copy in our build pipes"
  source Autopilot

RunCommand execute
  label "Get the names of the Build pipes"
  command 'cd /var/www/hostshare/build/ptbuild/pipes/ && ls -1 | paste -sd "," -'
  guess
  register "build_pipe_names"

Logging log
  log-message "build pipe names are {{{ param::build_pipe_names }}}"
  source Autopilot

RunCommand execute
  label "Import the Development Build pipes"
  command "ptbuild importexport import -yg --source=/var/www/hostshare/build/ptbuild/pipes/{{ loop }}"
  loop "{{{ param::build_pipe_names }}}"
  guess

RunCommand execute
  label "Create a default admin user"
  command "ptbuild userprofile create -yg --create_username=admin --create_email=any@pharaohtools.com --update_password=admin --update_password_match=admin"
  guess

Copy put
  label "Import the Pharaoh Build Config"
  source "/var/www/hostshare/build/ptbuild/ptbuildvars"
  target /opt/ptbuild/ptbuild/
  recursive

Chown path
  label "Lets ensure ownership of our build pipes to build user"
  path /opt/ptbuild/pipes
  user ptbuild:ptbuild
  recursive

Mkdir path
  label "Make a build user dir to copy shared keys from the host to"
  path /home/ptbuild/.ssh
  recursive

Chgrp path
  label "Lets ensure group ownership of our ssh dir"
  path /home/ptbuild/.ssh
  group ptbuild
  recursive

Chmod path
  label "Lets ensure correct level of private key security"
  path /home/ptbuild/.ssh
  mode 0777
  recursive

RunCommand execute
  label "Enable the Apache Rewrite Module"
  command "a2enmod rewrite"
  guess

StandardTools ensure
  label "Lets ensure some standard tools are installed"

GitTools ensure
  label "Lets ensure some git tools are installed"

RunCommand execute
  label "FS Fixes for web writing to share"
  command "usermod -a -G vboxsf www-data"
  guess

RunCommand execute
  label "FS Fixes for web writing to share in a Virtual Machine"
  command "usermod -a -G vboxsf ptv"
  guess