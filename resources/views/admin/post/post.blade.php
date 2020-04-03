@extends('admin.layouts.app')

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
                <h1>Posts</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('post.create') }}
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Row -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Posts</h3>

                    <div class="card-tools">
                        <a class="ui labeled icon blue button" href="{{ route('post.create') }}">
                            <i class="plus icon"></i>
                            Add New
                        </a>
                    </div>
                </div>

                @include('includes.messages')

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Slug</th>
                                <th>Created At</th>

                                <th>Edit</th>

                                <th>Delete</th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($posts as $post)

                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->subtitle }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>{{ $post->created_at }}</td>

                                <td><a href="{{ route('post.edit',$post->id) }}"><i class="far fa-edit"></i></a></td>

                                <td>
                                    <form id="delete-form-{{ $post->id }}" method="post" action="{{ route('post.destroy',$post->id) }}" style="display: none">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="" onclick="
                      if(confirm('Are you sure, You want to delete this?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $post->id }}').submit();
                      }

                      else {
                        event.preventDefault();
                      }

                      ">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <!-- DataTables -->
    </div>
</section>
<!-- Row -->
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
