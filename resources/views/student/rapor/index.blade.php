@extends('student.layouts.master')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h3>Class {{ $className }}</h3>
        <h4 class="card-title">Academic Report</h4>
        <h6 class="card-subtitle">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, reiciendis.
        </h6>
        <div class="table-responsive">
          <table id="default_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
            <thead>
              <tr>
                <th>Subject Name</th>
                <th>Homework</th>
                <th>Daily Test</th>
                <th>Quiz</th>
                <th>Mid Term</th>
                <th>Final Term</th>
                <th>Average Score</th>
              </tr>
            </thead>
            <tbody>
              @foreach($subjects as $subject)

              <tr>
                <td class="text-capitalize">{{ $subject->subject_name }}</td>

                @for ($key = 0; $key < 5; $key++) <td>
                  {{ $studentScores[$subject->id][$key]['score'] ?? 0 }}
                  </td>
                  @endfor

                  <td>
                    <?php
                      try{
                        $scores = collect($studentScores[$subject->id]);
                        $avgScore = $scores->avg('score');  
                      } catch(Exception $e) {
                        $avgScore = 0;
                      }
                    ?>

                    {{ $avgScore }}
                  </td>
              </tr>

              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Subject Name</th>
                <th>Homework</th>
                <th>Daily Test</th>
                <th>Quiz</th>
                <th>Mid Term</th>
                <th>Final Term</th>
                <th>Average Score</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection