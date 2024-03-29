@extends('layouts/admin')

@section('title')
    <title>{{$title}}</title>
@endsection

@section('content')
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Data {{$title}}</h3>
            {{-- @if (Auth::user()->role == "rw") --}}
                <a href="{{Route('user.create')}}" type="button" class="btn btn-primary mr-2" >Tambah Data</a>
                <a href="{{Route('user.cetak')}}" type="button" class="btn btn-info" >Cetak Data</a>
            {{-- @endif --}}
        
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
                    <th>No</th>
                    <th style="width: 40%;">Nama</th>
                    <th>username</th>
                    <th>Rw</th>
                    <th>email</th>
                    <!-- <th>Status</th> -->
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 $no = 1;    
                ?>
                @foreach ($user as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->username}}</td>
                    <td>{{$item->ketua_rw}}</td>
                    <td>{{$item->email}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{route('user.edit', $item->id)}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="edit">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <div class="btn-group">
                            <form action="{{route('user.hapus', $item->id)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="hapus">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                    @endforeach
                </tr>
            </tbody>
            </table>
            
        </div>
    </div>
    
@endsection