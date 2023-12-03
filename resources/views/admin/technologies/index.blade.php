@extends('layouts.admin')


@section('content')
    <h1>Technologies</h1>
    <div class="row">
        <div class="col-6">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role='alert'>
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success" role='alert'>
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('admin.technologies.store') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="New tech" aria-describedby="button-addon2"
                        name="name">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add</button>
                </div>
            </form>

            <table class="table table-bordered border-success">
                <thead class="table-success">
                    <tr>
                        <th scope="col">Name tech</th>
                        <th class="text-center" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                        <tr>
                            <td>
                                <form action="{{ route('admin.technologies.update', $technology) }}" method="POST"
                                    id="form-edit-<?= $technology->id ?>">

                                    @csrf
                                    @method('PUT')
                                    <input type="text" class="form-hidden" value="{{ $technology->name }}"
                                        name="name" />
                                </form>
                            </td>
                            <td class="text-center">
                                <button onclick="submitForm('form-edit-<?= $technology->id ?>')" class="btn btn-warning"><i
                                        class="fa-solid fa-pencil"></i></button>

                                @include('admin.partials.formDelete', [
                                    'route' => route('admin.technologies.destroy', $technology),
                                    'message' => 'Sicuro di eliminare questa tech?',
                                ])
                            </td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
    <script>
        function submitForm(id) {
            const form = document.getElementById(id);
            form.submit();
        }
    </script>
@endsection
