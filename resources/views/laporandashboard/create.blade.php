@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Laporan Dashboard
            </div>
            <div class="card-body">
                <form action="/laporandashboard" method="post">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Tajuk Laporan</label>
                        <input class="form-control" type="text" name="tajukLaporan" placeholder="Tajuk Laporan" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Detail Laporan</label>
                        {{-- <input class="form-control" type="text" name="detailLaporan" placeholder="Detail Laporan" /> --}}
                        <textarea name="detailLaporan" class="form-control" rows="3" ></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Laporan</label>
                        <select class="form-select" aria-label="Default select example" name="jenisLaporan">
                            <option selected="">Sila Pilih</option>
                            <option value="laporan_naziran">laporan naziran</option>
                            <option value="laporan_helpdesk">laporan helpdesk</option>
                            <option value="laporan_permohonan">laporan permohonan</option>
                            <option value="laporan_permit">laporan permit</option>
                        </select>
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label">Tarikh</label>
                        <input class="form-control" type="date" name="tarikh" placeholder="Tarikh" />
                    </div> --}}
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Print</label>
                        <input class="form-control" type="file" name="print_laporan">
                      </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
