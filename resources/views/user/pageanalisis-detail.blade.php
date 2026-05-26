@extends('layouts.user')
@section('content')
    <livewire:user.pageanalisis-detail :id="$id" :slug="$slug" />
@endsection
