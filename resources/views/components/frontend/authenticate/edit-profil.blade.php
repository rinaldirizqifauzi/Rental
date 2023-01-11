<div class="row">
    <div class="col-lg-12  ml-auto mr-auto">
        <div class="card card-register" >
            <h3 class="title mx-auto">Update Profil</h3>
            <form action="{{ route('update.profil', Auth::user()->id) }}" class="register-form"  method="POST" >
                @csrf
                @method('put')
                <div class="mb-3">
                    {{-- Status --}}
                    <div class="form-group ">
                        <input type="hidden" class="form-control form-control-danger"  value="active" id="inputDanger1"   name="status_user">
                    </div>
                </div>
                <div class="mb-3">
                    {{-- Username --}}
                    <div class="form-group">
                        <input type="text" class="form-control form-control-danger"  value="{{ Auth::user()->username }}" id="inputDanger1" name="username">
                    </div>
                </div>
                <div class="mb-3">
                    {{-- Nama --}}
                    <label style="color: white"> Nama </label>
                    <div class="form-group @error('nama') has-danger @enderror">
                        <input type="text" class="form-control form-control-danger"  value="{{ old('nama', $user->detail->first()->nama) }}"id="inputDanger1" @error('nama') placeholder="Error" @enderror  placeholder="Masukan nama" name="nama">
                        @error('nama')
                            <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    {{-- No Hp --}}
                    <label style="color: white"> No Handphone</label>
                    <div class="form-group @error('no_hp') has-danger @enderror">
                        <input type="number" class="form-control form-control-danger"  value="{{ old('no_hp', $user->detail->first()->no_hp) }} "id="inputDanger1" @error('no_hp') placeholder="Error" @enderror  placeholder="Masukan no_hp" name="no_hp">
                        @error('no_hp')
                            <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                </div>
                <button  type="submit" class="btn btn-danger btn-block btn-round my-4">Update Profil</button>
            </form>
        </div>
    </div>
</div>

