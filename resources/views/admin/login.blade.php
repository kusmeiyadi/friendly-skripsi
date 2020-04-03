@include('admin.layouts.head')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Semantic UI JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>


<title>KPPAD Admin | Log in</title>

<style media="screen">

  body > .grid {
    height: 100%;
  }
  .image {
    margin-top: -100px;
  }
  .column {
    max-width: 450px;
  }
</style>


<body>


  <div class="ui middle aligned center aligned grid">
    <div class="column">
      <h2 class="ui image header">
      <div class="content">
        Log-in to your account
      </div>
    </h2>

      @include('includes.messages')
    <form method="POST" action="{{ route('admin.login') }}" class="ui large form">
       @csrf
        <div class="ui stacked secondary segment">

        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <label for="email" hidden>{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" placeholder="E-mail address" name="email">
          </div>
        </div>

        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <label for="password" hidden>{{ __('Password') }}</label>
                <input id="password" type="password" placeholder="Password" name="password">
          </div>
        </div>

        <div class="field">
            <div class="ui checkbox">
                    <input class="hidden" tabindex="0" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label for="remember">
                        {{ __('Remember Me') }}
                    </label>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="ui fluid large teal submit button">
                    {{ __('Login') }}
                </button>

                <br>



                <br>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>

        </div>
    </form>
    </div>
  </div>

</body>


@include('admin.layouts.footer')
