@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Edit Permohonan
            </div>
            <div class="card-body">
                <form action="/sistemagrotrade/{{ $sistemagrotrade->id }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    {{-- <div class="mb-3">
                        <label class="form-label">Tarikh Permohonan</label>
                        <input class="form-control" type="date" name="tarikhPermohonan" placeholder="Tarikh Permohonan" value="{{date('d/m/Y',strtotime($sistemagrotrade->tarikhPermohonan))}}" />
                    </div> --}}

                    <div class="mb-3">
                        <label class="form-label">Jenis Permohonan</label>
                        <input class="form-control" type="text" name="jenisPermohonan"  value="{{$sistemagrotrade->jenisPermohonan}}" />
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" name="kategori">
                            <option hidden selected="{{ $sistemagrotrade->kategori }}">{{ $sistemagrotrade->kategori }}</option>
                            <option @if($sistemagrotrade->kategori=="")selected @endif value"""></option>
                            <option value="Import">Import</option>
                            <option value="Eksport">Eksport</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keluaran</label>
                        {{-- <input class="form-control" type="text" placeholder="Jenis Kereta" name="jenis_kereta" value="{{ $kereta->jenis_kereta }}" /> --}}
                        {{-- <textarea name="keluaran" class="form-control" rows="3">{{ $sistemagrotrade->keluaran }}</textarea> --}}
                    {{-- </div> --}}
                    <select class="form-select" aria-label="Default select example" name="keluaran">
                        <option hidden selected="{{ $sistemagrotrade->keluaran }}">{{ $sistemagrotrade->keluaran }}</option>
                        <option @if($sistemagrotrade->keluaran=="")selected @endif value"""></option>
                        {{-- <option selected="">Sila Pilih</option> --}}
                        <option value="Beras">Beras</option>
                        <option value="Kobis bulat">Kobis bulat</option>
                        <option value="Kelapa biji tua">Kelapa biji tua</option>
                        <option value="Susu cair">Susu cair</option>
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

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" aria-label="Default select example" name="status">
                            {{-- <option hidden selected="{{ $sistemagrotrade->status_permohonan }}">{{ $sistemagrotrade->status_permohonan }}</option>
                            <option @if($sistemagrotrade->status_permohonan=="")selected @endif value"""></option> --}}
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

                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
