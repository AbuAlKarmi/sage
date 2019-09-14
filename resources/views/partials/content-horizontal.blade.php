<article @php(post_class('card post-card mb-2 post-horizontal'))>
  <div class="card-body">
    <div class="row">
      <div class="col-md-4 col-sm-5">
        <div class="card-image">
          <a href="{{ get_permalink() }}">
            <img src="{{ App\get_post_image(get_the_ID()) }}" class="img-fluid" alt="{{strip_tags($title)}}">
          </a>
        </div>
      </div>
      <div class="col-md-8  col-sm-7">
        @if(get_the_subtitle(get_the_ID(), '','', false))
          <h6 class="card-subtitle mb-2 text-secondary">
            <a href="{{ get_permalink() }}" class="text-secondary text-decoration-none">
              {{ the_subtitle() }}
            </a>
          </h6>
        @endif
        <h5 class="card-title text-textPrimary font-weight-bold">
          <a href="{{ get_permalink() }}">
            {!! the_title() !!}
          </a>
        </h5>

        @if(!isset($showDescription) || isset($showDescription) && $showDescription)
          <p class="card-text text-muted">{!! App\the_excerpt_max_charlength(20) !!}</p>
        @endif

        @if(!isset($displayPostMeta) || isset($displayPostMeta) && $displayPostMeta)
          @include('partials/entry-meta', ['categories'=> $subCategories])
        @endif

      </div>
    </div>
  </div>
</article>
