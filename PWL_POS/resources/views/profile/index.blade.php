@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                <form action="{{ route('profile.edit') }}" method="POST" id="form-edit-profile"
                        enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3 center">
                        <a href="#" id="upload-link">
                            <img src="{{ asset('/profile_picture/' . Auth::user()->getAvatarName()) . '.png' }}"
                                 class="img-circle" alt=""
                                 style="width: 150px; height: 150px;">
                        </a>
                        <input type="file" id="profile_picture" name="profile_picture" style="display: none;"
                               accept="image/*">
                        <small id="error-profile_picture" class="error-text text-danger"></small>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" id="nama" name="nama" class="form-control"
                               placeholder="Nama" value="{{ $user->nama }}">
                        <small id="error-nama" class="error-text text-danger"></small>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" id="username" name="username" class="form-control"
                               placeholder="Username" value="{{ $user->username }}">
                        <small id="error-username" class="error-text text-danger"></small>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control"
                               placeholder="Password">
{{--                        <small class="form-text text-muted">Abaikan jika tidak ingin ubah password</small>--}}
                        <small id="error-password" class="error-text text-danger"></small>
                    </div>
                    <div class="p-0">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        $(document).ready(function () {
            $('#upload-link').on('click', function (e) {
                e.preventDefault();
                $('#profile_picture').click();
            });

            $('#profile_picture').on('change', function () {
                let file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        $('#upload-link img').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        $(document).ready(function () {
            $("#form-edit-profile").validate({
                rules: {
                    nama: {
                        required: true,
                        minlength: 3,
                        maxlength: 100
                    },
                    username: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    password: {
                        required: false,
                        minlength: 6,
                        maxlength: 255
                    },
                    profile_picture: {
                        required: false,
                        extension: "jpg|jpeg|png",
                        accept: "image/*"
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endpush
