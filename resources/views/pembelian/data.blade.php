<table class="table table-compact table stripped" id="tbl-pembelian">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Masuk</th>
            <th>Tanggal Masuk</th>
            <th>Total</th>
            <th>Pemasok ID</th>
            <th>User ID</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pembelian  as $p)
            <tr>
                <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->kode_masuk }}</td>
                <td>{{ $p->tanggal_masuk }}</td>
                <td>{{ $p->total }}</td>
                <td>{{ $p->pemasok_id }}</td>
                <td>{{ $p->user_id }}</td>
                <td>
                    <button class="btn text-warning" data-toggle="modal" data-target="#modalFormPembelian" data-mode="edit"
                        data-id="{{ $p->id }}" data-kode_masuk="{{ $p->kode_masuk }}" data-tanggal_masuk="{{ $p->tanggal_masuk }}" data-total="{{ $p->total }}" data-pemasok_id="{{ $p->pemasok_id }}" data-user_id="{{ $p->user_id }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('pembelian.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger delete-data" data-kode_masuk="{{ $p->kode_masuk }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


