@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-single-'.get_post_type(), 'partials.content-single'])
  @endwhile


  @if(isset($nextPosts) || isset($previousPosts) )
  <hr>
  <div class="single-post-navigation">
    <div class="row">
      <?php global $post ?>
      @if( isset($nextPosts) && count($nextPosts) )
        <div class="col-md-6">
          @foreach($nextPosts as $post)
            <?php setup_postdata($post) ?>
            @include('partials.content-horizontal')
            <?php wp_reset_postdata(); ?>
          @endforeach
        </div>
      @endif

      @if( isset($previousPosts) && count($previousPosts) )
        <div class="col-md-6">
          @foreach($previousPosts as $post)
            <?php setup_postdata($post) ?>
            @include('partials.content-horizontal')
            <?php wp_reset_postdata(); ?>
          @endforeach
        </div>

      @endif
    </div>
  </div>
  <hr>
  @endif

@endsection


