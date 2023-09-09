@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Create A Task</h5>

                    <form method="POST" action="{{ route('store.task') }}" enctype="multipart/form-data">
                        @csrf
                        <!--Task details-->

                        @if ($errors->has('title'))
                            <p class="alert alert-danger ">{{ $errors->first('title') }}</p>
                        @endif

                        <div class="form-group">
                            <label for="task-title">Task Title</label>
                            <input type="text" name="title" class="form-control" id="task-title"
                                placeholder="e.g, cleaning the park">
                        </div>

                        @if ($errors->has('description'))
                            <p class="alert alert-danger ">{{ $errors->first('description') }}</p>
                        @endif
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="">Task Description</label>
                                <textarea name="description" id="" cols="30" rows="7" class="form-control"
                                    placeholder="Write The Task's Description..."></textarea>
                            </div>
                        </div>


                        @if ($errors->has('location'))
                            <p class="alert alert-danger ">{{ $errors->first('location') }}</p>
                        @endif
                        <div class="form-group">
                            <label for="task-region">Task Location</label>
                            <input type="text" name="location" class="form-control" id="task-title"
                                placeholder="e.g, Aqaba">
                        </div>


                        @if ($errors->has('start_date'))
                            <p class="alert alert-danger ">{{ $errors->first('start_date') }}</p>
                        @endif
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="start_date">
                        </div>


                        @if ($errors->has('end_date'))
                            <p class="alert alert-danger ">{{ $errors->first('end_date') }}</p>
                        @endif
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" class="form-control" id="end_date">
                        </div>


                        <!-- Application Deadline Input -->
                        @if ($errors->has('deadline'))
                            <p class="alert alert-danger ">{{ $errors->first('deadline') }}</p>
                        @endif
                        <div class="form-group">
                            <label for="deadline">Application Deadline</label>
                            <input name="deadline" type="date" class="form-control" id="deadline">
                        </div>

                        <!-- Vacancy Input -->
                        @if ($errors->has('vacancy'))
                            <p class="alert alert-danger ">{{ $errors->first('vacancy') }}</p>
                        @endif
                        <div class="form-group">
                            <label for="vacancy">Vacancy</label>
                            <input name="vacancy" type="text" class="form-control" id="vacancy" placeholder="e.g. 3">
                        </div>

                        <!-- Skills Required Textarea -->
                        @if ($errors->has('skills_required'))
                            <p class="alert alert-danger ">{{ $errors->first('skills_required') }}</p>
                        @endif
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="skills_required">Skill Required</label>
                                <textarea name="skills_required" id="skills_required" cols="30" rows="7" class="form-control"
                                    placeholder="e.x, Swiming , Endurance  , Patient"></textarea>
                            </div>
                        </div>

                        @if ($errors->has('category'))
                            <p class="alert alert-danger ">{{ $errors->first('category') }}</p>
                        @endif
                        <!-- Category Dropdown Select -->
                        <div class="form-group">
                            <label for="category">category</label>
                            <select name="category" class="selectpicker border rounded form-control " id="category"
                                data-style="btn-black" data-width="100%" data-live-search="true" title="Select Category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <!-- Image Upload Input -->
                        @if ($errors->has('image'))
                            <p class="alert alert-danger ">{{ $errors->first('image') }}</p>
                        @endif
                        <div class="input-group custom-file-button mb-4 mt-4">
                            <label class="input-group-text" for="inputGroupFile">Upolad picture for the task</label>
                            <input type="file" class="form-control" id="inputGroupFile" name="image">
                        </div>

                        <!-- Submit Button -->
                        <div class="col-lg-4 ml-auto">
                            <div class="row">
                                <div class="col-6">
                                    <input type="submit" name="submit" class="btn btn-block btn-primary btn-md"
                                        style="margin-left: 200px;" value="Save Task">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
