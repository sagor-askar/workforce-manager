<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<section class="vh-100" >
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <!-- logo -->
                    <div class="form-outline mb-4">
                   <img  src="images/logo/logo-1.png" alt="" style="height:80px; margin-top: 20px; display: block;
                    margin-left: auto;
                    margin-right: auto;
                    width: 50%;">
                    </div>
                    @if ($message = Session::get('error'))
                        <div id="message" class="alert alert-danger" style="display: none">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                    <div class="card-body p-5 text-center">
                        <h3 class="mb-5">Admin Login</h3>
                        <div class="form-outline mb-4">
                            <input placeholder="Enter PIN" type="password" id="pin" name="pin" required autocomplete="current-pin" class="form-control form-control-lg" />
                        </div>
                        <br>
                        <br>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

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

</body>
</html>
