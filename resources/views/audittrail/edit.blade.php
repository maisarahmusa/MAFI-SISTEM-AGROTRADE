@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Edit Audit Trail
            </div>
            <div class="card-body">
                <form action="/audittrail/{{ $audittrail->id }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Activity</label>
                        <input class="form-control" type="text" name="activity" placeholder="Activity" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input class="form-control" type="date" name="date" placeholder="Date" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">User</label>
                        <input class="form-control" type="text" name="user" placeholder="User" />
                    </div>
                    {{-- <div class="mb-3"> --}}
                        {{-- guna time js/jquery --}}
                            {{-- <label for="formFile" class="form-label">Print</label> --}}
                            {{-- <input class="form-control" type="file" id="file_audittrail"> --}}

                    {{--<div class="mb-3">
                        <label class="form-label">Harga Kereta</label>
                        <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">RM</span><input
                                class="form-control" type="number" name="harga_kereta"
                                value="{{ $kereta->harga_kereta }}" /></div>
                    </div>--}}
                    {{-- @if ($audittrail->print_audit != null)
                        <img src="/storage/{{ $audittrail->file_audittrail }}" alt="" style="width: 50px">
                    @endif --}}
                    {{-- <div class="mb-3">
                        <label class="form-label">Gambar Kereta</label>
                        <input class="form-control" type="file" name="file_kereta" />
                    </div> --}}

                    <button class="btn btn-outline-dark btn-sm" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
