<div class="col-lg-4">
    <ul>
        @foreach ($kelengkapans as $kelengkapan)
        <li class="form-group form-check">
            @if ($kelengkapanChecked && in_array($kelengkapan->id,  $kelengkapanChecked) )
                <input class="form-check-input" value="{{ $kelengkapan->id }}" type="checkbox" name="id_kelengkapan[]" checked>
            @else
                <input class="form-check-input" value="{{ $kelengkapan->id }}" type="checkbox" name="id_kelengkapan[]" >
            @endif
                <label style="text-decoration: none"> {{ $kelengkapan->nama }} </label>
            @if ($kelengkapan->descendants)
                @include('components.card.rental.list_kelengkapan',[
                    'kelengkapans' => $kelengkapan->descendants,
                    'kelengkapanChecked' => $kelengkapanChecked
                ])
            @endif
        </li>
        @endforeach
    </ul>

</div>
