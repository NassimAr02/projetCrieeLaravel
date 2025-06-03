{{-- filepath: c:\mondossier\www\projetCriee\projetCrieeLaravel\resources\views\acheteur\panier.blade.php --}}
<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <main>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-blue-200 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2 2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Le panier
                        </h3>
                        <p class="text-sm text-gray-600 mt-1">Liste des lots dans le panier</p>
                    </div>
                </div>
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        Panier de l'acheteur
                    </h3>
                    @if($prochainLot)
                        <div class="overflow-x-auto rounded-lg border border-gray-200 mb-4">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numéro</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de la pêche</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix de départ</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poids</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Taille</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qualité</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Espèce</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix Gagnant</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $prochainLot->idLot }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($prochainLot->datePeche)->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $prochainLot->prixDepart.'€' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $prochainLot->poidsBrutLot.'kg' }}</td> 
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $prochainLot->taille->specification ?? '—'  }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $prochainLot->qualite->libeleQualite ?? '—'  }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $prochainLot->espece->nomCommunEspece ?? '—'  }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $prochainLot->prixEnchereMax }} €</td>   
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <form action="{{ route('acheteur.reglerPanier') }}" method="POST">
                            @csrf
                            <label for="libele" class="block text-sm font-medium text-gray-700">Préparation du lot :</label>
                            <select name="libele" id="libele"
                                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                <option value="entier">Entier</option>
                                <option value="nettoye">Nettoyé</option>
                                <option value="vide">Vidé</option>
                            </select>
                            <input type="hidden" name="idAcheteur" value="{{ $id }}">
                            <input type="hidden" name="idBateau" value="{{ $prochainLot->idBateau }}">
                            <input type="hidden" name="datePeche" value="{{ $prochainLot->datePeche }}">
                            <input type="hidden" name="idLot" value="{{ $prochainLot->idLot }}">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 rounded-md shadow-sm text-sm font-medium text-white"
                                style="background-color: #2563eb;"
                                onmouseover="this.style.backgroundColor='#1d4ed8'"
                                onmouseout="this.style.backgroundColor='#2563eb'">
                                Valider la présentation
                            </button>
                        </form>
                    @else
                        <p class="text-gray-500">Aucun lot à compléter dans le panier.</p>
                    @endif
                </div>    
            </div>
        </div>
    </div>
    </main>
</x-app-layout>