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
.slide {
  position: relative;
}

/* progress bar */
.slider-progress {
  width: 100%;
  height: 10px;
  background: rgba(255,255,255,0.5);
  position: absolute;
  top: 0;
  border-radius: 0;
}
.slider-progress .progress {
  width: 0%;
  height: 10px;
  background: #a3c4bc;
  border-radius: 0;
}
.carousel-caption{
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  color: black;
  margin-top: -80px;
}
  .carousel-caption .card{
    height: 160px;
    display: flex;
    flex-flow: column;
    justify-content: center;
  }
.carousel-caption .card-body{
  display: flex;
  flex-flow: column;
  align-content: center;
  justify-content: center;
}

</style>
@if($featuredPosts && count($featuredPosts))
  <div class="slider mb-3">
    <div class="container">
      <div class="card mb-3">
        <div class="card-body">
          <div class="carousel" style="direction: ltr">

            @foreach( $featuredPosts as $post )
              <div class="slide">
                <img class="d-block w-100" src="{{$post['image']}}" data-holder-rendered="true">
                <div class="carousel-caption d-md-block container">
                  <div class="row d-flex justify-content-center">
                    <div class="col-md-7">
                      <div class="card">
                        <div class="slider-progress">
                          <div class="progress"></div>
                        </div>
                        <div class="card-body text-center">
                          <a href="{{$post['url']}}">
                            <h4 class="card-subtitle text-secondary m-0 p-0">{{$post['subtitle']}}</h4>
                            <h3 class="card-title text-primary m-0 p-0">{{$post['title']}}</h3>
                          </a>
                        </div>
                      </div>

                    </div>
                  </div>


                </div>
              </div>
            @endforeach
          </div>
      </div>
    </div>
</div>
@endif
