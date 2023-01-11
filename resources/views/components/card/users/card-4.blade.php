<div class="card">

    <div class="card-header pb-0 p-3">
        <div class="row">
            <div class="col-lg-6">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-2">@yield('card-title-user-1')</h6>
                  </div>
            </div>
            <div class="col-lg-6">
                <div class="text-end">
                    <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Admin</a>
                </div>
            </div>
        </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <div class="row">
                    @foreach ($admin as $user)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card card-profile">
                            @if($user->status_user == 'active')
                                <img src="{{ asset('background_admin') }}/{{  $user->detailadmin->first()->background }}" alt="Image placeholder" class="card-img-top">
                                <div class="row justify-content-center">
                                    <div class="col-4 col-lg-4 order-lg-2">
                                        <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                          <a href="javascript:;">
                                            <img src="{{ asset('foto_admin') }}/{{  $user->detailadmin->first()->foto }}" class="rounded-circle img-fluid border border-2 border-white">
                                          </a>
                                        </div>
                                      </div>
                                </div>
                                @else
                                <p>{{ $user->username }}</p>
                            @endif
                          <p>{{ $user->status_user }}</p>
                          <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                            <div class="d-flex justify-content-between">
                                @if($user->status_user == 'active')
                                    <a href="{{ route('admin.show_profil', ['user' => $user->id]) }}" class="btn btn-sm btn-info float-right mb-0 d-none d-lg-block">Detail</a>
                                @else
                                    Lengkapi Profil
                                @endif
                              <a href="{{ route('admin.destroy', $user->id) }}" class="btn btn-sm btn-danger float-right mb-0 d-none d-lg-block">Hapus</a>
                              <a href="javascript:;" class="btn btn-sm btn-danger float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a>
                            </div>
                          </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
