@extends('layouts.user')
@section('content')
    <livewire:user.pagepublikasi-detail :id="$id" :slug="$slug" />
@endsection
