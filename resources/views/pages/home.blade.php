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
            <div class="block-header" style="background-color: #26b79e">
                <h3 class="block-title">Data Lolos BPNT</h3>
                {{-- <p>{{$rt}}</p> --}}
                {{-- <p>{{$rw}}</p> --}}
                @foreach ($masyarakatValue as $item)
                    {{-- {{$item->rt}} --}}

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
                                <select class="js-select2 form-control" id="val-select2" name="rt" style="width: 100%;" data-placeholder="Choose one..">
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
                                <select class="js-select2 form-control" id="val-select2" name="rw" style="width: 100%;" data-placeholder="Choose one..">
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