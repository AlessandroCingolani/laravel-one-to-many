@php
    use App\Functions\Helper;
@endphp

@extends('layouts.admin')

@section('content')
    <h3>{{ $project->name }} <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning"><i
                class="fa-solid fa-pencil"></i></a></h3>
    @if ($project->type)
        <p>Type name:<strong>{{ $project->type->name }}</strong></p>
    @endif
    <div class="w-25">
        <img class="img-fluid" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
        <p>{{ $project->image_original_name }}</p>
    </div>
    <p><strong>Start date:</strong> {{ Helper::formatDate($project->start_date) }}</p>
    <p><strong>End date:</strong>
        {{ isset($project->end_date) ? Helper::formatDate($project->end_date) : 'Work in progress' }}</p>
    <p><strong>Description:</strong> {!! $project->description !!}</p>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Return</a>
@endsection
