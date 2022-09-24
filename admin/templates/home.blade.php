@switch ($component) 
    @case('welcome')
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
        @break
    @case('latest-logs') 
        <div class="" id="latest-audit-logs-container">
            <h2>Actions performed recently</h2>
            <div class="" id="audit-logs-container">
                
            </div>
        </div>
        @break
    
@endswitch