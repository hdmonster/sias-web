@extends('admin.layouts.master')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Students Classes</h4>
        <h6 class="card-subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, reiciendis.</h6>
        <div class="table-responsive">
          <table id="default_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>
                <th>NISN</th>
                <th>Previous Classes</th>
                <th>Current Class</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              @foreach($students as $student)

              <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->nisn }}</td>
                <td>
                  <?php 
                    if (count($student->studentClasses) > 0){
                      $all_classes = [];

                      foreach ($student->studentClasses as $key => $classes) {
                        $all_classes[$key] = $classes->academicClassYear->academicClass->class_name;
                      }
                      
                      echo implode(', ', $all_classes);
                    } else {
                      echo 'No class assigned yet';
                    }
                  ?>
                </td>
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
                  <button class="btn btn-primary" data-id="{{ $student->id }}" data-toggle="modal"
                    data-target="#assignClassModal">
                    Assign Class
                  </button>
                </td>
              </tr>

              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>NISN</th>
                <th>Previous Classes</th>
                <th>Current Class</th>
                <th>#</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script src="/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/dist/js/pages/datatable/datatable-basic.init.js"></script>
@endpush

@endsection