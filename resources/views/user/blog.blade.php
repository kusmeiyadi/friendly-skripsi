@extends('user.layouts.app')


@section('title','KPPAD Blog')

@section('sub-Heading','Jelajah lebih tentang Kppad')


@section('main-content')

  <div class="ui container">
    <div class="ui piled segment">

      @foreach ($posts as $post)

      <a href="{{ route('post',$post->slug) }}">
        <h4 class="ui header">
          {{ $post->title }}
        </h4>
        <h5 class="ui header">
          {{ $post->subtitle }}
        </h5>
      </a>
      <p>Posted by <a href="#">Start Bootstrap</a> {{ $post->created_at->diffForHumans() }} </p>

      @endforeach

      <!-- pager -->
      @if ($posts->lastPage() > 1)
        <div class="ui pagination menu">
            <a href="{{ $posts->previousPageUrl() }}" class="{{ ($posts->currentPage() == 1) ? ' disabled' : '' }} item">
                Previous
            </a>
            @for ($i = 1; $i <= $posts->lastPage(); $i++)
                <a href="{{ $posts->url($i) }}" class="{{ ($posts->currentPage() == $i) ? ' active' : '' }} item">
                    {{ $i }}
                </a>
            @endfor
            <a href="{{ $posts->nextPageUrl() }}" class="{{ ($posts->currentPage() == $posts->lastPage()) ? ' disabled' : '' }} item">
                Next
            </a>
        </div>
      @endif

    </div>
  </div>

@endsection
