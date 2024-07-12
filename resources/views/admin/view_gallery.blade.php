<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
      label{
        display: inline-block;
        width: 200px;
      }
      .div_deg{
        padding: 10px;
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')


    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1>Gallery</h1>

            <form action="{{url('upload_gallery')}}" method="Post" enctype="multipart/form-data">
              @csrf
              <div class="m-4">
                <label style="display:block;font-weight:bold;">Upload Image</label>
                <input type="file" name="image">
              </div>

              <div>
                <button class="btn btn-primary" type="submit">Add Image</button>
              </div>
            </form>

            <div class="row m-4">
              @foreach($gallery as $gal)
              <div class="col-md-4">
                <div class="text-right mr-2"><a href="{{url('delete_gallery', $gal->id)}}"><svg class="h-8 w-8 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></a></div>
                <img height="200" width="300" src="/galleryimage/{{ $gal->image }}" alt="">
              </div>
              @endforeach
            </div>
          </div>
        </div>
    </div>
        @include('admin.footer')
  </body>
</html>