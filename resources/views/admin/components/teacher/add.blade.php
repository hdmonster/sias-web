<div id="addTeacherModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add New Teacher</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <form action="/admin/teachers" method="POST">
        @csrf

        <div class="modal-body">
          <div class="form-body">

            <div class="form-group">
              <label for="atName">Teacher Name</label>
              <input type="text" class="form-control" id="atName" name="name">
            </div>

            <div class="form-group">
              <label for="atNip">NIP</label>
              <input type="number" class="form-control" id="atNip" name="nip">
            </div>

            <div class="form-group">
              <label for="atPassword">Password</label>
              <input type="password" class="form-control" id="atPassword" name="password">
            </div>

            <div class="btn-group mt-3" data-toggle="buttons" role="group">
              <label class="btn btn-outline btn-info">
                <div class="custom-control custom-radio">
                  <input type="radio" id="genderRadio" name="gender" value="male" class="custom-control-input">
                  <label class="custom-control-label" for="genderRadio">
                    <i class="ti-check text-active" aria-hidden="true"></i>
                    Male
                  </label>
                </div>
              </label>
              <label class="btn btn-outline btn-info">
                <div class="custom-control custom-radio">
                  <input type="radio" id="customRadio2" name="gender" value="female" class="custom-control-input">
                  <label class="custom-control-label" for="customRadio2">
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
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
