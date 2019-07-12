<style>

/*  .carousel-item {*/
/*    position: relative;*/
/*    display: none;*/
/*    float: right;*/
/*    width: 100%;*/
/*    margin-left: -100%;*/
/*    margin-right: 0;*/
/*    backface-visibility: hidden;*/
/*  }*/

/*  .carousel-item-next:not(.carousel-item-left),*/
/*  .active.carousel-item-right {*/
/*    transform: translateX(-100%);*/
/*  }*/

/*  .carousel-item-prev:not(.carousel-item-right),*/
/*  .active.carousel-item-left {*/
/*    transform: translateX(100%);*/
/*  }*/

  /*.carousel-item{*/
  /*  float: right;*/
  /*  margin-left: 100%;*/
  /*  margin-right: 0;*/
  /*}*/
</style>
@if($featuredPosts && count($featuredPosts))
  <div class="slider mb-3">
    <div class="container">
      <div class="card">
        <div class="card-body">

          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              @php($index = 0)
              @foreach( $featuredPosts as $post )
                <div class="carousel-item @if($index == 0) active @endif">
                  <img class="d-block w-100" src="{{$post['image']}}" data-holder-rendered="true">
                  <div class="carousel-caption d-md-block">
                    <h5>{{$post['subtitle']}}</h5>
                    <h4>{{$post['title']}}</h4>
                  </div>
                </div>
                @php($index++)
              @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
</div>
@endif
