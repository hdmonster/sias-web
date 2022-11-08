@extends('admin.layouts.master')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Subjects</h4>
        <h6 class="card-subtitle">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, reiciendis.
        </h6>
        <div class="table-responsive">
          <table id="default_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
            <thead>
              <tr>
                <th>Subject Name</th>
                <th>Min. Score</th>
                <th class="col-md-2">#</th>
              </tr>
            </thead>
            <tbody>
              @foreach($subjects as $subject)

              <tr>
                <td class="text-capitalize">{{ $subject->subject_name }}</td>
                <td>{{ $subject->minimum_score }}</td>
                <td>
                  <button class="btn btn-circle btn-secondary mr-2">
                    <i class="fa fa-edit"></i>
                  </button>
                  <button class="btn btn-circle btn-danger">
                    <i class="fa fa-trash"></i>
                  </button>
                </td>
              </tr>

              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Subject Name</th>
                <th>Min. Score</th>
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