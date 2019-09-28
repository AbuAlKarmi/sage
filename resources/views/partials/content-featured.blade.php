<?php
  $postFeaturedImage = get_the_post_thumbnail_url( get_the_ID(), 'post-image-slider' );
?>


<div class="posts-loop">
  <article @php(post_class('card post-card pt-3 mb-2 featured-home-post'))>
    <small class="d-block mb-2 text-small text-center post-publish-date">{{the_date('j F Y')}}</small>
    <div class="card-body">
      @if(get_the_subtitle(get_the_ID(), '','', false))
        <h6 class="card-subtitle mb-2 text-center">
          <a href="{{ get_permalink() }}" class="text-secondary text-decoration-none">
            {{ the_subtitle() }}
          </a>
        </h6>
      @endif
      <h5 class="card-title text-center text-textPrimary font-weight-bold">
        <a href="{{ get_permalink() }}" class="text-decoration-none">
          {!! $title !!}
        </a>
      </h5>
      @if( isset($postFeaturedImage) && !empty($postFeaturedImage) )
        <div class="card-image mb-2">
          <img src="{{ $postFeaturedImage }}" alt="{{strip_tags($title)}}">
        </div>
      @endif
      <div class="card-">{!! App\the_post_paragraphs() !!}</div>
      <div class="text-center">
        <a href="{{ get_permalink() }}" class="btn btn-outline-secondary btn-sm mb-3 pl-5 pr-5">
          {{__('Read More', 'sage')}}
        </a>
      </div>
      <div class="post-horizontal-meta">
        @include('partials/entry-meta', ['categories'=> $subCategories ])
      </div>

    </div>
  </article>
</div>
