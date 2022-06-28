@extends('layouts/admin')

@section('title')
    <title>{{$title}}</title>
@endsection

@section('content')
    <!-- Bootstrap Forms Validation -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit Data</h3>
        </div>
        <div class="block-content">
            <div class="row justify-content-center py-20">
                <div class="col-xl-8">
                    <!-- jQuery Validation functionality is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js -->
                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="js-validation-bootstrap" action="{{route('masyarakat.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >Nama <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input value="{{$user->nama}}" type="text" class="form-control" name="nama" placeholder="Enter a nama..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-suggestions">Alamat <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <textarea class="form-control" id="val-suggestions" name="alamat" rows="5" placeholder="Masukan isi alamat lengkap..">{{$user->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >tempat lahir <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input value="{{$user->tempat_lahir}}" type="text" class="form-control" name="tempat_lahir" placeholder="Enter a tempat lahir..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >tanggal lahir <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input  type="date" value="{{$user->tanggal_lahir}}" class="form-control" name="tanggal_lahir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >RT <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input value="{{$user->rt}}" type="text" class="form-control" name="rt" placeholder="Enter a RT..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >nik <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input value="{{$user->nik}}" type="text" class="form-control" name="nik" placeholder="Enter a nik..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >no_kk <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input value="{{$user->no_kk}}" type="text" class="form-control" name="no_kk" placeholder="Enter a no_kk..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >Jenis Kelamin <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select class="js-select2 form-control" id="val-select2" name="jenis_kelamin" style="width: 100%;" data-placeholder="Choose one..">
                                    <option selected value="{{$user->jenis_kelamin}}">{{$user->jenis_kelamin}}</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="laki-laki">laki-laki</option>
                                    <option value="perempuan">perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >pekerjaan <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input value="{{$user->pekerjaan}}" type="text" class="form-control" name="pekerjaan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >agama <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input value="{{$user->agama}}" type="text" class="form-control" name="agama" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >Luas Bangunan <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input value="{{$user->luas_bangunan}}" type="text" class="form-control" name="luas_bangunan" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >Jenis Atap <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select class="js-select2 form-control" id="val-select2" name="jenis_atap" style="width: 100%;" data-placeholder="Choose one..">
                                    <option selected value="{{$user->jenis_atap}}">{{$user->jenis_atap}}</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="genteng">genteng</option>
                                    <option value="seng">seng</option>
                                    <option value="asbes">asbes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >jenis_lantai <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select class="js-select2 form-control" id="val-select2" name="jenis_lantai" style="width: 100%;" data-placeholder="Choose one..">
                                    <option selected value="{{$user->jenis_lantai}}">{{$user->jenis_lantai}}</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="keramik">keramik</option>
                                    <option value="kayu">kayu</option>
                                    <option value="semen">semen</option>
                                    <option value="tanah">tanah</option>
                                    <option value="bambu">bambu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >jenis_dinding <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select class="js-select2 form-control" id="val-select2" name="jenis_dinding" style="width: 100%;" data-placeholder="Choose one..">
                                    <option selected value="{{$user->jenis_dinding}}">{{$user->jenis_dinding}}</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="tembok">tembok</option>
                                    <option value="kayu">kayu</option>
                                    <option value="bambu">bambu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >sumber_listrik <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select class="js-select2 form-control" id="val-select2" name="sumber_listrik" style="width: 100%;" data-placeholder="Choose one..">
                                    <option selected value="{{$user->sumber_listrik}}">{{$user->sumber_listrik}}</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="pln">pln</option>
                                    <option value="non_pln">non_pln</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >sumber_air_minum <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select class="js-select2 form-control" id="val-select2" name="sumber_air_minum" style="width: 100%;" data-placeholder="Choose one..">
                                    <option selected value="{{$user->sumber_air}}">{{$user->sumber_air}}</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="sumur">sumur</option>
                                    <option value="pam">pam</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >bahan_masak <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select class="js-select2 form-control" id="val-select2" name="bahan_masak" style="width: 100%;" data-placeholder="Choose one..">
                                    <option selected value="{{$user->bahan_masak}}">{{$user->bahan_masak}}</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="gas">gas</option>
                                    <option value="kayu">kayu</option>
                                    <option value="listrik">listrik</option>
                                    <option value="minyak">minyak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >fasilitas_wc <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select class="js-select2 form-control" id="val-select2" name="fasilitas_wc" style="width: 100%;" data-placeholder="Choose one..">
                                    <option selected value="{{$user->fasilitas_wc}}">{{$user->fasilitas_wc}}</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="ada">ada</option>
                                    <option value="tidak">tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >lahan_tinggal <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select class="js-select2 form-control" id="val-select2" name="lahan_tinggal" style="width: 100%;" data-placeholder="Choose one..">
                                    <option selected value="{{$user->lahan_tinggal}}">{{$user->lahan_tinggal}}</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="sewa">sewa</option>
                                    <option value="milik sendiri">milik sendiri</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{url()->previous()}}" type="button" class="btn btn-alt-secondary" data-dismiss="modal">Back</a>
                            <button type="submit" class="btn btn-alt-success" data-dismiss="modal">
                                <i class="fa fa-check"></i> Update Data
                            </button>
                        </form>
                        @if (Auth::user()->role == "admin")
                            @if ($user->status == "calon")
                                <form action="{{route('masyarakat.ajukan', $user->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-alt-info" data-dismiss="modal">Jadikan Peserta</button>
                                </form>
                            @else
                                <form action="{{route('masyarakat.app', $user->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-alt-info" data-dismiss="modal">Approve</button>
                                </form>
                            @endif
                            {{-- <a href="{{route('masyarakat.app', $user->id)}}" class="btn btn-alt-secondary">app</a> --}}
                        @endif
                        </div>
                        <!-- END Overlay Map -->

                </div>
            </div>

        </div>
    </div>
    <script>
        var tanggal = 2001/02/02;
        document.getElementById('tgl').value = tanggal;
    </script>
@endsection()