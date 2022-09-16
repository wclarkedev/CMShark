<h1 class="text-primaryText text-3xl font-semibold text-center">Logs</h1>
<div class="mx-auto mt-6">
    {{--? <p>Page {{$page_num}}</p> --}}
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
    <div class="" id="page-navigation">
        <span class="">backwards</span>
        <span class="">Page num</span>
        <span class="">forwards</span>
    </div>
</div>