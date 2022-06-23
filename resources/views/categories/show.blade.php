<x-app-layout>
    <x-slot name="header" class="border-b border-gray-200">
        <div class="space-x-1">
            @foreach ($category->ancestors->reverse() as $ancestor)
                <a href="/categories/{{ $ancestor->slug }}" class="text-indigo-500">
                    {{ $ancestor->name }}
                </a>
                <span class="font-bold text-gray-300 last:hidden">/</span>
            @endforeach
        </div>
        <h2 class="mt1 font-semi-bold text-xl text-gray-700 leading-tight">
            {{ $category->name }}
        </h2>
    </x-slot>

    <livewire:product-browser-component :category="$category"/>

</x-app-layout>
