<div class="table-responsive">
    <table id="tabledata" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Overhead</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
                $total = 0;
            @endphp
            @foreach ($biaya_overhead as $row)
            @php
                $total += $row->total;
            @endphp
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $row->overhead }}</td>
                    <td>Rp {{ number_format($row->total,2,',','.') }}</td>
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
                <th colspan="2"><div class="float-end">Total</div></th>
                <th colspan="2">Rp {{ number_format($total,2,',','.') }}</th>
            </tr>
        </tfoot>
    </table>
</div>

<script>
        var table = $('#tabledata').DataTable();
</script>
