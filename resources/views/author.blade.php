@extends('layouts.app')

@section('content')
  <div class="card author-card">
    <div class="card-body">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="card-image text-center">
                <img src="{!! $author->image !!}" alt="{{$author->display_name}}" class="img-fluid" />
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-4">
          <div class="details">
            @if( $author->isMetrasStaff )
              <label class="label label-info metras-team-label">فريق متراس</label>
            @endif
            <h4 class="card-title text-bold author-name-in-authors">{{$author->display_name}}</h4>
            <p class="card-text text-muted">{!! $author->bio !!}</p>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="posts">
    <div class="posts-infinite-scroll">
      @while (have_posts()) @php(the_post())
        @include('partials.content-horizontal')
      @endwhile
    </div>
  </div>

  {!! App\bootstrap_pagination() !!}
@endsection

@section('sidebar')
  @include('partials.sidebar')
@endsection
