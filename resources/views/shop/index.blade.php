<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl max-auto sm:px-6 lg:px-8 grid grid-cols-6 gap-4">

            <div class="col-span-5 sm:px-6 lg:px-8">
                <div class="mb-6">
                    Found {{ $products->count() }} {{ Str::plural('product', $products->count()) }}
                </div>
                <div class="overflow-hiden sm:rounded-lg grid lg:grid-cols-3 md:cols-2 gap-4">
                    @foreach ($products as $product)
                        <a href="{{ route('product-show', $product->slug) }}"
                            class="p-6 bg-white border-b border-gray-200 space-y-4">
                            <img src="{{ $product->getFirstMediaUrl() }}" class="w-full">
                            <div class="space-y-1">
                                <div>{{ $product->name }}</div>
                                <div class="font-semibold text-lg">
                                    {{ $product->formattedPrice() }}
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
