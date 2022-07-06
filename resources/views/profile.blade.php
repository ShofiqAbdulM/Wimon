@extends('layouts.back')

@section('content')
    <!-- Page Heading -->
    <div class="container">
        <h1 class="m-0">{{ __('Profile') }}</h1>

        @if (session('success'))
            <div class="alert alert-success border-left-success alert-dismissible fade show mt-2 mb-2" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger border-left-danger" role="alert">
                <ul class="pl-4 my-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="container mt-2">
        <form method="POST" action="{{ route('profile.update') }}" autocomplete="off">
            <div class="row justify-content-center">

                <div class="col-lg-4 order-lg-2 pt-5">

                    <div class="card shadow mb-4">
                        <div class="card-profile-image mt-4">
                            <div class="text-center">
                                <img class="image rounded-circle" src="{{ asset('img') }}/{{ Auth::user()->image }}"
                                    alt="image" style="width: 80%;height: 80%; padding: 10px; margin: 0px; ">
                                {{-- <img alt=""> --}}
                                <div class="text-center">
                                    <button type="file" class="btn btn-primary @error('image') is-invalid @enderror"
                                        id="image">Change Image
                                    </button>
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-center">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-8 order-lg-1">

                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">My Account</h6>
                        </div>

                        <div class="card-body">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <input type="hidden" name="_method" value="PUT">

                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="col-lg-12">
                                <div class="pl-lg-6">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="name">Name<span
                                                        class="small text-danger">*</span></label>
                                                <input type="text" id="name" class="form-control" name="name"
                                                    value="{{ old('name', Auth::user()->name) }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="last_name">Last name</label>
                                                <input type="text" id="last_name" class="form-control" name="last_name"
                                                    value="{{ old('last_name', Auth::user()->last_name) }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="email">Email address<span
                                                        class="small text-danger">*</span></label>
                                                <input type="email" id="email" class="form-control" name="email"
                                                    value="{{ old('email', Auth::user()->email) }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="current_password">Current
                                                    password</label>
                                                <input type="password" id="current_password" class="form-control"
                                                    name="current_password" placeholder="Current password">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="new_password">New password</label>
                                                <input type="password" id="new_password" class="form-control"
                                                    name="new_password" placeholder="New password">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="confirm_password">Confirm
                                                    password</label>
                                                <input type="password" id="confirm_password" class="form-control"
                                                    name="password_confirmation" placeholder="Confirm password">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="pl-lg-6">
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="submit" class="btn btn-primary">Save
                                                Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection