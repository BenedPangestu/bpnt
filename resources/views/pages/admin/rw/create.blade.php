@extends('layouts/admin')

@section('title')
    <title>{{$title}}</title>
@endsection

@section('content')
    <!-- Bootstrap Forms Validation -->
    <div class="block">
        <div class="block-header bg-primary-dark">
            <h3 class="block-title" style="color: white">Form Data Rw</h3>
        </div>
        <div class="block-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-content">
                        <div class="block">
                            <div class="block-content">
                                <div class="row justify-content-center ">
                                    <div class="col-lg">
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
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <strong>Whoops!</strong> There were some problems with your input.
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        {{-- @dump($post) --}}
                                        <!-- jQuery Validation functionality is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js -->
                                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                        {{-- {!! KecamatanModel::open(['action' =>'KecamatanController@store', 'method' => 'POST'])!!} --}}
                                        <form class="js-validation-bootstrap" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label"  >Nama <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" value="{{old('nama')}}" class="form-control" name="nama" placeholder="Enter a nama..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label"  >username <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" value="{{old('username')}}" class="form-control" name="username" placeholder="Enter a username.." >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label"  >password <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" value="{{old('password')}}" class="form-control" name="password" placeholder="Enter a password..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label"  >Email <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" value="{{old('email')}}" class="form-control" name="email" placeholder="Enter a email..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label"  >role <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" name="role" value="rw" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-suggestions">Alamat <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <textarea class="form-control" id="val-suggestions" name="alamat" rows="5" placeholder="Masukan isi alamat lengkap..">{{old('alamat')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label"  >rw <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" value="{{old('rw')}}" class="form-control" name="rw" placeholder="Enter a rw..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label"  >Jenis Kelamin <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <select class="js-select2 form-control" id="val-select2" name="jenis_kelamin" style="width: 100%;" data-placeholder="Choose one..">
                                                        <option value="{{old('jenis_kelamin')}}" selected>{{old('jenis_kelamin')}}</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                        <option value="laki-laki">laki-laki</option>
                                                        <option value="perempuan">perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label"  >no_hp <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" value="{{old('no_hp')}}" class="form-control" name="no_hp" placeholder="Enter a no_hp..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label"  >agama <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" value="{{old('agama')}}" class="form-control" name="agama" value="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                {{-- <a href="" type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</a> --}}
                                                <a href="{{route('user.rw')}}" type="button" class="btn btn-alt-secondary" data-dismiss="modal">Back</a>
                                                <button type="submit" class="btn btn-alt-success" data-dismiss="modal">
                                                    <i class="fa fa-check"></i> Tambah Data
                                                </button>
                                            </div>
                                            <!-- END Overlay Map -->
                                        </form>
                                            {{-- {!! KecamatanModel::open(['action' =>'ContactController@store', 'method' => 'POST'])!!} --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap Forms Validation -->
@endsection()