<!DOCTYPE html>
<html lang="">
<head>
  <!-------------------------------- Begin: Meta ----------------------------------->
  @yield('metadata')
    <meta name="_token" content="{{ csrf_token() }}">
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
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-8 offset-md-2">
                  @if ($errors->count())
                      <div class="alert alert-danger">
                          <ul class="mb-0">
                              @foreach ($errors->all() as $e)
                                  <li>{!! $e !!}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  @if ($message = session('error'))
                      <div class="alert alert-danger alert-block">
                          {!! $message !!}
                      </div>
                  @endif
                  @if ($message = session('success'))
                      <div class="alert alert-success alert-block">
                          {!! $message !!}
                      </div>
                  @endif
              </div>
          </div>
        @yield('content')
      </div>
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
