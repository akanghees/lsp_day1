@include('layouts.admin.head')
<!--start wrapper-->
<div class="wrapper">
    @include('partials.admin.navbar')
    @include('partials.admin.sidebar')
@yield('content')
  </div>
@include('layouts.admin.footer')