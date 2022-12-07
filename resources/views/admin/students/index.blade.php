@extends('admin.layouts.master')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Students</h4>
        <!-- <h6 class="card-subtitle">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, reiciendis.
        </h6> -->
        <div class="table-responsive">
          <table id="default_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>
                <th>NISN</th>
                <th>Gender</th>
                <th>Class</th>
                <th>Status</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              @foreach($students as $student)

              <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->nisn }}</td>
                <td class="text-capitalize">{{ $student->gender }}</td>
                <td>
                  <?php
                    $current_class = count($student->studentClasses) > 0 ?
                    $student->studentClasses[0]->academicClassYear->academicClass->class_name
                    :
                    'No class assigned yet';
                  ?>

                  {{ $current_class }}
                </td>
                <td>
                  <button class="btn btn-rounded btn-success text-capitalize" disabled>
                    {{ $student->status }}
                  </button>
                </td>
                <td>
                  <button class="btn btn-circle btn-primary mr-2" data-id="{{ $student->id }}"
                    data-target="#studentProfileModal" data-toggle="modal">
                    <i class="fa fa-eye"></i>
                  </button>

                  <a href="/admin/students/{{ $student->id }}/edit" class="btn btn-circle btn-secondary mr-2">
                    <i class="fa fa-edit"></i>
                  </a>

                  <div class="my-2">
                    <form action="/admin/students/{{ $student->id }}" method="post">
                      @method('delete')
                      @csrf
                      <button class="btn btn-circle btn-danger"
                        onclick="return confirm('Are you sure want to delete this student?')">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>

              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>NISN</th>
                <th>Gender</th>
                <th>Class</th>
                <th>Status</th>
                <th>#</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@include('admin.components.student.profile')

@endsection

@push('scripts')
<script src="/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/dist/js/pages/datatable/datatable-basic.init.js"></script>

<script src="/assets/libs/chart.js/dist/Chart.min.js"></script>
<script src="/dist/js/pages/students/student1.js"></script>
@endpush
