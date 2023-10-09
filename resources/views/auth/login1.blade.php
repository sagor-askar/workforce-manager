@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center"><Strong>Admin Login </Strong></div>
                @if ($message = Session::get('error'))
                    <div id="message" class="alert alert-danger" style="display: none">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="pin" class="col-md-3 col-form-label text-md-end">{{ __('Pin') }}</label>
                            <div class="col-md-6">
                                <input id="pin" type="password" class="form-control" name="pin" required autocomplete="current-pin">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
