@extends('employee.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employee.update',$employee->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')

         <div class="row">

               <div class="col-md-12">
                    <div class="col-md-6">
                        <div>
                            <label for="usr">Name:</label>
                            <input type="text" class="form-control" name="name" id="usr" value="{{ $employee->name}}" placeholder="Enter your name" >
                        </div>

                        <div>
                            <label for="usr">Employee ID:</label>
                            <input type="text" class="form-control" name="employee_id" id="usr" value="{{ $employee->employee_id}}" placeholder="Enter your Id No" >
                        </div>
                        <div>
                            <label for="fname">Branch </label>
                            <select class="form-control" id="branch_id" name="branch_id">
                                @foreach($branches as $branch)
                                    <option   value="{{ $branch->id }}" {{ $employee->branch_id == $branch->id ? 'selected' : '' }} >{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                    </div>
                        <div>
                            <label for="usr">Designation:</label>
                            <input type="text" class="form-control" name="designation" value="{{ $employee->designation}}" id="usr" placeholder="Enter your designation" >
                        </div>
                        <div>
                            <label for="usr">Joining Date:</label>
                            <input type="date" class="form-control" name="joining_date" value="{{ $employee->joining_date}}" id="usr" >
                        </div>
                        <div>
                            <label for="usr">Date Of Birth:</label>
                            <input type="date" class="form-control" name="dob" id="usr" value="{{ $employee->dob}}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="pwd">NID:</label>
                            <input type="number" class="form-control" name="nid" id="pwd" value="{{ $employee->nid}}" placeholder="Enter your NID" >
                        </div>
                        <div>
                            <label for="pwd">Contact Number:</label>
                            <input type="number" class="form-control" name="contact" id="pwd" value="{{ $employee->contact}}" placeholder="Enter your contact" >
                        </div>
                        <div>
                            <label for="">Blood Group:</label>
                            <select class="form-control " name="blood_group"  id="blood_group" data-live-search="true" >
                                   <option value="0">Select Blood Group</option>
                                   <option  value="A+" {{ $employee->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                                   <option  value="A-"{{ $employee->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                                   <option  value="B+" {{ $employee->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                                    <option value="B-" {{ $employee->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                                    <option  value="AB+" {{ $employee->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                                    <option  value="AB-" {{ $employee->blood_group == 'Ab-' ? 'selected' : '' }}>AB-</option>
                                    <option value="O+"{{ $employee->blood_group == 'O+' ? 'selected' : '' }} >O+</option>
                                    <option value="O-" {{ $employee->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                            </select>
                        </div>
                        <div>
                            <label for="pwd">Image:( Passport Size )</label>
                            <input type="file" class="form-control" name="image" id="pwd" >
                        </div>
                        <div>
                            <label for="pwd">Old Image:</label>
                             <div>
                              <img src="{{ asset('images/'.$employee->image) }} " width="50" class="img-thumbnail rounded-circle" >
                             </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12" style="margin-left:20px;">
                    <br>
                <button type="submit" class="btn btn-primary">Submit</button>
               </div>
           </div>


    </form>
@endsection
