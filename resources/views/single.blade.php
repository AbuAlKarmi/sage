@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-10">
      @while(have_posts()) @php(the_post())
      @includeFirst(['partials.content-single-'.get_post_type(), 'partials.content-single'])
      @endwhile

      @if(app\isMobile())
        <hr>
        <?php query_posts( 'post_type=post' ); ?>
        <div class="posts-loop" id="posts-infinite-scroll">
          @include('partials.loops.mobile')
        </div>
        <?php wp_reset_query(); ?>
      @else
        @if( isset($navigationPosts) )
          <div class="pt-2"></div>
          <hr>
          <div class="single-post-navigation">
            <div class="row d-flex flex-row">
              <?php global $post ?>
              @foreach($navigationPosts as $key => $post)
                @if( isset($post) )
                  <div class="col-md-6 d-flex align-items-stretch post-nav-{{$key+1}}">
                    <?php setup_postdata($post) ?>
                    @include( App\cardPartial(), ['showDescription' => true, 'displayPostMeta' => false])
                    <?php wp_reset_postdata(); ?>
                  </div>
                @endif
              @endforeach
            </div>
          </div>
        @endif
      @endif

    </div>
  </div>
@endsection


