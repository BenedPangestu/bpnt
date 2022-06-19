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
                    <form class="js-validation-bootstrap" action="{{route('sekolah.update', $sekolah->id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >Nama sekolah <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control"    name="nama_sekolah" placeholder="Enter a sekolah.." value="{{$sekolah->nama_sekolah}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-select1">kecamatan <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select class="js-select1 form-control" id="val-select1" name="kecamatan_id" style="width: 100%;" data-placeholder="Choose one..">
                                    <option>{{$sekolah->kecamatan->nama_kecamatan}}</option>
                                    @foreach ($kecamats as $items)
                                        <option value="{{$items->id}}">{{$items->nama_kecamatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >status <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select class="js-select2 form-control" id="val-select2" name="status_sekolah" style="width: 100%;" data-placeholder="Choose one..">
                                    <option value="{{$sekolah->status_sekolah}}">Swasta</option>
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="swasta">Swasta</option>
                                    <option value="negri">Negri</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >jenjang <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="jenjang" value="{{$sekolah->jenjang}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >gambar <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="file" class="form-control"  value="{{$sekolah->gambar}}"  name="image" placeholder="Enter a gambar.." accept="image/*" >{{$sekolah->gambar}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-suggestions">Alamat <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <textarea class="form-control" id="val-suggestions" name="alamat" rows="5">{{$sekolah->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"  >posisi sekolah <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" readonly class="form-control" id="posisi_sekolah" name="posisi_sekolah" value="{{$sekolah->posisi_sekolah}}" placeholder="Enter a posisi_sekolah..">
                            </div>
                        </div>
                        <!-- Overlay Map -->
                        <div class="block">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Overlay Map</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option">
                                        <i class="si si-wrench"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Overlay Map Container -->
                            <div id="map" style="height: 300px"></div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{url()->previous()}}" type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-alt-success" data-dismiss="modal">
                                <i class="fa fa-check"></i> Tambah Data
                            </button>
                        </div>
                        <!-- END Overlay Map -->
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Leaflet Forms Validation -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        
        var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11'
        });
    
        var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/satellite-v9'
        });
    
    
        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
    
        var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/dark-v10'
        });
        var map = L.map('map', {
            center: [{{$sekolah->posisi_sekolah}}],
            zoom: 14,
            layers: [peta1],
        });
        var baseMaps = {
        "Grayscale": peta1,
        "Satelite": peta2,
        "Streets": peta3,
        "Dark": peta4,
        };
        L.control.layers(baseMaps).addTo(map);

        //titik koordinat
        var curLocation = [{{$sekolah->posisi_sekolah}}];
        map.attributionControl.setPrefix(false);
        var marker = new L.marker(curLocation, {
            draggable: 'true',
        });
        map.addLayer(marker);

        //drag koordinat
        marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            marker.setLatLng(position, {
                draggable: 'true',
            }).bindPopup(posisi).update();
            $("#posisi_sekolah").val(position.lat + "," + position.lng).keyup();
        });
        //koordniat di klik
        var posisi = document.querySelector("[name=posisi_sekolah]");
        map.on("click", function(event) {
            var lat = event.latlng.lat;
            var lng = event.latlng.lng;

            if (!marker){
                marker = L.marker(event.latLng).addTo(map)
            }else{
                marker.setLatLng(event.latlng);
            }
            posisi.value = lat + "," + lng;
        });
    </script>
@endsection()