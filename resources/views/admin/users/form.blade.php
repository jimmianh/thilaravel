@section('title','Form user | Admin')
@extends('.admin.layouts.form')
@section('title_form',$detail ?'Edit user' :'Create user')

@section('upload')
    <form id="form_image" action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image" class="image_file">
    </form>
@endsection

@section('size_form')
    <div class="col-md-12">
        @endsection

        @section('input_form')
            <div class="row form-group">
                <div class="col-lg-4">
                    <label for="">FirstName</label>
                    <input value="{{$detail ?$detail->firstname :''}}" type="text" name="firstname" placeholder="First Name" class="form-control">
                    @error('firstname')
                    <span style="color: #f97d7d;font-size: 12px;font-weight: bold">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-md hidden-lg hidden-xl"></div>

                <div class="col-lg-4">
                    <label for="">LastName</label>
                    <input value="{{$detail ?$detail->lastname :''}}" type="text" name="lastname" placeholder="Last Name" class="form-control">
                    @error('lastname')
                    <span style="color: #f97d7d;font-size: 12px;font-weight: bold">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-md hidden-lg hidden-xl"></div>

                <div class="col-lg-4">
                    <label for="">Email</label>
                    <input value="{{$detail ?$detail->email :''}}" type="email" name="email" placeholder="Your Email" class="form-control">
                    @error('email')
                    <span style="color: #f97d7d;font-size: 12px;font-weight: bold">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row form-group">
                <div class="col-lg-4">
                    <label for="">Avatar</label>
                    <button type="button" class="form-control btn btn-danger choose_avatar">Choose Avatar</button>
                    @if($detail)
                        <img id="show_avatar" style="height: 250px;width: 100%;object-fit: cover;margin-top: 2px" src="{{$detail->avatar}}">
                    @else
                        <img id="show_avatar" style="height: 250px;width: 100%;object-fit: cover;margin-top: 2px; display: none">
                    @endif
                    <img id="show_avatar" style="height: 200px;width: 100%;object-fit: cover;margin-top: 2px; display: none">
                    <input value="{{$detail ?$detail->avatar :''}}" id="avatar" type="hidden" name="avatar" placeholder="Enter url avatar" class="form-control">
                    @error('avatar')
                    <span style="color: #f97d7d;font-size: 12px;font-weight: bold">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row form-group">
                <div class="col-lg-3">
                    <label for="">Birthday</label>
                    <input value="{{$detail ?$detail->birthday :''}}" type="date" name="birthday" placeholder="Enter your birthday" class="form-control">
                    @error('birthday')
                    <span style="color: #f97d7d;font-size: 12px;font-weight: bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-3">
                    <label for="">Phone</label>
                    <input value="{{$detail ?$detail->phone :''}}" type="text" name="phone" placeholder="Enter your phone number" class="form-control">
                    @error('phone')
                    <span style="color: #f97d7d;font-size: 12px;font-weight: bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <label for="">Address</label>
                    <input value="{{$detail ?$detail->address :''}}" type="text" name="address" placeholder="Enter your address" class="form-control">
                    @error('address')
                    <span style="color: #f97d7d;font-size: 12px;font-weight: bold">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row form-group">
                <div class="col-lg-6">
                    <label for="">Password</label>
                    <input id="password" type="password" name="password" placeholder="Enter your password" class="form-control">
                    @error('password')
                    <span style="color: #f97d7d;font-size: 12px;font-weight: bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <label for="">Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm password" class="form-control">
                    @error('password')
                    <span style="color: #f97d7d;font-size: 12px;font-weight: bold">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endsection
         @section('Extra_js')
            <script>
                $('#form_admin').validate({
                        rules: {
                            firstname: {
                                required: true,
                                minlength: 2,
                            },
                            lastname: {
                                required: true,
                                minlength: 2,
                            },
                            email: {
                                required: true,
                                minlength: 10,
                                email: true
                            },
                            avatar: {
                                required: true,
                            },
                            birthday: {
                                required: true,
                            },
                            phone: {
                                required: true,
                                minlength: 9,
                                maxlength: 12
                            },
                            address: {
                                required: true,
                                minlength: 20,
                            },
                            password: {
                                required: true,
                                minlength: 6,
                            },
                            confirm_password:{
                                required: true,
                                equalTo: "#password"
                            }

                    },
                    messages:{
                        firstname: {
                            required: 'H??? t??n kh??ng ???????c b??? tr???ng',
                            minlength: 'Vui l??ng nh???p h??? t??n ?????y ?????',
                        },
                        lastname: {
                            required: 'T??n kh??ng ???????c b??? tr???ng',
                            minlength: 'Vui l??ng nh???p ????ng t??n',
                        },
                        email: {
                            required: 'Email kh??ng ???????c b??? tr???ng',
                            minlength: 'Email kh??ng ng???n h??n 10 k?? t???',
                            email: 'Vui l??ng nh???p ????ng ?????nh d???ng @gmail.com'
                        },
                        avatar: {
                            required: 'Avatar kh??ng ???????c b??? tr???ng',
                        },
                        birthday: {
                            required: 'Birthday kh??ng ???????c b??? tr???ng',
                        },
                        phone: {
                            required: 'Phone kh??ng ???????c b??? tr???ng',
                            minlength: 'S??? ??i???n tho???i kh??ng ????ng ?????nh d???ng',
                            maxlength: 'S??? ??i???n tho???i kh??ng ????ng ?????nh d???ng'
                        },
                        address: {
                            required: 'Address kh??ng ???????c b??? tr???ng',
                            minlength: 'Vui l??ng nh???p ?????a ch??? c??? th???',
                        },
                        password: {
                            required: 'Password kh??ng ???????c b??? tr???ng',
                            minlength: 'M???t kh???u c???n ??t nh???t 6 k?? t???',
                        },
                        confirm_password:{
                            required: 'Vui l??ng nh???p l???i m???t kh???u',
                            equalTo: 'M???t kh???u kh??ng kh???p'
                        }
                    }
                })
                $('.choose_avatar').click(function () {
                    $('.image_file').click()
                })
                $('.image_file').change(function (){
                    $('#form_image').submit()
                })
                $('#form_image').on('submit', function (event) {
                    event.preventDefault()
                    $.ajax({
                        url: "{{route('upload_image')}}",
                        method: "POST",
                        data: new FormData(this),
                        dataType: "JSON",
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (res) {
                            var img = document.getElementById('show_avatar')
                            img.style.display = 'block'
                            document.getElementById('avatar').value = `${res.data.url}`
                            img.src = `${res.data.url}`
                        }
                    })
                })
            </script>
@endsection


