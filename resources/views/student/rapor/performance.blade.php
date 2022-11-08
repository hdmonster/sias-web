@extends('student.layouts.master')

@section('content')
<div class="container-fluid">

  <div class="card">
    <div class="card-body collapse show">
      <h4 class="card-title mb-4">Your Academic Performance</h4>
      <p class="card-text">
        Evaluate your performance in this class
      </p>
    </div>
  </div>

  <div class="row row-cols-2">

    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Strength & Weakness</h4>
          <canvas id="radar-chart" height="300" width="300"></canvas>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Subject Score</h4>
          <div class="net-income mt-4 position-relative" style="height:294px;"></div>
          <ul class="list-inline text-center mt-5 mb-2">
            <li class="list-inline-item text-muted font-italic">
              Average subject score in this class
            </li>
          </ul>
        </div>
      </div>
    </div>

  </div>

</div>
@endsection

@push('scripts')
<script src="/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/dist/js/pages/datatable/datatable-basic.init.js"></script>
<script src="/assets/libs/chartist/dist/chartist.min.js"></script>
<script src="/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

<script src="/assets/libs/chart.js/dist/Chart.min.js"></script>
<script src="/dist/js/pages/students/performance.js"></script>
@endpush