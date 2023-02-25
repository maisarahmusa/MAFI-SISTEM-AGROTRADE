@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Edit Kelulusan
            </div>
            <div class="card-body">
                <form action="/kelulusan" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- <input type="hidden" name="permohonan_id" value="{{$permohonan->id}}"> --}}

                    {{-- <div class="mb-3">
                        <label class="form-label">Tarikh Kelulusan</label>
                        <input class="form-control" type="date" name="tarikhKelulusan" placeholder="Tarikh Kelulusan" />
                    </div> --}}
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option selected="">Sila Pilih</option>
                            <option value="Pending">Pending</option>
                            <option value="Reviewed">Reviewed</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Approval</label>
                        <select class="form-select" aria-label="Default select example" name="approval">
                            <option selected="">Sila Pilih</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                    {{--<div class="mb-3">
                        <label class="form-label">Harga Kereta</label>
                        <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">RM</span><input
                                class="form-control" type="number" name="harga_kereta"
                                value="{{ $kereta->harga_kereta }}" /></div>
                    </div>
                    @if ($kereta->harga_kereta != null)
                        <img src="/storage/{{ $kereta->file_kereta }}" alt="" style="width: 50px">
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Gambar Kereta</label>
                        <input class="form-control" type="file" name="file_kereta" />
                    </div>--}}

                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
