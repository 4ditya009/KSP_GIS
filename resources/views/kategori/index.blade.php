@extends('layouts.app')
@section('content')

<!-- <head>
    <link rel="stylesheet" href="/public/assets/css/adminlte.min.css">
    <link href="/public/assets/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/public/assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head> -->

<section class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">List Category Spot
                        <a href="#" class="btn btn-info btn-sm float-right">Add</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="dataCategory">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Spot Category</th>
                                    <th>Opsi</th>
                                </tr>
                            <tbody>
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
                <form action="" method="POST" id="deleteForm">
                    <input type="hidden" name="_token" value="DqAiOnjKk4yqTMSMFkaXfOAiqrfpq8idul9ISr7w"> <input type="hidden" name="_method" value="DELETE"> <input type="submit" value="Hapus" style="display: none">
                </form>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection