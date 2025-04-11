<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard - Création de criée') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- En-tête de section -->
                <div class="p-6 border-b border-gray-200 bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-800">Nouvelle Criée</h3>
                    <p class="text-sm text-gray-500 mt-1">Renseignez les informations ci-dessous</p>
                </div>

                <!-- Formulaire optimisé -->
                <form action="{{ route('admin.createCriee.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Date -->
                        <div>
                            <label for="dateCriee" class="block text-sm font-medium text-gray-700 mb-1">Date de la criée</label>
                            <input type="date" id="dateCriee" name="dateCriee" required
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Heure de début -->
                        <div>
                            <label for="heureDebut" class="block text-sm font-medium text-gray-700 mb-1">Heure de début</label>
                            <input type="time" id="heureDebut" name="heureDebut" required
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Nombre de lots -->
                        <div>
                            <label for="nbLot" class="block text-sm font-medium text-gray-700 mb-1">Nombre de lots</label>
                            <input type="number" id="nbLot" name="nbLot" min="1" required 
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                   oninput="calculHeureFin()">
                        </div>

                        <!-- Heure de fin (calculée) -->
                        <div>
                            <label for="heureFin" class="block text-sm font-medium text-gray-700 mb-1">Heure de fin</label>
                            <input type="time" id="heureFin" name="heureFin" readonly
                                   class="w-full rounded-md border-gray-300 bg-gray-100">
                        </div>
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="flex justify-end pt-4">
                        <button type="submit"
                           style="display: inline-block; padding: 0.5rem 1rem; background-color: #2563eb; color: white; border-radius: 0.375rem; font-weight: 600; text-decoration: none;"
                           onmouseover="this.style.backgroundColor='#1d4ed8'" 
                           onmouseout="this.style.backgroundColor='#2563eb'">
                           <i class="fas fa-plus mr-1"></i> Créer la criée
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
            <script>
                function calculHeureFin() {
                    const nbLot = document.getElementById('nbLot').value;
                    const heureDebut = document.getElementById("heureDebut").value;
                    
                    if (!heureDebut || !nbLot) return;
                    
                    // Correction: "split" au lieu de "spilt"
                    let [heureD, minD] = heureDebut.split(':').map(Number);
                
                    let enMinutes = heureD * 60 + minD;
                    let minAjouter = nbLot * 5; // 5 minutes par lot
                
                    enMinutes += minAjouter;
                    enMinutes = enMinutes % (24 * 60);
                    
                    let heureF = Math.floor(enMinutes / 60).toString().padStart(2, "0");
                    let minutesF = (enMinutes % 60).toString().padStart(2, '0');
                
                    document.getElementById("heureFin").value = `${heureF}:${minutesF}`;
                }
            </script>    
</x-app-layout>