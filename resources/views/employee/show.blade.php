@extends('employee.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Employee Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
    <table class="table table-bordered table-striped">
                  <tbody>
                       <tr>
                          <th>Image </th>
                          <td id="emp_image"><img src="{{ asset('images/'.$employee->image) }} " width="50" class="img-thumbnail rounded-circle" ></td>
                        </tr>

                        <tr>
                          <th>  Name </th>
                          <td id="name">{{$employee->name}}</td>
                        </tr>

                       <tr>
                           <th>  Employee ID </th>
                           <td id="name">{{$employee->employee_id}}</td>
                       </tr>

                        <tr>
                          <th> Branch Name </th>
                          <td id="branch_name">{{$employee->branch->branch_name}}</td>
                        </tr>
                        <tr>
                          <th> Designation</th>
                          <td id="emp_designation">{{$employee->designation}}</td>
                        </tr>
                        <tr>
                          <th>Joining Date </th>
                          <td id="emp_joining_date">{{ \Carbon\Carbon::parse($employee->joining_date)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                          <th> Date Of Birth  </th>
                          <td id="emp_dob">{{ \Carbon\Carbon::parse($employee->dob)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                          <th> NID </th>
                          <td id="emp_nid">{{$employee->nid}}</td>
                        </tr>

                       <tr>
                           <th> Email </th>
                           <td id="emp_nid">{{$employee->email}}</td>
                       </tr>
                        <tr>
                          <th> Contact </th>
                          <td id="emp_contact">+88{{$employee->contact}}</td>
                        </tr>
                        <tr>
                          <th> Emergency Contact </th>
                          <td id="emp_emergency_contact">{{$employee->emergency_contact}}</td>
                        </tr>
                        <tr>
                          <th> Blood Group  </th>
                          <td id="emp_blood_group">{{$employee->blood_group}}</td>
                        </tr>
                    </tbody>
                </table>
    </div>
@endsection
