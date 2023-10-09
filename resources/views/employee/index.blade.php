@extends('employee.layout')

@section('content')
    <div >
        <form id="basic-form"  method="POST" action="{{ route('employee.search') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="form-group col-md-6">
                <label for="branch_id">Search by Branch:</label>
                <select  class="form-control" id="branch_id" name="branch_id">
                    <option value="">All Branches</option>
                    @foreach($branches as $branch)
                        <option  value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3" style="margin-top: 25px;">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employee Data</h2>
            </div>

        </div>
    </div>

    @if ($message = Session::get('success'))
        <div id="message" class="alert alert-success" style="display: none">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table  id="Table_ID" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Employee ID</th>
                    <th>Branch</th>
                    <th>Designation</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Image</th>
                    <th>Action</th>
              </tr>
              </thead>
              <tbody>
           @foreach ($employees as $key=> $employee)
                <tr>
                 <td>{{ $key +1 }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->employee_id }}</td>
                    <td>{{ $employee->branch->branch_name }}</td>
                    <td>{{ $employee->designation }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>+88{{ $employee->contact }}</td>
                    <td><img src="{{ asset('images/'.$employee->image) }} " width="50" class="img-thumbnail rounded-circle" ></td>
                <td>
                <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('employee.show',$employee->id) }}"><i class="bi bi-eye-fill"></i></a>
                    <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}"><i class="bi bi-pencil-square"></i></a>
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @if($search == 1)
    <div class="pull-left">
        <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
    </div>
    @endif


    <script>
        var successMessage = document.getElementById("message");
        function showSuccessMessage() {
            successMessage.style.display = "block";
            setTimeout(function () {
                successMessage.style.display = "none";
            }, 2000);
        }
        showSuccessMessage();
    </script>
@endsection
