@extends('admin.layouts.app')

@section('title', 'Role')

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
                <h1>Manajemen Role</h1>
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
        <div class="col-md-4">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Tambah</h3>
                </div>

                @if (session('error'))
                @alert(['type' => 'danger'])
                {!! session('error') !!}
                @endalert
                @endif

                <form role="form" action="{{ route('roles.store') }}" method="POST">
                    <div class="card-body">
                        <div class="row">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Role</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" id="name" required>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Role</h3>
                </div>

                @if (session('success'))
                @alert(['type' => 'success'])
                {!! session('success') !!}
                @endalert
                @endif

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role</th>
                                <th>Guard</th>
                                <th>Created At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1;
                            @endphp
                            @forelse ($role as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->guard_name }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>
                                    <form action="{{ route('roles.destroy', $row->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
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
</script>
@endsection
