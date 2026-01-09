@extends('layouts.base')
@section('body')
    <div><a class="btn btn-primary " href="{{ route('albums.create') }}" aria-disabled="true">create an album</a></div>
    <table class="table table-striped table-hover">
        @foreach ($albums as $album)
            <tr>
                <td>{{ $album->id }}</td>
                <td>{{ $album->title }}</td>
                <td>{{ $album->artist_name }}</td>
                <td>{{ $album->genre }}</td>
                <td>{{ $album->date_released }}</td>
                <td><a href="{{ route('albums.edit', ['album' => $album->id]) }}"><i class="fas fa-edit"></i></a></td>
                <td>
                    <form action="{{ route('albums.destroy', ['album' => $album->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-light"><i class="fas fa-trash" style="color:red"></i>
                        </button>
                    </form>

                </td>
            </tr>
        @endforeach

    </table>
@endsection
