@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Job Applications</h5>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Task image</th>
                                <th scope="col">Task Name</th>
                                <th scope="col">vacancy</th>
                                <th scope="col">cv</th>
                                <th scope="col">tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $app)
                                <tr>
                                    <th scope="row">{{ $app->job_id }}</th>
                                    <td><img src="{{ $app->image }}" alt="{{ $app->id }}-picture"
                                            style="max-width: 200px"></td>
                                    <td>{{ $app->title }}</td>
                                    <td>{{ $app->vacancy }}</td>
                                    <td><a class="btn btn-success" href="{{ asset($app->cv) }}">CV</a></td>
                                    <td style="display: flex; gap:10px; ">
                                        <div>
                                            <form action="{{ route('application.confirm', $app->id) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-success">accept</button>
                                            </form>
                                        </div>
                                        <div>
                                            <form action="{{ route('application.reject', $app->id) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">reject</button>
                                            </form>
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
