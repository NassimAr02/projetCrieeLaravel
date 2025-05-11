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
                                    <tr>>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numéro facture</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qualité</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Espèce</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $fac->idPanier ?? '—'  }}</td> {{-- idTaille --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $fac->dateFacture ?? '—'  }}</td> {{-- idQualite --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $fac->total ?? '—'  }}€</td> {{-- idEspece --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <form action="{{ route('facture.telecharger', ['panier' => $fac ->idPanier]) }}" method="POST">
                                                    @csrf
                                                    <div class="flex space-x-2 mt-4">
                        {{--                                 
                                                        <input type="text" name="idPanier" id="idPanier" value = "{{ $panier->idPanier }}" hidden> --}}

                                                            <button type="submit"
                                                                class="inline-flex items-center px-4 py-2 rounded-md shadow-sm text-sm font-medium text-white"
                                                                            style="background-color: #2563eb;"
                                                                            onmouseover="this.style.backgroundColor='#1d4ed8'"
                                                                            onmouseout="this.style.backgroundColor='#2563eb'">
                                                                Télécharger la facture
                                                            </button>
                                                </form>
                                            </div>   
                                        </td>   
                                    </tr>
                                </tbody>
                            </table>
                           
                        </div>
                        
                    @endforeach
                </div>    
            </div>
        </div>
    </div>
  
    </main>
    
  </x-app-layout>