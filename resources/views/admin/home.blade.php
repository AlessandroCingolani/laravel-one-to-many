@extends('layouts.admin')


@section('content')
    <h1>Dashboard</h1>
    <div class="row">

        <div class="col">
            <div class="card text-bg-info">
                <div class="card-body">
                    <h4 class="card-title">Projects</h4>
                    <h5 class="card-subtitle py-3 fs-3">{{ $projects }}</h5>
                </div>
                <div class="card-footer text-body-secondary">
                    <a href="{{ route('admin.projects.index') }}" class="card-link text-decoration-none ">Go to
                        list</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-info">
                <div class="card-body">
                    <h4 class="card-title">Technologies</h4>
                    <h5 class="card-subtitle py-3 fs-3">{{ $technologies }}</h5>
                </div>
                <div class="card-footer text-body-secondary">
                    <a href="{{ route('admin.technologies.index') }}" class="card-link text-decoration-none ">Go to
                        list</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-info">
                <div class="card-body">
                    <h4 class="card-title">Types</h4>
                    <h5 class="card-subtitle py-3 fs-3">{{ $types }}</h5>
                </div>
                <div class="card-footer text-body-secondary">
                    <a href="{{ route('admin.types.index') }}" class="card-link text-decoration-none ">Go to
                        list</a>
                </div>
            </div>
        </div>
    </div>
@endsection
