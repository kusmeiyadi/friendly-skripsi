@extends('admin.layouts.app')

@section('main-content')
<div class="pusher">
  <div class="asd main-content" style="border-radius: 0!important; border: 0; margin-left: 260px; -webkit-transition-duration: 0.1s;">

    <div class="ui grid stackable padded">

      <div class="sixteen wide computer sixteen wide tablet sixteen wide mobile column">
        <div class="ui fluid card">
          <div class="content">

            <h3 class="ui header">Update Admin</h3>
              @include('includes.messages')
            <div class="ui clearing divider"></div>

            <form role="form" action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data">

              @csrf
              @method('PUT')

            <div class="ui form">
              <div class="ui grid">
                <div class="eight wide column">
                  <div class="field">
                    <label for="name">Username</label>
                    <input type="text" id="name" name="name" placeholder="Username" value="@if (old('name')){{ old('name') }}@else{{ $user->name }} @endif">
                  </div>

                  <div class="field">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Email" value="@if (old('email')){{ old('email') }}@else{{ $user->email }} @endif">
                  </div>

                  <div class="field">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" placeholder="Phone" value="@if (old('phone')){{ old('phone') }}@else{{ $user->phone }} @endif">
                  </div>

                  <div class="eight wide field">
                    <label for="image">File Input</label>
                    <input type="file" id="image" name="image">
                  </div>

                  <div class="field">
                    <label for="status">Status</label>
                    <div class="checkbox">
                      <label><input type="checkbox" tabindex="0" name="status"
                        @if (old('status') == 1 || $user->status == 1)
                          checked
                        @endif
                         value="1">
                      Status</label>
                    </div>
                  </div>

                  <br>

                  <div class="field">
                    <label>Assign Role</label>
                    @foreach ($roles as $role)
                      <div class="checkbox">
                        <input type="checkbox" tabindex="0" name="role[]" value="{{ $role->id }}"

                          @foreach ($user->roles as $user_role)
                            @if ($user_role->id == $role->id)
                              checked
                            @endif
                          @endforeach
                        >
                        <label>{{ $role->name }}</label>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>

                <br>

              <button class="ui green button" type="submit">Submit</button>
              <a href="{{ route('user.index') }}" class="ui orange button">Back</a>
            </div>
            </form>

          </div>
        </div>
      </div>

    </div>

  </div>
</div>
@endsection
