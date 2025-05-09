{{-- Pour rafraichir la page  --}}
{{header("Refresh: 5");}} 

<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
  
    <!-- Contenu principal -->
    <main>
        <input type="text" value="{{ $idAcheteur }}" hidden> {{-- ID de l'acheteur connecté --}}

      <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Carte principale avec ombre douce -->
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <!-- En-tête avec bouton d'action -->
                <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-blue-200 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Les criées
                        </h3>
                        <p class="text-sm text-gray-600 mt-1">Liste des lots</p>
                    </div>
                </div>
  
                <!-- Section Prochaine Criée -->
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        Lot en cours
                    </h3>

                    @if($prochaineCriee)
                    <input type="text" name="idLot" id="idLot" value = "{{ $lot->idLot }}" hidden>
                    <input type="date" name="datePeche" id="datePeche" value = "{{ $lot->datePeche }}" hidden>
                    <input type="text" name="idBateau" id="idBateau" value = "{{ $lot->idBateau }}" hidden>
                        <div class="overflow-x-auto rounded-lg border border-gray-200">
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
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix actuel</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Votre prix</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $lot->idLot }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($lot->datePeche)->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $lot->prixDepart.'€' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $lot->poidsBrutLot.'kg' }}</td> 
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $lot->taille->specification ?? '—'  }}</td> {{-- idTaille --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $lot->qualite->libeleQualite ?? '—'  }}</td> {{-- idQualite --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $lot->espece->nomCommunEspece ?? '—'  }}</td> {{-- idEspece --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $lot->prixActuel }} €</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"> {{-- Bouton --}}
                                        
                                        <div class="flex space-x-2">
                                            <form action="{{ route('encherir.store') }}" method="POST">
                                                @csrf
                                                {{-- Valeurs hidden --}}
                                                <input type="hidden" name="idBateau" value="{{ $lot->idBateau }}">
                                                <input type="hidden" name="datePeche" value="{{ $lot->datePeche }}">
                                                <input type="hidden" name="idLot" value="{{ $lot->idLot }}">
                                                <input type="hidden" name="idAcheteur" value="{{ auth()->user()->idAcheteur }}">

                                                <input type="number" name="prixEnchere" min="{{ $lot->prixActuel + 1 }}" style="width: 50%;" required>
                                            
                                                <button type="submit"
                                                    class="inline-flex items-center px-4 py-2 rounded-md shadow-sm text-sm font-medium text-white"
                                                    style="background-color: #2563eb;"
                                                    onmouseover="this.style.backgroundColor='#1d4ed8'"
                                                    onmouseout="this.style.backgroundColor='#2563eb'">
                                                    Enchérir
                                                </button>
                                            </form>
                                        </div>
                                        </td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8 bg-gray-50 rounded-lg border border-gray-200">
                            
                            <h4 class="mt-2 text-sm font-medium text-gray-700">Aucune criée programmée</h4>
                            <p class="mt-1 text-sm text-gray-500">Commencez par créer une nouvelle criée</p>
                        </div>
                    @endif
                </div>    
            </div>
        </div>
    </div>
  
    </main>
    
  </x-app-layout>