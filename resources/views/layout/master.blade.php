<!DOCTYPE html>
<html>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Dealer Motor Poyyzan</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('prefix/css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('prefix/css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('prefix/css/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('prefix/images/fevicon.png') }}" type="image/gif" />
      <!-- font css -->
      <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('prefix/css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   </head>
   <body>
      <div class="header_section">
         <div class="container-fluid">
            
            @include('layout.navbar')
         @yield('abc')

      <!-- Javascript files-->
      <script src="{{ asset('prefix/js/jquery.min.js') }}"></script>
      <script src="{{ asset('prefix/js/popper.min.js') }}"></script>
      <script src="{{ asset('prefix/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('prefix/js/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset('prefix/js/plugin.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('prefix/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('prefix/js/custom.js') }}"></script>
      <!-- javascript --> 
      <script>
         // Material Select Initialization
         $(document).ready(function() {
         $('.mdb-select').materialSelect();
         $('.select-wrapper.md-form.md-outline input.select-dropdown').bind('focus blur', function () {
         $(this).closest('.select-outline').find('label').toggleClass('active');
         $(this).closest('.select-outline').find('.caret').toggleClass('active');
         });
         });
      </script>
   </body>
</html>