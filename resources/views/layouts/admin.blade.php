@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @livewire('components.admin-sidebar')

    <div class="relative md:ml-48 bg-stone-100">
        @livewire('components.admin-header', ['title' => $title])

        <div class=" bg-teal-500 md:pt-32 pb-32 pt-12 "></div>

        <div class="px-4 md:px-10 mx-auto w-full -m-24 ">
            {{ $slot }}

        </div>

    </div>
@endsection
