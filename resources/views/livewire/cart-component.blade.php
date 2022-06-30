<main class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">

    @if (!$basket->isEmpty())
        <div class="mt-12  lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16">
            <section aria-labelledby="cart-heading" class="lg:col-span-7 bg-gray-50 shadow-sm rounded-lg">
                <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>
                <div role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                    @foreach($basket->contents() as $variation)
                        <livewire:cart-item-component :variation="$variation" :key="$variation->id"/>
                    @endforeach

                </div>
            </section>

            <!-- LatestProductScope summary -->
            <section aria-labelledby="summary-heading"
                     class="mt-16 bg-gray-50 rounded-lg px-4 py-6 sm:p-6 lg:p-8 lg:mt-0 lg:col-span-5">
                <h2 id="summary-heading" class="text-lg font-medium text-gray-900">Order summary</h2>

                <dl class="mt-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <dt class="text-sm text-gray-600">Subtotal</dt>
                        <dd class="text-sm font-medium text-gray-900"> {{ $basket->formattedSubtotal() }}</dd>
                    </div>
                </dl>

                <div class="mt-6">
                    <a href="{{ route('shop.checkout') }}"
                            class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
                        Checkout
                    </a>
                </div>
            </section>
        </div>
    @else
        <div class="p-6 mt-4 bg-white shadow-md rounded-lg border-b border-gray-200">
            Your cart is empty!
        </div>

    @endif

    <!-- Related products -->
    <section aria-labelledby="related-heading" class="mt-24">
        <h2 id="related-heading" class="text-lg font-medium text-gray-900">You may also like&hellip;</h2>

        <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            <div class="group relative">
                <div
                    class="w-full min-h-80 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                    <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-related-product-01.jpg"
                         alt="Front of Billfold Wallet in natural leather."
                         class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-gray-700">
                            <a href="#">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                Billfold Wallet
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">Natural</p>
                    </div>
                    <p class="text-sm font-medium text-gray-900">$118</p>
                </div>
            </div>

            <!-- More products... -->
        </div>
    </section>
</main>
