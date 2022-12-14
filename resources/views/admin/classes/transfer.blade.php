@extends('admin.layouts.master')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Transfer Academic Classes</h4>
        <!-- <h6 class="card-subtitle">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, reiciendis.
        </h6> -->
        <div class="table-responsive">
          <table id="default_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
            <thead>
              <tr>
                <th>Class</th>
                <th>Total Student</th>
                <th>Academic Year</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              @foreach($classes as $class)

              <tr>
                <td>{{ $class->academicClass->class_name }}</td>
                <td>{{ count($class->studentClasses) }}</td>
                <td>{{ $class->academicYear->year }}</td>
                <td>
                  <button class="btn btn-primary" data-id="{{ $class->id }}" data-toggle="modal"
                    data-target="#transferClassModal">
                    Transfer this class
                  </button>
                </td>
              </tr>

              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Class</th>
                <th>Total Student</th>
                <th>Academic Year</th>
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