<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">

body, html {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    .page-content {
        min-height: 100vh;
        background-color: #2d3035; /* Dark background color */
        padding: 20px;
        box-sizing: border-box;
    }

    .page-header {
        background-color: inherit;
    }

    .container-fluid {
        background-color: inherit;
        padding: 0;
    }

    .table-container {
        background-color: inherit;
        overflow-x: auto; /* For horizontal scrolling if needed */
    }

    .table_deg {
        width: 100%;
        background-color: transparent;
        color: white; /* Ensure text is visible on dark background */
        font-size: 80%;
    }

    .th-deg {
        background-color: #2d3035; /* Darker color for headers */
    }

    tr {
      border:3px solid white;
    }

    /* Ensure buttons are visible */
    .btn-danger, .btn-success, .btn-warning {
        color: white;
        font-size:90%;
    }
    td{
        padding: 6px;
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
                    <th class="th-deg">Delete</th>
                    <th class="th-deg">Status Update</th>
                </tr>
                @foreach($data as $d)
                <tr>
                    <td>{{$d->room_id}}</td>
                    <td>{{$d->name}}</td>
                    <td>{{$d->email}}</td>
                    <td>{{$d->phone}}</td>
                    <td>{{$d->start_date}}</td>
                    <td>{{$d->end_date}}</td>
                    <td>
                      @if($d->status == 'pending')
                      <span>Pending</span>
                      @else
                      {{$d->status}}
                      @endif
                    </td>
                    <td>{{$d->room->room_title}}</td>
                    <td>{{$d->room->room_type}}</td>
                    <td>{{$d->room->price}}</td>
                    <td>
                        <img width="100" src="roomimage/{{$d->room->image}}" />
                    </td>
                    <td>
                      <a class="btn btn-danger" href="{{url('deletebooking', $d->id)}}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                    </td>
                    <td>
                      <a class="btn btn-success" style="margin-bottom: 6px" href="{{url('approve_booking', $d->id)}}">Approve</a>
                      <a class="btn btn-warning" style="padding-right: 25px" href="{{url('reject_booking', $d->id)}}">Reject</a>
                    </td>
                </tr>
                @endforeach
            </table>
          </div>
        </div>
        @include('admin.footer')
    </div>      
  </body>
</html>