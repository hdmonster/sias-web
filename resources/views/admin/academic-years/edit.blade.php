@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title pb-2">Edit Academic Year</h4>
            
            <form action="{{ route('admin.academic-years.update', $academic_year->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="text" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year', $academic_year->year) }}">
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
