@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if (\Session::has('create'))
                        <div id="success-alert" class="alert alert-success">
                            {!! \Session::get('create') !!}
                        </div>

                        <script>
                            setTimeout(function() {
                                document.getElementById('success-alert').style.display = 'none';
                            }, 5000);
                        </script>
                    @endif

                    <h5 class="card-title mb-4 d-inline">Tasks</h5>
                    <a href="{{ route('create.task') }}" class="btn btn-primary mb-4 text-center float-right">Create
                        Task</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">picture</th>
                                <th scope="col">title</th>
                                <th scope="col">view</th>
                                <th scope="col">update</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Tasks as $task)
                                <tr>
                                    <th scope="row">{{ $task->id }}</th>


                                    <td><img src="{{ $task->image }}" alt="{{ $task->id }}-picture"
                                            style="max-width: 200px"></td>


                                    <td>{{ $task->title }}</td>

                                    <td><a href="{{ route('view.task', $task->id) }}"
                                            class="btn btn-primary text-white text-center">View</a></td>
                                    <td><a href="{{ route('edit.task', $task->id) }}"
                                            class="btn btn-warning text-white text-center">Update</a></td>

                                    <td>
                                        <a href="#" class="btn btn-danger text-center" data-toggle="modal"
                                            data-target="#confirmDelete{{ $task->id }}">Delete</a>
                                        <div class="modal fade" id="confirmDelete{{ $task->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="confirmDeleteLabel{{ $task->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmDeleteLabel{{ $task->id }}">
                                                            Confirm Delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete ( {{ $task->name }} ) task?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('delete.task', $task->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
