@extends('admin.layouts.master')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Homeroom Teachers</h4>
        <h6 class="card-subtitle">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, reiciendis.
        </h6>
        <div class="table-responsive">
          <table id="default_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
            <thead>
              <tr>
                <th>Class</th>
                <th>Homeroom</th>
                <th>Total Students</th>
                <th>Class Year</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              @foreach($classes as $class)

              <tr>
                <td>{{ $class->academicClass->class_name }}</td>
                <td>
                  <?php 
                    if (count($class->homeroomTeachers) > 0){
                      $all_homeroom = [];

                      foreach ($class->homeroomTeachers as $key => $homeroom) {
                        $all_homeroom[$key] = $homeroom->teacher->name;
                      }
                      
                      echo implode(', ', $all_homeroom);
                    } else {
                      echo 'No homeroom teacher assigned yet';
                    }
                  ?>
                </td>
                <td>{{ count($class->studentClasses) }}</td>
                <td>{{ $class->academicYear->year }}</td>
                <td>
                  <button class="btn btn-primary" data-id="{{ $class->id }}" data-toggle="modal"
                    data-target="#addHomeroomModal">
                    Add homeroom
                  </button>
                  <button class="btn btn-danger" data-id="{{ $class->id }}" data-toggle="modal"
                    data-target="#removeHomeroomModal">
                    Remove homeroom
                  </button>
                </td>
              </tr>

              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Class</th>
                <th>Homeroom</th>
                <th>Total Students</th>
                <th>Class Year</th>
                <th>#</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@include('admin.components.academic-class.add-homeroom')
@include('admin.components.academic-class.remove-homeroom')

@push('scripts')
<script src="/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/dist/js/pages/datatable/datatable-basic.init.js"></script>
@endpush

@endsection