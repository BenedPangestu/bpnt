@extends('layouts/admin')

@section('title')
    <title>{{$title}}</title>
@endsection

@section('content')
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Data BPNT Pending</h3>
            {{-- @if (Auth::user()->role == "rw")
                <a href="{{Route('masyarakat.create')}}" type="button" class="btn btn-primary" >Tambah Data</a>
                <a href="#" type="button" class="btn btn-info" >Cetak Data</a>
            @endif --}}
        
        </div>
        <div class="block-content block-content-full">
            @if ($message = session('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif 
            @if ($message = session('fail'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
                
            @endif
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <!-- <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th> -->
                    <th>no</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>TTL</th>
                    <th>Nik</th>
                    <th>No.kk</th>
                    <th>Jenis Kelamin</th>
                    <th>Pekerjaan</th>
                    <th>Agama</th>
                    <!-- <th>Status</th> -->
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no =1;    
                ?>
                @foreach ($masyarakat as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->alamat}}</td>
                    <td>{{$item->tempat_lahir}}, {{$item->tanggal_lahir}}</td>
                    <td>{{$item->nik}}</td>
                    <td>{{$item->no_kk}}</td>
                    <td>{{$item->jenis_kelamin}}</td>
                    <td>{{$item->pekerjaan}}</td>
                    <td>{{$item->agama}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <form action="{{route('masyarakat.ajukan', $item->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Ajukan">
                                    <i class="fa fa-check"></i>
                                </button>

                            </form>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-secondary" data-id="{{$item->id}}" data-toggle="tooltip" title="Detail">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                    </td>
                    @endforeach
                </tr>
            </tbody>
            </table>
            
        </div>
    </div>
    
@endsection