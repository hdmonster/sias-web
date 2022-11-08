<div id="addHomeroomModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add Homeroom Teacher</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <form action="/admin/academic-classes/homeroom" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-body">

            <input type="hidden" id="homeroomAcademicClassYearId" name="academic_class_year_id">

            <div class="form-group">
              <label for="teacherName">Teacher Name</label>
              <select class="form-control" id="teacherName" name="teacher_id">
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
  $('#addHomeroomModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)
    let id = button.data('id')
    let modal = $(this)

    const homeroomAcademicClassYearId = document.querySelector('#homeroomAcademicClassYearId').value = id
    const selectTeacher = document.querySelector('#teacherName')



    const xhttpTeacher = new XMLHttpRequest();
    xhttpTeacher.onload = function() {
      const teachers = JSON.parse(this.responseText)

      teachers.forEach(teacher => {
        selectTeacher.options.add(new Option(teacher.name, teacher.id))
      }); 

    }
    
    xhttpTeacher.open("GET", "/api/teachers", true);

    xhttpTeacher.send();
    
  })
  
</script>
@endpush