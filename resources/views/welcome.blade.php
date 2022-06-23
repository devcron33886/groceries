<x-app-layout>
    <div class="relative bg-gray-900">
        <!-- Decorative image and overlay -->
        <div aria-hidden="true" class="absolute inset-0 overflow-hidden">
            <img src="{{ asset('images/Sliders/1.jpg') }}" alt=""
                class="w-full h-full object-center object-cover">
        </div>
        <div aria-hidden="true" class="absolute inset-0 bg-gray-900 opacity-50"></div>


        <div class="relative max-w-3xl mx-auto py-32 px-6 flex flex-col items-center text-center sm:py-64 lg:px-0">
            <h1 class="text-4xl font-extrabold tracking-tight text-white lg:text-6xl">Welcome to Garden of Eden Rwanda
            </h1>
            <p class="mt-4 text-xl text-white">We are here to serve you the best fresh groceries.</p>
            <a href="{{ route('shop') }}"
                class="mt-8 inline-block bg-white border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-900 hover:bg-gray-100">Shop
                New Arrivals
            </a>
        </div>
    </div>
    <main>
        <section aria-labelledby="category-heading" class="pt-24 sm:pt-32 xl:max-w-7xl xl:mx-auto xl:px-8">
            <div class="px-4 sm:px-6 sm:flex sm:items-center sm:justify-between lg:px-8 xl:px-0">
                <h2 id="category-heading" class="text-2xl font-extrabold tracking-tight text-gray-900">Shop by Category
                </h2>

            </div>

            <div class="mt-4 flow-root">
                <div class="-my-2">
                    <div class="box-content py-2 relative h-80 overflow-x-auto xl:overflow-visible">
                        <div
                            class="absolute min-w-screen-xl px-4 flex space-x-8 sm:px-6 lg:px-8 xl:relative xl:px-0 xl:space-x-0 xl:grid xl:grid-cols-5 xl:gap-x-8">
                            @foreach ($categories as $category)
                                <a href="{{ route('category-show',$category->slug) }}"
                                    class="relative w-56 h-80 rounded-lg p-6 flex flex-col overflow-hidden hover:opacity-75 xl:w-auto">
                                    <span aria-hidden="true" class="absolute inset-0">
                                        <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-category-01.jpg"
                                            alt="" class="w-full h-full object-center object-cover">
                                    </span>
                                    <span aria-hidden="true"
                                        class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                                    <span
                                        class="relative mt-auto text-center text-xl font-bold text-white">{{ $category->name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 px-4">
                {{ $categories->links() }}
            </div>
        </section>
        <!-- Featured section -->
        <section aria-labelledby="social-impact-heading" class="max-w-7xl mx-auto pt-24 px-4 sm:pt-32 sm:px-6 lg:px-8">
            <div class="relative rounded-lg overflow-hidden">
                <div class="absolute inset-0">
                    <img src="{{ asset('images/Sliders/g14.jpg') }}"
                        alt="" class="w-full h-full object-center object-cover">
                </div>
                <div class="relative bg-gray-900 bg-opacity-75 py-32 px-6 sm:py-40 sm:px-12 lg:px-16">
                    <div class="relative max-w-3xl mx-auto flex flex-col items-center text-center">
                        <h2 id="social-impact-heading"
                            class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                            <span class="block sm:inline">About us</span>

                        </h2>
                        <p class="mt-3 text-xl text-white">GARDEN OF EDEN PRODUCE is a Rwandan company which organically grows and deliver variety of fresh groceries (fruits, vegetables and herbs) mostly those which were unavailable on Rwandan market before. And mainly we focus on veggies, fruits and herbs with tremendous healthy benefits. By experience gained from our father who was in this business 26 years the quality of our groceries is guaranteed.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>


</x-app-layout>
