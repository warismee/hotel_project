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

    {{-- Content part --}}
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <table class="table_deg">
                <tr>
                    <th class="th-deg">Room_id</th>
                    <th class="th-deg">Customer name</th>
                    <th class="th-deg">Email</th>
                    <th class="th-deg">Phone</th>
                    <th class="th-deg">Arrival Date</th>
                    <th class="th-deg">Leaving Date</th>
                    <th class="th-deg">Status</th>
                    <th class="th-deg">Room Title</th>
                    <th class="th-deg">Room Type</th>
                    <th class="th-deg">Price</th>
                    <th class="th-deg">Image</th>
                </tr>
                @foreach($data as $d)
                <tr>
                    <td>{{$d->room_id}}</td>
                    <td>{{$d->name}}</td>
                    <td>{{$d->email}}</td>
                    <td>{{$d->phone}}</td>
                    <td>{{$d->start_date}}</td>
                    <td>{{$d->end_date}}</td>
                    <td>{{$d->status}}</td>
                    <td>{{$d->room->room_title}}</td>
                    <td>{{$d->room->room_type}}</td>
                    <td>{{$d->room->price}}</td>
                    <td>
                        <img width="100" src="roomimage/{{$d->room->image}}" />
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