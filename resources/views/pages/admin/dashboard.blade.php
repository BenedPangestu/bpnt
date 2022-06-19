@extends('layouts/admin')
@section('title')
    <title>Dashboard</title>
    
@endsection
@section('content')
<!-- Mini Stats -->
<!-- Row #1 -->
<div class="block-full">
    <div class="row invisible" data-toggle="appear">
        <div class="col-6 col-xl-3">
            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-wallet fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Jumlah Data</div>
                    <div class="font-size-h4">{{count($masyarakat)}}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-xl-3">
            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-envelope-open fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Pending</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-xl-3">
            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-users fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Tolak</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-xl-3">
            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-bag fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Approve</div>
                </div>
            </a>
        </div>
        </div>
    <!-- FULL TABLE -->
        <div class="block">
            <div class="block-header block-header-default">
            <h3 class="block-title">Data calon BPNT/KPM di Approve</h3>
            </div>
            <div class="block-content">
                <!-- <p>The first way to make a table responsive, is to wrap it with <code>&lt;div class=&quot;table-responsive&quot;&gt;&lt;/div&gt;</code>. This way the table will be horizontally scrollable and all data will be accessible on smaller screens (&lt; 768px).</p> -->
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>No</th>
                                <!-- <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th> -->
                                <th>Nama</th>
                                <th style="width: 20%;">Alamat</th>
                                <th style="width: 20%;">TTL</th>
                                <th>Nik</th>
                                <th>No.kk</th>
                                <th style="width: 10%;">Jenis Kelamin</th>
                                <th>Pekerjaan</th>
                                <th>Agama</th>
                                <!-- <th>Status</th> -->
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1; ?>
                            @foreach ($masyarakat as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td class="font-w600">{{$item->nama}}</td>
                                    <td>{{$item->alamat}}</td>
                                    <td>{{$item->tempat_lahir}}, {{$item->tanggal_lahir}}</td>
                                    <td>{{$item->nik}}</td>
                                    <td>{{$item->no_kk}}</td>
                                    <td>{{$item->jenis_kelamin}}</td>
                                    <td>{{$item->pekerjaan}}</td>
                                    <td>{{$item->agama}}</td>
                                    <!-- <td>
                                        <span class="badge badge-info">Business</span>
                                    </td> -->
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- END Full Table -->
</div>

@endSection