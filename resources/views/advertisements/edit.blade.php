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
                        <x-label>{{ __('Title') }}:</x-label>
                        <x-input name="title" value="{{ old('title', $ad->title) }}" class="mb-2"></x-input>

                        <x-label>{{ __('Description') }}:</x-label>
                        <x-textarea name="description" class="mb-2">{{ $ad->description }}</x-textarea>

                        <x-label>{{ __('Phone') }}:</x-label>
                        <x-input name="phone" value="{{ old('phone', $ad->phone) }}" class="mb-2" maxlength="15"></x-input>

{{--                        @foreach($cities as $city)--}}
{{--                            {{$city->id}}--}}
{{--                        @endforeach--}}

                        <x-label>{{ __('Location') }}:</x-label>
                        <select name="location" class="mb-4">
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}"
                                        @if((int) old('location', $ad->location) === $city->id) selected @endif>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>

                        <x-label>{{ __('Image') }}:</x-label>
                        <img src="{{ asset('storage/' . $ad->image) }}" alt="image" class="w-48 h-auto mb-4">

                        <input type="file" name="image" class="mb-4"><br>

                        <x-button>{{ __('Update') }}</x-button>
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
