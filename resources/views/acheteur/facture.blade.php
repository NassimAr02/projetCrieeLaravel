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
            <!-- Carte principale avec ombre douce -->
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <!-- En-tête avec bouton d'action -->
                <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-blue-200 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Le panier
                        </h3>
                        <p class="text-sm text-gray-600 mt-1">Liste des lots dans le panier</p>
                    </div>
                </div>
  
                <!-- Section Prochaine Criée -->
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        Panier de l'acheteur
                    </h3>

                    @foreach($factures as $fac)
                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numéro facture</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $fac->idPanier }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $fac->dateFacture }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $fac->total }} €</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <a href="{{ route('facture.telecharger', ['panier' => $fac->idPanier]) }}" 
                                                        class="inline-flex items-center px-4 py-2 rounded-md shadow-sm text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                                                        style="background-color: #2563eb;"
                                                        onmouseover="this.style.backgroundColor='#1d4ed8'" 
                                                        onmouseout="this.style.backgroundColor='#2563eb'" id="boutonRedir">
                                                        Consulter la facture
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Conteneur caché pour la facture -->
                        {{-- <div id="facture-{{ $fac->idPanier }}" style="display: none;">
                            @include('acheteur.facture_pdf', ['panier' => $fac])
                        </div> --}}
                    </div>
                    @endforeach
                </div>    
            </div>
        </div>
    </div>
  
    </main>
            {{-- <script>
            document.querySelectorAll('.download-pdf').forEach(button => {
                button.addEventListener('click', function () {
                    // Récupérer l'ID de la facture
                    const factureId = this.getAttribute('data-facture-id');

                    // Sélectionner le conteneur HTML correspondant
                    const element = document.getElementById(`facture-${factureId}`);

                    // Options pour html2pdf
                    const options = {
                        margin: 1,
                        filename: `facture_panier_${factureId}.pdf`,
                        image: { type: 'jpeg', quality: 0.98 },
                        html2canvas: { scale: 2 },
                        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
                    };

                    // Générer le PDF
                    html2pdf().set(options).from(element).save();
                });
            });
        </script> --}}
  </x-app-layout>