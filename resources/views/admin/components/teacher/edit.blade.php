<div id="editTeacherModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Edit Teacher</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <form action="/admin/teachers" method="POST" id="editTeacherForm">
        @method('put')
        @csrf
        <div class="modal-body">
          <div class="form-body">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="old_nip" id="oldNip">

            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Name" id="editName">
            </div>

            <div class="form-group">
              <input type="text" class="form-control" name="nip" placeholder="NIP" id="editNip">
            </div>

            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <div class="btn-group mt-3" data-toggle="buttons" role="group">
              <label class="btn btn-outline btn-info">
                <div class="custom-control custom-radio">
                  <input type="radio" id="genderMaleRadio" name="gender" value="male" class="custom-control-input">
                  <label class="custom-control-label" for="genderMaleRadio">
                    <i class="ti-check text-active" aria-hidden="true"></i>
                    Male
                  </label>
                </div>
              </label>
              <label class="btn btn-outline btn-info">
                <div class="custom-control custom-radio">
                  <input type="radio" id="genderFemaleRadio" name="gender" value="female" class="custom-control-input">
                  <label class="custom-control-label" for="genderFemaleRadio">
                    <i class="ti-check text-active" aria-hidden="true"></i>
                    Female
                  </label>
                </div>
              </label>
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
  $('#editTeacherModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)
    let id = button.data('id')
    let modal = $(this)

    const form = document.querySelector('#editTeacherForm')
    form.action = '/admin/teachers/' + id

    const inputId = document.querySelector('#id')
    const inputOldNip = document.querySelector('#oldNip')

    const inputName = document.querySelector('#editName')
    const inputNip = document.querySelector('#editNip')
    const genderMaleRadio = document.querySelector('#genderMaleRadio')
    const genderFemaleRadio = document.querySelector('#genderFemaleRadio')

    axios.get(`/api/teachers/${id}`)
    .then(res => {
      const teacher = res.data;

      inputId.value = teacher.id
      inputName.value = teacher.name
      inputNip.value = teacher.nip
      inputOldNip.value = teacher.nip

      if (teacher.gender == 'male') {
        genderMaleRadio.checked = true
        genderFemaleRadio.checked = false
      } else {
        genderMaleRadio.checked = false
        genderFemaleRadio.checked = true

      }
    })
    .catch(error => console.error(error));

  })

</script>
@endpush
