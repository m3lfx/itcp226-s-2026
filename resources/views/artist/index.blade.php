@extends('layouts.base')
@section('body')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">artist name</th>
                <th scope="col">country</th>
                <th scope="col">image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artists as $artist)
                {{-- {{ dump($artist) }} --}}
                <tr>
                    <td>{{ $artist->id }}</td>
                    <td>{{ $artist->name }}</td>
                    <td>{{ $artist->country }}</td>
                    <td>{{ $artist->img_path }}</td>
                    <td><a href="{{ url('/artists/' . $artist->id . '/edit') }}"><i class="fas fa-edit"></i></a></td>
                    <td><a href="{{ url('/artists/' . $artist->id . '/delete') }}"><i class="fas fa-trash"
                                style="color:red"></i></a>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
