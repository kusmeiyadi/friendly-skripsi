@extends('admin.layouts.app')

@section('main-content')

<div class="pusher">
  <div class="asd main-content" style="border-radius: 0!important; border: 0; margin-left: 260px; -webkit-transition-duration: 0.1s;">

    <div class="ui grid stackable padded">

      <div class="sixteen wide computer sixteen wide tablet sixteen wide mobile column">
        <div class="ui fluid card">
          <div class="content">

            <h3 class="ui header">Title</h3>
            <div class="ui clearing divider"></div>

            @include('includes.messages')

            <form role="form" action="{{ route('tag.store') }}" method="post">

              {{ csrf_field() }}

            <div class="ui form">
              <div class="ui grid">
                <div class="eight wide column">
                  <div class="field">
                    <label for="name">Tag Title</label>
                    <input type="text" id="name" name="name" placeholder="Tag Title">
                  </div>

                  <div class="field">
                    <label for="slug">Tag Slug</label>
                    <input type="text" id="slug" name="slug" placeholder="Slug">
                  </div>
                </div>
              </div>

                <br>

              <button class="ui green button" type="submit">Submit</button>
              <a href="{{ route('tag.index') }}" class="ui orange button">Back</a>
            </div>
            </form>

          </div>
        </div>
      </div>

    </div>

  </div>
</div>

@endsection
