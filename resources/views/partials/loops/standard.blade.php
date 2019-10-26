<div class="row">
  @while (have_posts()) @php(the_post())
  <div class="col-md-6">
    @includeFirst(['partials.content-'.get_post_type(), 'partials.content'])
  </div>
  @endwhile
</div>
