<x-app-layout>
    @if(!auth()->check())
        <div id="notification" class="bg-red-500 text-white px-4 py-2 mb-4 relative">
            You are disconnected.
            <button onclick="closeNotification()" class="absolute top-1 right-4 text-white hover:text-red-800">
                ×
            </button>
        </div>
    @endif

        @foreach ($vehicles as $vehicle)
            <div>
                <h2>{{ $vehicle->brand }} {{ $vehicle->model }}</h2>
                <!-- ... autres détails du véhicule ... -->
            </div>
        @endforeach


        <script>
        function closeNotification() {
            document.getElementById('notification').style.display = 'none';
        }
    </script>
</x-app-layout>
