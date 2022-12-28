<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-kelengkapan-3')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body  p-3 w-100 pt-0">
        <div class="docs-info">
            <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama kelengkapan</th>
                    </tr>
                  </thead>
                  <tbody>
                        <!-- category list -->
                        @include('components.card.dashboard.kelengkapan.list_kelengkapan',[
                            'kelengkapans' => $kelengkapans,
                            'count' => 0
                        ])

                  </tbody>
                </table>
            </div>

            <!-- end  category list -->

        </div>
    </div>
    <hr class="horizontal dark mt-0">
</div>
