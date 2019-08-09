<form role="search" method="get" class="search-form d-block" action="{{ esc_url(home_url('/')) }}">
  <div class="input-group">
    <input type="search" class="search-field form-control" placeholder="{!! esc_attr_x('Search &hellip;', 'placeholder', 'sage') !!}" value="{{ get_search_query() }}" name="s" />
    <div class="input-group-append">
      <button class="btn btn-outline-primary"  class="search-submit" type="submit">@include("icons::search")</button>
    </div>
  </div>
{{--  <label>--}}
{{--    <span class="screen-reader-text">{{ _x('Search for:', 'label', 'sage') }}</span>--}}
{{--    <input type="search" class="search-field karmi" placeholder="{!! esc_attr_x('Search &hellip;', 'placeholder', 'sage') !!}" value="{{ get_search_query() }}" name="s">--}}
{{--  </label>--}}

{{--  <button class="search-submit"><span class="fa fa-search"></span></button>--}}
{{--  <input type="submit" class="search-submit" value="{{ esc_attr_x('Search', 'submit button', 'sage') }}">--}}
</form>


