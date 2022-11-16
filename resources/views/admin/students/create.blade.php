@extends('admin.layouts.master')

@section('content')

<div class="card">
  <div class="card-body">
    <div class="col-12">
      <h3 class="mb-5 font-weight-medium">Register Student</h3>

      <form action="/admin/students" method="POST" autocomplete="off">
        @csrf
        <div class="form-body">

          <div class="row">
            <div class="col-md 6">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                  value="{{ old('name') }}">

                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            <div class="col-md 6">
              <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn"
                  value="{{ old('nisn') }}">

                @error('nisn')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>

          </div>

          <div class="row">
            @php
            $genders = array("male", "female");
            @endphp

            <div class="col-md-6">
              <div class="form-group">
                <label for="selectGender">Gender</label>
                <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="selectGender">
                  <option selected disabled>Select</option>
                  @foreach($genders as $gender)
                  <option value="{{ $gender }}">
                    {{ ucwords($gender) }}
                  </option>
                  @endforeach
                </select>

                @error('gender')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            @php
            $religions = array("islam", "christian", "buddha", "hindu");
            @endphp

            <div class="col-md-6">
              <div class="form-group">
                <label for="selectReligion">Religion</label>
                <select class="form-control @error('religion') is-invalid @enderror" name="religion" id="selectReligion">
                  <option selected disabled>Select</option>
                  @foreach($religions as $religion)
                  <option value="{{ $religion }}">{{ ucwords($religion) }}</option>
                  @endforeach
                </select>

                @error('religion')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md 6">
              <div class="form-group">
                <label for="studentBirthplace">Birthplace</label>
                <input type="text" class="form-control @error('birthplace') is-invalid @enderror" name="birthplace" id="studentBirthplace"
                  value="{{ old('birthplace') }}">

                @error('birthplace')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="studentBirthday">Birthday</label>
                <input type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" id="studentBirthday"
                  value="{{ old('birthday') }}">

                @error('birthday')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="studentParentName">Parent Name</label>
                <input type="text" class="form-control @error('parent_name') is-invalid @enderror" name="parent_name" id="studentParentName">

                @error('parent_name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="studentParentMobile">Parent Mobile</label>
                <input type="text" class="form-control @error('parent_mobile') is-invalid @enderror" name="parent_mobile" id="studentParentMobile"
                  value="{{ old('parent_mobile') }}">

                @error('parent_mobile')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="studentAddress">Address</label>
            <textarea class="form-control @error('address') is-invalid @enderror" rows="5" name="address" id="studentAddress">{{ old('address') }}</textarea>

            @error('address')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-actions">
            <div class="text-right">
              <button type="reset" class="btn btn-dark">Reset</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
      </form>

    </div>

  </div>
</div>
</div>

@endsection
