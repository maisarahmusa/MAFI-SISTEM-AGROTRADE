@extends('layouts.base')

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
                        <b><br> Paparan Kelulusan</br><b>
                    </div>
                    <div class="card-body">
                        {{-- <div><a href="/kelulusan/create" class="btn btn-primary">Kelulusan</a>
                        </div> --}}
                    </div>
                        <div data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                            <div class="table-responsive scrollbar">
                                <table class="table table-bordered table-striped fs--1 mb-0">
                                    <thead class="bg-200 text-900">
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Permohonan </th>
                                            <th>Kategori Permohonan</th> 
                                            <th>Tindakan</th>
                                            {{-- <th>Tarikh Kelulusan</th> --}}
                                            <th>Status</th>
                                            <th>Approval</th>
                                            {{-- <th>Keluaran</th> --}}
                                            {{-- <th>Edit</th>
                                <th>Edit Harga</th>
                                <th>Delete</th>--}} 
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach ($permohonan as $k)
                                        
                                        @if (isset($k->kelulusan))
                                            @foreach($k->kelulusan as $s)
                                            <tr>
                                                <td>{{ $k->id }}</td>
                                                <td>{{$k->jenisPermohonan}}</td>
                                                <td>{{$k->kategori}}</td>
                                                <td><a href="/kelulusan/create/{{$k->id}}">Kemaskini Permohonan</a></td>
                                                {{-- <td>{{ $k->permohonan_id}}</td> --}}
                                                {{-- <td>{{ $s->permohonan_ID }}</td> --}}
                                                {{-- <td>{{ $k->tarikhKelulusan }}</td> --}}
                                                <td>
                                                    @if($k->status===null)
                                                        SILA KEMASKINI DATA
                                                    @else
                                                        {{ $s->status }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($k->status===null)
                                                    SILA KEMASKINI DATA

                                                    @else

                                                    {{ $s->approval }}
                                                    @endif
                                                </td>
                                                {{-- <td>{{ $k->keluaran }}</td> --}}
                                            
                                                {{-- <td>
                                                    <form action="/kelulusan/{{ $k->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-primary">Delete</button>
                                                    </form>
                                                </td> --}}
                                            </tr>

                                            <td>{{$k->approval}}</td>
                                            <td>{{$k->status}}</td>
                                            @endforeach
                                        @endif
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
