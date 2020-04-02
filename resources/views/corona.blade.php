{{--
  Template Name: Corona | كورونا
--}}
@extends('layouts.app-full-width')

@section('content')
  @while(have_posts()) @php(the_post())
  <?php $background_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' )[0]; ?>
  <div class="corona-page">
    <div class="title-wrapper" style="background-image: url('{{$background_image}}');">
      <?php $pageTitleImage = get_field('page_title', get_the_ID()) ?>
      @if($pageTitleImage)
        <div><img src='{{$pageTitleImage}}' class="img-fluid" alt="{{the_title()}}" /></div>
      @else
        @include('partials.page-header')
      @endif

    </div>
    <div class="corona-content">
      <div class="container">
        @if($files && count($files))
            <div class="row">
            @foreach($files as $file)

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="corona-file-wrapper">
                @include('partials.corona-file', ['file' => $file])
                </div>
              </div>
            @endforeach
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
  @endwhile
@endsection
