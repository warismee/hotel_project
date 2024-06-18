<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">

      .table_deg{
        border: 2px solid white;
        margin:auto;
        width:50%;
        text-align: center;
        margin-top: 40px;
      }
      .th-deg{
        background-color: skyblue;
        padding: 15px;  
      }
      tr
      {
        border:3px solid white;
      }
      td{
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
            <table class="table_deg">
                <tr>
                    <th class="th-deg">Room Title</th>
                    <th class="th-deg">Description</th>
                    <th class="th-deg">Price</th>
                    <th class="th-deg">Wifi</th>
                    <th class="th-deg">Room Type</th>
                    <th class="th-deg">Image</th>
                </tr>
                @foreach($data as $d)
                <tr>
                    <td>{{$d->room_title}}</td>
                    <td>{!! Str::limit($d->description,150)!!}</td>
                    <td>{{$d->price}}</td>
                    <td>{{$d->wifi}}</td>
                    <td>{{$d->room_type}}</td>
                    <td>
                        <img width="100" src="roomimage/{{$d->image}}" />
                    </td>
                </tr>
                @endforeach
            </table>

          </div>
        </div>
    </div>
        @include('admin.footer')
  </body>
</html>