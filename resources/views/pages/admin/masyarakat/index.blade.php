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
            @foreach ($masyarakatValue as $item)
                <?php
                    $arr[] = $item->rt; 
                    $rtt[] = $item->rw;
                ?>
            @endforeach
            <?php 
                $array = array_unique($arr);
                $arrayRt = array_unique($rtt);
            ?>
            <div class="block-title row" style="justify-content: center;" style="align-content: center">
                <form class="row" action="{{url('/realisasi')}}" method="get">
                    <div class=" row">
                        <label class="col-lg-2 col-form-label"  >Rt</label>
                        <div class="col-lg-8">
                            <select class="js-select2 form-control" id="" name="rt" style="width: 100%;" data-placeholder="Choose one..">
                                <option value="" selected></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                @foreach ($array as $value)
                                {{-- {{dd($item->rt)}} --}}
                                <?php 
                                // $array = array_unique($item->rt);
                                    // print_r($item->rt);
                                    ?>
                                    <option value="{{$value}}">{{$value}}</option>
                                    {{-- <option value="perempuan">perempuan</option> --}}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class=" row">
                        <label class="col-lg-2 col-form-label"  >Rw</label>
                        <div class="col-lg-8">
                            <select class="js-select2 form-control" id="" name="rw" style="width: 100%;" data-placeholder="Choose one..">
                                <option value="" selected></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                @foreach ($arrayRt as $value)
                                {{-- {{dd($item->rt)}} --}}
                                <?php 
                                // $array = array_unique($item->rt);
                                    // print_r($item->rt);
                                    ?>
                                    <option value="{{$value}}">{{$value}}</option>
                                    {{-- <option value="perempuan">perempuan</option> --}}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">

                        <button class="btn btn-primary btn-sm ml-4" style="" type="submit">Submit</button>
                        <a class="btn btn-secondary ml-4"  style="align-items: center" type="button" href="{{route('realisasi')}}">Reset</a>
                    </div>
                </form>
            </div>
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
                                                <button type="submit" class="btn btn-sm btn-secondary" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" data-toggle="tooltip" title="hapus">
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