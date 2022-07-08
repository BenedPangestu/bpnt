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
                {{-- <a href="{{Route('masyarakat.create')}}" type="button" class="btn btn-primary" >Tambah Data</a> --}}
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
                    <th>Nik</th>
                    <th>Nama</th>
                    <th>Tanggal Masuk</th>
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
                    <td>{{$item->nik}}</td>
                    {{-- @foreach($item->masyarakat as $key) --}}
                    {{-- @endforeach --}}
                    <td>{{$item->nama}}</td>
                    {{-- <td>{{$item->alamat}}</td> --}}
                    {{-- <td>{{$item->tempat_lahir}}, {{$item->tanggal_lahir}}</td> --}}
                    <td>{{$item->created_at->isoFormat('dddd, D MMMM Y')}}</td>
                    {{-- <td>{{$item->jenis_kelamin}}</td> --}}
                    {{-- <td>{{$item->pekerjaan}}</td> --}}
                    {{-- <td><span class="badge {{ $item->status == "lolos"? "badge-success":"badge-info" }}">{{$item->status}}</span></td> --}}
                    
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btnDetail btn-sm btn-secondary" data-id="{{$item->id}}" data-toggle="tooltip" title="Detail">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
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
                            <table id="history" class="history">
                                <thead>
                                    <tr>
                                        <td style="width: 15%">status</td>
                                        <td style="width: 15%">keterangan</td>
                                        <td style="width: 15%">tanggal</td>
                                    </tr>
                                </thead>
                                {{-- <tr>
                                    <td class="statusM"></td>
                                    <td>Berhasil Lolos admin</td>
                                    <td class="tanggalM"></td>
                                </tr> --}}
                            </table>
                            </div>  
                            <div class="modal-footer">  
                               <button type="button" id="btnClose" class="btn btn-default" data-dismiss="modal">Close</button>  
                            </div>  
                     </div>  
                </div>  
            </div> 
        </div>
    </div>
    
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    
<script>
    $(document).ready(function(){
        $.noConflict();
        // var table = $('#history').dataTable();
        
        $('.btnDetail').click(function(){
            var data_id = $(this).data("id");
            // $.fn.dataTable.moment( 'M/D/YYYY' );
            $.ajax({
                url: "/admin/detail/history/"+data_id,
                method: "GET",
                data: {data_id: data_id},
                success: function(data){
                    var json = JSON.parse(data);
                    // table.destroy();
                    // $('#history').empty();
                    console.log(json);
                    // alert(json.nik);

                    table = $('#history').dataTable({
                        data: json,
                        paging: false,
                        destroy: true,
                        // retrieve: true,
                        searching: false,
                        columns: [
                            {"data" : "status"},
                            {"data" : "keterangan"},
                            {"data" : "created_at"},
                        ]
                    });
                    // $(".statusM").html(json.history)
                    $("#dataModal").modal('show')
                }
            })
            // if ($("#dataModal").modal('show')) {
            //     $('.history').dataTable().destroy();
            // }
        })
        $('#btnClose').click(function() {
            // $('#history').destroy();
            // $('#history').empty();
            // $('#history').dataTable();
            // console.log("data di hapus");
        });
        // if ($('#dataModal').hasClass('show') == false) {
            // $('#history').dataTable();
            // console.log("data di hapus");
            // alert($('#dataModal').hasClass('show'));
        // }
        // $('#dataModal').is(':visible', function (e) {
        //     table.destroy();
        //     $('#history').dataTable();
        // })
    })
</script>
@endsection