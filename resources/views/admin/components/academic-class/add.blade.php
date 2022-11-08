<div id="addAcademicClassModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add New Academic Class</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <form action="/admin/academic-classes" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-body">

            <div class="form-group">
              <label for="className">Class Name</label>
              <select class="form-control" id="className" name="academic_class_id">
                <option selected disabled>Select</option>
              </select>
            </div>

            <div class="form-group">
              <label for="academicYear">Academic Year</label>
              <select class="form-control" id="academicYear" name="academic_year_id">
                <option selected disabled>Select</option>
              </select>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
<script>
  $('#addAcademicClassModal').on('show.bs.modal', function (event) {
    const selectClass = document.querySelector('#className')
    const selectAcademicYear = document.querySelector('#academicYear')
    
    const xhttpClass = new XMLHttpRequest();
    xhttpClass.onload = function() {
      const classes = JSON.parse(this.responseText)

      classes.forEach(_class => {
        selectClass.options.add(new Option(_class.class_name, _class.id))
      }); 

    }

    const xhttpAcademicYear = new XMLHttpRequest();
    xhttpAcademicYear.onload = function() {
      const academicYears = JSON.parse(this.responseText)

      academicYears.forEach(academicYear => {
        selectAcademicYear.options.add(new Option(academicYear.year, academicYear.id))
      }); 

    }
    
    xhttpClass.open("GET", "/api/classes", true);
    xhttpAcademicYear.open("GET", "/api/academic-years", true);

    xhttpClass.send();
    xhttpAcademicYear.send();
    
  })
  
</script>
@endpush