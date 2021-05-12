<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
  <title>
    @yield('title','TebibyteTech')
  </title>

  @include('frontend.partials.style')
</head>
<body>
  <!-- nav bar start -->
    @include('frontend.partials.nav')
    <!-- navbar end -->

    <!-- Messages -->
    @include('frontend.partials.messages')

    <!-- contain start -->
      @yield('index')
    <!-- contain end -->



    <!-- start footer -->
    {{-- @include('frontend.partials.footer') --}}
    @include('frontend.partials.script')
    @yield('scripts')
    <!-- end footer -->
  </body>
  </html>
