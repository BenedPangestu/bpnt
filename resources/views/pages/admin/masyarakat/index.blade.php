@extends('layouts/admin')

@section('title')
    <title>{{$title}}</title>
@endsection

@section('content')
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Data Calon BPNT </h3>
            @if (Auth::user()->role == "rw")
                <a href="{{Route('masyarakat.create')}}" type="button" class="btn btn-primary" >Tambah Data</a>
            @endif
            <a href="{{Route('masyarakat.cetak')}}" type="button" class="btn btn-info" >Cetak Data</a>
        
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
            <!-- Full Table -->
            <div>
                <div class="">
                    <p><i class="fa fa-check"></i> = Pernah jadi peserta musdes</p>
                    <p><i class="fa fa-check"></i><i class="fa fa-check"></i> = Pernah lolos di musdes</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <tr>
                                        <th>No</th>
                                        <th>Nik</th>
                                        <th>No.kk</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>TTL</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pekerjaan</th>
                                        <th>Agama</th>
                                        <th>Musdes</th>
                                        <th class="text-center" >Actions</th>
                                    </tr>    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no =1;    
                                ?>
                                @foreach ($masyarakat as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nik}}</td>
                                    <td>{{$item->no_kk}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->alamat}}</td>
                                    <td>{{$item->tempat_lahir}}, {{$item->tanggal_lahir}}</td>
                                    <td>{{$item->jenis_kelamin}}</td>
                                    <td>{{$item->pekerjaan}}</td>
                                    <td>{{$item->agama}}</td>
                                    <td>@if ($item->musdes == 1 && $item->l_musdes == 1)
                                        <i class="fa fa-check"></i><i class="fa fa-check"></i>
                                    @elseif ($item->musdes == 1)
                                    <i class="fa fa-check"></i>
                                    @endif</td>
                                    <td class="text-center">
                                        @if (auth::user()->role == "admin")
                                        <div class="btn-group">
                                            <form action="{{route('masyarakat.pend', $item->id)}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Pending">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="btn-group">
                                            <form action="{{route('masyarakat.app', $item->id)}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Approve">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </form>
                                        </div>
                                        @endif
                                        <div class="btn-group">
                                            <a href="{{route('masyarakat.edit', $item->id)}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </div>
                                        
                                        <div class="btn-group">
                                            <form action="{{route('masyarakat.hapus', $item->id)}}" method="post">
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
            </div>
            <!-- END Full Table -->
        </div>
    </div>
    
@endsection