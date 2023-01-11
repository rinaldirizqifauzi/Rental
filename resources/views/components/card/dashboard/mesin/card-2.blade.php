<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-mesin_mobil-3')</h6>
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mesin</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Logo</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1?>
                    @foreach ($mesins as $mesin)
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
                            <h6 class="mb-0 text-sm">{{ $mesin->nama_mesin }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2">
                          <div class="my-auto">
                            <img src="{{ asset('logo') }}/{{ $mesin->logo }}" alt="" class="img-card-top"  class="" height="80" width="140">
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2">
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">
                                <a href="{{ route('mesin.edit', $mesin->nama_mesin) }}" class="btn btn-link text-warning px-3 mb-0">
                                    <i class="fas fa-pencil-alt text-warning me-2" aria-hidden="true"></i>
                                    Edit
                                </a>
                                <a href="{{ route('mesin.destroy', $mesin->nama_mesin) }}" class="btn btn-link text-danger text-gradient px-3 mb-0" onclick="confirm('Yakin Hapus?')">
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
