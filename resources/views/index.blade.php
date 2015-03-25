@for($i = 0; $i<count($fas);$i++)

    <p>{{ $fas[$i]->fa_id}}
        {{ $fas [$i]->name}}
        {{ $fas[$i]->email}}
        {{ $fas[$i]->address}}</p>

@endfor