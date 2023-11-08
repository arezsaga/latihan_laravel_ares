@extends('layouts.reg')
@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Create Account</h3>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                        {!! implode('', $errors->all('
                        <div class="alert alert-danger" role="alert">
                            :message
                        </div>')) !!}
                        @endif
                        @if(Session::get('error') && Session::get('error') != null)
                        <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
                        @php
                        Session::put('error', null)
                        @endphp
                        @endif
                        @if(Session::get('success') && Session::get('success') != null)
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                        @php
                        Session::put('success', null)
                        @endphp
                        @endif
                        <form method="POST" action="{{ route('daftar') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control @error('first_name') is-invalid @enderror" id="inputFirstName" name="first_name" type="text" placeholder="Enter your first name" value="{{ old('first_name') }}" />
                                        <label for="inputFirstName">First name</label>
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('last_name') is-invalid @enderror" id="inputLastName" name="last_name" type="text" placeholder="Enter your last name" value="{{ old('last_name') }}" />
                                        <label for="inputLastName">Last name</label>
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('email') is-invalid @enderror" id="inputEmail" type="email" placeholder="name@example.com" name="email" value="{{ old('email') }}" />
                                <label for="inputEmail">Email address</label>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password" placeholder="Create a password" name="password" />
                                        <label for="inputPassword">Password</label>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" name="password_confirmation" />
                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection