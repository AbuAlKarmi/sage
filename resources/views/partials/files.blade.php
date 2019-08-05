@if($files && count($files))
  <div class="container">
    <div class="row">
    @foreach($files as $file)
      <div class="col-md-4 col-sm-4 col-xs-6">
        <a class="card card-file mb-3" href="{{$file['url']}}">
          <div class="card-body text-center file-preview">
            <img src="{{$file['image']}}" alt="{{$file['title']}}">
            <div class="file-title">
              <h3 class="mb-0 text-white font-weight-bold">{{$file['title']}}</h3>
            </div>
          </div>
        </a>
      </div>
    @endforeach
    </div>
  </div>
@endif
