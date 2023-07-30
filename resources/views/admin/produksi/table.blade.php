<div class="table-responsive">
    <table id="tabledata" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pelanggan</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @inject('pelanggan','App\Models\Pelanggan')
            @inject('produk','App\Models\Produk')
            @php
                $no = 1;
            @endphp
            @foreach ($produksi as $row)
            @php
                $pelanggan = $pelanggan::where('id',$row->pelanggan_id)->first();
                $produk = $produk::where('id',$row->produk_id)->first();
            @endphp
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $pelanggan->nama_pelanggan }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>
                        <a href="{{Session::get('base_url')}}/biaya_bahan_baku/{{$row->id}}" class="btn btn-primary">Biaya Produksi</a>
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit"
                            onclick='editdata({{ $row->id }})'>Update</button>
                        <button class="btn btn-danger" onclick='deletedata({{ $row->id }})'>Delete</button>
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
            @endforeach
        </tbody>
    </table>
</div>

<script>
        var table = $('#tabledata').DataTable({
            lengthChange: false,
            buttons: [
                {
                    extend: 'csv',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    extend: 'print',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
            ]
        });

        table.buttons().container()
            .appendTo('#tabledata_wrapper .col-md-6:eq(0)');
</script>
