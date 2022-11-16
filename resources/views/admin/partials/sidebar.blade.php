<aside class="left-sidebar" data-sidebarbg="skin6">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link selected" href="/" aria-expanded="false">
            <i data-feather="home" class="feather-icon"></i>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>

        <li class="list-divider"></li>

        <li class="nav-small-cap"><span class="hide-menu">School Data</span></li>

        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i
              data-feather="file-text" class="feather-icon"></i><span class="user">Teachers </span></a>
          <ul aria-expanded="false" class="collapse  first-level base-level-line">
            <li class="sidebar-item">
              <a href="{{ route('admin.teachers.create') }}" class="sidebar-link" >
                <span class="hide-menu"> Add new
                </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="/admin/teachers" class="sidebar-link">
                <span class="hide-menu"> View all
                </span>
              </a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i
              data-feather="user" class="feather-icon"></i><span class="hide-menu">Students </span></a>
          <ul aria-expanded="false" class="collapse  first-level base-level-line">
            <li class="sidebar-item">
              <a href="/admin/students/create" class="sidebar-link">
                <span class="hide-menu"> Add new
                </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="/admin/students" class="sidebar-link">
                <span class="hide-menu"> View all
                </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="/admin/students/assign-class" class="sidebar-link">
                <span class="hide-menu">
                  Assign class
                </span>
              </a>
            </li>
          </ul>
        </li>
        {{--
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Authentication</span></li>

        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="authentication-login1.html"
            aria-expanded="false"><i data-feather="lock" class="feather-icon"></i><span class="hide-menu">Teachers
            </span></a>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="authentication-register1.html"
            aria-expanded="false"><i data-feather="lock" class="feather-icon"></i><span class="hide-menu">Students
            </span></a>
        </li> --}}

        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Academic</span></li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <i data-feather="book" class="feather-icon"></i>
            <span class="hide-menu">
              Academic Classes
            </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level base-level-line">
            <li class="sidebar-item">
              <a href="#" class="sidebar-link" data-toggle="modal" data-target="#addAcademicClassModal">
                <span class="hide-menu">
                  Add Academic Class
                </span>
              </a>
            </li>

            <li class="sidebar-item">
              <a href="/admin/academic-classes" class="sidebar-link">
                <span class="hide-menu">
                  View All
                </span>
              </a>
            </li>

            <li class="sidebar-item">
              <a href="/admin/academic-classes/transfer" class="sidebar-link">
                <span class="hide-menu">
                  Class Transfer
                </span>
              </a>
            </li>

            <li class="sidebar-item">
              <a href="/admin/academic-classes/homeroom" class="sidebar-link">
                <span class="hide-menu">
                  Assign homeroom
                </span>
              </a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <i data-feather="file-text" class="feather-icon"></i>
            <span class="hide-menu">
              Academic Score
            </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level base-level-line">
            <?php
              use App\Models\AcademicClassYear;
              use App\Models\Subject;

              $academicClassYearsSide = AcademicClassYear::with([
                  'academicClass',
                  'academicYear'
              ])->get();
              
              $subjects = Subject::all();
              
              foreach ($academicClassYearsSide as $academicClassYearSide) {
                $subjectItems = "";
              
                foreach ($subjects as $subject) {
                  $subjectItems .= '
                  <li class="sidebar-item">
                    <a href="/admin/academic-score/'.$academicClassYearSide->id.'/'.$subject->id.'" class="sidebar-link">
                      <span class="hide-menu">
                        '. ucwords($subject->subject_name) .'
                      </span>
                    </a>
                  </li>';
                }

                echo '
                <li class="sidebar-item"> 
                  <a class="has-arrow sidebar-link" href="javascript:void(0)"
                    aria-expanded="false">
                    <span class="hide-menu">
                      '. $academicClassYearSide->academicClass->class_name .' ('. $academicClassYearSide->academicYear->year .')
                    </span>
                  </a>

                  <ul aria-expanded="false" class="collapse second-level base-level-line">
                  '.
                  $subjectItems
                  .'
                  </ul>

                </li>
                ';
              }
            
            ?>
          </ul>
        </li>

        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Configuration</span></li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <i data-feather="book" class="feather-icon"></i>
            <span class="hide-menu">
              Classes
            </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level base-level-line">
            <li class="sidebar-item">
              <a href="{{ route('admin.classes.create') }}" class="sidebar-link">
                <span class="hide-menu">
                  Add Class
                </span>
              </a>
            </li>

            <li class="sidebar-item">
              <a href="/admin/classes" class="sidebar-link">
                <span class="hide-menu">
                  View All
                </span>
              </a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="/admin/subjects" aria-expanded="false">
            <i data-feather="clipboard" class="feather-icon">
            </i>
            <span class="hide-menu">Subjects
            </span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="/admin/academic-years" aria-expanded="false">
            <i data-feather="calendar" class="feather-icon">
            </i>
            <span class="hide-menu">Academic Year
            </span>
          </a>
        </li>

      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>

@include('admin.components.student.assign-class')
@include('admin.components.teacher.add')
@include('admin.components.class.add')
@include('admin.components.academic-class.add')
@include('admin.components.academic-class.transfer')