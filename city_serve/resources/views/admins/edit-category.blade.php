@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Update Categories</h5>
                    <form method="POST" action="{{ route('update.category', $category->id) }}" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->has('image'))
                            <p class="alert alert-danger ">{{ $errors->first('image') }}</p>
                        @endif
                        <div class="input-group custom-file-button mb-4 mt-4">
                            <label class="input-group-text" for="inputGroupFile">Upolad category picture</label>
                            <input type="file" class="form-control" id="inputGroupFile" name="image">
                        </div>
                        @if ($errors->has('name'))
                            <p class="alert alert-danger ">{{ $errors->first('name') }}</p>
                        @endif
                        <!-- Name input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" class="form-control"
                                placeholder="{{ $category->name }}" />
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
