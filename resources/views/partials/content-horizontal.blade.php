<article @php(post_class('card post-card mb-2 post-horizontal'))>
  <div class="card-body">
    <div class="row">
      <div class="col-md-4 col-sm-5">
        @if( isset($featuredImage) && !empty($featuredImage) )
          <div class="card-image mb-2">
            <a href="{{ get_permalink() }}">
              <img src="{{ $featuredImage }}" class="img-fluid" alt="{{strip_tags($title)}}">
            </a>
          </div>
        @endif
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

        <p class="card-text">{!! App\the_excerpt_max_charlength(20) !!}</p>
        @include('partials/entry-meta', ['categories'=> $subCategories ])
      </div>
    </div>
  </div>
</article>
