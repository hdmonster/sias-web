<div id="assignClassModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Assign Class</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <form action="/admin/students/assign-class" method="POST">
        @csrf

        <div class="modal-body">
          <div class="form-body">

            <input type="hidden" id="mStudentId" name="studentId">

            <div class="form-group">
              <label for="academicClassYear">Academic Class</label>
              <select class="form-control" id="academicClassYear" name="academicClassYearId">
                <option selected disabled>Select</option>
              </select>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Assign</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
<script>
  $('#assignClassModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)
    let id = button.data('id')

    const studentIdHiddenInput = document.querySelector('#mStudentId')
    const selectAcademicClassYear = document.querySelector('#academicClassYear')
    
    studentIdHiddenInput.value = id
    
    const xhttpAcademicClassYear = new XMLHttpRequest();
    xhttpAcademicClassYear.onload = function() {
      const academicClassYears = JSON.parse(this.responseText)
      
      academicClassYears.forEach(academicClassYear => {
        selectAcademicClassYear.options.add(
          new Option(`${academicClassYear.academic_class.class_name} (${academicClassYear.academic_year.year})`, academicClassYear.id)
          )
      }); 

    }
    
    xhttpAcademicClassYear.open("GET", "/api/academic-class-years", true);
    xhttpAcademicClassYear.send();
    
  })
  
</script>
@endpush