<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
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
              <h1 style="font-size: 30px; font-weight: bold;">Send mail to {{$contact_mail->name}}</h1>
              <form action="{{url('mail', $contact_mail->id)}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="div_deg">
                  <label>Greeting</label>
                  <input type="text" name="greeting">
                </div>
                <div class="div_deg">
                  <label>Mail Content</label>
                  <textarea name="mail_content"></textarea>
                </div>
                <div class="div_deg">
                  <label>Action Text</label>
                  <input type="text" name="action_text">
                </div>
                <div class="div_deg">
                  <label>Action Url</label>
                  <input type="text" name="action_url">
                </div>
                <div class="div_deg">
                  <label>End Line</label>
                  <input type="text" name="endline">
                </div>
                <div class="div_deg">
                  <input class="btn btn-primary" type="submit" value="Send mail">
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
        @include('admin.footer')
  </body>
</html>