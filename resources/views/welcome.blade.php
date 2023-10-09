<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

    <style>
        .heading {
            margin-top: 5px;
            witdh: 100%;
            background-color: #91cd91;
            padding: 5px;
        }
        .heading h2 {
            margin-left: 430px;
            color: #262826;
        }
        .heading img {
            float: left;
            width: 200px;
            height: auto;
            margin-top: 10px;
            margin-left: 20px;
        }
        .id-card-holder {
            width: 225px;
            padding: 4px;
            margin: 0 auto;
            background-color: #1f1f1f;
            border-radius: 5px;
            position: relative;
        }
        .id-card-holder:after {
            content: "";
            width: 7px;
            display: block;
            background-color: #0a0a0a;
            height: 100px;
            position: absolute;
            top: 105px;
            border-radius: 0 5px 5px 0;
        }
        .id-card-holder:before {
            content: "";
            width: 7px;
            display: block;
            background-color: #0a0a0a;
            height: 100px;
            position: absolute;
            top: 105px;
            left: 222px;
            border-radius: 5px 0 0 5px;
        }
        .id-card {
            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 1.5px 0px #b9b9b9;
        }
        .id-card img {
            margin: 0 auto;
        }
        .photo img {
            width: 80px;
            margin-top: 15px;
            border: 3px solid green;
        }
        h1 {
            font-size: 15px;
            margin: 5px 0;
        }
        h3 {
            font-size: 12px;
            margin: 2.5px 0;
            font-weight: 300;
        }
        .id-number {
            background-color: white;
            color: green;
        }
        .qr-code img {
            width: 50px;
        }
        p {
            font-size: 5px;
            margin: 2px;
        }
        .id-card-hook {
            background-color: #000;
            width: 70px;
            margin: 0 auto;
            height: 15px;
            border-radius: 5px 5px 0 0;
        }
        .id-card-hook:after {
            content: "";
            background-color: #d7d6d3;
            width: 47px;
            height: 6px;
            display: block;
            margin: 0px auto;
            position: relative;
            top: 6px;
            border-radius: 4px;
        }
        .id-card-tag-strip {
            width: 45px;
            height: 40px;
            background-color: green;
            margin: 0 auto;
            border-radius: 5px;
            position: relative;
            top: 9px;
            z-index: 1;
            border: 1px solid green;
        }
        .id-card-tag-strip:after {
            content: "";
            display: block;
            width: 100%;
            height: 1px;
            background-color: #c1c1c1;
            position: relative;
            top: 10px;
        }
        .id-card-tag {
            width: 0;
            height: 0;
            border-left: 100px solid transparent;
            border-right: 100px solid transparent;
            border-top: 100px solid green;
            margin: -10px auto -30px auto;
        }
        .id-card-tag:after {
            content: "";
            display: block;
            width: 0;
            height: 0;
            border-left: 50px solid transparent;
            border-right: 50px solid transparent;
            border-top: 100px solid #d7d6d3;
            margin: -10px auto -30px auto;
            position: relative;
            top: -130px;
            left: -50px;
        }
        .id-card {
            background-image: url('idCard/green-banner.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        @media screen and (min-width: 200px) and (max-width: 900px) {
            .styleButton {
                margin-top: 20px;
                position: center;
                margin-left: 38%;
            }
            .id-card-holder {
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
        }

        @media screen and (min-width: 1000px) and (max-width: 1300px) {
            .styleButton {
                margin-top: -10px;
            }
        }
    </style>

</head>

<body>

    <div class="heading">
        <div>
            <img src="https://id.jakas-bd.org/public/images/logo/logo.png" />
        </div>
        <h2> Id Card Information Of JAKAS Foundation</h2>
    </div>

    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger" id="validation-errors">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div>
            <br>
            <br>
            <form method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="col-md-12">
                    @if(Session::has('message'))
                    <h5 class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</h5>
                    @endif
                    <div class="col-md-6">
                        <label for="">Branch Name:</label>
                        <select class="form-control selectpicker" name="branch_id" id="branch_id" data-live-search="true">
                            <option value="0">Select Branch</option>
                            @foreach($branches as $key=> $branch)
                            <option data-tokens="{{$branch->branch_name}}" value="{{ $branch->id }}">{{$branch->branch_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12 showForm" style="margin-top: 10px; display: none">
                    <h1 style="text-align: center;font-size: 30px;">Employee Information</h1>
                    <br>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div>
                                <label for="usr">Name:</label>
                                <input type="text" class="form-control" name="name" id="inputField1" placeholder="Enter your name" required>
                            </div>
                            <div>
                                <label for="pwd">Employee ID:</label>
                                <input type="text" class="form-control" name="employee_id" id="inputField4" placeholder="Enter your ID Number" required>
                            </div>
                            <div>
                                <label for="usr">Designation:</label>
                                <input type="text" class="form-control" name="designation" id="inputField2" placeholder="Enter your designation" required>
                            </div>
                            <div>
                                <label for="usr">Joining Date:</label>
                                <input type="text" class="form-control" autocomplete="off" name="joining_date" id="inputField3" placeholder="dd-mm-yyyy" required>
                            </div>
                            <div>
                                <label for="usr">Date Of Birth:</label>
                                <input type="text" class="form-control" autocomplete="off" name="dob" id="date_of_birth" placeholder="dd-mm-yyyy" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="pwd">NID:</label>
                                <input type="number" class="form-control" name="nid" id="pwd" placeholder="Enter your NID" required>
                            </div>
                            <div>
                                <label for="pwd">Contact Number:</label>
                                <input type="number" class="form-control" name="contact" id="pwd2" placeholder="Enter your contact" required>
                            </div>
                            <div>
                                <label for="">Blood Group:</label>
                                <select class="form-control selectpicker" name="blood_group" id="blood_group" data-live-search="true" required>
                                    <option value="">Select Blood Group</option>
                                    <option data-tokens="A+" value="A+">A+</option>
                                    <option data-tokens="A-" value="A-">A-</option>
                                    <option data-tokens="B+" value="B+">B+</option>
                                    <option data-tokens="B-" value="B-">B-</option>
                                    <option data-tokens="AB+" value="AB+">AB+</option>
                                    <option data-tokens="AB-" value="AB-">AB-</option>
                                    <option data-tokens="O+" value="O+">O+</option>
                                    <option data-tokens="O-" value="O-">O-</option>
                                </select>
                            </div>

                            <div>
                                <label for="pwd">Image:( Passport Size )</label>
                                <input type="file" class="form-control" name="image" id="image" required accept="image/*">
                            </div>
                        </div>

                        <!-- id card -->
                        <div class="col-md-4" style="float: right;margin-top: 12px;display: none">
                            <div class="id-card-hook"></div>
                            <div class="id-card-holder">
                                <div class="id-card">
                                    <div class="header">
                                        <img src="idCard/logo-1.png" width="200px" height="60px">
                                    </div>
                                    <div class="photo">
                                        <img id="imagePreview" src="idCard/profile.jpg" alt="Selected Image" style="width:80px;margin-top: 15px;border: 3px solid green">
                                    </div>
                                    <h1><strong id="output1">Name</strong></h1>
                                    <h3 id="output2">Designation</h3>
                                    <br>
                                    <h3 id="output4" class="id-number">ID No</h3>
                                    <br>
                                    <h3 id="output3">Joining Date</h3>
                                    <h3>Expiry Date: 01-05-2025</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-left: 15px; margin-top: 10px;">
                        <!-- preview button -->
                        <button type="button" id="submitBtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                            Preview
                        </button>
                        <!-- submit button -->
                        <button class="btn btn-success styleButton" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- modal starts -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <button class="btn btn-success">
                <span class="close">&times; Close</span>
            </button>

            <div class="heading">
                <div>
                    <img src="https://id.jakas-bd.org/public/images/logo/logo.png" />
                </div>
                <h2>Data Confirmation</h2>
            </div>
            <br>
            <!-- <h2>Data Confirmation</h2> -->
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <!-- <input type="hidden" name="branch_id"> -->

                <div class="row">
                    <div class="modalColumn">
                        <input type="hidden" name="branch_id">

                        <div class="col-md-10">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <label for="name">Name</label>
                                    <span id="modalName"></span>
                                    <input id="modalName" type="hidden" name="name">
                                </li>

                                <li class="list-group-item">
                                    <label for="employee_id">Employee ID</label>
                                    <span id="modalEmpID"></span>
                                    <input id="modalEmpID" type="hidden" name="employee_id">
                                </li>

                                <li class="list-group-item">
                                    <label for="designation">Designation</label>
                                    <span id="modalDesignation"></span>
                                    <input id="modalDesignation" type="hidden" name="designation">
                                </li>

                                <li class="list-group-item">
                                    <label for="joining_date">Joining Date</label>
                                    <span id="modalJoiningDate"></span>
                                    <input id="modalJoiningDate" type="hidden" name="joining_date">
                                </li>

                                <li class="list-group-item">
                                    <label for="dob">Date of Birth</label>
                                    <span id="modalDateofBirth"></span>
                                    <input id="modalDateofBirth" type="hidden" name="dob">
                                </li>

                            </ul>
                        </div>

                    </div>

                    <div class="modalColumn">
                        <div class="col-md-10">
                            <li class="list-group-item">
                                <label for="nid">NID</label>
                                <span id="modalNID"></span>
                                <input id="modalNID" type="hidden" name="nid">
                            </li>

                            <li class="list-group-item">
                                <label for="contact">Contact</label>
                                <span id="modalContact"></span>
                                <input id="modalContact" type="hidden" name="contact">
                            </li>
                            <li class="list-group-item">
                                <label for="blood_group">Blood Group</label>
                                <span id="modalBG"></span>
                                <input id="modalBG" type="hidden" name="blood_group" value="">
                            </li>
                            <li class="list-group-item">
                                <label for="image">Image</label>
                                <img src="" type="file" name="image" alt="Profile Photo" id="modalProfilePhoto">
                            </li>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 8% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .modal-content p {
            font-size: 18px;
        }

        .close {
            color: white;
            float: right;
            font-size: 15px;
        }

        .class:hover {
            color: white;
            background-color: #91cd91;
        }


        /* Form styles */
        label {
            font-weight: bold;
        }

        .modalColumn {
            float: left;
            width: 50%;
            padding: 10px;
            height: 250px;
        }

        .modalColumn img {
            height: 80px;
            width: 90px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        @media screen and (max-width: 600px) {
            .modalColumn {
                width: 100%;
            }
        }
    </style>

    <!-- Include jQuery (CDN) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Show the modal when the form is submitted
            $('#submitBtn').click(function() {
                let selectedImageFile = null;
                const branch_id = $('#branch_id').val();

                const name = $('#inputField1').val();
                const employee_id = $('#inputField4').val();
                const designation = $('#inputField2').val();
                const joining_date = $('#inputField3').val();
                const dob = $('#date_of_birth').val();
                const nid = $('#pwd').val();
                const contact = $('#pwd2').val();
                const blood_group = $('#blood_group').val();
                const image = $('#image').prop('files')[0];
                const profilePhoto = $('#image').prop('files')[0];

                selectedImageFile = profilePhoto.name;

                $('#modalName').text(name);
                $('#modalEmpID').text(employee_id);
                $('#modalDesignation').text(designation);
                $('#modalJoiningDate').text(joining_date);
                $('#modalDateofBirth').text(dob);
                $('#modalNID').text(nid);
                $('#modalContact').text(contact);
                $('#modalBG').text(blood_group);

                id = "branch_id"
                $("input[name='branch_id']").val(branch_id)
                $("input[name='name']").val(name)
                $("input[name='employee_id']").val(employee_id)
                $("input[name='designation']").val(designation)
                $("input[name='joining_date']").val(joining_date)
                $("input[name='dob']").val(dob)
                $("input[name='nid']").val(nid)
                $("input[name='contact']").val(contact)
                $("input[name='blood_group']").val(blood_group)

                if (image) {
                    $("input[name='hidden_image']").val(image);
                }

                if (image) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        console.log(e.target.result);
                        $('#modalProfilePhoto').attr('src', e.target.result);

                    };
                    reader.readAsDataURL(image);
                }

                $('#myModal').css('display', 'block');
            });
            // Close the modal when the "X" button is clicked

            $('.close').click(function() {
                $('#myModal').css('display', 'none');
            });

            // Save button click event in the modal
            $('#saveBtn').click(function() {
                // Perform your save operation here (e.g., AJAX request to a Laravel route)
                // You can also submit the form data using AJAX

                // Close the modal
                $('#myModal').css('display', 'none');
            });

        });
    </script>
    <!-- modal ends -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function($) {
            $('.selectpicker').selectpicker();
            $("#inputField3").datetimepicker({
                format: 'DD-MM-YYYY',
                // sideBySide : true,
                keepOpen: false,
                showClose: true,
                tooltips: {
                    close: 'Close Picker'
                },
            });
            $("#date_of_birth").datetimepicker({
                format: 'DD-MM-YYYY',
                // sideBySide : true,
                keepOpen: false,
                showClose: true,
                tooltips: {
                    close: 'Close Picker'
                },
            });

        });
    </script>
    <script>
        function checkUser() {
            var checkBox = document.getElementById("user_show");
            var text = document.getElementById("user_display");
            if (checkBox.checked == true) {
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
        $(document).ready(function() {
            $(document).on('change', '#branch_id', function() {
                var branch_id = $(this).val();

                if (branch_id == 0) {
                    $('.showForm').hide();
                } else {
                    $('.showForm').show();
                }
            });
        });
    </script>

    <!-- <script>
        var inputField1 = document.getElementById("inputField1");
        var outputElement1 = document.getElementById("output1");

        var inputField2 = document.getElementById("inputField2");
        var outputElement2 = document.getElementById("output2");

        var inputField3 = document.getElementById("inputField3");
        var outputElement3 = document.getElementById("output3");

        var inputField4 = document.getElementById("inputField4");
        var outputElement4 = document.getElementById("output4");


        inputField1.addEventListener("input", function() {
            var inputValue1 = inputField1.value;
            outputElement1.innerHTML = inputValue1;
        });

        inputField2.addEventListener("input", function() {
            var inputValue2 = inputField2.value;
            outputElement2.innerHTML = inputValue2;
        });
        inputField3.addEventListener("input", function() {
            var inputValue3 = inputField3.value;
            var inputValue3 = formatDate(inputValue3);
            outputElement3.innerHTML = "Joining Date: " + inputValue3;
        });

        inputField4.addEventListener("input", function() {
            var inputValue4 = inputField4.value;
            outputElement4.innerHTML = "Id No: " + inputValue4;
        });
    </script> -->

    <script>
        function formatDate(inputDate) {
            const dateComponents = inputDate.split('-');
            if (dateComponents.length !== 3) {
                return "Invalid Date Format";
            }
            const formattedDate = `${dateComponents[2]}-${dateComponents[1]}-${dateComponents[0]}`;
            return formattedDate;
        }
    </script>

    <!-- <script>
        var imageInput = document.getElementById("imageInput");
        var imagePreview = document.getElementById("imagePreview");
        imageInput.addEventListener("change", function() {
            if (imageInput.files.length > 0) {
                var selectedFile = imageInput.files[0];
                var reader = new FileReader();
                reader.onload = function(event) {
                    imagePreview.src = event.target.result;
                    imagePreview.style.display = "block";
                };
                reader.readAsDataURL(selectedFile);
            } else {
                imagePreview.src = "";
                imagePreview.style.display = "none";
            }
        });
    </script> -->

</body>

</html>