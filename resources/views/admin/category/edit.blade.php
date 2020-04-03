@extends('admin.layouts.app')

@section('main-content')

<div class="pusher">
  <div class="asd main-content" style="border-radius: 0!important; border: 0; margin-left: 260px; -webkit-transition-duration: 0.1s;">

    <div class="ui grid stackable padded">

      <div class="sixteen wide computer sixteen wide tablet sixteen wide mobile column">
        <div class="ui fluid card">
          <div class="content">

            <h3 class="ui header">Second header</h3>
              @include('includes.messages')
            <div class="ui clearing divider"></div>

            <form action="{{ route('category.update',$category->id) }}" method="post">

              {{ csrf_field() }}
              {{ method_field('PUT') }}

            <div class="ui form">
              <div class="ui grid">
                <div class="eight wide column">
                  <div class="field">
                    <label for="name">Category Title</label>
                    <input type="text" id="name" name="name" placeholder="Tag Title" value="{{ $category->name }}">
                  </div>

                  <div class="field">
                    <label for="slug">Category Slug</label>
                    <input type="text" id="slug" name="slug" placeholder="Slug" value="{{ $category->slug }}">
                  </div>
                </div>
              </div>

                <br>

              <button class="ui green button" type="submit">Submit</button>
              <a href="{{ route('category.index') }}" class="ui orange button">Back</a>

            </div>
            </form>

          </div>
        </div>
      </div>

    </div>

  </div>
</div>

@endsection
