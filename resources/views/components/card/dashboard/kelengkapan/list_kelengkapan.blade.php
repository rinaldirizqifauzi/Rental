
 @foreach ($kelengkapans as $kelengkapan)
 <tr>
   <td>
    <div class="d-flex px-2 text-center">
        <div class="my-auto">
          <h6 class="mb-0 text-sm">{{  str_repeat('-', $count) . '  ' . $kelengkapan->nama }}</h6>
        </div>
      </div>
   </td>
   <td>
    <div class="d-flex px-2">
      <div class="my-auto">
        <h6 class="mb-0 text-sm">
            <a href="{{ route('kelengkapan.edit', ['kode' => $kelengkapan->kode  ]) }}" class="btn btn-link text-warning px-3 mb-0">
                <i class="fas fa-pencil-alt text-warning me-2" aria-hidden="true"></i>
                Edit
            </a>
            <a href="{{ route('kelengkapan.destroy', ['kode' => $kelengkapan->kode  ]) }}" class="btn btn-link text-danger text-gradient px-3 mb-0" onclick="confirm('Yakin Hapus?')">
                <i class="far fa-trash-alt me-2"></i>
                Delete
            </a>
        </h6>
      </div>
    </div>
  </td>
   <td>
        <!-- todo:show subcategory -->
        @if($kelengkapan->descendants)
        @include('components.card.dashboard.kelengkapan.list_kelengkapan', [
            'kelengkapans' => $kelengkapan->descendants,
            'count' => $count + 2
        ])
    @endif
   </td>
 </tr>
 @endforeach
