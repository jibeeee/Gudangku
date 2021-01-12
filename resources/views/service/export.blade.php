<table>
    <thead>
    <tr>
        <th>Nama Barang</th>
        <th>Kode Barang</th>
        <th>Deskripsi Barang</th>
    </tr>
    </thead>
    <tbody>
    @foreach($Barang as $barang)
        <tr>
            <td>{{ $barang->namaBarang }}</td>
            <td>{{ $barang->kodeBarang }}</td>
            <td>{{ $barang->deskripsiBarang }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
