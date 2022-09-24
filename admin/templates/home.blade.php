@php
    require '../audit-logging.php';
    $logs = get_audit_logs_by_amount(5);
@endphp
@switch ($component) 
    {{-- @case('welcome')
        @php
            $welcomes = array (
                'Greetings',
                'Hello',
                'Hey',
                'Hiya',
                'Hi',
                'Bonjour',
                'Howdy',
                'Shalom'
            );
            $random_welcome_key = array_rand($welcomes);
            $random_welcome = $welcomes[$random_welcome_key];
        @endphp
        <div class="">
            <h1 class="">{{ $random_welcome }}</h1>
        </div>
        @break --}}

    @case('latest-logs') 
        <div class="" id="latest-audit-logs-container">
            <h2>Actions performed recently</h2>
            <div class="" id="audit-logs-container">
                <table class="min-w-1/2 text-center mx-auto">
                    <thead class="border-b">
                        <tr class="border-b bg-backgroundColor border-codeColor">
                            <th scope="col" class="text-base text-primaryText font-light px-6 py-4 whitespace-nowrap">
                                Action
                            </th>
                            <th scope="col" class="text-base text-primaryText font-light px-6 py-4 whitespace-nowrap">
                                User
                            </th>
                            <th scope="col" class="text-base text-primaryText font-light px-6 py-4 whitespace-nowrap">
                                Time
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $row)
                            <tr class="border-b bg-backgroundColor border-codeColor">
                                <td class="text-sm text-secondaryText font-semibold px-6 py-4 whitespace-nowrap">
                                    {{$row['action']}}
                                </td>
                                <td class="text-sm text-secondaryText font-medium px-6 py-4 whitespace-nowrap">
                                    {{$row['name']}}
                                </td>
                                <td class="text-sm text-secondaryText font-medium px-6 py-4 whitespace-nowrap">
                                    {{$row['time']}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @break

{{--    
    @case('setup-security-options')
        @break
    
    @case('setup-page-content')
        @break
--}}
    
@endswitch