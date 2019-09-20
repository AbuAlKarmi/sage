<?php
if($files && count($files) > 3 ){
  $firstFile= array_shift($files);
  $secondTwoFiles = [];
  $secondTwoFiles[] = array_shift($files);
  $secondTwoFiles[] = array_shift($files);
}
?>

@if( isset($files) && count($files) && isset($firstFile) )
  <div class="container">
    <div class="row">
      @if(isset($firstFile))
      <div class="col-md-8 dfater big-preview">
        @include('partials.file-preview', ['file' => $firstFile])
      </div>
      @endif
      @if(isset($secondTwoFiles))
      <div class="col-md-4 daftar">
        @foreach($secondTwoFiles as $secondFile)
          @include('partials.file-preview', ['file' => $secondFile])
        @endforeach
      </div>
      @endif
    </div>
  </div>
@endif

@if(isset($files) && count($files))
  <div class="container">
    <div class="row">
    @foreach($files as $file)
      <div class="col-md-4 col-sm-4 col-xs-6 daftar">
        @include('partials.file-preview', ['file' => $file])
      </div>
    @endforeach
    </div>
  </div>
@endif
