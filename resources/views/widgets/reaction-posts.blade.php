<section class="widget card mb-3">
  <div class="card-body">
    <h5 class="card-title">
      {{$title}}
    </h5>
    <div class="body">
      @foreach($posts as $post)
        <div class="reaction-post pt-3">
          <img src="{{$post['postImage']}}" alt="{{ $post['postTitle'] }}" class="img-fluid mb-2" />
          <h6 class="font-weight-bold"><a href="{{$post['postUrl']}}">{!! $post['postTitle'] !!}</a></h6>
        </div>
      @endforeach
    </div>
  </div>
</section>
