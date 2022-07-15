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
                    <div class="font-size-h4">{{count($masyarakatJumlah)}}</div>
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
                    <div class="font-size-h4">{{count($masyarakatPending)}}</div>
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
                    <div class="font-size-h4">{{count($masyarakatTolak)}}</div>
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
                    <div class="font-size-h4">{{count($masyarakatApprove)}}</div>
                </div>
            </a>
        </div>
        </div>
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
                                <th>Nik</th>
                                <th>No.kk</th>
                                <th>Nama</th>
                                <th style="width: 20%;">Alamat</th>
                                <th style="width: 20%;">TTL</th>
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
                                    <td>{{$item->nik}}</td>
                                    <td>{{$item->no_kk}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->alamat}}</td>
                                    <td>{{$item->tempat_lahir}}, {{$item->tanggal_lahir}}</td>
                                    <td>{{$item->jenis_kelamin}}</td>
                                    <td>{{$item->pekerjaan}}</td>
                                    <td>{{$item->agama}}</td>
                                    <!-- <td>
                                        <span class="badge badge-info">Business</span>
                                    </td> -->
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btnDetail btn btn-sm btn-secondary" data-id="{{$item->id}}" title="Detail">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group">
                                            <a href="{{route('masyarakat.edit', $item->id)}}" class="btn btn-sm btn-secondary" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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
                                            <td style="width: 50%">nama </td>
                                            <td style="width: 50%" class="namaM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">alamat </td>
                                            <td style="width: 50%" class="alamatM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">tanggal lahir </td>
                                            <td style="width: 50%" class="tanggalM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">rt </td>
                                            <td style="width: 50%" class="rtM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">rw </td>
                                            <td style="width: 50%" class="rwM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">nik </td>
                                            <td style="width: 50%" class="nikM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">No KK </td>
                                            <td style="width: 50%" class="nokkM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">jenis kelamin </td>
                                            <td style="width: 50%" class="jeniskelaminM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">Pekerjaan </td>
                                            <td style="width: 50%" class="pekerjaanM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">Agama </td>
                                            <td style="width: 50%" class="agamaM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">luas bangunan</td>
                                            <td style="width: 50%" class="luasBangunanM"></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td style="width: 50%">jenis atap </td>
                                            <td style="width: 50%" class="jenisAtapM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">jenis lantai </td>
                                            <td style="width: 50%" class="jenislantaiM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">jenis dinding </td>
                                            <td style="width: 50%" class="jenisdindingM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">sumber listrik </td>
                                            <td style="width: 50%" class="sumberlistrikM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">bahan masak </td>
                                            <td style="width: 50%" class="bahanmasakM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">fasilitas wc </td>
                                            <td style="width: 50%" class="fasilitaswcM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">lahan tinggal </td>
                                            <td style="width: 50%" class="lahantinggalM"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">status </td>
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
        </div>
    <!-- END Full Table -->
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
                $(".namaM").html(": "+ json.nama)
                $(".alamatM").html(": "+ json.alamat)
                $(".tanggalM").html(": "+ json.tempat_lahir+ ","+ json.tanggal_lahir)
                $(".rtM").html(": "+ json.rt)
                $(".rwM").html(": "+ json.rw)
                $(".nikM").html(": "+ json.nik)
                $(".nokkM").html(": "+ json.no_kk)
                $(".jeniskelaminM").html(": "+ json.jenis_kelamin)
                $(".pekerjaanM").html(": "+ json.pekerjaan)
                $(".agamaM").html(": "+ json.agama)
                $(".luasBangunanM").html(": "+ json.luas_bangunan+ " meter")
                $(".jenisAtapM").html(": "+ json.jenis_atap)
                $(".jenislantaiM").html(": "+ json.jenis_lantai)
                $(".jenisdindingM").html(": "+ json.jenis_dinding)
                $(".sumberairM").html(": "+ json.sumber_air)
                $(".sumberlistrikM").html(": "+ json.sumber_listrik)
                $(".bahanmasakM").html(": "+ json.bahan_masak)
                $(".fasilitaswcM").html(": "+ json.fasilitas_wc)
                $(".lahantinggalM").html(": "+ json.lahan_tinggal)
                $(".statusM").html(": "+ json.status)

                $("#dataModal").modal('show')
			}
		})
	})
})
</script>

@endSection