@extends('student.layouts.master')

@section('content')


<div class="row row-cols-2">
  <div class="col">
    <div class="card">
      <div class="card-body collapse show">
        <h4 class="card-title mb-4">{{ Auth::guard('student')->user()->name }}</h4>
        <table class="table" width="100%">
          <tr>
            <td>Class</td>
            <td>{{ Auth::guard('student')->user()->studentClasses->count() > 0 ? Auth::guard('student')->user()->studentClasses->first()->academicClassYear->academicClass->class_name  : 0}}</td>
          </tr>
          <tr>
            <td>Gender</td>
            <td>{{ Str::title(Auth::guard('student')->user()->gender) }}</td>
          </tr>
          <tr>
            <td>Birthplace</td>
            <td>{{ Auth::guard('student')->user()->birth_place_and_date }}</td>
          </tr>
          <tr>
            <td>Address</td>
            <td>{{ Auth::guard('student')->user()->address }}</td>
          </tr>
          <tr>
            <td>Religion</td>
            <td>{{ Str::title(Auth::guard('student')->user()->religion) }}</td>
          </tr>
          <tr>
            <td>Parent</td>
            <td>{{ Auth::guard('student')->user()->parent_name }} <br> {{ Auth::guard('student')->user()->parent_mobile }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Academic Performance</h4>
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
<script>
  let apiPerformance = '/api/students/performance/{{ Auth::guard("student")->user()->id }}';
  let apiSubjectScore = '/api/students/subject/{{ Auth::guard("student")->user()->id }}';
</script>
<script src="/dist/js/pages/students/performance.js"></script>
@endpush