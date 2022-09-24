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
//$audit_logs = get_audit_logs();
function get_audit_logs_by_amount($limit) {
    global $logs; 
    $count = count($logs);
    $log = array();
    for ($i = 0; $i < $count; $i++) {
        $log[$i]['name'] = $logs[$i]->{'user'};
        $log[$i]['action'] = $logs[$i]->{'action'};
        $log[$i]['time'] = $logs[$i]->{'time'};
    }

    $log = array_chunk($log, $limit);
    
    $page = 0;
    
    $log = $log[$page];
    var_dump($log);
}
get_audit_logs_by_amount(2);
function set_audit_log($action, $user) {
    global $logs;
    global $log_file;
    if (empty(trim($action))) exit();
    if (empty(trim($user))) exit();
    $time = date("d/m/Y - H:i:s");
    $output = array();
    $output['action'] = $action;
    $output['user'] = $user;
    $output['time'] = $time;
    //$logs = $logs->{'logs'};
    $count = count($logs) - 1;
    //$logs = $logs->{$count+1};
    array_unshift($logs, $output);

    $json = json_encode($logs);
    file_put_contents($log_file, $json);
}
//set_audit_log('test','test');
//var_dump(get_audit_logs());

/*
$log =get_audit_logs();
$limit = 2;
$log = array_chunk($log, $limit);
$page = 0; // page 1
$log = $log[$page];
var_dump($log);
*/
/*$log = [
    [
        'id' => 1
    ],
    [
        'id' => 2
    ],
    [
        'id' => 3
    ],
    [
        'id' => 4
    ],
    [
        'id' => 5
    ],
    [
        'id' => 6
    ],
    [
        'id' => 7
    ],
    [
        'id' => 8
    ],
];

$limit = 6;

$log = array_chunk($log, $limit);

$page = 0;

$log = $log[$page];
var_dump($log);*/