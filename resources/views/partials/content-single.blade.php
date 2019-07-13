<?php
$postFeaturedImage = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<article @php(post_class())>


  <main class="card p-4">

    <div class="card-body">
      <header>
        <h5 class="text-muted text-center">{{the_date('F j, Y')}}</h5>
        @if(get_the_subtitle(get_the_ID(), '','', false))
          <h3 class="text-center text-secondary">{{ the_subtitle() }}</h3>
        @endif
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
      <hr>
      @include('partials/entry-meta')
    </div>
  </main>

  @php(comments_template('/partials/comments.blade.php'))
</article>
