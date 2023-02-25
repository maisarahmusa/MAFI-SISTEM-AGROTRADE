@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Edit Print Naziran
            </div>
            <div class="card-body">
                <form action="/naziran/{{ $printnaziran->id }}" method="post" enctype="multipart/form-data">
                    @method('POST')
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Print Naziran</label>
                        <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">RM</span><input
                                class="form-control" type="number" name="harga_kereta"
                                value="{{ $printnaziran->print_naziran }}" /></div>
                    </div>
                    <button class="btn" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
