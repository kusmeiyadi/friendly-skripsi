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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Baca Pengaduan</h3>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Created At</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1;
                                @endphp
                                @foreach($pengaduans as $pengaduan)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><dt>{{ $pengaduan->data['pengaduan']['kode'] }}</dt></td>
                                    <td>{{ $pengaduan->data['pengaduan']['title'] }}</td>
                                    <td>{{ $pengaduan->data['pengaduan']['body'] }}</td>
                                    <td>{{ $pengaduan->data['pengaduan']['created_at'] }}</td>
                                    <td>
                                        <form action="{{ route('roles.destroy', $pengaduan->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
</script>
@endsection
