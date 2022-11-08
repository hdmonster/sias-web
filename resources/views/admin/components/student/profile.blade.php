<div class="modal fade" id="studentProfileModal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scrollableModalTitle">Student Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <ul class="nav nav-tabs nav-justified nav-bordered mb-3">
          <li class="nav-item">
            <a href="#basic-b2" data-toggle="tab" aria-expanded="false" class="nav-link active">
              <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
              <span class="d-none d-lg-block">Basic</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#personal-b2" data-toggle="tab" aria-expanded="true" class="nav-link">
              <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
              <span class="d-none d-lg-block">Personal</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#strength-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
              <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
              <span class="d-none d-lg-block">Strength/Weakness</span>
            </a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane show active" id="basic-b2">
            <div class="d-flex flex-column mb-2">
              <small class="font-weight-bold">Name</small>
              <span id="s_name"></span>
            </div>
            <div class="d-flex flex-column mb-2">
              <small class="font-weight-bold">NISN</small>
              <span id="s_nisn"></span>
            </div>
            <div class="d-flex flex-column mb-2">
              <small class="font-weight-bold">Age</small>
              <span id="s_age"></span>
            </div>
            <div class="d-flex flex-column mb-2">
              <small class="font-weight-bold">Class</small>
              <span id="s_class"></span>
            </div>
          </div>

          <div class="tab-pane" id="personal-b2">
            <div class="d-flex flex-column mb-2">
              <small class="font-weight-bold">Parent Name</small>
              <span id="s_parent_name"></span>
            </div>
            <div class="d-flex flex-column mb-2">
              <small class="font-weight-bold">Parent Phone</small>
              <span id="s_parent_mobile"></span>
            </div>
            <div class="d-flex flex-column mb-2">
              <small class="font-weight-bold">Birth place and date</small>
              <span id="s_birthday"></span>
            </div>
            <div class="d-flex flex-column mb-2">
              <small class="font-weight-bold">Religion</small>
              <span id="s_religion" class="text-capitalize"></span>
            </div>
            <div class="d-flex flex-column mb-2">
              <small class="font-weight-bold">Address</small>
              <span id="s_address"></span>
            </div>
            <div class="d-flex flex-column mb-2">
              <small class="font-weight-bold">Registered On</small>
              <span id="s_registered_on"></span>
            </div>
          </div>

          <div class="tab-pane" id="strength-b2">
            <div>
              <canvas id="radar-chart" height="300"></canvas>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  $('#studentProfileModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)
    let id = button.data('id')

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      const student = JSON.parse(this.responseText);

      document.querySelector('#s_name').innerHTML = student.name;
      document.querySelector('#s_nisn').innerHTML = student.nisn;

      let bpd = student.birth_place_and_date;
      let birthday = bpd.slice(bpd.indexOf(' ')+1);

      let today  = new Date();
      birthday = new Date(birthday)

      let age = today.getFullYear() - birthday.getFullYear()

      document.querySelector('#s_age').innerHTML = age + ' tahun';

      document.querySelector('#s_class').innerHTML = student.student_classes.length > 0 ? student.student_classes[0].academic_class_year.academic_class.class_name : 'No class assigned';
      
      document.querySelector('#s_parent_name').innerHTML = student.parent_name;
      document.querySelector('#s_parent_mobile').innerHTML = student.parent_mobile;
      document.querySelector('#s_birthday').innerHTML = student.birth_place_and_date;
      document.querySelector('#s_religion').innerHTML = student.religion;
      document.querySelector('#s_address').innerHTML = student.address;

      let registeredOn = new Date(student.created_at);
      document.querySelector('#s_registered_on').innerHTML = registeredOn;
    }
    
    xhttp.open("GET", `/api/students/${id}`, true);
    xhttp.send();
  })
</script>
@endpush