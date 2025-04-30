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
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID ACHETEUR TEST</th> {{-- Supprimer --}}
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
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ '0€' }}</td> 
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"> {{-- Bouton --}}
                                            <div class="flex space-x-2">
                                                <input type="number" name="prixEnchere" id="prixEnchere" min="{{ $lot->prixDepart }}"> {{-- Changer le prix min --}}
                                                <a href="{{ route('admin.ajoutLot.create', ['criee' => $prochaineCriee->idCriee]) }}" 
                                                    class="inline-flex items-center px-4 py-2 rounded-md shadow-sm text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                                                    style="background-color: #2563eb;"
                                                    onmouseover="this.style.backgroundColor='#1d4ed8'" 
                                                    onmouseout="this.style.backgroundColor='#2563eb'">
                                                    Enchérir 
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
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $criee->heureDebut }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $criee->heureFin }}</td>
                                        
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
        document.addEventListener("DOMContentLoaded", function() {
            // Éléments du DOM
            const btnEncherir = document.getElementById('btn-encherir');
            const prixEnchereInput = document.getElementById('prixEnchere');
            const prixActuelElement = document.getElementById('prix-actuel');
            
            // Données cachées
            const idAcheteur = document.getElementById('idAcheteur').value;
            const idBateau = document.getElementById('idBateau').value;
            const datePeche = document.getElementById('datePeche').value;
            const idLot = document.getElementById('idLot').value;
            const prixDepart = parseFloat("{{ $lot->prixDepart }}");
    
            // Configuration initiale
            let prixMinimum = prixDepart;
            let eventSource = null;
    
            // Fonction pour afficher les notifications
            function showNotification(message, isSuccess = true) {
                const notification = document.createElement('div');
                notification.className = `fixed top-4 right-4 px-4 py-2 rounded shadow-lg text-white ${
                    isSuccess ? 'bg-green-500' : 'bg-red-500'
                }`;
                notification.textContent = message;
                document.body.appendChild(notification);
                
                setTimeout(() => {
                    notification.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                    setTimeout(() => notification.remove(), 500);
                }, 3000);
            }
    
            // Initialisation SSE (Server-Sent Events)
            function initSSE() {
                // Utilisation de la route nommée pour plus de robustesse
                const sseUrl = "{{ route('acheteur.SSE.suivreEnchere') }}?" + new URLSearchParams({
                    idAcheteur: idAcheteur,
                    idBateau: idBateau,
                    datePeche: datePeche,
                    idLot: idLot
                });
    
                eventSource = new EventSource(sseUrl);
    
                eventSource.onmessage = (event) => {
                    try {
                        const data = JSON.parse(event.data);
                        if (data.type === "mise_a_jour_enchere") {
                            const nouveauPrix = parseFloat(data.prixEnchere);
                            prixActuelElement.textContent = `${nouveauPrix.toFixed(2)}€`;
                            prixMinimum = nouveauPrix;
                            
                            // Mise à jour du prix minimum pour le champ input
                            prixEnchereInput.min = (nouveauPrix + 0.01).toFixed(2);
                            
                            // Highlight si c'est notre enchère
                            if (data.estVotreEnchere) {
                                prixActuelElement.classList.add('text-green-600', 'font-bold');
                                showNotification("Vous avez la meilleure offre!", true);
                            } else {
                                prixActuelElement.classList.remove('text-green-600', 'font-bold');
                            }
                        }
                    } catch (e) {
                        console.error("Erreur de parsing SSE:", e);
                    }
                };
    
                eventSource.addEventListener("fin_enchere", () => {
                    showNotification("L'enchère est terminée", false);
                    btnEncherir.disabled = true;
                    prixEnchereInput.disabled = true;
                    if (eventSource) eventSource.close();
                });
    
                eventSource.onerror = (e) => {
                    console.error("Erreur SSE:", e);
                    if (eventSource) eventSource.close();
                    // Tentative de reconnexion après 3 secondes
                    setTimeout(initSSE, 3000);
                };
            }
    
            // Gestionnaire de clic pour l'enchère
            btnEncherir.addEventListener('click', async () => {
                const prixPropose = parseFloat(prixEnchereInput.value);
                const prixActuel = parseFloat(prixActuelElement.textContent) || prixDepart;
    
                // Validation côté client plus robuste
                if (isNaN(prixPropose) || prixPropose <= 0) {
                    showNotification("Veuillez entrer un montant valide", false);
                    prixEnchereInput.focus();
                    return;
                }
    
                if (prixPropose <= prixActuel) {
                    showNotification(`Le prix doit être supérieur à ${prixActuel.toFixed(2)}€`, false);
                    prixEnchereInput.focus();
                    return;
                }
    
                try {
                    // Afficher un indicateur de chargement
                    btnEncherir.disabled = true;
                    const btnText = btnEncherir.innerHTML;
                    btnEncherir.innerHTML = '<span class="animate-spin">⏳</span> En cours...';
    
                    // Envoi de l'enchère avec Fetch API
                    const response = await fetch("{{ route('encherir') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify({
                            idAcheteur: idAcheteur,
                            idBateau: idBateau,
                            datePeche: datePeche,
                            idLot: idLot,
                            prixEnchere: prixPropose.toFixed(2) // Format à 2 décimales
                        })
                    });
    
                    const data = await response.json();
    
                    if (!response.ok) {
                        throw new Error(data.message || "Erreur serveur lors de l'enchère");
                    }
    
                    // Succès
                    showNotification("Enchère placée avec succès!");
                    prixEnchereInput.value = '';
                    prixEnchereInput.focus();
    
                } catch (error) {
                    console.error('Erreur:', error);
                    showNotification(error.message || "Erreur lors de l'enchère", false);
                } finally {
                    // Réactiver le bouton
                    btnEncherir.disabled = false;
                    btnEncherir.innerHTML = 'Enchérir';
                }
            });
    
            // Initialisation
            initSSE();
    
            // Nettoyage
            window.addEventListener('beforeunload', () => {
                if (eventSource) {
                    eventSource.close();
                }
            });
    
            // Focus automatique sur le champ de prix
            prixEnchereInput.focus();
        });
    </script>
    
  </x-app-layout>