@extends('layouts.app')

@section('content')

  @if(!App\isMobile())
    @include('partials.featured-posts', ['featuredPosts' => $featuredPosts])
  @endif

{{--  @include('partials.page-header')--}}

  @if (! have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>

    {!! get_search_form(false) !!}
  @endif

  <div class="posts-infinite-scroll">
    @while(have_posts()) @php(the_post())
      @include(App\cardPartial())
    @endwhile
  </div>
  {!! App\bootstrap_pagination() !!}
@endsection
