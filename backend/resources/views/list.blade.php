@extends('layouts.top')

@section('list')

@if (empty($listno))
@include('listparts.list_1')
@elseif ($listno == "1")
@include('listparts.list_1')
@elseif ($listno == "2")
@include('listparts.list_2')
@elseif ($listno == "3")
@include('listparts.list_3')
@endif

<p>{{ $staffs->links() }}</p>
@endsection
