@extends('layouts.app')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Category</div>
                    <div class="card-body">

                        <form action="{{ route('Kategori.index') }}" method="post">
                            <!-- {{ route('Kategori.index') }} -->
                            <input type="hidden" name="_token" value="DqAiOnjKk4yqTMSMFkaXfOAiqrfpq8idul9ISr7w">
                            <div class="form-group mb-2 mt-2">
                                <label for="">Spot Category</label>
                                <input type="text" name="name" class="form-control ">


                            </div>
                            <div class="form-group mb-2 mt-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

</div>
<!-- /.content-wrapper -->
</div>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="/public/assets/js/jquery.min.js"></script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        })
    }, 3000)
</script>
@endsection


<!-- <table>
    <tbody>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th><a href="">Tambah Data</a></th>
        </tr>
    </tbody>
    @php $no = 1; @endphp
    @foreach ($Kategori as $data)

    <tr>
        <td>{{$no++}}</td>
        <td>{{$data->nama_kategori}}</td>
        <td>{{$data->ket}}</td>
        <td>Hapus:Edit</td>
    </tr>
    @endforeach
</table> -->