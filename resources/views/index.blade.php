<x-homepage-layout>

    <div x-data="{
        autoplayIntervalTime: 4000,
        slides: [{
                imgSrc: '/assets/img/hero.jpg',
                imgAlt: 'Hotel 1 Carausel.',
            },
            {
                imgSrc: '/assets/img/grand.jpg',
                imgAlt: 'Hotel 2 Carausel.',
            },
            {
                imgSrc: '/assets/img/novotel.jpg',
                imgAlt: 'Hotel 3 Carausel.',
            },
        ],
        currentSlideIndex: 1,
        isPaused: false,
        autoplayInterval: 10000,
        previous() {
            if (this.currentSlideIndex > 1) {
                this.currentSlideIndex = this.currentSlideIndex - 1
            } else {
                this.currentSlideIndex = this.slides.length
            }
        },
        next() {
            if (this.currentSlideIndex < this.slides.length) {
                this.currentSlideIndex = this.currentSlideIndex + 1
            } else {
                this.currentSlideIndex = 1
            }
        },
        autoplay() {
            this.autoplayInterval = setInterval(() => {
                if (!this.isPaused) {
                    this.next()
                }
            }, this.autoplayIntervalTime)
        },
        setAutoplayInterval(newIntervalTime) {
            clearInterval(this.autoplayInterval)
            this.autoplayIntervalTime = newIntervalTime
            this.autoplay()
        },
    }" x-init="autoplay" class="relative w-full overflow-hidden h-96">

        <!-- Slides -->
        <div class="relative h-full w-full">
            <template x-for="(slide, index) in slides">
                <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0"
                    x-transition.opacity.duration.1000ms>

                    <!-- Title And Description -->
                    <div
                        class="absolute inset-0 z-10 flex flex-col items-start justify-end gap-2 bg-gradient-to-t from-slate-900/85 to-transparent p-9 lg:px-16 lg:py-10 md:p-9  text-left">
                        <h3 class="text-4xl font-bold text-white">Welcome to Linea</h3>
                        <p class="text-lg text-slate-300">Your perfect gateway to a relaxing vacation.
                        </p>
                    </div>

                    <img class="absolute w-full h-full inset-0 object-cover" x-bind:src="slide.imgSrc"
                        x-bind:alt="slide.imgAlt" />
                </div>
            </template>
        </div>
    </div>

    <section class="py-10">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-1">Our Spots</h2>
            @if (isset($search))
                <p class="text-center mb-6">Search results for <b>{{ $search }}</b></p>
            @endif
            <form method="GET" action="/">
                <div class="flex w-full flex-col gap-1">
                    <input id="textInputDefault" type="text"
                        class="w-full mb-5 rounded-xl border border-slate-300 bg-slate-100 px-2 py-2 text-sm focus-visible:outline-blue-700 disabled:cursor-not-allowed disabled:opacity-75 dark:focus-visible:outline-blue-600"
                        name="search" placeholder="Enter your search query" value="{{ $search ?? '' }}"
                        autocomplete="search" />
                </div>
            </form>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($spots as $spot)
                    <div class="group bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="relative h-48 w-full overflow-hidden">
                            <img src="{{ asset($spot->image) }}" alt="Room 1"
                                class="object-cover transition duration-700 ease-out group-hover:scale-105">
                            <div
                                class="absolute top-0 right-0 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-bl-lg">
                                {{ $spot->spot_type->name }}
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-lg">{{ $spot->name }}</h3>
                            <p class="text-gray-600">A spacious room with a beautiful view.</p>
                            <span
                                class="block text-blue-500 font-bold mt-2">Rp{{ number_format($spot->price, 2, ',', '.') }}</span>
                            <form method="POST" action="{{ route('reservation') }}">
                                @csrf
                                <input type="text" name="coshen" id="coshen" value="{{ $spot->id }}" hidden>
                                <button
                                    class="mt-4 bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50">Book
                                    Now</button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

</x-homepage-layout>
