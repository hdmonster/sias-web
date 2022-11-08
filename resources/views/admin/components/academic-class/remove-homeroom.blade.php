<div id="removeHomeroomModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Remove Homeroom Teacher</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <form action="/admin/academic-classes/homeroom" method="POST">
        @method('delete')
        @csrf
        <div class="modal-body">
          <div class="form-body">

            <input type="hidden" id="homeroomAcademicClassYearId" name="academic_class_year_id">

            <div class="form-group">
              <label for="teacherName">Teacher Name</label>
              <select class="form-control" id="rTeacherName" name="teacher_id">
                <option selected disabled>Select</option>
              </select>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Remove</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
<script>
  $('#removeHomeroomModal').on('show.bs.modal', function (event) {
    clearPreviousOptions()

    let button = $(event.relatedTarget)
    let id = button.data('id')
    let modal = $(this)

    const homeroomAcademicClassYearId = document.querySelector('#homeroomAcademicClassYearId').value = id
    const selectTeacher = document.querySelector('#rTeacherName')

    const xhttpHomeroomTeacher = new XMLHttpRequest();
    xhttpHomeroomTeacher.onload = function() {
      const homeroom_teachers = JSON.parse(this.responseText)

      selectTeacher.options.add(new Option('Select', null, true))
      homeroom_teachers.forEach(homeroom_teacher => {
        const { name, id } = homeroom_teacher.teacher

        selectTeacher.options.add(new Option(name, id))
      }); 

    }
    
    xhttpHomeroomTeacher.open("GET", "/api/academic-class-years/homeroom/" + id, true);

    xhttpHomeroomTeacher.send();
    
  })
  
  function clearPreviousOptions(){
    $('#rTeacherName')
    .find('option')
    .remove()
  }
</script>
@endpush