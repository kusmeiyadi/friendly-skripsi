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
<div class="container">
  <div class="row justify-content-center">
    <div class="cold-md-8">
      <div class="card">
        @foreach($pengaduan as $penga)
        <div class="card-header">Read Lesson | <b><span>{{ $penga->kode }}</span></b></div>
        @endforeach

        <div class="card-body">

          <ul class="item-group">

            @foreach($pengaduan as $penga)
              <li class="list-group-item">
                <h2>{{ $penga->title }}</h2>
                <hr>
                {{ $penga->body }}
              </li>
            @endforeach

          </ul>

        </div>
      </div>
    </div>
  </div>
</div>
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
