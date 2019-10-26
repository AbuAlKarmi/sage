@if($files && count($files))
  <div class="container">
    <div class="row">
    @foreach($files as $file)
      <div class="col-md-4 col-sm-4 col-xs-6">
        @include('partials.file', ['file' => $file])
      </div>
    @endforeach
    </div>
  </div>
@endif
