@extends('layouts.app')
<title>List Barang</title>
@section('content')



    <h1 class="text-center">List Barang</h1>
    <br>

    <div class="mb-3 text-right">
        <a href="{{route('barang.export')}}" class="btn btn-outline-secondary btn-sm">Export To Excel</a>
    </div>

    <table class="table table-hover m-0" id="barangTable">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">CV</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        {{-- <tbody>
            @foreach ($daftarBarang as $key => $barang)
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$barang->namaBarang}}</td>
                    <td>{{$barang->kodeBarang}}</td>
                    <td>{{$barang->deskripsiBarang}}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{route('barang.edit', $barang->id)}}" class="btn btn-outline-secondary btn-sm mb-3 mr-1">Edit</a>
                            <form action="{{route('barang.destroy', $barang->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody> --}}
      </table>

      {{-- <a href="{{route('barang.create')}}" class="btn btn-secondary mb-3">Tambah Barang</a> --}}


@endsection

@section('custom_script')
      <script>
          $(document).ready( function (){
              $('#barangTable').DataTable({
                  processing : true,
                  serverSide : true,
                  ajax: "{{route ('barang.getData')}}",
                  columns :[
                      {data: 'id', name: 'id'},
                      {data: 'namaBarang', name: 'namaBarang'},
                      {data: 'kodeBarang', name: 'kodeBarang'},
                      {data: 'deskripsiBarang', name: 'deskripsiBarang'},
                      {data: 'filename_unique', name: 'filename_unique'},
                      {data: 'actions', name: 'actions'},
                  ]
              });
            });
      </script>
@endsection
