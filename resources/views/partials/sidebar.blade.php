<div class="card mb-3">
  <div class="card-body soundcloude-widget">
    <div id="track">
      <div id="soundcloude-loading" class="text-center text-muted">
        جاري التحميل ...
      </div>
    </div>
  </div>
</div>


<div class="card mb-3">
  <div class="card-body">
    <h4 class="text-center card-title">{{__('Follow us on', 'sage')}}</h4>
    <div class="text-center">
      @include('partials.social-links')
    </div>
  </div>
</div>

@php(dynamic_sidebar('sidebar-primary'))

@if(is_home())
  <div class="card mb-3">
    <div class="card-body">
      <div class="text-center">
        {!! do_shortcode('[instagram-feed num=1 cols=1]') !!}
      </div>
    </div>
  </div>
@endif
