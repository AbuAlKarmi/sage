@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-single-'.get_post_type(), 'partials.content-single'])
  @endwhile


  <hr>
  <div class="single-post-navigation">
    <div class="row">
      <?php global $post ?>
      @if( $nextPosts && count($nextPosts) )
        <div class="col-md-6">
          @foreach($nextPosts as $post)
            <?php setup_postdata($post) ?>
            @include('partials.content-horizontal')
          @endforeach
        </div>
      @endif

      @if( $previousPosts && count($previousPosts) )
        <div class="col-md-6">
          @foreach($previousPosts as $post)
            <?php setup_postdata($post) ?>
            @include('partials.content-horizontal')
          @endforeach
        </div>

      @endif
    </div>
  </div>
  <hr>

@endsection


