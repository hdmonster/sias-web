<div id="editClassModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Edit Class</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <form action="/admin/classes" method="POST" id="editClassForm">
        @method('put')
        @csrf

        <input type="hidden" name="id" id="id">

        <div class="modal-body">
          <div class="form-body">

            <div class="form-group">
              <input type="text" class="form-control" id="className" name="class_name">
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
<script>
  $('#editClassModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)
    let id = button.data('id')
    let modal = $(this)

    const form = document.querySelector('#editClassForm')
    form.action = '/admin/classes/' + id

    const inputId = document.querySelector('#id')
    const inputClassName = document.querySelector('#className')

    axios.get(`/admin/classes/${id}`)
    .then(res => {
      const academicClass = res.data;

      inputId.value = academicClass.id
      inputClassName.value = academicClass.class_name
    })
    .catch(error => console.error(error));

  })

</script>
@endpush
