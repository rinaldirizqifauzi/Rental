<div class="docs-info">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <p class="mb-0"> Profile</p>
                </div>
                </div>
                <div class="card-body">
                <p class="text-uppercase text-sm">User Information</p>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label text-center">Username</label><br>
                        <i class="ni education_hat mr-2"></i>
                        <div class="container">
                            <p>{{ Auth::user()->username }}</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Email address</label>
                        <i class="ni education_hat mr-2"></i>
                        <div class="container">
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Status User</label>
                        <i class="ni education_hat mr-2"></i>
                        <div class="container">
                            <p>{{ Auth::user()->status_user }}</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Level</label>
                        <i class="ni education_hat mr-2"></i>
                        <div class="container">
                            <p>{{ Auth::user()->level }}</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Tempat & Tanggal Lahir</label>
                            <i class="ni education_hat mr-2"></i>
                            <div class="container">

                                <p>{{ Auth::user()->detailadmin->first()->tpt_lhr }},{{ Auth::user()->detailadmin->first()->tgl_lhr }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Contact Information</p>
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Address</label>
                        <i class="ni education_hat mr-2"></i>
                        <div class="container">
                            <p>{{ Auth::user()->detailadmin->first()->alamat }}</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">City</label>
                        <input class="form-control" type="text" value="New York">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Country</label>
                        <input class="form-control" type="text" value="United States">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Postal code</label>
                        <input class="form-control" type="text" value="437300">
                    </div>
                    </div>
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Identitas Foto</p>
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">About me</label>
                        <input class="form-control" type="text" value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source.">
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="card card-profile">
                <img src="{{ asset('background_admin') }}/{{ Auth::user()->detailadmin->first()->background }}" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                <div class="col-4 col-lg-4 order-lg-2">
                    <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                        <a href="javascript:;">
                            <img src="{{ asset('foto_admin') }}/{{ Auth::user()->detailadmin->first()->foto }}" class="rounded-circle img-fluid border border-2 border-white">
                        </a>
                    </div>
                </div>
                </div>
                <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.edit_profil', Auth::user()->username) }}" class="btn btn-sm btn-warning mb-0 d-none d-lg-block">Edit Profil</a>
                    <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a>
                </div>
                </div>
                <div class="card-body pt-0">
                <div class="row">
                    <div class="col">
                    {{-- <div class="d-flex justify-content-center">
                        <div class="d-grid text-center">
                        <span class="text-lg font-weight-bolder">22</span>
                        <span class="text-sm opacity-8">Friends</span>
                        </div>
                        <div class="d-grid text-center mx-4">
                        <span class="text-lg font-weight-bolder">10</span>
                        <span class="text-sm opacity-8">Photos</span>
                        </div>
                        <div class="d-grid text-center">
                        <span class="text-lg font-weight-bolder">89</span>
                        <span class="text-sm opacity-8">Comments</span>
                        </div>
                    </div> --}}
                    </div>
                </div>
                <div class="text-center mt-4">
                    <h5>
                        {{ Auth::user()->detailadmin->first()->nama }}<span class="font-weight-light">, {{ Auth::user()->detailadmin->first()->umur }}</span>
                    </h5>
                    <div class="h6 font-weight-300">
                    <i class="ni location_pin mr-2"></i>{{ Auth::user()->detailadmin->first()->tpt_lhr }}, Indonesia
                    </div>
                    <div class="h6 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                    </div>
                    <div>
                    <i class="ni education_hat mr-2"></i>University of Computer Science
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="horizontal dark mt-0">
<div class="text-end me-3">
    <a class="btn  btn-sm btn-secondary" href="{{ route('dashboard.index') }}">
        Kembali
    </a>
</div>
