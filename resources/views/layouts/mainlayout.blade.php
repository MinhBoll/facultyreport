<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/form-style.css')}}">
        
        <style>          
          .error {
              margin-bottom: 0px !important;
              font-size: 11;
          }
        </style>
        <title>CSI-CUNY Faculty Report</title>


    </head>
    <body>
        <div class="container">
          <!-- @include('inc.messages')-->
            @yield('content')
        </div>
       
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/dynamic-fields.js')}}"></script>
    </body>
</html>
