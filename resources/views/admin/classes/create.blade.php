@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title pb-2">Add Class</h4>
            
            <form action="{{ route('admin.classes.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="class_name">Class Name</label>
                    <input type="text" class="form-control @error('class_name') is-invalid @enderror" id="class_name" name="class_name" value="{{ old('class_name') }}">
                    @error('class_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                

                <button type="submit" class="btn btn-success float-right">Submit</button>
            </form>
        </div>
        </div>
    </div>
</div>


@endsection
