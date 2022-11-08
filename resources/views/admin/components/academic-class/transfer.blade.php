<div id="transferClassModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Transfer Class</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <form action="/admin/academic-classes/transfer" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-body">

            <input type="hidden" name="academic_class_year_id_to_transfer" id="academicClassYearIdToTransfer">

            <div class="form-group">
              <label for="academicYear">Academic Class Year</label>
              <select class="form-control" id="tAcademicClassYear" name="academic_class_year_id">
                <option selected disabled>Select</option>
              </select>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Transfer</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
<script>
  $('#transferClassModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)
    let id = button.data('id')
    let modal = $(this)
    
    const academicClassYearIdToTransfer = document.querySelector('#academicClassYearIdToTransfer').value = id
    const selectAcademicClassYear = document.querySelector('#tAcademicClassYear')
    
    const options = document.querySelectorAll('#tAcademicClassYear')
    
    const xhttpAcademicClassYear = new XMLHttpRequest();
    xhttpAcademicClassYear.onload = function() {
      const academicClassYears = JSON.parse(this.responseText)

      academicClassYears.forEach(academicClassYear => {
        selectAcademicClassYear.options.add(new Option(`${academicClassYear.academic_class.class_name} (${academicClassYear.academic_year.year})`, academicClassYear.id))
      }); 

    }
    
    xhttpAcademicClassYear.open("GET", "/api/academic-class-years", true);
    xhttpAcademicClassYear.send();
    
  })
  
</script>
@endpush