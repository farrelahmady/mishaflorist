@extends('layouts.app')

@section('content')
    @livewire('components.header')

    {{ $slot }}

    @livewire('components.footer')
@endsection
