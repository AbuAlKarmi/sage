@extends('layouts.app')

@section('content')


  @if (! have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>

    {!! get_search_form(false) !!}
  @endif

  <div id="posts-infinite-scroll" class="fancy-posts-loop">
    @include('partials.fancy-posts-list')
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
