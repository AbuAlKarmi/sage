<?php
  $postFeaturedImage = get_the_post_thumbnail_url( get_the_ID(), 'post-image-square' );
?>



<article @php(post_class('card post-card mb-2 '))>
  <div class="card-body">
    <div class="row">
      <div class="col-md-4 col-sm-5">
        @if( isset($postFeaturedImage) && !empty($postFeaturedImage) )
          <div class="card-image mb-2">
            <img src="{{ $postFeaturedImage }}" class="img-fluid" alt="{{strip_tags($title)}}">
          </div>
        @endif
      </div>
      <div class="col-md-8  col-sm-7">
        <h6 class="card-subtitle mb-2 text-secondary">Card subtitle</h6>
        <h5 class="card-title text-textPrimary font-weight-bold">
          <a href="{{ get_permalink() }}">
            {!! $title !!}
          </a>
        </h5>

        <p class="card-text">{!! App\the_excerpt_max_charlength(20) !!}</p>
        @include('partials/entry-meta')
      </div>
    </div>
  </div>
</article>
