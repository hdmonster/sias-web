<div id="updateScoreModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Update Student Score</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <form action="/admin/academic-score/update-score" method="POST">
        @csrf

        <div class="modal-body">
          <div class="form-body">
            <input type="hidden" id="usAcademicClassYearId" name="academic_class_year_id"
              value="{{ $academicClassYearId }}">
            <input type="hidden" id="usSubjectId" name="subject_id" value="{{ $subjectId }}">
            <input type="hidden" id="usStudentId" name="student_id">

            <div class="form-group">
              <label for="scoreType">Score Type</label>
              <select class="form-control" id="scoreType" name="score_type">
                <option selected disabled>Select</option>
                <option value="homework">Homework</option>
                <option value="daily test">Daily Test</option>
                <option value="quiz">Quiz</option>
                <option value="mid term">Mid Term</option>
                <option value="final term">Final Term</option>
              </select>
            </div>

            <div class="form-group">
              <label for="score">Score</label>
              <input type="number" class="form-control" id="score" name="score" placeholder="Score">
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
<script>
  $('#updateScoreModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)
    let studentId = button.data('student-id')

    const studentIdHiddenInput = document.querySelector('#usStudentId')
    studentIdHiddenInput.value = studentId
  })
  
</script>
@endpush