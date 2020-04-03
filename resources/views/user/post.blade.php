@extends('user/app')


@section('bg-img',Storage::disk('local')->url($post->image))

@section('title',$post->title)

@section('sub-Heading',$post->subtitle)


@section('main-content')

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v5.0&appId=520278358522682&autoLogAppEvents=1"></script>

<div class="ui container">
  <div class="ui piled segment">
    <h4 class="ui header">DANI</h4>
    <small>Created at {{ $post->created_at->diffForHumans() }} </small>
      @foreach ($post->categories as $category)
        <small>
          <a href="#"> {{ $category->name }} </a>
       </small>
      @endforeach
      {!! htmlspecialchars_decode($post->body) !!}
      <h5 class="ui header">Tag Clouds</h5>
      @foreach ($post->tags as $tag)
        <a href="#"><small class="ui teal tag label">
           {{ $tag->name }}
        </small></a>
      @endforeach
  </div>

  <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>

</div>

@endsection
