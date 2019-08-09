<section class="widget card mb-3">
  <div class="card-body">
    <h5 class="card-title text-center">
      {{$title}}
    </h5>
    <div class="body">
      @if(isset($post) && $post)
        <a href="{{get_the_permalink($post)}}" class="text-decoration-none">
          {!! $quote !!}
        </a>
        {!!  do_shortcode("[Sassy_Social_Share url='".get_the_permalink($post)."']")  !!}
      @else
        {!! $quote !!}
        {!! do_shortcode("[Sassy_Social_Share]")  !!}
      @endif

    </div>
  </div>
</section>
