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
                    <form class="js-validation-bootstrap" action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}<div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >Nama <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="nama" placeholder="Enter a nama.." value="{{$user->nama}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >username <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="username" placeholder="Enter a username.." value="{{$user->username}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >Email <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="email" placeholder="Enter a email.." value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-suggestions">Alamat <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <textarea class="form-control" id="val-suggestions" name="alamat" rows="5" 
                                placeholder="Masukan isi alamat lengkap..">{{$user->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >Rw <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="ketua_rw" placeholder="Enter a email.." value="{{$user->ketua_rw}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >Jenis Kelamin <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select class="js-select2 form-control" id="val-select2" name="jenis_kelamin" style="width: 100%;" data-placeholder="Choose one..">
                                    <option value="{{$user->jenis_kelamin}}">{{$user->jenis_kelamin}}</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="laki-laki">laki-laki</option>
                                    <option value="perempuan">perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >No hp <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="no_hp" placeholder="Enter a no hp.." value="{{$user->no_hp}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >Agama <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="agama" placeholder="Enter a agama.." value="{{$user->agama}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{url()->previous()}}" type="button" class="btn btn-alt-secondary" data-dismiss="modal">Back</a>
                            <button type="submit" class="btn btn-alt-success" data-dismiss="modal">
                                <i class="fa fa-check"></i> Edit Data
                            </button>
                        </div>
                        <!-- END Overlay Map -->
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection()