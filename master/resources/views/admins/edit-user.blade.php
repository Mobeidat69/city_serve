@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Update User</h5>
                    <form method="POST" action="{{ route('update.user' , $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->has('name'))
                            <p class="alert alert-danger ">{{ $errors->first('name') }}</p>
                        @endif
                        <!-- Name input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" class="form-control"
                                placeholder="{{$user->name}}" />
                        </div>
                        @if ($errors->has('email'))
                            <p class="alert alert-danger ">{{ $errors->first('email') }}</p>
                        @endif
                        <!-- email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="email" id="form2Example1" class="form-control"
                                placeholder="{{$user->email}}" />
                        </div>
                        @if ($errors->has('password'))
                            <p class="alert alert-danger ">{{ $errors->first('password') }}</p>
                        @endif
                        <!-- Name input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="password" id="form2Example1" class="form-control"
                                placeholder="*********" />
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
