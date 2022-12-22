@extends('user.template')
@section('title', 'Katalog Pengelola')

@section('content')
<!doctype html>
<html>

<style>
    .tablestart {
        padding: 20px;
    }

    .btn-edit {
        color: #183153;
        font-weight: 400;
        width: 170px;
        font-size: 16px;
        border-radius: 10px;
        background-color: #D98829;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
</head>

<body>
    <div class="w-10/12 ml-3 bg-white border border-gray-200 rounded-2xl shadow-md max-h-80vh overflow-auto p-4">
        <br>
        <p class="col-sm-12 text-blueDark text-xl mt-2" style="font-size: 25px;">Katalog Pengelola</p>
        <div class="col-sm-12 tablestart">
        <form action="{{ route('admin.searchpengelola') }}" method="post" class="row">
                @csrf
                <div class="col-sm-10">
                    <input type="text" id="search" class="form-control" placeholder="Cari Pengelola" name="search">
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="focus:outline-none text-blueDark w-full bg-orange hover:bg-orange font-bold rounded-lg text-l mr-2 mb-2 p-2 dark:focus:ring-yellow-900">Cari</button>
                </div>

            </form>
        </div>
        @if ($data->count() == 0)
        <div class="text-center" style="padding: 60px;margin-bottom:50px;">
            <a href=""><i class="fas fa-exclamation-circle" style="font-size: 100px;color:#ffec58"></i></a>
            <br>
            <h5 style="margin-top: 20px;font-weight:bold;">Tidak ada pengguna!</h5>
        </div>
        @else
        <div class="col-sm-12 tablestart" style="padding-right: 10px;">
            <table class="table">
                <thead>
                </thead>
                @if($data->count() == 0)
                <div class="text-center" style="padding: 60px;margin-bottom:50px;">
                    <a href=""><i class="fas fa-exclamation-circle" style="font-size: 100px;color:#ffec58"></i></a>
                    <br>
                    <h5 style="margin-top: 20px;">Tidak ada tempat parkir terdaftar</h5>
                </div>
                @else
                <tbody>
                    @foreach ($data as $dt)

                    @endforeach


                    @foreach($data as $dt)
                    @if($dt->role == 'pengelola' )

                    <tr class="bg-white border border-gray-200 rounded-2xl shadow-md overflow-auto">
                        <td><i class="fa-solid fa-user" style="font-size: 30px;padding-left:1px;"></i><br>
                        </td>
                        <td>{{ $dt->name }}</td>
                        <td>{{$dt->id}}</td>
                        <td>{{$dt->email}}</td>
                        <td>*****</td>
                        <?php $parkir_info = App\Models\RegParkir::find($dt->id); ?>
                        @if($parkir_info)
                        <td>{{$parkir_info->slot}}</td>
                        <td>{{$parkir_info->biaya}}</td>
                        <td>{{$parkir_info->lokasi}}</td>
                        @else
                        <td>Data kosong</td>
                        <td>Data kosong</td>
                        <td>Data kosong</td>
                        @endif
                    </tr>

                    @endif
                    @endforeach



                </tbody>
                @endif
            </table>
        </div>
        @endif
    </div>
    </div>
</body>

</html>
@endsection