<?php header("Refresh: 5"); ?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
  
    <!-- Contenu principal -->
    <main>
      
  {{-- PAGE D'ACCUEIL DE L'ACHETEUR --}}
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
                        <p class="text-sm text-gray-600 mt-1">Liste des criées programmées</p>
                    </div>
                </div>
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Erreur :</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                <!-- Section Prochaine Criée -->
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        Prochaine Criée
                    </h3>
                    
                    @if($prochaineCriee)
                        <div class="overflow-x-auto rounded-lg border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numéro</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" >Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Heure Début</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Heure Fin</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $prochaineCriee->idCriee }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" id="dateDebut" data-date="{{ $prochaineCriee->dateCriee->format('Y-m-d') }}">{{ \Carbon\Carbon::parse($prochaineCriee->dateCriee)->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" id="heureDebut" name="heureDebut">{{ $prochaineCriee->heureDebut }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" id="heureFin" name="heureFin">{{ $prochaineCriee->heureFin }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('acheteur.lot_acheteur', ['criee' => $prochaineCriee->idCriee]) }}" 
                                                    class="inline-flex items-center px-4 py-2 rounded-md shadow-sm text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                                                    style="background-color: #2563eb;"
                                                    onmouseover="this.style.backgroundColor='#1d4ed8'" 
                                                    onmouseout="this.style.backgroundColor='#2563eb'" id="boutonRedir">
                                                    Entrer dans l'enchère
                                                </a>
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
  
                <!-- Section Liste des Criées -->
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Liste des Criées à Venir
                    </h3>
                    
                    @if($criees && $criees->count() > 0)
                        <div class="overflow-x-auto rounded-lg border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numéro</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Heure Début</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Heure Fin</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($criees as $criee)
                                        <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $criee->idCriee }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($criee->dateCriee)->format('d/m/Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 heureDebutListe" name="heureDebut">
                                                {{ \Carbon\Carbon::parse($criee->heureDebut)->format('H:i:s') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 heureFinListe" name="heureFin">
                                                {{ \Carbon\Carbon::parse($criee->heureFin)->format('H:i:s') }}
                                            </td>
                                     
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8 bg-gray-50 rounded-lg border border-gray-200">
                            <h4 class="mt-2 text-sm font-medium text-gray-700">Aucune criée à venir</h4>
                            <p class="mt-1 text-sm text-gray-500">Créez une nouvelle criée pour commencer</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
  
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateDebutElem = document.getElementById('dateDebut');
            const heureDebutElem = document.getElementById('heureDebut');
            const heureFinElem = document.getElementById('heureFin');
            const button = document.getElementById('boutonRedir');

            if (dateDebutElem && heureDebutElem && heureFinElem && button) {
                // Utiliser l'attribut data-date (format YYYY-MM-DD)
                const dateDebut = dateDebutElem.dataset.date;
                const heureDebut = heureDebutElem.innerText.trim();
                const heureFin = heureFinElem.innerText.trim();


                const dateDebutTime = new Date(`${dateDebut}T${heureDebut}`);
                const dateFinTime = new Date(`${dateDebut}T${heureFin}`);
                const maintenant = new Date();

          

                if (isNaN(dateDebutTime.getTime()) || isNaN(dateFinTime.getTime())) {
                    alert('Erreur de parsing de la date ou de l\'heure. Vérifiez le format.');
                    return;
                }

                // Calcul de la date d'ouverture (10 minutes avant le début)
                const ouvertureTime = new Date(dateDebutTime.getTime() - 10 * 60 * 1000);
                console.log('ouvertureTime:', ouvertureTime);

                if (maintenant < ouvertureTime || maintenant > dateFinTime) {
                    button.setAttribute('disabled', 'disabled');
                    button.classList.add('pointer-events-none', 'opacity-50');
                    button.href = "javascript:void(0);";
                } else {
                    button.removeAttribute('disabled');
                    button.classList.remove('pointer-events-none', 'opacity-50');
                    // Le href est déjà correct dans le HTML
                }
            }
        });
    </script>
    
  </x-app-layout>