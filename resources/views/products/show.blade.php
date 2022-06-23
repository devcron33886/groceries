<x-app-layout>
    <main class="mx-auto pt-14 pb-24 px-4 sm:pt-16 sm:pb-32 sm:px-6 lg:max-w-7xl lg:px-8">
        <!-- Product -->
        <div class="lg:grid lg:grid-rows-1 lg:grid-cols-7 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">
            <!-- Product image -->
            <livewire:product-gallery-component :product="$product"/>

            <!-- Product details -->
            <div class="max-w-2xl mx-auto mt-14 sm:mt-16 lg:max-w-none lg:mt-0 lg:row-end-2 lg:row-span-2 lg:col-span-3">
                <div class="flex flex-col-reverse">
                    <div class="mt-4">
                        <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">{{ $product->name }}
                            </h1>


                    </div>


                </div>
                <div class="mt-10">
                    <h3 class="text-grey-900 font-semibold">{{ $product->formattedPrice() }}</h3>

                </div>
                <div class="mt-10">
                    <h3 class="text-grey-900 font-semibold">Description</h3>

                    <p class="text-gray-500 mt-6">{{ $product->description }}</p>
                </div>

                <div class="mt-10">
                    <livewire:product-selector-component :product="$product"/>
                </div>



            </div>


        </div>

        <!-- Related products -->
        <div class="max-w-2xl mx-auto mt-24 sm:mt-32 lg:max-w-none">
            <div class="flex items-center justify-between space-x-4">
                <h2 class="text-lg font-medium text-gray-900">Customers also viewed</h2>
                <a href="#"
                    class="whitespace-nowrap text-sm font-medium text-indigo-600 hover:text-indigo-500">View all<span
                        aria-hidden="true"> &rarr;</span></a>
            </div>
            <div class="mt-6 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
                <div class="relative group">
                    <div class="aspect-w-4 aspect-h-3 rounded-lg overflow-hidden bg-gray-100">
                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-05-related-product-01.jpg"
                            alt="Payment application dashboard screenshot with transaction table, financial highlights, and main clients on colorful purple background."
                            class="object-center object-cover">
                        <div class="flex items-end opacity-0 p-4 group-hover:opacity-100" aria-hidden="true">
                            <div
                                class="w-full bg-white bg-opacity-75 backdrop-filter backdrop-blur py-2 px-4 rounded-md text-sm font-medium text-gray-900 text-center">
                                View Product
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between text-base font-medium text-gray-900 space-x-8">
                        <h3>
                            <a href="#">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                Fusion
                            </a>
                        </h3>
                        <p>$49</p>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">UI Kit</p>
                </div>

                <!-- More products... -->
            </div>
        </div>
    </main>

</x-app-layout>
