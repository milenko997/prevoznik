<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Advertisement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <form action="{{ route('advertisements.update', $ad->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-label>Title:</x-label>
                        <x-input name="title" value="{{ old('title', $ad->title) }}" class="mb-2"></x-input>

                        <x-label>Description:</x-label>
                        <x-textarea name="description" class="mb-2">{{ $ad->description }}</x-textarea>

                        <x-label>Image:</x-label>
                        <img src="{{ asset('storage/' . $ad->image) }}" alt="image" class="w-48 h-auto mb-4">

                        <input type="file" name="image" class="mb-4"><br>

                        <x-button>Update</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
