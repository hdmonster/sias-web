@extends('admin.layouts.master')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Teachers</h4>
        <h6 class="card-subtitle">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, reiciendis.
        </h6>
        <div class="table-responsive">
          <table id="default_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>
                <th>NIP</th>
                <th>Gender</th>
                <th>Last Modified</th>
                <th>Status</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              @foreach($teachers as $teacher)

              <tr>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->nip }}</td>
                <td class="text-capitalize">{{ $teacher->gender }}</td>
                <td>{{ $teacher->updated_at->diffForHumans() }}</td>
                <td>
                  @if($teacher->status == 'active')
                  <button class="btn btn-rounded btn-success text-capitalize" disabled>
                    {{ $teacher->status }}
                  </button>
                  @else
                  <button class="btn btn-rounded btn-danger text-capitalize" disabled>
                    {{ $teacher->status }}
                  </button>
                  @endif
                </td>
                <td>
                  <button class="btn btn-circle btn-secondary mr-2" data-id="{{ $teacher->id }}" data-toggle="modal"
                    data-target="#editTeacherModal">
                    <i class="fa fa-edit"></i>
                  </button>

                  <div class="my-2">
                    <form action="/admin/teachers/{{ $teacher->id }}" method="post">
                      @method('delete')
                      @csrf
                      <button class="btn btn-circle btn-danger" type="submit"
                        onclick="return confirm('Are you sure want to permanently deactivate this teacher?')">
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
                <th>NIP</th>
                <th>Gender</th>
                <th>Last Modified</th>
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

@include('admin.components.teacher.edit')

@push('scripts')
<script src="/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/dist/js/pages/datatable/datatable-basic.init.js"></script>
@endpush

@endsection
