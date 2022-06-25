@extends('layouts/admin')

@section('title')
    <title>{{$title}}</title>
@endsection

@section('content')
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Data BPNT </h3>
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
                    <th>status</th>
                    <!-- <th>Status</th> -->
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;    
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
                    <td><span class="badge {{ $item->status == "lolos"? "badge-success":"badge-info" }}">{{$item->status}}</span></td>
                    
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btnDetail btn-sm btn-secondary" data-id="{{$item->id}}" data-toggle="tooltip" title="Detail">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                        @if (auth::user()->role == 'admin')
                            @if ($item->status == "approve")
                            <div class="btn-group">
                                <form action="{{route('masyarakat.lolos', $item->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Lolos">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </form>
                            </div>
                            @endif
                        @endif
                    </td>
                    @endforeach
                </tr>
            </tbody>
            </table>
            
            <div id="dataModal" class="modal fade">  
                <div class="modal-dialog">  
                     <div class="modal-content">  
                            <div class="modal-header">  
                               <h4 class="modal-title">Detail User</h4>  
                            </div>  
                            <div class="modal-body" id="detail_user">
                            <table>
                                <tr>
                                    <td style="width: 50%">nama :</td>
                                    <td style="width: 50%" class="namaM"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">alamat :</td>
                                    <td style="width: 50%" class="alamatM"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">tanggal lahir :</td>
                                    <td style="width: 50%" class="tanggalM"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">rt :</td>
                                    <td style="width: 50%" class="rtM"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">rw :</td>
                                    <td style="width: 50%" class="rwM"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">nik :</td>
                                    <td style="width: 50%" class="nikM"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">No KK :</td>
                                    <td style="width: 50%" class="nokkM"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">jenis kelamin :</td>
                                    <td style="width: 50%" class="jeniskelaminM"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">jenis atap :</td>
                                    <td style="width: 50%" class="jenisatapM"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">jenis lantai :</td>
                                    <td style="width: 50%" class="jenislantaiM"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">jenis dinding :</td>
                                    <td style="width: 50%" class="jenisdindingM"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">sumber listrik :</td>
                                    <td style="width: 50%" class="sumberlistrikM"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">bahan masak :</td>
                                    <td style="width: 50%" class="bahanmasakM"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">fasilitas wc :</td>
                                    <td style="width: 50%" class="fasilitaswcM"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">lahan tinggal :</td>
                                    <td style="width: 50%" class="lahantinggalM"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">status :</td>
                                    <td style="width: 50%" class="statusM"></td>
                                </tr>
                            </table>
                            </div>  
                            <div class="modal-footer">  
                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                            </div>  
                     </div>  
                </div>  
            </div> 
        </div>
    </div>
    
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.btnDetail').click(function(){
                var data_id = $(this).data("id")
                $.ajax({
                    url: "/admin/detail/"+data_id,
                    method: "GET",
                    data: {data_id: data_id},
                    success: function(data){
                        var json = JSON.parse(data);
                        $(".namaM").html(json.nama)
                        $(".alamatM").html(json.alamat)
                        $(".tanggalM").html(json.tanggal_lahir)
                        $(".rtM").html(json.rt)
                        $(".rwM").html(json.rw)
                        $(".nikM").html(json.nik)
                        $(".nokkM").html(json.no_kk)
                        $(".jeniskelaminM").html(json.jenis_kelamin)
                        $(".jenisatapM").html(json.jenis_atap)
                        $(".jenislantaiM").html(json.jenis_lantai)
                        $(".jenisdindingM").html(json.jenis_dinding)
                        $(".sumberairM").html(json.sumber_air)
                        $(".sumberlistrikM").html(json.sumber_listrik)
                        $(".bahanmasakM").html(json.bahan_masak)
                        $(".fasilitaswcM").html(json.fasilitas_wc)
                        $(".lahantinggalM").html(json.lahan_tinggal)
                        $(".statusM").html(json.status)
        
                        $("#dataModal").modal('show')
                    }
                })
            })
        })
        </script>
@endsection