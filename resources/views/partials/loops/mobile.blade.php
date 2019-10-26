<div class="row">
  @php($counter = 0 )
  @while (have_posts()) @php(the_post())
  <div class="col-md-12">
    @includeFirst(['partials.content-'.get_post_type(), 'partials.content'])
  </div>
  @if($counter == 4)
    <div class="col-md-12">
      @include('partials.mobile-file')
    </div>
  @endif
  @php($counter++)
  @endwhile
  @if($counter == 10)
    <div class="col-md-12">
      @include('partials.mobile-file')
    </div>
  @endif
</div>
