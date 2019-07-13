
<div class="card mb-3">
  <div class="card-body">
    @foreach($lastPopularPosts as $post)
      <h4 class="card-title">{{$post['title']}}</h4>
    @endforeach
  </div>
</div>

@php(dynamic_sidebar('sidebar-primary'))
