@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Show Sistem Agro Trade
            </div>
            <div class="card-body">
                {{-- <form action="/sistemagrotrade" method="post"> --}}
                    {{-- @csrf --}}

                    {{-- <div class="mb-3">
                        <label class="form-label">Permohonan ID</label>
                        <input class="form-control" type="text" name="permohonan_ID" placeholder="Permohonan ID" />
                    </div> --}}
                    <div class="mb-3">
                        <label class="form-label">Tarikh Permohonan</label>
                        <input class="form-control" type="date" name="tarikhPermohonan" placeholder="Tarikh Permohonan" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Permohonan</label>
                        <input class="form-control" type="text" name="jenisPermohonan" placeholder="Jenis Permohonan" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" name="kategori">
                            <option selected="">Sila Pilih</option>
                            <option value="Import">Import</option>
                            <option value="Eksport">Eksport</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keluaran</label>
                        {{-- <input class="form-control" type="text" placeholder="Jenis Kereta" name="jenis_kereta"/> --}}
                        {{--<textarea name="jenis_kereta" class="form-control" rows="5" ></textarea>--}}
                        <select class="form-select" aria-label="Default select example" name="keluaran">
                            <option selected="">Sila Pilih</option>
                            <option value="Beras">Beras</option>
                            <option value="Kobis bulat">Kobis bulat</option>
                            <option value="Kelapa biji tua">Kelapa biji tua</option>
                            <option value="Susu cair">Susu cair</option>
                        </select> 
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label">Status Permohonan</label>
                    </div> --}}
                   {{-- <div class="mb-3">
                        <label class="form-label">Harga Kereta</label>
                        <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">RM</span><input
                                class="form-control" type="number" name="harga_kereta"/></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Kereta</label>
                        <input class="form-control" type="file" name="file_kereta"/>
                    </div>--}}

                    {{-- <button class="btn btn-primary" type="submit">Simpan</button> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
