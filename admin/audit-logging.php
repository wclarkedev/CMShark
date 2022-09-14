<?php
$log_file = '../json/audit-logs.json';
$logs = file_get_contents($log_file);
$logs = json_decode($logs);
error_reporting(0);

function get_audit_logs(){
    global $logs;
    // Get all log data and return in nice format to loop through in blade template
    //if (isset($logs)) exit();
    $count = count($logs);
    //echo $count;
    $output = array();
    for ($i = 0; $i < $count; $i++) {
        $output[$i]['name'] = $logs[$i]->{'user'};
        $output[$i]['action'] = $logs[$i]->{'action'};
        $output[$i]['time'] = $logs[$i]->{'time'};
    }
    return $output;
}
function set_audit_log($action, $user) {
    global $logs;
    global $log_file;
    if (empty(trim($action))) exit();
    if (empty(trim($user))) exit();
    $time = date("H:i:s - d/m/Y");
    $output = array();
    $output['action'] = $action;
    $output['user'] = $user;
    $output['time'] = $time;
    //$logs = $logs->{'logs'};
    $count = count($logs) - 1;
    //$logs = $logs->{$count+1};
    array_push($logs, $output);

    $json = json_encode($logs);
    file_put_contents($log_file, $json);
}
//set_audit_log('test','test');
//var_dump(get_audit_logs());