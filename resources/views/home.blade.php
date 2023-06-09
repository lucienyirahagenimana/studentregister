@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <div class="d-flex justify-content-between align-items-center">
            <h6>List of All Students </h6>
            <a href="{{ route('student.create') }}" class="btn btn-sm btn-warning px-4 mb-2">
                Add Student
            </a>
        </div>

        <div>
            @if (count($students) !== 0)
                <table class="table table-stripped table-bordered">
                    <tr class="bg-secondary text-white">
                        <th>Names</th>
                        <th>Registration number</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        <th>Date created</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($students as $std)
                        <tr>
                            <td>{{ $std->name }}</td>
                            <td>{{ $std->regnumber }}</td>
                            <td>{{ $std->email }}</td>
                            <td>0{{ $std->phonenumber }}</td>
                            <td>{{ $std->created_at }}</td>
                            <td class="d-flex gap-2">
                                <form method="post" action="{{ route('student.destroy', $std->id) }}">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" value="Remove" class="btn btn-danger">

                                </form>
                                <a href="{{ route('student.edit', $std->id) }}">
                                    <button class="btn btn-sm btn-info">Update</button>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </table>
            @else
                <div class="alert alert-info">
                    <strong>INFO</strong>
                    <span>No student found</span>
                </div>
            @endif
        </div>

    </div>
@endsection
