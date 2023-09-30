<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap1.min.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
    .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
    }

    .card-registration .select-arrow {
        top: 13px;
    }
</style>

<body>
    @if (Auth::check())

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link href="javascript:void(0)" onclick="event.preventDefault();this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
    @else
    <a class="me-2" style="color: #DD5903;" href="{{route("login")}}">Login</a>
    <a style="color: #DD5903;" href="{{route("register")}}">Register</a>
    @endif


    <div>
        <h1 class="text-center text-success">Choose your desired form</h1>
        <select class="form-select w-50" name="" id="category_id">
            <option value="-1">Select Form Category</option>
            @forelse ($cat as $row)
            <option value="{{ $row->id }}">{{ $row->name }}</option>
            @empty
            @endforelse
        </select>
    </div>

    <div id="form-container">

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/popper1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {

            var url = "{{url('authCheck')}}"

            $("#category_id").change(function() {
                $.ajax({
                    url: url,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.isAuthenticated) {

                            let id = $("#category_id").val();
                            $('#form-container').html(form(id));
                        } else {

                            Swal.fire({
                                icon: 'error',
                                title: response.message,
                               
                               
                            })

                        }
                    },

                });
            });
        });

        function form(id) {

            let formHtml = '';
            formHtml += `

<section class="vh-100 gradient-custom">
<div class="container py-5 h-100">
<div class="row justify-content-center align-items-center h-100">
    <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center text-primary">Welcome</h3>

                <form action="{{ route('formSubmit') }}" method="post" enctype="multipart/form-data" id="myForm">
                                @csrf

                                <div class="row">
                                <input type="hidden" name="category_id" value="${id}">


                                </div>



                                <div class="row">

                                    <div class="form-outline">
                                        <input type="text" id="name" name="name" class="form-control form-control-lg" />
                                        <label class="form-label" for="firstName"> Name</label>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="father_name" name="father_name" class="form-control form-control-lg" />
                                            <label class="form-label" for="firstName">Father's Name</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="mother_name" name="mother_name" class="form-control form-control-lg" />
                                            <label class="form-label" for="lastName">Mother's Name</label>
                                        </div>

                                    </div>
                                </div>


                                
                                <div class="row">`

            if (id != 1) {
                formHtml +=
                    `<div class="col-md-4 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="ssc_result" name="ssc_result" class="form-control form-control-lg" />
                                            <label class="form-label" for="firstName">Result of SSC</label>
                                        </div>

                                    </div>`
                if (id != 2) {
                    formHtml += `
                                    <div class="col-md-4 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="hsc_result" name="hsc_result" class="form-control form-control-lg" />
                                            <label class="form-label" for="lastName">Result of HSC</label>
                                        </div>

                                    </div>`
                }
            }
            formHtml +=
                ` <div class="col-md-4 mb-4">

                                        <div class="form-outline">
                                            <input type="date" id="date" name="date" class="form-control form-control-lg" />
                                            <label class="form-label" for="lastName">Date of Birth</label>
                                        </div>

                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <input type="file" name="image" id="image" class="form-control" required>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <h6 class="mb-2 pb-1">Gender: </h6>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="female" checked />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male" />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">

                                        <select name="group" id="group" class="select form-control-lg">
                                            <option value="1" disabled>Choose Group</option>
                                            <option value="Science">Science</option>
                                            <option value="Arts">Arts</option>
                                            <option value="Commerce">Commerce</option>
                                        </select>
                                        <label class="form-label select-label">Choose option</label>

                                    </div>
                                </div>

                                <div class="mt-4 pt-2">
                                    <input id="submit" class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                </div>

                            </form>
             </div>
         </div>
     </div>
</div>
</div>
</section>
`;

            return formHtml;

        }
    </script>
</body>

</html>