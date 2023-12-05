@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body table-responsive">
                    @if (\Session::has('response'))
                        <div id="success-alert" class="alert alert-success">
                            {!! \Session::get('response') !!}
                        </div>
                        <script>
                            setTimeout(function() {
                                document.getElementById('success-alert').style.display = 'none';
                            }, 5000);
                        </script>
                    @endif
                    <h5 class="card-title mb-4 d-inline">Pendding Tasks Applications</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Task image</th>
                                <th scope="col">Task Name</th>
                                <th scope="col">vacancy</th>
                                <th scope="col">cv</th>
                                <th scope="col">confirm</th>
                                <th scope="col">reject</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $app)
                                @if ($app->status == 0)
                                    <tr>
                                        <th scope="row">{{ $app->application_id }}</th>
                                        <td><img src="{{ $app->task_image }}" alt="{{ $app->application_id }}-picture"
                                                style="max-width: 200px"></td>
                                        <td><a href="{{ route('view.task', $app->task_id) }}">{{ $app->task_title }}</a>
                                        </td>
                                        <td>{{ $app->vacancy }}</td>
                                        <td><a class="btn btn-success" href="{{ $app->cv }}">CV</a></td>
                                        <td>
                                            <!-- Apply align-items: center; here -->
                                            <div>
                                                <form
                                                    action="{{ route('application.confirm', ['id' => $app->user_id, 'appId' => $app->application_id]) }}"
                                                    method="get">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">accept</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <form
                                                    action="{{ route('application.reject', ['id' => $app->user_id, 'appId' => $app->application_id]) }}"
                                                    method="get">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">reject</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body table-responsive">
                    <h5 class="card-title mb-4 d-inline">Past Tasks Applications</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Task image</th>
                                <th scope="col">Task Name</th>
                                <th scope="col">vacancy</th>
                                <th scope="col">cv</th>
                                <th scope="col">status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $app)
                                @if ($app->status !== 0)
                                    <tr>
                                        <th scope="row">{{ $app->application_id }}</th>
                                        <td><img src="{{ $app->task_image }}" alt="{{ $app->application_id }}-picture"
                                                style="max-width: 200px"></td>
                                        <td><a href="{{ route('view.task', $app->task_id) }}">{{ $app->task_title }}</a>
                                        </td>
                                        <td>{{ $app->vacancy }}</td>
                                        <td><a class="btn btn-success" href="{{ $app->cv }}">CV</a></td>
                                        <td>
                                            <div>
                                                @if ($app->status == 1)
                                                    <button class="btn btn-success" disabled>Accepted</button>
                                                @elseif ($app->status == 2)
                                                    <button class="btn btn-danger" disabled>Rejected</button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
