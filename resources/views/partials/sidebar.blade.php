
<div class="card mb-3">
  <div class="card-body">
    <iframe width="100%"
            height="300"
            scrolling="no"
            frameborder="no"
            allow="autoplay"
            src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/434541795&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true">

    </iframe>
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
