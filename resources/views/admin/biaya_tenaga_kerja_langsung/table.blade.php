<div class="table-responsive">
    <table id="tabledata" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Tenaga Kerja</th>
                <th>Bagian</th>
                <th>Tarif</th>
                <th>Waktu(Jam)</th>
                <th>Total Tarif</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @inject('tenaga_kerja', 'App\Models\TenagaKerja')
            @php
                $no = 1;
                $total = 0;
            @endphp
            @foreach ($biaya_tenaga_kerja as $row)
            @php
                $tenaga_kerja = $tenaga_kerja::where('id',$row->tenaga_kerja_id)->first();
                $total += $row->total_tarif;
            @endphp
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $tenaga_kerja->nama_tenaga_kerja }}</td>
                    <td>{{ $row->bagian }}</td>
                    <td>Rp {{ number_format($tenaga_kerja->upah,2,',','.') }}</td>
                    <td>{{ $row->jam }}</td>
                    <td>Rp {{ number_format($row->total_tarif,2,',','.') }}</td>
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#edit"
                            onclick='editdata({{ $row->id }})'><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-sm btn-danger" onclick='deletedata({{ $row->id }})'><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5"><div class="float-end">Total</div></th>
                <th colspan="2">Rp {{ number_format($total,2,',','.') }}</th>
            </tr>
        </tfoot>
    </table>
</div>

<script>
        var table = $('#tabledata').DataTable();
</script>
