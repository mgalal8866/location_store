<div>

    <table class="table table-ligth">
        <thead class=" thead-ligth">
            <tr>
                @foreach ($headers as $header )
                    <th>{{$header}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{$slot}}
        </tbody>
        <tfoot>
            <tr>
                {{-- <Xth>#</th> --}}
            </tr>
        </tfoot>
    </table>
</div>
