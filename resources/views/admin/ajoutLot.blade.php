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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Carte avec ombre plus douce -->
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <!-- En-tête avec dégradé de couleur -->
                <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-blue-200">
                    <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                        Nouveau lot
                    </h3>
                    <p class="text-sm text-gray-600 mt-1">Remplissez les détails du lot ci-dessous</p>
                </div>

                <!-- Formulaire avec espacement amélioré -->
                <form action="{{ route('admin.ajoutLot.store', ['criee' => $criee->idCriee]) }}" method="POST" class="p-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Groupe de champs avec style cohérent -->
                        <h4>Formulaire de lot</h4>
                        <div class="space-y-2">
                            <label for="bateau" class="block text-sm font-medium text-gray-700 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Bateau de la pêche
                            </label>
                            <select name="peches" id="peches" readonly>
                            @foreach($peches as $peche)
                            <option value="{{ $peche->datePeche }}" data-bateau-id="{{ $peche->idBateau }}">
                                Bateau: {{ $peche->bateau->nomBateau }} - 
                                Pêche du {{ $peche->datePeche }} ({{ $peche->typePeche }})
                            </option>
                            @endforeach
                            <input type="hidden" name="idBateau" id="idBateau">
                        </select>
                        </div>

                        <div class="space-y-2">
                            <label for="poidBrut" class="block text-sm font-medium text-gray-700 mb-1">
                                Poids Brut (Kg)
                            </label>
                            <input type="number" id="poidBrut" name="poidBrut" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border">
                        </div>

                         <div class="space-y-2">
                            <label for="prixPlancher" class="block text-sm font-medium text-gray-700 mb-1">
                                Prix Plancher (€)
                            </label>
                            <input type="text" id="prixPlancher" name="prixPlancher" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border">
                        </div>
                        <div class="space-y-2">
                            <label for="qualites" class="block text-sm font-medium text-gray-700 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Qualité du lot
                            </label>
                            <select name="qualites" id="qualites">
                            @foreach($qualites as $qualite)
                            <option value="{{ $qualite->idQualite}}">
                                Qualité : {{$qualite->specificationQualite}} ({{$qualite->libeleQualite}})
                            </option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="space-y-2">
                        <label for="nomCommunEspece" class="block text-sm font-medium text-gray-700 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Nom Espece 
                        </label>
                        <input list="nomCommunEspece">
                        <datalist id="nomCommunEspece">
                            @foreach ($especes as $espece)
                            <option value="{{ $espece->nomCommunEspece}}">
                            @endforeach
                        </datalist> 
                        <!-- Liste permettant la recherche d'élément -->
                        <div class="flex space-x-2">
                            <a href="#" 
                                class="inline-flex items-center px-4 py-2 rounded-md shadow-sm text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                                style="background-color: #2563eb;"
                                onmouseover="this.style.backgroundColor='#1d4ed8'" 
                                onmouseout="this.style.backgroundColor='#2563eb'">
                                Espece non trouvé ?
                            </a>
                        
                        </div>
                    </div>
                    
                    <!-- Boutons d'action avec le style bleu original -->
                    <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
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
                            Créer le lot
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script pour calcul automatique de l'heure de fin -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const heureDebut = document.getElementById('heureDebut');
            const nbLot = document.getElementById('nbLot');
            const heureFin = document.getElementById('heureFin');
            
            function calculerHeureFin() {
                if (heureDebut.value && nbLot.value) {
                    const [heures, minutes] = heureDebut.value.split(':').map(Number);
                    const dureeParLot = 5; // 5 minutes par lot (à ajuster)
                    const totalMinutes = heures * 60 + minutes + (nbLot.value * dureeParLot);
                    
                    const hFin = Math.floor(totalMinutes / 60) % 24;
                    const mFin = totalMinutes % 60;
                    
                    heureFin.value = `${String(hFin).padStart(2, '0')}:${String(mFin).padStart(2, '0')}`;
                }
            }
            
            heureDebut.addEventListener('change', calculerHeureFin);
            nbLot.addEventListener('input', calculerHeureFin);
        });
        document.addEventListener('DOMContentLoaded', function() {
            const pecheSelect = document.getElementById('peches');
            const bateauIdInput = document.getElementById('idBateau');
            
            // Met à jour lors de la sélection initiale
            updateBateauId();
            
            // Met à jour quand la sélection change
            pecheSelect.addEventListener('change', updateBateauId);
            
            function updateBateauId() {
                const selectedOption = pecheSelect.options[pecheSelect.selectedIndex];
                bateauIdInput.value = selectedOption.getAttribute('data-bateau-id');
            }
        });
    </script>
</x-staff-layout>