@extends('layouts.base')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<!-- Styles -->
{{--<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }

    #chartdiv2 {
        width: 100%;
        height: 500px;
    }

    #chartdiv3 {
        width: 100%;
        height: 500px;
    }
</style>--}}
@section('content')
    <div class="container-fluid">
       {{--} <div class="card mb-5">
            <div class="card-header">
                Chart 1
            </div>
            <div class="card-body">
                <div id="chartdiv"></div>
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-header">
                Chart 2
            </div>
            <div class="card-body">
                <div id="chartdiv2"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Chart 3
                    </div>
                    <div class="card-body">
                        12345
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Chart 4
                    </div>
                    <div class="card-body">
                        6789
                    </div>
                    <div id="chartdiv4"></div>
                </div>
            </div>--}}
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        {{-- table
                    </div> --}}
                    <div class="card-body">
                        <div><a href="/sistemagrotrade/create" class="btn btn-primary">Permohonan</a>
                        </div>
                        {{-- <div><a href="/admin/create" class="btn btn-primary">Admin</a>
                        </div> --}}
                    </div>
                    {{-- mcm mn nk buat spacing?.. --}}
                        <div data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                            <div class="table-responsive scrollbar">
                                <table class="table table-bordered table-striped fs--1 mb-0">
                                    <table id="example" class="cell-border" style="width:100%">
                                        <thead class="bg-200 text-900">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Jenis Permohonan</th>
                                                <th class="text-center">Kategori</th>
                                                <th class="text-center">Keluaran</th>
                                                <th class="text-center">Status Permohonan</th>
                                                <th class="text-center">Approval</th>
                                                <th class="text-center">Tindakan</th>
                                                <th></th>
                                            {{-- <th>Edit</th>
                                <th>Edit Harga</th>
                                <th>Delete</th>--}} 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sistemagrotrade as $key => $s)
                                            <tr>
                                                {{-- <td>{{ $s->id }}</td> --}}
                                                <td style="text-align: center; vertical-align: middle;">{{$key + 1}}</td>
                                                {{-- <td>{{ $s->permohonan_ID }}</td> --}}
                                                {{-- <td>{{ $s->tarikhPermohonan }}</td> --}}
                                                <td style="text-align: center; vertical-align: middle;">{{ $s->jenisPermohonan }}</td>
                                                <td style="text-align: center; vertical-align: middle;">{{ $s->kategori }}</td>
                                                <td style="text-align: center; vertical-align: middle;">{{ $s->keluaran }}</td>
                                                <td style="text-align: center; vertical-align: middle;">{{ $s->status_permohonan}}</td>
                                                <td style="text-align: center; vertical-align: middle;">{{ $s->approval}}</td>
                                                <td style="text-align: center; vertical-align: middle;"><a href="/sistemagrotrade/{{$s->id}}/edit">Kemaskini</a></td>
                                                {{-- <td>RM {{ $k->harga_kereta }}</td> --}}
                                                {{-- <td><a href="/storage/{{ $k->file_kereta }}" target="_blank">{{ $k->file_kereta }}</a></td> --}}
                                                {{-- <td><img src="/storage/{{ $k->file_kereta }}" alt="" style="width: 50px"></td>
                                    <td><a href="/kereta/{{ $k->id }}/edit" class="btn">Edit</a></td>
                                    <td><a href="/kereta/{{ $k->id }}/edit-harga" class="btn">Edit Harga</a> --}}
                                                </td>
                                                <td>
                                                    <form action="/sistemagrotrade/{{ $s->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-outline-dark btn-sm">Delete</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
@endsection

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
<script>
        $(document).ready( function () {
    $('#example').DataTable();
} );

</script>