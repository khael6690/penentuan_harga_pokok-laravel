<div class="table-responsive">
    <table id="tabledata" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Tenaga Kerja</th>
                <th>Jenis Tenaga Kerja</th>
                <th>Upah/Gaji</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($tenaga_kerja as $row)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $row->nama_tenaga_kerja }}</td>
                    <td>{{ ucwords(str_replace('_',' ',$row->jenis_tenaga_kerja)) }}</td>
                    <td>Rp {{ number_format($row->upah,2,',','.') }}</td>
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
