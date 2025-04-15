<x-staff-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Création de lot') }}
            </h2>
            <div class="text-sm breadcrumbs">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}" class="text-blue-600">Dashboard</a></li> 
                    <li><span class="text-gray-500">/ Création lot</span></li>
                </ul>
            </div>
        </div>
    </x-slot>
    <form action="{{ route('admin.ajoutPeche.store') }}" method="POST" class="p-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Groupe de champs avec style cohérent -->
            <h4>Formulaire de Pêche</h4>
            <div class="space-y-2">
                <label for="bateau" class="block text-sm font-medium text-gray-700 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Bateau de la pêche
                </label>
                <select name="bateau" id="bateau">
                @foreach($bateaux as $bateau)
                    <option value="{{ $bateau->nomBateau }}">{{ $bateau->nomBateau }}</option>
                @endforeach
            </select>
            </div>

            <div class="space-y-2">
                <label for="datePeche" class="block text-sm font-medium text-gray-700 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Date de la pêche
                </label>
                <input type="date" id="datePeche" name="datePeche" required
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out py-2 px-3 border">
            </div>
        </div>
    </form>
</x-staff-layout>