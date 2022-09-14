{{-- Audit logging page content --}}
@php
    require '../audit-logging.php';
    $audit_logs = get_audit_logs();
@endphp
<section class="" id="audit-log-dump"></section>