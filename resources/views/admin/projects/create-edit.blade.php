@extends('layouts.admin')

@section('content')
    <h1>{{ $title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif



    <div class="row">
        <div class="col-8">
            <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($method)
                <div class="mb-3">
                    <label for="name" class="form-label">Name project *</label>
                    <input id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                        type="text" value="{{ old('name', $project?->name) }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link project*</label>
                    <input id="link" class="form-control @error('link') is-invalid @enderror" name="link"
                        type="text" value="{{ old('link', $project?->link) }}">
                    @error('link')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-floating mb-5">
                    <textarea class="form-control" placeholder="Project description *" id="description" name="description"
                        style="height: 200px">{{ old('description', $project?->description) }}</textarea>

                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label fw-bold">Start date </label>
                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date"
                        name="start_date" value="{{ old('start_date', $project?->start_date) }}">
                    @error('start_date')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label fw-bold">End Date </label>
                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date"
                        name="end_date" value="{{ old('end_date', $project?->end_date) }}">
                    @error('end_date')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input id="image" class="form-control @error('image') is-invalid @enderror" name="image"
                        type="file" onchange="showUpload(event)" value="{{ old('image', $project?->image) }}">
                    @error('image')
                        <p class="text-danger">{{ $image }}</p>
                    @enderror
                    <img id="thumb" width="150" onerror="this.src='/img/placeholder.webp'"
                        src="{{ asset('storage/' . $project?->image) }}" />
                </div>


                <button type="submit" class="btn btn-primary">Invia</button>
                <button type="reset" class="btn btn-secondary">Annulla</button>

            </form>
        </div>
        <script>
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });

            function showUpload(event) {
                const thumb = document.getElementById('thumb');
                thumb.src = URL.createObjectURL(event.target.files[0]);
            }
        </script>
    </div>
@endsection
