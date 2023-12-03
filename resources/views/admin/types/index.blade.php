@extends('layouts.admin')


@section('content')
    <h1>Types</h1>
    <div class="row">
        <div class="col-6">
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
            <form action="{{ route('admin.types.store') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="New type" aria-describedby="button-addon2"
                        name="name">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add</button>
                </div>
            </form>

            <table class="table table-bordered border-success">
                <thead class="table-success">
                    <tr>
                        <th scope="col">Name type</th>
                        <th class="text-center" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <td>
                                <form action="{{ route('admin.types.update', $type) }}" method="POST"
                                    id="form-edit-type-<?= $type->id ?>">

                                    @csrf
                                    @method('PUT')
                                    <input type="text" class="form-hidden" value="{{ $type->name }}" name="name" />
                                </form>

                            </td>
                            <td class="text-center">
                                <button onclick="submitForm('form-edit-type-<?= $type->id ?>')" class="btn btn-warning"><i
                                        class="fa-solid fa-pencil"></i></button>
                                @include('admin.partials.formDelete', [
                                    'route' => route('admin.types.destroy', $type),
                                    'message' => 'Sicuro di eliminare questo type?',
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
