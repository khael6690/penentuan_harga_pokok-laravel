<div class="table-responsive">
    <table id="tabledata" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Bahan</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Satuan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @inject('satuan','App\Models\Satuan')
            @php
                $no = 1;
            @endphp
            @foreach ($bahan as $row)
            @php
                $satuan = $satuan::where('id',$row->satuan_id)->first();
            @endphp
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $row->nama_bahan }}</td>
                    <td>{{ ucwords($row->jenis_bahan) }}</td>
                    <td>Rp {{ number_format($row->harga_satuan,2,',','.') }}</td>
                    <td>{{ $satuan->satuan }}</td>
                    <td>
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
