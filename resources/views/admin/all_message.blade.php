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
                    <th class="th-deg">Name</th>
                    <th class="th-deg">Email</th>
                    <th class="th-deg">Phone</th>
                    <th class="th-deg">Message</th>
                    <th class="th-deg">Send Email</th>
                </tr>
                @foreach($all_message as $m)
                <tr>
                    <td>{{$m->name}}</td>
                    <td>{{$m->email}}</td>
                    <td>{{$m->phone}}</td>
                    <td>{{$m->message}}</td>
                    <td><a class="btn btn-success" href="{{url('sendmail', $m->id)}}">Send mail</a></td>
                </tr>
                @endforeach
            </table>

          </div>
        </div>
    </div>
        @include('admin.footer')
  </body>
</html>