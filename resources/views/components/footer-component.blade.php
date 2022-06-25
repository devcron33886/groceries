<footer aria-labelledby="footer-heading" class="bg-white border-t border-gray-200">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-20">
            <div class="grid grid-cols-1 md:grid-cols-12 md:grid-flow-col md:gap-x-8 md:gap-y-16 md:auto-rows-min">
                <!-- Image section -->
                <div class="col-span-1 md:col-span-2 lg:row-start-1 lg:col-start-1">
                    <x-application-logo/>
                </div>

                <!-- Sitemap sections -->
                <div
                    class="mt-10 col-span-6 grid grid-cols-2 gap-8 sm:grid-cols-3 md:mt-0 md:row-start-1 md:col-start-3 md:col-span-8 lg:col-start-2 lg:col-span-6">
                    <div class="grid grid-cols-1 gap-y-12 sm:col-span-2 sm:grid-cols-2 sm:gap-x-8">
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Products</h3>
                            <ul role="list" class="mt-6 space-y-6">
                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Bags </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Tees </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Objects
                                    </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Home
                                        Goods </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600">
                                        Accessories </a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Company</h3>
                            <ul role="list" class="mt-6 space-y-6">
                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Who we
                                        are </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600">
                                        Sustainability </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Press
                                    </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Careers
                                    </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Terms
                                        &amp;
                                        Conditions </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Privacy
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">Customer Service</h3>
                        <ul role="list" class="mt-6 space-y-6">
                            <li class="text-sm">
                                <a href="#" class="text-gray-500 hover:text-gray-600"> Contact </a>
                            </li>

                            <li class="text-sm">
                                <a href="#" class="text-gray-500 hover:text-gray-600"> Shipping </a>
                            </li>

                            <li class="text-sm">
                                <a href="#" class="text-gray-500 hover:text-gray-600"> Returns </a>
                            </li>

                            <li class="text-sm">
                                <a href="#" class="text-gray-500 hover:text-gray-600"> Warranty </a>
                            </li>

                            <li class="text-sm">
                                <a href="#" class="text-gray-500 hover:text-gray-600"> Secure
                                    Payments </a>
                            </li>

                            <li class="text-sm">
                                <a href="#" class="text-gray-500 hover:text-gray-600"> FAQ </a>
                            </li>

                            <li class="text-sm">
                                <a href="#" class="text-gray-500 hover:text-gray-600"> Find a store
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <div class="border-t border-gray-100 py-10 text-center">
            <p class="text-gray-900">&copy; {{ date('Y') }} {{ config('app.name') }}, Ltd. All rights reserved.</p>
        </div>
    </div>
</footer>
