<div class="row">
    <div class="col-lg-12  ml-auto mr-auto">
        <div class="card card-register" >
            <h3 class="title mx-auto">Buat Profil</h3>
            <div class="row">
                <form action="{{ route('store.profil', Auth::user()->id) }}" class="register-form"  method="POST" >
                    @csrf
                    <div class="col-lg-12">
                        <div class="mb-3">
                            {{-- Status --}}
                            <div class="form-group ">
                                <input type="hidden" class="form-control form-control-danger"  value="active" id="inputDanger1"   name="status_user">
                            </div>
                        </div>
                        <div class="mb-3">
                            {{-- Email --}}
                            <div class="form-group ">
                                <input type="hidden" class="form-control form-control-danger"  value="{{ Auth::user()->email }}"id="inputDanger1"   name="email">
                            </div>
                        </div>
                        <div class="mb-3">
                            {{-- Username --}}
                            <div class="form-group">
                                <input type="hidden" class="form-control form-control-danger"  value="{{ Auth::user()->username }}"id="inputDanger1" name="username">
                            </div>
                        </div>
                        <div class="mb-3">
                            {{-- Nama --}}
                            <label style="color: white"> Nama </label>
                            <div class="form-group @error('nama') has-danger @enderror">
                                <input type="text" class="form-control form-control-danger"  style="background-color: red" value="{{ old('nama') }}"id="inputDanger1" @error('nama') placeholder="Error" @enderror  placeholder="Masukan nama" name="nama">
                                @error('nama')
                                    <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            {{-- No Hp --}}
                            <label style="color: white"> No Handphone</label>
                            <div class="form-group @error('no_hp') has-danger @enderror">
                                <input type="number" class="form-control form-control-danger"  value="{{ old('no_hp') }}"id="inputDanger1" @error('no_hp') placeholder="Error" @enderror  placeholder="Masukan no_hp" name="no_hp">
                                @error('no_hp')
                                    <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button  type="submit" class="btn btn-danger btn-block btn-round my-4">Buat Profil</button>
                </form>
            </div>
        </div>
    </div>
</div>

