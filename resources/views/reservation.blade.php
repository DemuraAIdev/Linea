<x-homepage-layout>
    <div class="relative w-full overflow-hidden h-96">
        <!-- Single Slide -->
        <div class="relative h-full w-full">
            <div class="absolute inset-0" x-transition.opacity.duration.1000ms>
                <!-- Title And Description -->
                <div
                    class="absolute inset-0 z-10 flex flex-col items-start justify-end gap-2 bg-gradient-to-t from-slate-900/85 to-transparent p-9 lg:px-16 lg:py-10 md:p-9 text-left">
                    <h3 class="text-4xl font-bold text-white">{{ $spots->name }}</h3>
                </div>
                <img class="absolute w-full h-full inset-0 object-cover" src="{{ asset($spots->image) }}"
                    alt="Hotel Image" />
            </div>
        </div>
    </div>
    <div class="w-full h-fit p-10">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="grid grid-cols-2 gap-10">
                <img alt="Room 1" class="h-96 w-full object-cover" src="{{ asset($spots->image) }}">
                <div class="p-5">
                    <p class="font-semibold text-lg">{{ $spots->name }}</p>
                    <p class="font-semibold text-lg">Tipe : {{ $spots->spot_type->name }}</p>
                    <p class="text-gray-700">Rp{{ number_format($spots->price, 0, ',', '.') }}</p>
                    <label for="jumlah" class="block mt-4 text-gray-600">Jumlah orang</label>
                    <div x-data="{ jumlahOrang: 1, pricePerSpot: {{ $spots->price }}, get totalPrice() { return this.pricePerSpot * this.jumlahOrang; } }">
                        <input type="number" id="jumlah" class="w-full mt-2 p-2 border rounded"
                            x-model="jumlahOrang" min="1">
                        <p id="TotalPrice">Total Harga: Rp <span x-text="totalPrice.toLocaleString('id-ID')"></span></p>
                    </div>
                    <button
                        class="w-full mt-4 bg-gray-700 text-white px-4 py-2 rounded 
                        hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50">
                        Beli
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function calculateTotalPrice() {
            const pricePerSpot = {{ $spots->price }};
            const jumlahOrang = document.getElementById('jumlah').value;
            const totalPrice = pricePerSpot * jumlahOrang;
            document.getElementById('TotalPrice').innerText = 'Total Harga: Rp' + totalPrice.toLocaleString('id-ID');
        }
    </script>


</x-homepage-layout>
