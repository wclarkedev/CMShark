{{-- Audit logging page content --}}
@php
    require 'audit-logging.php';
    $audit_logs = get_audit_logs();
    $count = count($audit_logs);
@endphp
<table class="table-auto text-primaryText">
    <thead>
        <tr>
            <th>Action</th>
            <th>User</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        @for ($i = 0; $i < $count; $i++)
            <tr>
                <td> {{$audit_logs[$i]['action']}} </td>
                <td> {{$audit_logs[$i]['user']}} </td>
                <td> {{$audit_logs[$i]['time']}} </td>
            </tr>
        @endfor
        {{--@foreach ($audit_logs as $log)
            <tr>
                <td> {{$log['action']}} </td>
                <td> {{$log['user']}} </td>
                <td> {{$log['time']}} </td>
            </tr>
        @endforeach--}}
        <tr>
            <td>Your audit logs will show up here</td>
        </tr>
    </tbody>
</table>