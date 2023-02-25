@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
               <b>Helpdesk</b> 
            </div>
            <div class="card-body">
                <form action="/helpdesk" method="post">
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
                        <label class="form-label">Details</label>
                        <textarea name="details" class="form-control" rows="3" placeholder="Details"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Print</label>
                        <input class="form-control" type="file" name="print_helpdesk">
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

                    <button class="btn btn-primary" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
