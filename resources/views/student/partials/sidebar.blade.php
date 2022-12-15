<aside class="left-sidebar" data-sidebarbg="skin6">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link selected" href="/student/dashboard" aria-expanded="false">
            <i data-feather="home" class="feather-icon"></i>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>

        <li class="list-divider"></li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <i data-feather="bar-chart-2" class="feather-icon"></i>
            <span class="hide-menu">
              Nilai Rapor
            </span>
          </a>

          <ul aria-expanded="false" class="collapse first-level base-level-line">
            @if(Auth::guard('student')->user()->studentClasses->count() > 0)
              @php 
                $studentClasses = Auth::guard('student')->user()->studentClasses;
              @endphp

              @foreach($studentClasses as $class)
                <li class="sidebar-item">
                  <a class="has-arrow sidebar-link" href="javascript:void(0)"
                      aria-expanded="false">
                      <span class="hide-menu"> {{ $class->academicClassYear->academicClass->class_name }} ( {{$class->academicClassYear->academicYear->year}} ) </span>
                  </a>

                  <ul aria-expanded="false" class="collapse second-level base-level-line">
                    <li class="sidebar-item">
                      <a href="/student/rapor/{{ $class->academicClassYear->id }}/score" class="sidebar-link">
                          <span class="hide-menu">
                          Score
                          </span>
                      </a>
                      </li>
                      <li class="sidebar-item">
                      <a href="/student/rapor/{{ $class->academicClassYear->id }}/performance" class="sidebar-link">
                          <span class="hide-menu">
                          Performance
                          </span>
                      </a>
                    </li>
                  </ul>
                </li>
              @endforeach
            @endif

          </ul>
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