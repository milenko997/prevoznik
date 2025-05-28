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

                        <x-label>{{ __('Phone') }}:</x-label>
                        <x-input name="phone" class="mb-2" maxlength="15"></x-input>

                        <x-label>{{ __('Image') }}:</x-label>
                        <input type="file" name="image" class="mb-4"><br>

                        <x-button>{{ __('Save') }}</x-button>
                    </form>

                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-3 mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
