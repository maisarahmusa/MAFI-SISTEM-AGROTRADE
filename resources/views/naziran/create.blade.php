@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
               <b>Naziran</b>
            </div>
            <div class="card-body">
                <form action="/naziran" method="post">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Subject</label>
                        <input class="form-control" type="text" name="subject" placeholder="Subject" />
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input class="form-control" type="date" name="date" placeholder="Date" />
                    </div> --}}
                    <div class="mb-3">
                        <label class="form-label">Pemerhatian</label>
                        {{-- <input class="form-control" type="text" name="pemerhatian" placeholder="Pemerhatian" /> --}}
                        <textarea name="pemerhatian" class="form-control" rows="3" placeholder="Pemerhatian"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Maklum Balas</label>
                        {{-- <input class="form-control" type="text" name="maklumBalas" placeholder="Maklum Balas" /> --}}
                        <textarea name="maklumBalas" class="form-control" rows="3" placeholder="Maklum Balas"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Print</label>
                        <input class="form-control" type="file" name="print_naziran">
                      </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
