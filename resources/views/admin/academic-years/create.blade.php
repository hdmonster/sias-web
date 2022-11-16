@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title pb-2">Add Academic Year</h4>
            
            <form action="{{ route('admin.academic-years.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="text" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year') }}">
                    @error('year')
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
