<div class="table-responsive">
    <table id="tabledata" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Bahan</th>
                <th>Harga satuan</th>
                <th>Satuan</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @inject('bahan', 'App\Models\Bahan')
            @inject('satuan', 'App\Models\Satuan')
            @php
                $no = 1;
                $total = 0;
            @endphp
            @foreach ($biaya_bahan_baku as $row)
            @php
                $bahan = $bahan::where('id',$row->bahan_id)->first();
                $satuan = $satuan::where('id',$bahan->satuan_id)->first();
                $subtotal = $row->total;
                $total += $subtotal;
            @endphp
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $bahan->nama_bahan }}</td>
                    <td>Rp {{ number_format($bahan->harga_satuan,2,',','.') }}</td>
                    <td>{{ $satuan->satuan }}</td>
                    <td>{{ $row->qty }}</td>
                    <td>Rp {{ number_format($subtotal,2,',','.') }}</td>
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
