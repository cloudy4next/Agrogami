@extends('admin.layout.master', [
    'breadcrumb' => [],
])

@section('page-title', 'ADMISSION FROM')


@section('content')
    @parent

    @if ($msg = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $msg }}</strong>
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.admission.info.save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="card">

                    <div class="card-header">
                        <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label for="branch">Branch Name </label><span class="text-danger">*</span>
                            <br>
                            <select class="form-control" name="branch">
                                {{-- <option value="none">None</option> --}}
                                @foreach ($branches as $key => $value)
                                    <option value="{{ $value['id'] }}">
                                        {{ $value['name'] }}
                                    </option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label for="name">Student Name:</label>
                                <input type="text" id="name" name="name"><br><br>
                            </div>

                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="display:block">
                                <label for="father_name">Father's Name:</label>
                                <input type="text" id="father_name" name="father_name"><br><br>
                            </div>

                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="display:block">
                                <label for="f_mobile">Mobile:</label>
                                <input type="text" id="f_mobile" name="f_mobile"><br><br>
                            </div>

                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="display:block">
                                <label for="mother_name">Mother's Name:</label>
                                <input type="text" id="mother_name" name="mother_name"><br><br>
                            </div>

                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="display:block">
                                <label for="m_mobile">Mobile:</label>
                                <input type="text" id="m_mobile" name="m_mobile"><br><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label for="permanent_address">Permenent Address:</label>
                                <input type="text" id="permanent_address" name="permanent_address"><br><br>
                            </div>

                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="display:block">
                                <label for="local_address">Local Address:</label>
                                <input type="text" id="local_address" name="local_address"><br><br>
                            </div>

                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="display:block">
                                <label for="dob">Date of Birth:</label>
                                <input type="text" id="dob" name="dob">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label for="religion">Religion:</label>
                                <input type="text" id="religion" name="religion"><br><br>
                            </div>

                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="display:block">
                                <label for="blood_group">Blood Group:</label>
                                <input type="text" id="blood_group" name="blood_group"><br><br>
                            </div>

                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="display:block">
                                <label for="gender">Gender:</label>
                                <input type="text" id="gender" name="gender">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label for="school_name">School Name:</label>
                                <input type="text" id="school_name" name="school_name"><br><br>
                            </div>

                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="display:block">
                                <label for="roll">Class Roll:</label>
                                <input type="number" id="roll" name="roll"><br><br>
                            </div>

                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="display:block">
                                <label for="shift">Class Shift:</label>
                                <input type="text" id="shift" name="shift">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="display:block">
                                <label for="ssc_roll">SSC/HSC Roll:</label>
                                <input type="number" id="ssc_roll" name="ssc_roll">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label for="registration">SSC/HSC Registration:</label>
                                <input type="number" id="registration" name="registration"><br><br>
                            </div>

                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="display:block">
                                <label for="passing_year">Passong Year:</label>
                                <input type="text" id="passing_year" name="passing_year"><br><br>
                            </div>


                        </div>

                    </div>
                    <div class="card-footer">
                        <div>
                            <label class="text-left  "> Photo: </small>
                                <input type="file" name="fileToUpload[]" id="fileToUpload" />
                            </label>
                        </div>
                        <div class=" text-right py-3 ">
                            <button type="submit" class="btn btn-success question-set-submit">
                                <span class="la la-save"></span> &nbsp;
                                <span class="mr-3"> Submit </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
