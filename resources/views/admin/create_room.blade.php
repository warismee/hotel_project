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
            <div>
              <h1 style="font-size: 30px; font-weight: bold;">Add Rooms</h1>
              <form action="{{url('add_room')}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="div_deg">
                  <label>Room Title</label>
                  <input type="text" name="title">
                </div>
                <div class="div_deg">
                  <label>Description</label>
                  <textarea name="description"></textarea>
                </div>
                <div class="div_deg">
                  <label>Price</label>
                  <input type="number" name="price">
                </div>
                <div class="div_deg">
                  <label>Room Type</label>
                  <select name="type">
                    <option selected value="regular">Regular</option>
                    <option value="premiun">Premium</option>
                    <option value="deluxe">Deluxe</option>
                  </select>
                </div>
                <div class="div_deg">
                  <label>Free Wifi</label>
                  <select name="wifi">
                    <option selected value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>
                </div>
                <div class="div_deg">
                  <label>Upload Image</label>
                  <input type="file" name="image">
                </div>
                <div class="div_deg">
                  <input class="btn btn-primary" type="submit" value="Add Room">
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
        @include('admin.footer')
  </body>
</html>