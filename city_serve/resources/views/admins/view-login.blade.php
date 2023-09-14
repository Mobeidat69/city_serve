@extends('layouts.admin')


@section('content')
<style>
    #wrapper{
        margin-left: 0 !important;
    }
</style>
    <div class="row">
        <div class="col-6 mx-auto"> <!-- Added mx-auto class for centering -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mt-5">Login</h5>
                    <form method="POST" class="p-auto" action="{{ route('check.login') }}">
                        <!-- Email input -->
                        @csrf
                        @if ($errors->has('email'))
                            <p class="alert alert-danger">{{ $errors->first('email') }}</p>
                        @endif
                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="form2Example1" class="form-control"
                                placeholder="Email" />
                        </div>
                        <!-- Password input -->
                        @if ($errors->has('password'))
                            <p class="alert alert-danger">{{ $errors->first('password') }}</p>
                        @endif
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form2Example2" placeholder="Password"
                                class="form-control" />
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
