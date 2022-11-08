@extends('admin.layouts.master')

@section('breadcrumb')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-7 align-self-center">
      <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning Jason!</h3>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
  <!-- *************************************************************** -->
  <!-- Start School Data Summary Cards -->
  <!-- *************************************************************** -->
  <div class="card-group">
    <div class="card border-right">
      <div class="card-body">
        <div class="d-flex d-lg-flex d-md-block align-items-center">
          <div>
            <div class="d-inline-flex align-items-center">
              <h2 class="text-dark mb-1 font-weight-medium">{{ $total_students }}</h2>
            </div>
            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
              Active {{ $total_students < 1 ? 'Student' : 'Students' }} </h6>
          </div>
          <div class="ml-auto mt-md-3 mt-lg-0">
            <span class="opacity-7 text-muted"><i data-feather="user"></i></span>
          </div>
        </div>
      </div>
    </div>
    <div class="card border-right">
      <div class="card-body">
        <div class="d-flex d-lg-flex d-md-block align-items-center">
          <div>
            <div class="d-inline-flex align-items-center">
              <h2 class="text-dark mb-1 font-weight-medium">1.45</h2>
            </div>
            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
              Academic Performance (2.0)
            </h6>
          </div>
          <div class="ml-auto mt-md-3 mt-lg-0">
            <span class="opacity-7 text-muted"><i data-feather="award"></i></span>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="d-flex d-lg-flex d-md-block align-items-center">
          <div>
            <h2 class="text-dark mb-1 font-weight-medium">{{ $total_teachers }}</h2>
            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
              Active {{ $total_teachers < 1 ? 'Teacher' : 'Teachers' }} </h6>
          </div>
          <div class="ml-auto mt-md-3 mt-lg-0">
            <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- *************************************************************** -->
  <!-- End School Data Summary Cards -->
  <!-- *************************************************************** -->

  <!-- *************************************************************** -->
  <!-- Start Academic Performance Section -->
  <!-- *************************************************************** -->
  <div class="row">
    <div class="col-md-6 col-lg-8">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start">
            <h4 class="card-title mb-0">Students Academic Performance</h4>
            <div class="ml-auto">
            </div>
          </div>
          <div class="pl-4 mb-5">
            <div class="stats ct-charts position-relative" style="height: 315px;"></div>
          </div>
          <ul class="list-inline text-center mt-4 mb-0">
            <li class="list-inline-item text-muted font-italic">
              Academic performance for this year
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Subject Score</h4>
          <div class="net-income mt-4 position-relative" style="height:294px;"></div>
          <ul class="list-inline text-center mt-5 mb-2">
            <li class="list-inline-item text-muted font-italic">
              Average subject score for this year
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- *************************************************************** -->
  <!-- End Academic Performance Section -->
  <!-- *************************************************************** -->
  <!-- *************************************************************** -->
  <!-- Start Top Academic Performance Table -->
  <!-- *************************************************************** -->
  {{-- <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center mb-4">
            <h4 class="card-title">Top Academic Performance</h4>
          </div>
          <div class="table-responsive">
            <table class="table no-wrap v-middle mb-0">
              <thead>
                <tr class="border-0">
                  <th class="border-0 font-14 font-weight-medium text-muted">
                    Student
                  </th>
                  <th class="border-0 font-14 font-weight-medium text-muted px-2">Class
                  </th>
                  <th class="border-0 font-14 font-weight-medium text-muted text-center">
                    Rating (2.0)
                  </th>
                  <th class="border-0 font-14 font-weight-medium text-muted text-center">
                    Highest Rating (2.0)
                  </th>
                  <th class="border-0 font-14 font-weight-medium text-muted text-center">
                    Top Subject
                  </th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td class="border-top-0 px-2 py-4">
                    <div class="d-flex no-block align-items-center">
                      <div class="mr-3"><img src="/assets/images/users/widget-table-pic2.jpg" alt="user"
                          class="rounded-circle" width="45" height="45" /></div>
                      <div class="">
                        <h5 class="text-dark mb-0 font-16 font-weight-medium">
                          James Sullivan
                        </h5>
                        <span class="text-muted font-14">0032421</span>
                      </div>
                    </div>
                  </td>
                  <td class="border-top-0 text-muted px-2 py-4 font-14">
                    IX A
                  </td>
                  <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                    1.73
                  </td>
                  <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                    1.95
                  </td>
                  <td class="border-top-0 text-center font-weight-medium text-dark  px-2 py-4">
                    Mathematic
                  </td>
                </tr>

                <tr>
                  <td class="border-top-0 px-2 py-4">
                    <div class="d-flex no-block align-items-center">
                      <div class="mr-3"><img src="/assets/images/users/widget-table-pic1.jpg" alt="user"
                          class="rounded-circle" width="45" height="45" /></div>
                      <div class="">
                        <h5 class="text-dark mb-0 font-16 font-weight-medium">
                          Stephanie
                        </h5>
                        <span class="text-muted font-14">0023571</span>
                      </div>
                    </div>
                  </td>
                  <td class="border-top-0 text-muted px-2 py-4 font-14">
                    VIII A
                  </td>
                  <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                    1.72
                  </td>
                  <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                    1.8
                  </td>
                  <td class="border-top-0 text-center font-weight-medium text-dark  px-2 py-4">
                    Rocket Science
                  </td>
                </tr>

                <tr>
                  <td class="border-top-0 px-2 py-4">
                    <div class="d-flex no-block align-items-center">
                      <div class="mr-3"><img src="/assets/images/users/widget-table-pic3.jpg" alt="user"
                          class="rounded-circle" width="45" height="45" /></div>
                      <div class="">
                        <h5 class="text-dark mb-0 font-16 font-weight-medium">
                          Billie
                        </h5>
                        <span class="text-muted font-14">0012643</span>
                      </div>
                    </div>
                  </td>
                  <td class="border-top-0 text-muted px-2 py-4 font-14">
                    VII B
                  </td>
                  <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                    1.85
                  </td>
                  <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                    1.85
                  </td>
                  <td class="border-top-0 text-center font-weight-medium text-dark  px-2 py-4">
                    Magic & Spells
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  <!-- *************************************************************** -->
  <!-- End Top Academic Performance Table -->
  <!-- *************************************************************** -->
</div>
@endsection

@push('scripts')
<!--This page JavaScript -->
<script src="/assets/extra-libs/c3/d3.min.js"></script>
<script src="/assets/extra-libs/c3/c3.min.js"></script>
<script src="/assets/libs/chartist/dist/chartist.min.js"></script>
<script src="/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="/dist/js/pages/dashboards/dashboard1.js"></script>
@endpush