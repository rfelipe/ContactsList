@extends('layouts.app')
@section('title', 'Contact Details')

@section('content')
<header class="py-10 text-center">
    <h1 class="text-3xl font-bold text-gray-800">Contact Details</h1>
    <a href="{{ route('contacts.index') }}"
       class="inline-block mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md shadow-md">
        < Back to Contacts List
    </a>
</header>

<div class="max-w-7xl mx-auto px-4 py-6">
    @if(isset($contact))
        <div class="bg-white shadow rounded-md p-6">
            <div class="mb-4">
                <strong class="font-medium text-gray-800">Name:</strong>
                <span class="text-gray-600">{{ $contact->name }}</span>
            </div>
            <div class="mb-4">
                <strong class="font-medium text-gray-800">Contact:</strong>
                <span class="text-gray-600">{{ $contact->contact }}</span>
            </div>
            <div>
                <strong class="font-medium text-gray-800">Email:</strong>
                <span class="text-gray-600">{{ $contact->email ?? 'N/A' }}</span>
            </div>
        </div>

        <div class="mt-6 flex items-center gap-4">
            <a href="{{ route('contacts.edit', $contact->id) }}"
               class="inline-block px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white font-bold rounded-md shadow-md">
                Edit
            </a>
            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this contact?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="inline-block px-4 py-2 bg-red-500 hover:bg-red-700 text-white font-bold rounded-md shadow-md">
                    Delete
                </button>
            </form>
        </div>
    @else
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">Contact not found.</span>
        </div>
    @endif
</div>
@endsection