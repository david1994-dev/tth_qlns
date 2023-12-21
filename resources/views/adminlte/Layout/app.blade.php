<!DOCTYPE html>
<html lang="">
<head>
  <!-------------------------------- Begin: Meta ----------------------------------->
  @yield('metadata')
  <!-------------------------------- End: Meta ----------------------------------->

  <!-------------------------------- Begin: stylesheet ----------------------------------->
  @include('adminlte.Layout.style')
  @yield('styles')
  <!-------------------------------- End: stylesheet ----------------------------------->

    <title></title>
</head>
<body class="sidebar-mini">
  <div class="wrapper">
    <!-------------------------------- Begin: Header ----------------------------------->
    @include('adminlte.Layout.header')
    <!-------------------------------- End: Header ----------------------------------->

    <!-------------------------------- Begin: Left Navigation ----------------------------------->
    @include('adminlte.Layout.menu')
    <!-------------------------------- End: Left Navigation ----------------------------------->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1302.26px;">
      <!-- Content Header (Page header) -->
      <section class="content-header">

      </section>

      <!-- Main content -->
      <div class="content">
        @yield('content')
      </div>
      <!-- /.content -->
    </div>

    <!-------------------------------- Begin: Footer ----------------------------------->
    @include('adminlte.Layout.footer')

    <!-------------------------------- End: Footer ----------------------------------->
  </div>
<!-------------------------------- Begin: Script ----------------------------------->
  @include('adminlte.Layout.scripts')
  @yield('scripts')
<!-------------------------------- End: Script ----------------------------------->
</body>
</html>
