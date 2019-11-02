<?php
  $_SESSION['filesCounter'] = 0;
  $_SESSION['fetchMoreFiles'] = true;
?>
@extends('layouts.main')
@section('content')
{{--  @include('partials.page-header')--}}
  @if (! have_posts())
    @alert(['type' => 'warning'])
      {{ __('Sorry, no results were found.', 'sage') }}
    @endalert

    {!! get_search_form(false) !!}
  @endif

  @php( $featuredPostId = null )
  @if( !app\isMobile() && isset($featuredHomePosts) && count($featuredHomePosts) )
    @foreach($featuredHomePosts as $featuredPost)
      <?php global $post ?>
      <?php $post = $featuredPost ?>
{{--      @php(dd($featuredPost))--}}
      <div class="posts-loop">
        @php(setup_postdata( $post ))
        @php( $featuredPostId = get_the_ID() )
        @includeFirst(['partials.content-featured', 'partials.content'])
        @php(wp_reset_postdata())
      </div>
    @endforeach
  @endif




  <div class="posts-loop" id="posts-infinite-scroll">
    @if(app\isMobile())
      @include('partials.loops.mobile')
    @else
      @include('partials.loops.standard')
    @endif

  </div>

  <div class="text-center">
    {!! get_the_posts_navigation() !!}
  </div>
@endsection

@section('sidebar')
  @include('partials.sidebar')
@endsection
