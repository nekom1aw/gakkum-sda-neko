@extends('layouts.user')
@section('content')
    <livewire:user.pageaktivitas-detail :id="$id" :slug="$slug" />
@endsection
