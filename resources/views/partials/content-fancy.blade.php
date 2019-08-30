<article @php(post_class('card fancy-card mb-3'))>
  <a class="fancy-post-card text-decoration-none {{isset($isFirst) && $isFirst ? 'first' : ''}}"
     href="{{get_permalink()}}"
     style="background-image: url({{ App\get_post_image(get_the_ID(), 'large') }});">
    <span class="overflow"></span>
    <div class="fancy-post-card-title">
      <h4 class="font-weight-bold">
          {!! the_title() !!}
      </h4>
    </div>
  </a>
</article>
