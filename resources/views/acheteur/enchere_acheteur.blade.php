<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <!-- Contenu principal -->
  <main>

    {{-- TABLE 1 --}}
    {{-- <table>
      <thead>
        <tr>
          <th>DATE
          <th>Commencé à
          <th>Fin à
          <th>Article
          <th>Prix actuel
          <th>Temps restant
          <th>
      </thead>
      <tbody> --}}
        {{-- @foreach ($encheres as $enchere)
          <tr>
            <td>{{ $enchere->datePeche }}</td>
            <td>{{ $enchere->heureDebutEnchere }}</td>
            <td>HEUREFIN PLACEHOLDER</td>
            <td>nom article PLACEHOLDER</td> --}}

            {{-- C'est le prix de depart, dmder a nassim s'il faut changer --}}
            {{-- <td>{{ $enchere->prixDepart }}</td>  --}}
            {{-- <td>temps PLACEHOLDER</td>
            <td><button>Entrer dans l'enchère</button></td>
          </tr> --}}
        {{-- @endforeach --}}

        {{-- <tr>
          <td>date
          <td>heuredebut
          <td>heurefin
          <td>nom article
          <td>PRIX de l'enchere
          <td>temps 
          <td><button>Entrer dans l'enchère</button> --}}


      {{-- </tbody>
    </table> --}}

    {{-- TABLE 2 --}}
    {{-- <table>
      <thead>
        <tr>
          <th>DATE</th>
          <th>Commencé à</th>
          <th>Fin à</th>
          <th>Temps restant</th>
      </thead>
      <tbody>
        <tr>
          <td>date</td>
          <td>heuredebut</td>
          <td>heurefin</td>
          <td>PRIX de l'enchere</td>
          <td><button>Entrer dans l'enchère</button></td>
      </tbody>
    </table> --}}

    {{-- TABLE 3 --}}
    {{-- <table>
      <thead>
        <tr>
          <th>DATE
          <th>Commencé à
          <th>Fin à
          <th>Article
          <th>Prix actuel
      </thead>
      <tbody>
        <tr>
          <td>date
          <td>heuredebut
          <td>heurefin
          <td>nom article
          <td>PRIX de l'enchere
      </tbody>
    </table> --}}
    

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
                                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Heure Début</th>
                                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Heure Fin</th>
                                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                  </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200">
                                  <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $prochaineCriee->idCriee }}</td>
                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($prochaineCriee->dateCriee)->format('d/m/Y') }}</td>
                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $prochaineCriee->heureDebut }}</td>
                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $prochaineCriee->heureFin }}</td>
                                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                          <div class="flex space-x-2">
                                              <a href="{{ route('acheteur.lot_acheteur', ['criee' => $prochaineCriee->idCriee]) }}" 
                                                  class="inline-flex items-center px-4 py-2 rounded-md shadow-sm text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                                                  style="background-color: #2563eb;"
                                                  onmouseover="this.style.backgroundColor='#1d4ed8'" 
                                                  onmouseout="this.style.backgroundColor='#2563eb'">
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

</x-app-layout>