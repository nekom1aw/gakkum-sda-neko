@extends('layouts.user')
@section('content')
    <livewire:user.pageinvestigasi-detail :id="$id" :slug="$slug" />
@endsection
