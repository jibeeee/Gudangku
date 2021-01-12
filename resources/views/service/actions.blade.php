<div class="d-flex">
    <a href="{{route('barang.edit', $barang->id)}}" class="btn btn-outline-secondary btn-sm mb-3 mr-1">Edit</a>
    <form action="{{route('barang.destroy', $barang->id)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
    </form>
</div>
