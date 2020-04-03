@extends('admin.layouts.app')

@section('headSection')
<link href="{{ asset('RuangAdmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('main-content')
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between">
    {{ Breadcrumbs::render('category.create') }}
  </div>
  <!-- Row -->
  <div class="row">

    <!-- DataTables -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
          <div class="ui right floated">
            <a class="ui labeled icon blue button" href="{{ route('category.create') }}">
              <i class="plus icon"></i>
               Add New
             </a>
          </div>
        </div>

          @include('includes.messages')

          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th>S.No</th>
                  <th>Category Name</th>
                  <th>Slug</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Category Name</th>
                  <th>Slug</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>

                @foreach ($categories as $category)

                <tr>
                  <td>{{ $loop->index +1 }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->slug }}</td>
                  <td><a href="{{ route('category.edit',$category->id) }}"><i class="edit icon"></i></a></td>
                  <td>
                    <form id="delete-form-{{ $category->id }}" method="post" action="{{ route('category.destroy',$category->id) }}" style="display: none">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="" onclick="
                      if(confirm('Are you sure, You Want to delete this?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $category->id }}').submit();
                      }

                      else {
                        event.preventDefault();
                      }

                      ">
                      <i class="trash icon"></i>
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
    <!-- Row -->
  </div>
@endsection

@section('footerSection')
<script src="{{ asset('RuangAdmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('RuangAdmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
@endsection
