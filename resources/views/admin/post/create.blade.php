@extends('admin.layouts.app')

@section('main-content')
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between">
    {{ Breadcrumbs::render('post.create') }}
  </div>

  <!-- Row -->
  <div class="row">
    <!-- Form -->
    <div class="col-lg-12">

      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Post Create</h6>
        </div>
        <div class="card-body">
            @include('includes.messages')
            <form role="form" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

                <div class="form-group col-lg-6 col-md-6 col-sm-6">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6">
                  <label for="subtitle">Post Sub Title</label>
                  <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub Title">
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6">
                  <label for="slug">Post Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                </div>

                  <div class="two fields">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="publish" name="status" value="1">
                        <label class="custom-control-label" for="publish">Publish</label>
                      </div>
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-6">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">File input</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group col-lg-6 col-md-6 col-sm-6">
                    <label for="tags">Select tags</label>
                    <select multiple data-live-search="true" class="form-control selectpicker" id="tags" name="tags[]">
                      @foreach ($tags as $tag)
                      <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-lg-6 col-md-6 col-sm-6">
                    <label for="categories">Select categories</label>
                    <select multiple data-live-search="true" class="form-control selectpicker" id="categories" name="categories[]">
                      @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="body">Write Post Body Here</label>
                    <textarea class="form-control" id="summernote" name="body" rows="3"></textarea>
                  </div>

              <button class="btn btn-success" type="submit">Submit</button>
              <a href="{{ route('post.index') }}" class="btn btn-warning">Back</a>


            </form>

          </div>
      </div>

      </div>
      <!-- Form -->
    </div>
    <!-- Row -->
</div>
@endsection
