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

    <div class="py-6">
        <!-- Conteneur principal avec la même largeur que le formulaire bateau -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <!-- En-tête avec le même style -->
                <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-blue-200">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Nouvelle Pêche
                    </h3>
                </div>

                <!-- Formulaire avec la même structure que le formulaire bateau -->
                <form action="{{ route('admin.ajoutPeches.store') }}" method="POST" class="p-6">
                    @csrf

                    <!-- Conteneur interne avec largeur similaire (max-w-3xl) -->
                    <div class="max-w-3xl mx-auto space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Champ Bateau avec le même style -->
                            <div>
                                <label for="nomBateau" class="block text-sm font-medium text-gray-700 mb-1">
                                    Bateau de la pêche
                                </label>
                                <select name="nomBateau" id="nomBateau" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border">
                                    @foreach($bateaux as $bateau)
                                        <option value="{{ $bateau->nomBateau }}">{{ $bateau->nomBateau }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Champ Date avec le même style -->
                            <div>
                                <label for="datePeche" class="block text-sm font-medium text-gray-700 mb-1">
                                    Date de la pêche
                                </label>
                                <input type="date" id="datePeche" name="datePeche" required
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border">
                            </div>
                            <div>
                                <label for="typePeche" class="block text-sm font-medium text-gray-700 mb-1">
                                    Type de pêche
                                </label>
                                <select name="typePeche" id="typePeche" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border">
                                        <option value="cotiere">Pêche cotière</option>
                                        <option value="petite">Petite pêche</option>
                                </select>
                            </div>
                        </div>

                        <!-- Boutons avec le même style et positionnement -->
                        <div class="flex justify-end space-x-3 pt-6 mt-8 border-t border-gray-200">
                            <a href="{{ route('admin.dashboard') }}" 
                               class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                Annuler
                            </a>
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 rounded-md shadow-sm text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                                    style="background-color: #2563eb;"
                                    onmouseover="this.style.backgroundColor='#1d4ed8'" 
                                    onmouseout="this.style.backgroundColor='#2563eb'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                </svg>
                                Créer la pêche
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-staff-layout>