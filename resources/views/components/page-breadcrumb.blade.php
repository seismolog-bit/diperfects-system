<section class="breadcrumb__area include-bg pt-100 pb-50 breadcrumb__padding">
    <div class="container-fluid">
       <div class="row">
          <div class="col-xxl-12">
             <div class="breadcrumb__content p-relative z-index-1">
                <h3 class="breadcrumb__title">{{$title}}</h3>
                <div class="breadcrumb__list">
                   <span><a href="{{route('index')}}">Home</a></span>
                   <span>{{$title}}</span>
                   {{$slot}}
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
