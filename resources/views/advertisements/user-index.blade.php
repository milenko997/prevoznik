<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Advertisements') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <x-button href="/advertisements/create" class="mb-4">{{ __('Add Advertisement') }}</x-button>

                    @if($ads->isEmpty())
                        <h2>{{ __('You do not have any Advertisements') }}</h2>
                    @else
                        @foreach($ads as $ad)
                            <div class="border p-4 mb-4 rounded shadow d-flex justify-content-between align-items-center">
                                <div class="">
                                    <h2 class="text-xl font-semibold">{{ $ad->title }}</h2>
                                    <p class="text-gray-700 mb-2">{{ $ad->description }}</p>

                                    <p class="text-gray-700 mb-2">{{ $ad->phone }}</p>

                                    @if($ad->image)
                                        <img src="{{ asset('storage/' . $ad->image) }}" alt="image" class="w-48 h-auto">
                                    @endif

                                    @if ($ad->created_at != $ad->updated_at)
                                        <p class="text-sm text-gray-500 mt-2">Updated: {{ $ad->updated_at->format('d.m.Y') }}</p>
                                    @else
                                        <p class="text-sm text-gray-500 mt-2">Posted: {{ $ad->created_at->format('d.m.Y') }}</p>
                                    @endif
                                </div>
                                <div class="flex">
                                    <x-button href="{{ route('advertisements.edit', $ad->slug) }}" >{{ __('EDIT') }}</x-button>

                                    <form action="{{ route('advertisements.destroy', $ad->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <x-button class="bg-danger">{{ __('DELETE') }}</x-button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
