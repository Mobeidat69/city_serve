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

                    <h5 class="card-title mb-4 d-inline">Categories</h5>
                    <a href="{{ route('create.category') }}" class="btn btn-primary mb-4 text-center float-right">Create
                        Categories</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">picture</th>
                                <th scope="col">name</th>
                                <th scope="col">update</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td ><img src="{{$category->image}}" alt="{{$category->id}}-picture" style="max-width: 200px"></td>
                                    <td>{{ $category->name }}</td>
                                    <td><a href="{{ route('edit.category', $category->id) }}"
                                            class="btn btn-warning text-white text-center ">Update </a></td>
                                    <td>
                                        <a href="#" class="btn btn-danger text-center" data-toggle="modal"
                                            data-target="#confirmDelete{{ $category->id }}">Delete</a>
                                        <div class="modal fade" id="confirmDelete{{ $category->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="confirmDeleteLabel{{ $category->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmDeleteLabel{{ $category->id }}">
                                                            Confirm Delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete ( {{ $category->name }} ) category?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('delete.category', $category->id) }}"
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
