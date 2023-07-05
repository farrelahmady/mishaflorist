@section('title')
    Home
@endsection

<div class="">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <!-- Swiper -->
    <div class=""></div>
    <section id="hero" class=" h-screen w-full overflow-hidden flex items-center">
        <div id="hero-swiper" class="swiper w-full lg:h-2/3">
            <div class="swiper-wrapper ">
                <div class="swiper-slide ">
                    <div
                        class="w-full aspect-square  flex justify-around flex-col items-center bg-hero-slide-1 bg-cover bg-center lg:h-full">
                        <div>
                            <h2 class="text-white slider-title tracking-[0.2em]">
                                {{ config('app.name') }}
                            </h2>
                        </div>
                        <button
                            class="px-8 py-3 rounded-sm uppercase font-thin border-white text-white border mt-8  hover:bg-white border-transparent hover:text-black transition-colors ease-in-out duration-500 md:text-2xl md:px-12 md:py-4 lg:text-xl">Shop
                            Now</button>
                    </div>
                </div>
                <div class="swiper-slide ">
                    <div class="relative w-full aspect-square bg-hero-slide-2 bg-cover bg-center lg:h-full">

                        <div class="h-full flex justify-center flex-col items-center lg:translate-x-[2%]">
                            <div class="text-black">
                                <h2 class="slider-title">
                                    {{ config('app.name') }}
                                </h2>
                                <h4 class="slider-desc">
                                    Hadir Untuk Nusantara</h4>
                            </div>
                            <button
                                class="px-8 py-3 rounded-sm uppercase font-thin bg-stone-800  text-white border mt-8  hover:opacity-75 transition-opacity ease-in-out duration-500 md:text-2xl md:px-12 md:py-4 lg:text-xl">Shop
                                Now</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide ">
                    <div
                        class="w-full aspect-square flex justify-around flex-col items-center bg-hero-slide-3 bg-cover bg-center lg:h-full lg:items-end">

                        <div
                            class="h-full flex justify-around flex-col items-center lg:h-fit  lg:-translate-y-1/2 lg:-translate-x-1/2">
                            <div class="text-white">
                                <h2 class="slider-title">
                                    {{ config('app.name') }}
                                </h2>
                                <h4 class="slider-desc">
                                    Semua harga terjangkau</h4>
                            </div>

                            <button
                                class="px-8 py-3 rounded-sm uppercase font-thin border-white text-white border mt-8  hover:bg-white border-transparent hover:text-black transition-colors ease-in-out duration-500 md:text-2xl md:px-12 md:py-4 lg:text-xl">Shop
                                Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="hero-swiper-next" class="swiper-nav right-0 mr-4 md:mr-8 ">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            <div id="hero-swiper-prev" class="swiper-nav left-0 ml-4 md:ml-8 ">
                <i class="fa-solid fa-chevron-left"></i>
            </div>

        </div>

    </section>

    <section id="about" class="w-full overflow-hidden flex items-stretch  gap-8  lg:px-20 lg:py-16">
        <div id="about-content"
            class="flex flex-col items-center justify-center gap-5 flex-1 bg-teal-500 bg-opacity-20 lg:px-52">
            <h2 class="w-full text-left text-3xl leading-normal tracking-widest uppercase font-bold flex1 ">
                {{ config('app.name') }}
            </h2>
            <div id="about-paragraph" class="flex flex-col gap-5">
                <p class="text-base font-light">
                    {{ config('app.name') }} bergerak dalam bidang usaha karangan bunga.<br />Tersedia berbagai karangan
                    bunga
                    diantaranya, bunga papan yang terdiri dari bunga papan wedding/pernikahan, bunga papan duka cita,
                    bunga papan ulang tahun, dll
                </p>
                <p class="text-base font-light">
                    Dengan harga relative terjangkau dan pengiriman yang super cepat “same day” hari dimana paskah
                    memesan akan kami antar langsung ketempat tujuan.
                </p>
                <p class="text-base font-light">
                    {{ config('app.name') }} bertempatan di Depok dan sekitarnya akan memberikan pengalaman kepada anda
                    semua
                    dalam
                    membeli karangan bunga dari berbagai kebutuhan anda.
                </p>
                <p class="text-base font-light">
                    Kami juga menyedikan bunga krans, bunga meja, bunga artificial, bunga buket, bunga standing atau
                    standing flowers, serta bunga lainnya yang dapat di pesan secara online.
                </p>
                <p class="text-base font-light">
                    Sampaikan pesan serta perasaan anda curahkanlah perhatian anda kepada teman kerabat, rekan atau
                    atasan anda dengan koleksi bunga dari {{ config('app.name') }} yang akan memberikan kesan tersendiri
                    terhadap
                    si penerima, dengan pengiriman super cepat sehingga mereka akan selalu mengingat anda akan perhatian
                    selama ini.
                </p>
                <p class="text-base font-light">{{ config('app.name') }} hadir untuk nusantara, siap untuk hampir
                    seluruh
                    wilayah
                    Indonesia.
                </p>
            </div>
        </div>

        <div id="about-image" class="h-full w-1/3">
            <img src="{{ asset('images/bg-about.webp') }}" alt="" class="h-full">
        </div>
    </section>

    @vite('resources/js/home.js')
</div>
