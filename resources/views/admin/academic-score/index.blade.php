@extends('admin.layouts.master')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h3>{{ ucwords($subjectName) }}</h3>
        <h4 class="card-title">Students Academic Score</h4>
        <h6 class="card-subtitle">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, reiciendis.
        </h6>
        <div class="table-responsive">
          <table id="default_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>
                <th>NISN</th>
                <th>Gender</th>
                <th>Homework</th>
                <th>Daily Test</th>
                <th>Quiz</th>
                <th>Mid Term</th>
                <th>Final Term</th>
                <th>Avg Score</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              @foreach($students as $student)

              <tr>
                <td>{{ $student->student->name }}</td>
                <td>{{ $student->student->nisn }}</td>
                <td class="text-capitalize">{{ $student->student->gender }}</td>

                @for ($subject_key = 0; $subject_key < 5; $subject_key++) <td>
                  {{ $studentScores[$student->student->id][$subject_key]['score'] ?? 0 }}
                  </td>
                  @endfor

                  <td>
                    <?php
                      try{
                        $scores = collect($studentScores[$student->student->id]);
                        $avgScore = $scores->avg('score');  
                      } catch(Exception $e) {
                        $avgScore = 0;
                      }
                    ?>

                    {{ $avgScore }}
                  </td>

                  <td>
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#updateScoreModal"
                      data-student-id="{{ $student->student->id }}"> Update Score </button>
                  </td>
              </tr>

              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>NISN</th>
                <th>Gender</th>
                <th>Homework</th>
                <th>Daily Test</th>
                <th>Quiz</th>
                <th>Mid Term</th>
                <th>Final Term</th>
                <th>Avg Score</th>
                <th>#</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@include('admin.components.academic-score.update-score')

@endsection