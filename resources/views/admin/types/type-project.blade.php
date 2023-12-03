@extends('layouts.admin')

@section('content')
    <h1>List Type with related projects</h1>

    <table class="table table-bordered border-success">
        <thead class="table-success">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Type</th>
                <th scope="col">Projects related</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>
                        <ul class="list-group">
                            @foreach ($type->projects as $project)
                                <li class="list-group-item">
                                    <a href="{{ route('admin.projects.show', $project) }}">{{ $project->name }}</a>

                                </li>
                            @endforeach
                        </ul>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
