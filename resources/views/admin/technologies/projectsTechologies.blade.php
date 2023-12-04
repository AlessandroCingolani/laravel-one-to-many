@extends('layouts.admin')

@section('content')
    <h1>List projects with tech: {{ $technology->name }} </h1>

    <table class="table table-bordered border-success">
        <thead class="table-success">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name project</th>
                <th class="text-center" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technology->projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-success"> <i
                                class="fa-solid fa-circle-info"></i></a>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning"><i
                                class="fa-solid fa-pencil"></i></a>

                        @include('admin.partials.formDelete', [
                            'route' => route('admin.projects.destroy', $project),
                            'message' => 'Are you sure you want to delete this project?',
                        ])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
