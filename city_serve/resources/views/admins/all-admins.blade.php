@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Admins</h5>
                    <a href="{{ route('create.admin') }}" class="btn btn-primary mb-4 text-center float-right">Create
                        Admins</a>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">username</th>
                                <th scope="col">email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <th scope="row">{{ $admin->id }}</th>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
