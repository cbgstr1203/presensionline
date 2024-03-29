
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Dashboard</title>
    <!-- CSS files -->
    <link href="{{asset('tabler/dist/css/tabler.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/tabler-flags.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/tabler-payments.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/tabler-vendors.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/demo.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>


  <body >
    <script src="{{asset('tabler/dist/js/demo-theme.min.js?1692870487')}}"></script>
    <div class="page">
      <!-- Sidebar -->
      @include('layout.admin.sidebar')
      <!-- Navbar -->
      @include('layout.admin.header')
      
      <div class="page-wrapper">
      <!-- Page header -->
      @yield('content')

      </div>
      
      @include('layout.admin.scriptadmin')
    </div>
    

  </body>
  </html>
    