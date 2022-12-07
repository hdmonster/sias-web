@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title pb-2">Edit Subject</h4>
            
            <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="subject_name">Subject Name</label>
                    <input type="text" class="form-control @error('subject_name') is-invalid @enderror" id="subject_name" name="subject_name" value="{{ old('subject_name', $subject->subject_name) }}">
                    @error('subject_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="minimum_score">Minimum Score</label>
                    <input type="number" class="form-control @error('minimum_score') is-invalid @enderror" id="minimum_score" name="minimum_score" value="{{ old('minimum_score', $subject->minimum_score) }}">
                    @error('minimum_score')
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
