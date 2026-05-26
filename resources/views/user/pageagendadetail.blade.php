@extends('layouts.user')
@section('content')
    <livewire:user.pageagendadetail :id="$id" :slug="$slug" />
@endsection
