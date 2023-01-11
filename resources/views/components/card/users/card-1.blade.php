<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-user-1')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <div class="row">
                @foreach ($pelanggan as $user)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card card-profile">
                        @if($user->status_user == 'user')
                            <p>{{ $user->username }}, {{ $user->status_user }}</p>
                        @else
                        <img src="{{ asset('background') }}/{{  $user->detail->first()->background }}" alt="Image placeholder" class="card-img-top">
                          <div class="row justify-content-center">
                            <div class="col-4 col-lg-4 order-lg-2">
                              <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                  <img src="{{ asset('foto') }}/{{  $user->detail->first()->foto }}" class="rounded-circle img-fluid border border-2 border-white">
                                </a>
                              </div>
                            </div>
                          </div>
                        @endif
                      <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                        <div class="d-flex justify-content-between">
                            @if($user->status_user == 'active')
                                <a href="{{ route('user.detail', $user) }}" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Detail</a>
                                <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a>
                            @endif
                          <a href="{{ route('user.destroy', $user->id ) }}" class="btn btn-sm btn-danger float-right mb-0 d-none d-lg-block">Hapus</a>
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
