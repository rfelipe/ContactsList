@extends('layouts.app')
@section('title', 'Adicionar Novo Contato')
@section('content')
<header class="py-10 text-center">
    <h1 class="text-3xl font-bold text-gray-800">Adicionar Novo Contato</h1>
    <a href="{{ route('contacts.index') }}"
       class="inline-block mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md shadow-md">
        < Back to Contacts List
    </a>
</header>

<div class="max-w-7xl mx-auto px-4 py-6">

    <form action="{{ route('contacts.store') }}" method="POST"
          class="bg-white shadow rounded-md p-6">
        @csrf

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops! Algo deu errado:</strong>
                <ul class="list-disc ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   required>
        </div>

        <div class="mb-4">
            <label for="contact" class="block text-gray-700 text-sm font-bold mb-2">Contact:</label>
            <input type="text" id="contact" name="contact" value="{{ old('contact') }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   required>
        </div>

        <div class="mb-6">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Save Contact
            </button>
            <a href="{{ route('contacts.index') }}"
               class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection