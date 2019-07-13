
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
    @foreach($lastPopularPosts as $post)
      <h4 class="card-title">{{$post['title']}}</h4>
    @endforeach
  </div>
</div>

@php(dynamic_sidebar('sidebar-primary'))
