<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>


        .heading{
            margin-top:5px;
            witdh:100%;
            background-color:#91cd91;
            padding:5px;
        }
        .heading h2{
        //text-align:center;
            margin-left:430px;
            color:#262826;
        }

        .heading img{
            float:left;
            width:200px;
            height:auto;
            margin-left:20px;

        }
    </style>

</head>

<body>

    <div class="heading">
        <div>
            <img src="/images/logo/logo-1.png" />
        </div>
        <h2>Id Card Information Of JAKAS Foundation</h2>
        <div style="float: right;margin-top: -50px" >
            <div class="nav-item">
                <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


    <script>
        $(function() {
        $('.selectpicker').selectpicker();
    });
    function checkUser() {
        var checkBox = document.getElementById("user_show");
        var text = document.getElementById("user_display");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }

    function spouseDivShow() {
        var x = document.getElementById("myDIV");
        x.style.display = "block";
    }
    function spouseDivHidden() {
        var x = document.getElementById("myDIV");
        x.style.display = "none";
    }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
        $(document).on('change', '#branch_id', function () {
            var branch_id = $(this).val() ;

            if(branch_id == 0){
                $('.showForm').hide();
            }else{
                $('.showForm').show();
            }
        });
    });
    </script>
    <script>
        $(document).ready( function () {
            $('#Table_ID').DataTable();
        } );
    </script>


</body>

</html>
