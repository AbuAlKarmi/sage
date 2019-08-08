<section class="widget card mb-3 reaction-post">
  <div class="card-body">
    <h5 class="card-title">
      {{$title}}
    </h5>
    <div class="body">
      @foreach($posts as $post)
        <div class="post">
          <a href="{{$post['postUrl']}}" class="reaction-post pt-3">
            <div class="image">
              <img src="{{$post['postImage']}}" alt="{{ $post['postTitle'] }}" class="img-fluid mb-2" />
              <div class="reaction-icon">
                @include("icons::reactions.".$post['reaction'])
              </div>
            </div>

            <h6 class="font-weight-bold">{!! $post['postTitle'] !!}</h6>
          </a>

        </div>
      @endforeach
    </div>
  </div>
</section>
