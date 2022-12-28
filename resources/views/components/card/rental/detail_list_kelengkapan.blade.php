<div class="col-lg-4">
    <ul>
        @foreach ($kelengkapans as $kelengkapan)
        <li class="form-group form-check">
            @if (old('id_kelengkapan', $kelengkapanChecked) && in_array($kelengkapan->id, old('id_kelengkapan', $kelengkapanChecked)) )
                <input class="form-check-input" value="{{ old('id_kelengkapan', $kelengkapan->id,  $kelengkapanChecked) }}" type="checkbox" name="id_kelengkapan[]" checked >
            @else
                <input class="form-check-input" value="{{ old('id_kelengkapan', $kelengkapan->id,  $kelengkapanChecked) }}" type="checkbox" name="id_kelengkapan[]" >
            @endif
                <label style="text-decoration: none"> {{ $kelengkapan->nama }} </label>
            @if ($kelengkapan->descendants)
                @include('components.card.rental.list_kelengkapan',[
                    'kelengkapans' => $kelengkapan->descendants,
                ])
            @endif
        </li>
        @endforeach
    </ul>
</div>
