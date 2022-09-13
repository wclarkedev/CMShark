<?php
$log_file = './json/audit-logs.json';
$logs = file_get_contents($log_file);
$logs = json_decode($logs);

function get_audit_logs(){
    global $logs;
    // Get all log data and return in nice format to loop through in blade template
}