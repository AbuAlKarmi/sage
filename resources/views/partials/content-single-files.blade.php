<?php
$postFeaturedImage = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<article @php(post_class())>


  <main class="card p-4">

    <div class="card-body">
      <header>
        <h1 class="entry-title card-title text-center font-weight-bold">
          {!! $title !!}
        </h1>
      </header>

      @if( isset($postFeaturedImage) && !empty($postFeaturedImage) )
        <img src="{{ $postFeaturedImage }}" class="card-img-top img-responsive mb-4" alt="{{$title}}">
      @endif

      <div class="entry-content">
        @php(the_content())
      </div>

      @if( $posts && count($posts) )
      @php( wp_reset_postdata() )
      @endif

    </div>
  </main>

  <div class="posts-loop pt-3">
    <div class="row">
      <?php global $post; ?>
      @foreach($posts as $post)
        @php(setup_postdata($post))
        <div class="col-md-4 border-1 border-primary border-solid">
          @include('partials.content')
        </div>
      @endforeach
      @php( wp_reset_postdata() )
    </div>
  </div>

{{--  @php(comments_template('/partials/comments.blade.php'))--}}
</article>
