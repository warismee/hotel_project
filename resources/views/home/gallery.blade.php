<div  class="gallery">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>gallery</h2>
             </div>
          </div>
       </div>
       <div class="row">
         @foreach($gallery as $gal)
          <div class="col-md-3 col-sm-6">
             <div class="gallery_img">
                <figure><img src="galleryimage/{{$gal->image}}" style=" height=200px !important" alt="#"/></figure>
             </div>
          </div>
          @endforeach
       </div>
    </div>
 </div>