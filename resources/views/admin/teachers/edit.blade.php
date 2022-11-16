@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title pb-2">Edit Teacher</h4>
            
            <form action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="atName">Teacher Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="atName" name="name" value="{{ old('name', $teacher->name) }}">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="atNip">NIP</label>
                    <input type="number" class="form-control @error('nip') is-invalid @enderror" id="atNip" name="nip" value="{{ old('nip', $teacher->nip) }}">
                    @error('nip')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="atPassword">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="atPassword" name="password">
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div> 

                <div class="form-group">
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" @if(old('gender', $teacher->gender) == 'male') checked @endif>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female" @if(old('gender', $teacher->gender) == 'female') checked @endif>
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    @error('gender')
                        <span class="invalid-feedback" style="display: block;">{{ $message }}</span>
                    @enderror
                    
                    
                </div>
                

                <button type="submit" class="btn btn-success float-right">Submit</button>
            </form>
        </div>
        </div>
    </div>
</div>


@endsection
