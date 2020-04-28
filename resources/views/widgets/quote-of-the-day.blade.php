<?php

if(isset($post) && $post){
  $posts = [$post];
}
global $post;
?>
<section class="widget card mb-3">
  <div class="card-body">
    <h5 class="card-title text-center">
      {{$title}}
    </h5>
    <div class="body">

      @if(isset($posts) && count($posts))
        @foreach($posts as $post)
          <?php setup_postdata($post) ?>
            <a href="{{get_the_permalink()}}" class="text-decoration-none">
              {!! $quote !!}
            </a>

            <?php
            $shareText = wp_strip_all_tags($quote, true);
            $shareLink = wp_get_shortlink();
            ?>

            @include('partials.social-media-share', [
                'shareText' => $shareText,
                'shareLink' => $shareLink
                ])

          <?php wp_reset_postdata(); ?>
        @endforeach
      @else
        {!! $quote !!}
        {!! do_shortcode("[Sassy_Social_Share url='".get_home_url()."']")  !!}
      @endif

    </div>
  </div>
</section>
