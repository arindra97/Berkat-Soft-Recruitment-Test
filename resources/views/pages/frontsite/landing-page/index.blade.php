@extends('layouts.default')

@section('title', 'Home')

@section('content')

<!-- Content -->
<main class="min-h-screen">

    <!-- Best Product -->
    <section class="mt-4 lg:mt-16">
        <div class="mx-auto max-w-7xl px-4 lg:px-14 py-14">
            <h3 class="text-[#1E2B4F] text-2xl font-semibold">Product</h3>
            <p class="text-[#A7B0B5] mt-2">Find product</p>

            <!-- Card -->
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12 lg:gap-10 mt-10">

                @forelse($product as $key => $product_item)

                <a href="{{ route('index', $product_item->id) }}" class="group">
                    <div class="relative z-10 w-full h-[350px] rounded-2xl overflow-hidden">
                        <img src="{{ url(Storage::url($product_item->photo)) }}" class="w-full h-full bg-center bg-no-repeat object-cover object-center" alt="{{ $doctor_item->name ?? '' }}">
                        <div class="opacity-0 group-hover:opacity-100 transition-all ease-in absolute inset-0 bg-[#0D63F3] bg-opacity-70 flex justify-center items-center">
                            <span class="text-[#0D63F3] font-medium bg-white rounded-full px-8 py-3">Buy Now</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-5">
                        <div>
                            <div class="text-[#1E2B4F] text-lg font-semibold">{{ $product_item->name ?? '' }}</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <img src="{{ asset('/assets/frontsite/images/star.svg') }}" alt="Star">
                            <span class="block text-[#1E2B4F] font-medium">4.5</span>
                        </div>
                    </div>
                </a>

                @empty

                {{-- empty --}}

                @endforelse

            </div>
            <!-- End Card -->
        </div>
    </section>
    <!-- End Best Product -->

</main>
<!-- End Content -->

@endsection