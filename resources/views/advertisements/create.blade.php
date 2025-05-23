<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Advertisement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <form action="{{ route('advertisements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-label>{{ __('Title') }}:</x-label>
                        <x-input name="title" class="mb-2"></x-input>

                        <x-label>{{ __('Description') }}:</x-label>
                        <x-textarea name="description" class="mb-2"></x-textarea>

                        <x-label>{{ __('Images') }}:</x-label>
                        <input type="file" name="image" multiple class="mb-4"><br>

                        <x-button>{{ __('Save') }}</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
