@extends('layouts/app')
@section('title')
    <title>Data Realisasi</title>
    
@endsection
@section('content')
<!-- Mini Stats -->
<!-- Row #1 -->
<div class="block-full">
    
        {{-- {{Auth::user()}} --}}
    <!-- FULL TABLE -->
        <div class="block"> 
            <div class="block-header block-header-default">
            <h3 class="block-title">Data calon BPNT/KPM</h3>
            </div>
            <div class="block-content">
                <!-- <p>The first way to make a table responsive, is to wrap it with <code>&lt;div class=&quot;table-responsive&quot;&gt;&lt;/div&gt;</code>. This way the table will be horizontally scrollable and all data will be accessible on smaller screens (&lt; 768px).</p> -->
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Rt</th>
                                <th>Rw</th>
                                <th style="width: 15%;">TTL</th>
                                <th>Jenis Kelamin</th>
                                <th>Pekerjaan</th>
                                <th>Agama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1; ?>
                            @foreach ($masyarakat as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->rt}}</td>
                                    <td>{{$item->rw}}</td>
                                    {{-- <td>{{$item->alamat}}</td> --}}
                                    <td>{{$item->tempat_lahir}}, {{$item->tanggal_lahir}}</td>
                                    <td>{{$item->jenis_kelamin}}</td>
                                    <td>{{$item->pekerjaan}}</td>
                                    <td>{{$item->agama}}</td>
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