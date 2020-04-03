@extends('admin.layouts.app')

@section('title', 'Pengaduan')

@section('headSection')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection

@section('main-content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Pengaduan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('roles.index') }}
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pengaduan Masuk</h3>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Jenis</th>
                                <th>Pelapor</th>
                                <!-- <th>Korban</th>
                                <th>Terlapor</th> -->
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1;
                            @endphp
                            @foreach ($pengaduans as $pengaduan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><dt>{{ $pengaduan->kode }}</dt></td>
                                <td>{{ $pengaduan->jenis_kasus->jenis_kasus }}</td>
                                <td>{{ $pengaduan->pelapor->nama_p }}</td>
                                <!-- <td>
                                      @foreach($pengaduan->pelapor->korban as $korban)
                                          {{$korban->nama_k}}
                                          @endforeach
                                  </td>
                                  <td>
                                      @foreach($pengaduan->pelapor->terlapor as $terlapor)
                                          {{$terlapor->nama_t}}
                                          @endforeach
                                  </td> -->
                                <td>
                                    @if($pengaduan->is_approved == true)
                                            <span class="badge bg-success">Approved</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                </td>
                                <td class="format-date">{{ $pengaduan->created_at }}</td>
                                <td>
                                  <div class="btn-group">
                                    <a class="btn btn-info btn-sm" href="{{ route('pengaduans.show',$pengaduan->id) }}"><i class="far fa-eye"></i></a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('pengaduan.email',$pengaduan->id) }}"><i class="far fa-paper-plane"></i></a>
                                    <form action="{{ route('roles.destroy', $pengaduan->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                  </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footerSection')
<!-- DataTables -->
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

<!-- page script -->
<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });

    if ($('.format-date').length > 0) {
        $('.format-date').each(function() {
            var ini = $(this);
            var tgl = ini.text();
            //moment.locale('id');
            if (moment(tgl, 'YYYY-MM-DD', true).isValid() || moment(tgl, 'YYYY-MM-DD HH:mm:ss', true).isValid()) {
                var formatTgl = moment(tgl).format('LL');
                ini.html(formatTgl);
            }
        });
    }
</script>
@endsection
