@extends('admin.master')

@section('module', 'Album')
@section('action', 'Detail')

@section('content')

    @for ($i = 0; $i < count($images); $i++)
        <img src="{{ asset('uploads/album/' . $images[$i]->image) }}" alt="..." width="200px"
            height="200px">
    @endfor


@endsection
