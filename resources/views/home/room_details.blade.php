<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
    @include('home.css')

    <style type="text/css">
      label
      {
         display:inline-block;
         width:200px;
      }

      input
      {
         width:100%;
      }
    </style>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
        @include('home.header')
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <div  class="our_room">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="titlepage">
                    <h2>Our Room</h2>
                    <p>Lorem Ipsum available, but the majority have suffered </p>
                 </div>
              </div>
           </div>
      <div class="row">
         <div class="col-md-8 col-sm-6">
            <div id="serv_hover"  class="room">
               <div style="padding:20px" class="room_img">
                  <figure><img style="height=800px" src="roomimage/{{$room->image}}" alt="#"/></figure>
               </div>
               <div class="bed_room">
                  <h3 style="padding: 12px">{{$room->room_title }}</h3>
                  <p style="padding: 12px">{{$room->description }}</p>
                  <h4 style="padding: 12px">Free Wifi: {{$room->wifi}}</h4>
                  <h4 style="padding: 12px">Room Type: {{$room->room_type}}</h4>
                  <h3 style="padding: 12px">Price: {{$room->price }}</h3>
               </div>
            </div>
         </div>
         <div class="col-md-4 col-sm-6">
            <h1 style="font-size:40;">Book Room</h1>
            @if($errors)
            @foreach ($errors->all() as $error)
                <li style="color:red">{{$error}}</li>
            @endforeach
            @endif

            <form action="{{url('add_booking',$room->id)}}" method="post">
               @csrf
            <div>
               <label>Name</label>
               <input type="text" name="name" value="{{Auth::user()->name ?? ''}}">
            </div>
            <div>
               <label>Email</label>
               <input type="email" name="email" value="{{Auth::user()->email ?? ''}}" >
            </div>
            <div>
               <label>Phone</label>
               <input type="number" name="phone" value="{{Auth::user()->phone ?? ''}}">
            </div>
            <div>
               <label>Start Date</label>
               <input type="date" name="startDate" id="startDate">
            </div>
            <div>
               <label>End Date</label>
               <input type="date" name="endDate" id="endDate">
            </div>
            <div style="padding-top:20px;">
               <input type="submit" class="book_btn" style="border: none" value="Book Room">
            </div>
         </form>
         </div>

      </div>
    </div>
</div>
      <!--  footer -->
      @include('home.footer')

      <script type="text/javascript">
         var dateToday = new Date();
         var month = dateToday.getMonth() + 1;
         var day = dateToday.getDate();
         var year = dateToday.getFullYear();
         if (month < 10) {
            month = "0" + month.toString();
         }
         if (day < 10) {
            day = "0" + day.toString();
         }
         var maxDate = year + "-" + month + "-" + day;
         $('#startDate').attr('min', maxDate);
         $('#endDate').attr('min', maxDate);
      </script>
   </body>
</html>