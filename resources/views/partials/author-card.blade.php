<a class="mb-3 text-decoration-none" href="{{ get_author_posts_url($author->ID) }}">
  <img class="card card-img-top p-3" alt="{{$author->display_name}}"
       src="{{esc_url(aq_resize(get_avatar_url( $author->ID, 200), 200, 150, true) ) }}" />
  <div class="card-body text-center">
    <h5 class="card-title mb-1">{{$author->display_name}}</h5>
    <p class="card-text text-small text-muted">{!! get_the_author_meta('description', $author->ID) !!}</p>
  </div>
</a>
