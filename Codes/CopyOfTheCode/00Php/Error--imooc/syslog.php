<?php
ini_set('display_errors',1);
error_reporting(-1);
ini_set('log_errors',1);
ini_set('error_log','syslog');
openlog('LOG_ERR 006',LOG_PID,LOG_SYSLOG);
syslog(LOG_ERR,'THIS IS A TEST OF SAT'.time());
closelog();