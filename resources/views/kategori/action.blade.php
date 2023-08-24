<table>
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
</table>