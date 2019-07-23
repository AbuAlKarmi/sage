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
  @if( isset($featuredHomePost) )
    <div class="posts-loop">
      @php(setup_postdata( $featuredHomePost ))
      @php( $featuredPostId = get_the_ID() )
      @includeFirst(['partials.content-featured', 'partials.content'])
      @php(wp_reset_postdata())
    </div>
  @endif


  <div class="posts-loop">
    <div class="row">
      @while (have_posts()) @php(the_post())
          <div class="col-md-6">
            @includeFirst(['partials.content-'.get_post_type(), 'partials.content'])
          </div>
      @endwhile
    </div>
  </div>

{{--  {!! do_shortcode('[ajax_load_more id="9950436970" container_type="div" post_type="post"]') !!}--}}
  <div class="text-center">
    {!! get_the_posts_navigation() !!}
  </div>
@endsection

@section('sidebar')
  @include('partials.sidebar')
@endsection
