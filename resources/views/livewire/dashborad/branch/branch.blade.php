<div>
    <x-table.table :headers="['SSS','SA','SA']">
        @foreach($branchs as $branch)
        <tr>
            <td>{{$branch->city_id}}</td>
            <td>{{$branch->city_id}}</td>
            <td>{{$branch->city_id}}</td>
        </tr>
        @endforeach
    </x-table.table>
</div>
