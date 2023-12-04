@php
    use App\Functions\Helper;
@endphp

@extends('layouts.admin')

@section('content')
    <h1>List projects</h1>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered border-success">
        <thead class="table-success">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name project</th>
                <th scope="col">Start date</th>
                <th scope="col">End date</th>
                <th scope="col">Technology</th>
                <th scope="col">Type</th>
                <th class="text-center" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ Helper::formatDate($project->start_date) }}</td>
                    <td>{{ isset($project->end_date) ? Helper::formatDate($project->end_date) : 'Work in progress' }}</td>
                    <td>
                        @forelse ($project->technologies as $technology)
                            {{ $technology->name }}
                        @empty
                            -
                        @endforelse
                    </td>
                    <td>{{ $project->type?->name ?? '-' }}</td>
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
    <div class="paginator w-50">
        {{ $projects->links() }}
    </div>
@endsection
