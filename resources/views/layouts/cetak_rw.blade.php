<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    {{-- @include('includes.admin.style') --}}
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    {{-- <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css"> --}}

</head>
<style>
    @page { size: A4 }
    body {
        padding: 10px;
    }
    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }
    
    table {
        border-collapse: collapse;
        width: 100%;
    }
    
    .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
    }
    
    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
    }.text-center {
    text-align: center;
    }
</style>
<body class="">
    <section class="">
        <h1>LAPORAN DATA KPM</h1>
        <p>
            peserta = peserta musdes <br>
            approve = hasil dari musdes <br>
            lolos = nama tersebut ada di kementrian
        </p>
        <table class="table">
            <thead>
                <tr>
                    <!-- <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th> -->
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>role</th>
                    <th>Ketua Rw</th>
                    <th>No hp</th>
                    <th>email</th>
                    <!-- <th>Status</th> -->
                    {{-- <th class="text-center">Actions</th> --}}
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no =1;    
                ?>
                @foreach ($rw as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->alamat}}</td>
                    <td>{{$item->jenis_kelamin}}</td>
                    <td>{{$item->role}}</td>
                    <td>{{$item->ketua_rw}}</td>
                    <td>{{$item->no_hp}}</td>
                    <td>{{$item->email}}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </section>
    {{-- @include('includes.admin.script') --}}
</body>
</html>