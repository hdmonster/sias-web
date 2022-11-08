@extends('student.layouts.master')

@section('content')

<div class="card">
  <div class="card-body collapse show">
    <h4 class="card-title mb-4">Leland Kein</h4>
    <p class="card-text">
      Class VII A
    </p>
  </div>
</div>

<div class="row row-cols-2">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start">
          <h4 class="card-title mb-0">Academic Performance (2.0)</h4>
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
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Strength & Weakness</h4>
        <canvas id="radar-chart" height="300" width="300"></canvas>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="/assets/extra-libs/c3/d3.min.js"></script>
<script src="/assets/extra-libs/c3/c3.min.js"></script>
<script src="/assets/libs/chartist/dist/chartist.min.js"></script>
<script src="/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

<script src="/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="/dist/js/pages/dashboards/dashboard1.js"></script>

<script src="/assets/libs/chart.js/dist/Chart.min.js"></script>
<script src="/dist/js/pages/students/performance.js"></script>
@endpush