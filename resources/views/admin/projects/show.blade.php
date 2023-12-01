@php
    use App\Functions\Helper;
@endphp

@extends('layouts.admin')

@section('content')
    <h3>{{ $project->name }}</h3>
    @if ($project->technology)
        <p>Tech name:<strong>{{ $project->technology->name }}</strong></p>
    @endif
    <div class="w-50">
        <img class="img-fluid" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
        <p>{{ $project->image_original_name }}</p>
    </div>
    <p><strong>Start date:</strong> {{ Helper::formatDate($project->start_date) }}</p>
    <p><strong>End date:</strong> {{ isset($project->end_date) ? "$project->end_date" : 'Work in progress' }}</p>
    <p><strong>Description:</strong> {{ $project->description }}</p>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Return</a>
@endsection
