@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Admin
            </div>
            <div class="card-body">
                <form action="/sistemagrotrade" method="post">
                    @csrf

                    {{-- <div class="mb-3">
                        <label class="form-label">Permohonan ID</label>
                        <input class="form-control" type="text" name="permohonan_ID" placeholder="Permohonan ID" />
                    </div> --}}
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input class="form-control" type="text" name="name" placeholder="Name" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username" />
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                    </div>
                   {{-- <div class="mb-3">
                        <label class="form-label">Harga Kereta</label>
                        <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">RM</span><input
                                class="form-control" type="number" name="harga_kereta"/></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Kereta</label>
                        <input class="form-control" type="file" name="file_kereta"/>
                    </div>--}}

                    <button class="btn" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
