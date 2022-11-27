@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title pb-2">Edit Class</h4>
            
            <form action="{{ route('admin.academic-classes.update', $academicClassYear->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="academic_class_id">Class</label>
                    <select class="form-control" id="academic_class_id" name="academic_class_id" aria-label="Default select example">
                        <option selected>Choose Academic Class</option>
                        @foreach($academicClasses as $academicClass)
                            <option value="{{ $academicClass->id }}" {{ old('academic_class_id', $academicClassYear->academic_class_id) == $academicClass->id ? 'selected' : '' }}>{{ $academicClass->class_name }}</option>
                        @endforeach
                    </select>

                    @error('academic_class_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="academic_year_id">Year</label>
                    <select class="form-control" id="academic_year_id" name="academic_year_id" aria-label="Default select example">
                        <option selected>Choose Academic Class</option>
                        @foreach($academicYears as $academicYear)
                            <option value="{{ $academicYear->id }}" {{ old('academic_year_id', $academicClassYear->academic_year_id) == $academicYear->id ? 'selected' : '' }}>{{ $academicYear->year }}</option>
                        @endforeach
                    </select>
                    @error('academic_year_id')
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