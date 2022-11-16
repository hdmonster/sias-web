@extends('admin.layouts.master')

@section('content')

<div class="card">
  <div class="card-body">
    <div class="col-12">
      <h3 class="mb-5 font-weight-medium">Edit Student</h3>

      <form action="/admin/students/{{ $student->id }}" method="POST" autocomplete="off">
        @method('put')
        @csrf

        <input type="hidden" name="id" value="{{ $student->id }}" />
        <input type="hidden" name="old_nisn" value="{{ $student->nisn }}" />

        <div class="form-body">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="studentName">Name</label>
                <input type="text" class="form-control" name="name" id="studentName"
                  value="{{ old('name', $student->name) }}">
              </div>

              @error('name')
              <div class=" invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="studentNISN">NISN</label>
                <input type="text" class="form-control" name="nisn" id="studentNISN"
                  value="{{ old('nisn', $student->nisn) }}">
              </div>

              @error('nisn')
              <div class=" invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>

          <div class="row">
            @php
            $genders = array("male", "female");
            @endphp

            <div class="col-md-6">
              <div class="form-group">
                <label for="selectGender">Gender</label>
                <select class="form-control" name="gender" id="selectGender">
                  <option selected disabled>Select</option>
                  @foreach($genders as $gender)
                  <option value="{{ $gender }}" @if($gender==$student->gender) selected @endif>
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
                <select class="form-control" name="religion" id="selectReligion">
                  <option disabled>Select</option>
                  @foreach($religions as $religion)
                  <option value="{{ $religion }}" @if($religion==$student->religion) selected @endif>{{
                    ucwords($religion) }}
                  </option>
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
            @php
            $fullBirthInfo = $student->birth_place_and_date;
            $birthplace = substr($fullBirthInfo, 0, strpos($fullBirthInfo, ','));
            $birthday = substr($fullBirthInfo, strpos($fullBirthInfo, ',') + 2);
            @endphp

            <div class="col-md 6">
              <div class="form-group">
                <label for="studentBirthplace">Birthplace</label>
                <input type="text" class="form-control" name="birthplace" id="studentBirthplace"
                  value="{{ old('birthplace', $birthplace) }}">

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
                <input type="date" class="form-control" name="birthday" id="studentBirthday"
                  value="{{ old('birthday', $birthday) }}">

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
                <input type="text" class="form-control" name="parent_name" id="studentParentName"
                  value="{{ old('parent_name', $student->parent_name)}}">

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
                <input type="text" class="form-control" name="parent_mobile" id="studentParentMobile"
                  value="{{ old('parent_mobile', $student->parent_mobile) }}">

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
            <textarea class="form-control" rows="5" name="address" id="studentAddress"
              value="{{ old('address', $student->address) }}">{{ $student->address }}
            </textarea>


            @error('address')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-actions">
            <div class="text-right">
              <button type="reset" class="btn btn-dark">Reset</button>
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </div>
        </div>
      </form>

    </div>

  </div>
</div>
</div>

@endsection
