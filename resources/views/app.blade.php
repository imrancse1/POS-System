@include('_partials.top')
<div class="wrapper">
  @include('_partials.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content-header')
   @include('common.message')
    <!-- Main content -->
     @yield('main-content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('common.modal')
  @include('_partials.footer')
</div>
<!-- ./wrapper -->
@yield('script')
@include('_partials.bottom')
