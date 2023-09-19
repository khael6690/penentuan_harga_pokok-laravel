@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/toastify-js/src/toastify.css">
@endpush

@section('content')
    @include('owner.sidebar')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{$title}}</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-3">
                    <div class="list-group">
                        <a href="{{Session::get('base_url')}}/produksi/{{$produksi_id}}" class="list-group-item list-group-item-action active" aria-current="true">
                            Laporan Biaya Pokok Produksi Standar
                        </a>
                      </div>
                </div>
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <button type="button" class="btn btn-primary btn-sm" id="cetak"><i class="fa fa-print"></i> Cetak</button>
                            </div>

                            <style>
                                @media print {
                                    body * {
                                        visibility: hidden;
                                    }

                                    .pagebreak { page-break-before: auto; }
                                }
                            </style>
                            <print id="areaprint" style="background: white;">
                            <div id="header">
                                <table>
                                    <tr>
                                        <td>
                                            <img src="{{ url('') }}/uploads/perusahaan/logo/{{$perusahaan->foto}}" width="150" height="150">
                                        </td>
                                        <td>
                                            <h1 class="text-center">{{$perusahaan->nama}}</h1>
                                            <p class="text-center">{{$perusahaan->alamat}}</p>
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                                <table>
                                    <tr>
                                        <td>Produk</td>
                                        <td>:&nbsp;&nbsp;&nbsp;</td>
                                        <td>{{$produk->nama_produk}} <br>
                                        Jenis : {{@$produk->jenis}} <br>
                                        Ukuran : {{@$produk->ukuran}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kode Produksi</td>
                                        <td>:&nbsp;&nbsp;&nbsp;</td>
                                        <td>{{$produksi_id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Pemesan</td>
                                        <td>:&nbsp;&nbsp;&nbsp;</td>
                                        <td>{{$pelanggan->nama_pelanggan}}</td>
                                    </tr>
                                </table>
                            </div>
                            <hr><hr>
                            <br><br>

                            <div class="card">
                                <div class="card-header">
                                    <strong>Biaya Bahan Baku Langsung Standar</strong>
                                </div>
                                <div class="card-body">
                                  <table class="table">
                                        @inject('Bahan', 'App\Models\Bahan')
                                        @foreach ($bahan_baku as $row)
                                        @php
                                            $bahan = $Bahan::where('id',$row->bahan_id)->first();
                                        @endphp
                                        <tr>
                                            <td>
                                                {{$bahan->nama_bahan}}
                                            </td>
                                            <td>
                                                Rp {{ number_format($bahan->harga_satuan,2,',','.') }} x {{$row->qty}}
                                            </td>
                                            <td>
                                                Rp {{ number_format($row->total,2,',','.') }}
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                               = <b>Rp {{ number_format($biaya_bahan_baku,2,',','.') }}</b>
                                            </td>
                                        </tr>
                                  </table>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <strong>Biaya Tenaga Kerja Langsung Standar</strong>
                                </div>
                                <div class="card-body">
                                  <table class="table">
                                        @inject('TenagaKerja', 'App\Models\TenagaKerja')
                                        @foreach ($tenaga_kerja_langsung as $row)
                                        @php
                                            $tk = $TenagaKerja::where('id',$row->tenaga_kerja_id)->first();
                                        @endphp
                                        <tr>
                                            <td>
                                                {{$tk->nama_tenaga_kerja}}
                                            </td>
                                            <td>
                                                Rp {{ number_format($tk->upah,2,',','.') }} x {{$row->jam}} jam
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>
                                            <td>
                                                Rp {{ number_format($row->total_tarif,2,',','.') }}
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                               = <b>Rp {{ number_format($biaya_tenaga_kerja_langsung,2,',','.') }}</b>
                                            </td>
                                        </tr>
                                  </table>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <strong>Biaya Overhead Pabrik Tetap Standar</strong>
                                </div>
                                <div class="card-body">
                                  <strong>Biaya Tenaga Kerja Tidak Langsung Standar</strong> <br>
                                            <table class="table">
                                                    @inject('TenagaKerja', 'App\Models\TenagaKerja')
                                                    @foreach ($tenaga_kerja_tidak_langsung as $row)
                                                    @php
                                                        $tk = $TenagaKerja::where('id',$row->tenaga_kerja_id)->first();
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            {{$tk->nama_tenaga_kerja}}
                                                        </td>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                        <td>
                                                            Rp {{ number_format($row->total_tarif,2,',','.') }}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                           = <b>Rp {{ number_format($biaya_tenaga_kerja_tidak_langsung,2,',','.') }}</b>
                                                        </td>
                                                    </tr>
                                              </table>
                                  <table class="table">
                                    @php
                                        $total_overhead_tetap = 0;
                                    @endphp
                                    @foreach ($biaya_overhead_tetap as $row)
                                    @php
                                        $total_overhead_tetap += $row->total;
                                    @endphp
                                    <tr>
                                        <td>
                                            {{$row->overhead}}
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td>
                                            Rp {{ number_format($row->total,2,',','.') }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                           = <b>Rp {{ number_format($biaya_tenaga_kerja_tidak_langsung+$total_overhead_tetap,2,',','.') }}</b>
                                        </td>
                                    </tr>
                                  </table>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <strong>Biaya Overhead Pabrik Variabel Standar</strong>
                                </div>
                                <div class="card-body">
                                    <strong>Biaya Bahan Penolong</strong><br>
                                    <table class="table">
                                        @inject('Bahan', 'App\Models\Bahan')
                                        @foreach ($bahan_penolong as $row)
                                        @php
                                            $bahan = $Bahan::where('id',$row->bahan_id)->first();
                                        @endphp
                                        <tr>
                                            <td>
                                                {{$bahan->nama_bahan}}
                                            </td>
                                            <td>
                                                Rp {{ number_format($bahan->harga_satuan,2,',','.') }} x {{$row->qty}}
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>
                                            <td>
                                                Rp {{ number_format($row->total,2,',','.') }}
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                               = <b>Rp {{ number_format($biaya_bahan_penolong,2,',','.') }}</b>
                                            </td>
                                        </tr>
                                  </table>
                                  <table class="table">
                                    @php
                                        $total_overhead_variabel = 0;
                                    @endphp
                                    @foreach ($biaya_overhead_variabel as $row)
                                    @php
                                        $total_overhead_variabel += $row->total;
                                    @endphp
                                    <tr>
                                        <td>
                                            {{$row->overhead}}
                                        </td>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td>
                                            Rp {{ number_format($row->total,2,',','.') }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                           = <b>Rp {{ number_format($biaya_bahan_penolong+$total_overhead_variabel,2,',','.') }}</b>
                                        </td>
                                    </tr>
                                  </table>
                                </div>
                            </div>
                            <hr>
                            <table class="table">
                                <tr>
                                    <td>
                                        <h3>Biaya Pokok Produksi Standar</h3>
                                    </td>
                                    <td>
                                        @php
                                            $total = $biaya_bahan_baku + $biaya_bahan_penolong + $biaya_tenaga_kerja_langsung + $biaya_tenaga_kerja_tidak_langsung + $total_overhead_tetap + $total_overhead_variabel;
                                        @endphp

                                        <strong>Rp {{ number_format($total,2,',','.') }}</strong>
                                    </td>
                                </tr>
                            </table>

                            <div class="pagebreak"></div>
                        </print>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection

@push('script')
    <script src="{{ url('') }}/assets/vendor/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/toastify-js/src/toastify.js"></script>
    <script src="{{ url('') }}/assets/js/jquery.PrintArea.js"></script>

    <script>
        $(document).ready(function () {
          $("#cetak").click(function(){
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = { mode : mode, popClose : close};
                $("print#areaprint").printArea( options );
            });
        });
    </script>
@endpush
