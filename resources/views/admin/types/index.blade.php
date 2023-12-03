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
                            <td>{{ $type->name }}</td>
                            <td class="text-center">
                                <a class="btn btn-warning" href="#"><i class="fa-solid fa-pencil"></i></a>
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
@endsection
