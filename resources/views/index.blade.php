@extends('layouts.app')
@section('title', 'Contacts List')

@section('content')
<header class="py-10 text-center">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Contacts List</h1>

        <a href="{{ route('contacts.create') }}" class="inline-block mt-4 px-4 py-2 bg-green-500 hover:bg-green-700 text-white font-bold rounded-md shadow-md">
            Create Contact
        </a>
</header>

<div class="max-w-7xl mx-auto px-4 py-6">
    @if(isset($error))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ $error }}</span>
        </div>
    @else
        <ul class="space-y-6">
            @foreach($contacts as $contact)
                <li class="bg-white dark:bg-gray-700 shadow rounded-md p-4 grid grid-cols-3 gap-4 items-center">
                    <div class="col-span-1">
                        <span class="font-medium text-gray-800 dark:text-gray-100">{{ $contact->name }}</span>
                    </div>
                    <div class="col-span-1">
                        <span class="text-gray-600 dark:text-gray-300">- {{ $contact->email }}</span>
                    </div>
                    <div class="col-span-1 justify-self-end">
                            <a href="{{ route('contacts.show', $contact->id) }}" target=""
                            class="inline-block px-3 py-1 bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold rounded-md">
                                View Details
                            </a>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection