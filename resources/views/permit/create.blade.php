@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <b>Sila isikan bahagian Permit</b> 
            </div>
            <div class="card-body">
                <form action="/permit" method="post">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" name="kategori">
                            <option selected="">Sila Pilih</option>
                            <option value="new">new</option>
                            <option value="renew">renew</option>
                        </select>
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input class="form-control" type="date" name="date" placeholder="Date" />
                    </div> --}}
                    <div class="mb-3">
                        <label class="form-label">Detail</label>
                        <input class="form-control" type="text" name="details" placeholder="Details" />
                    </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label">Print</label>
                        <input class="form-control" type="file" name="print_permit">
                      </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
