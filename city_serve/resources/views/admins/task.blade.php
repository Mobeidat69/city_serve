
@extends('layouts.admin')

@section('content')
{{-- <div class="container">
    <form>
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" value="{{ $task->id }}" disabled>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" value="{{ $task->title }}" disabled>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" disabled>{{ $task->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" id="location" value="{{ $task->location }}" disabled>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="text" class="form-control" id="start_date" value="{{ $task->start_date }}" disabled>
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="text" class="form-control" id="end_date" value="{{ $task->end_date }}" disabled>
        </div>
        <div class="form-group">
            <label for="deadline">Deadline:</label>
            <input type="text" class="form-control" id="deadline" value="{{ $task->deadline }}" disabled>
        </div>
        <div class="form-group">
            <label for="skills_required">Skills Required:</label>
            <input type="text" class="form-control" id="skills_required" value="{{ $task->skills_required }}" disabled>
        </div>
        <div class="form-group">
            <label for="vacancy">Vacancy:</label>
            <input type="text" class="form-control" id="vacancy" value="{{ $task->vacancy }}" disabled>
        </div>
        <div class="form-group">
            <label for="category_id">Category ID:</label>
            <input type="text" class="form-control" id="category_id" value="{{ $task->category_id }}" disabled>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <br>
            <img src="{{ $task->image }}" alt="{{ $task->id }}-picture" style="max-width: 200px">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" id="status" value="{{ $task->status }}" disabled>
        </div>
    </form>
</div> --}}

<div class="container">
    <div class="row">
        <div class="col-md-6 ms-3">
            <img src="{{ $task->image }}" alt="{{ $task->id }}-picture" style="max-width: 100%;">

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" value="{{ $task->title }}" disabled>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" disabled>{{ $task->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" value="{{ $task->location }}" disabled>
            </div>
               <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="text" class="form-control" id="start_date" value="{{ $task->start_date }}" disabled>
            </div>
   
        </div>
        <div class="col-md-6">
       
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="text" class="form-control" id="end_date" value="{{ $task->end_date }}" disabled>
            </div>

            <div class="form-group">
                <label for="deadline">Deadline:</label>
                <input type="text" class="form-control" id="deadline" value="{{ $task->deadline }}" disabled>
            </div>
           
            <div class="form-group">
                <label for="skills_required">Skills Required:</label>
                <textarea class="form-control" id="description" disabled> {{ $task->skills_required }}</textarea>
                {{-- <input type="text" class="form-control" id="skills_required" value="" disabled> --}}
            </div>
            <div class="form-group">
                <label for="vacancy">Vacancy:</label>
                <input type="text" class="form-control" id="vacancy" value="{{ $task->vacancy }}" disabled>
            </div>
            <div class="form-group">
                <label for="category_id">Category ID:</label>
                <input type="text" class="form-control" id="category_id" value="{{ $task->category_id }}" disabled>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" value="{{ $task->status }}" disabled>
            </div>
        </div>
    </div>

    <div class="col-md-12" style="text-align: right;">
        <button class="btn btn-success" >Export participants</button>
    </div>

</div>
@endsection