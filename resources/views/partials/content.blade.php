<article @php(post_class('card post-card mb-2 post-vertical'))>

  <div class="card-body">
    <small class="d-block mb-2 text-small text-center post-publish-date">{{the_date('j F Y')}}</small>
    <div class="card-title-wrapper">
      @if(get_the_subtitle(get_the_ID(), '','', false))
        <h6 class="card-subtitle text-center">
          <a href="{{ get_permalink() }}" class="text-secondary text-decoration-none" @if(\App\isMobile())rel="prefetch"@endif>
            {{ the_subtitle() }}
          </a>
        </h6>
      @endif
      <h5 class="card-title text-center text-textPrimary font-weight-bold">
        <a href="{{ get_permalink() }}" class="text-decoration-none">
          {!! the_title() !!}
        </a>
      </h5>
    </div>

      <div class="card-image mb-2">
        <a href="{{get_permalink()}}" @if(\App\isMobile())rel="prefetch"@endif>
          <img src="{{ App\get_post_image(get_the_ID()) }}" class="img-fluid" alt="{{strip_tags($title)}}">
        </a>
      </div>

      <a href="{{ get_permalink() }}" class="text-decoration-none" @if(\App\isMobile())rel="prefetch"@endif>
        <p class="card-text">{!! App\the_excerpt_max_charlength(20) !!}</p>
      </a>
      @include('partials/entry-meta',['categories', $subCategories])
    {!! the_tags('<div class="entry-meta text-right tags-content">',' • ','</div>'); !!}
  </div>
</article>
