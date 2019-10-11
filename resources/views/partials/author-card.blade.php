<?php
  $imageUrl = aq_resize(get_wp_user_avatar_src( $author->ID, 'ctl_avatar' ), 200, 150, true);
  if(empty($imageUrl)){
    $imageUrl = get_wp_user_avatar_src( $author->ID );
  }
?>
<a class="mb-3 text-decoration-none" href="{{ get_author_posts_url($author->ID) }}">
  <img class="card card-img-top p-3" alt="{{$author->display_name}}"
       src="{!! $imageUrl !!}" />
  <div class="card-body text-center">
    <h5 class="card-title mb-1">{{$author->display_name}}</h5>
    <p class="card-text text-small text-muted">{!! get_the_author_meta('description_summary', $author->ID) !!}</p>
  </div>
</a>
