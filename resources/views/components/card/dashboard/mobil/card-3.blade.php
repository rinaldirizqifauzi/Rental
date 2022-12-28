<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-mobil-3')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body  p-3 w-100 pt-0">
        <div class="docs-info">
            <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama mobil</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun mobil</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1?>
                    @foreach ($spesifikasis as $spesifikasi)
                    <tr>
                      <td>
                        <div class="d-flex px-2 text-center">
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">{{ $no++ }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2">
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">{{ $spesifikasi->nama }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2">
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">{{ $spesifikasi->tahun }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2">
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">
                                <a href="{{ route('spesifikasi.edit', ['nama' => $spesifikasi->nama]) }}" class="btn btn-link text-warning px-3 mb-0">
                                    <i class="fas fa-pencil-alt text-warning me-2" aria-hidden="true"></i>
                                    Edit
                                </a>
                                <a href="{{ route('spesifikasi.destroy', ['nama' => $spesifikasi->nama]) }}" class="btn btn-link text-danger text-gradient px-3 mb-0" onclick="confirm('Yakin Hapus?')">
                                    <i class="far fa-trash-alt me-2"></i>
                                    Delete
                                </a>
                            </h6>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr class="horizontal dark mt-0">
</div>
