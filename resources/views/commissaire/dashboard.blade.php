<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Criées') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Carte principale -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Criée du jour -->
                <div class="mb-10">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        Prochaine Criée
                    </h3>

                    @if($crieeJour->count())
                        <div class="overflow-x-auto rounded-lg border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Heure début</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Heure fin</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre de lots</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($crieeJour as $criee)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ \Carbon\Carbon::parse($criee->dateCriee)->format('d/m/Y') }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-600">{{ $criee->heureDebut }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-600">{{ $criee->heureFin }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-600">{{ $criee->lots_count }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex space-x-2">
                                                    <button type="button"
                                                            class="inline-flex items-center px-4 py-2 rounded-md shadow-sm text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                                                            style="background-color: #2563eb;"
                                                            onmouseover="this.style.backgroundColor='#1d4ed8'" 
                                                            onmouseout="this.style.backgroundColor='#2563eb'">
                                                        Débuter la vente
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8 bg-gray-50 rounded-lg border border-gray-200">
                            <h4 class="mt-2 text-sm font-medium text-gray-700">Aucune criée prévue aujourd'hui</h4>
                            <p class="mt-1 text-sm text-gray-500">Consultez les criées à venir ci-dessous</p>
                        </div>
                    @endif
                </div>

                <!-- Criée à venir -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Liste des Criées à venir
                    </h3>

                    @if($crieeAVenir)
                        <div class="overflow-x-auto rounded-lg border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Heure début</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Heure fin</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre de lots</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ \Carbon\Carbon::parse($crieeAVenir->dateCriee)->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-600">{{ $crieeAVenir->heureDebut }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-600">{{ $crieeAVenir->heureFin }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-600">{{ $crieeAVenir->lots_count }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8 bg-gray-50 rounded-lg border border-gray-200">
                            <h4 class="mt-2 text-sm font-medium text-gray-700">Aucune criée à venir</h4>
                            <p class="mt-1 text-sm text-gray-500">Créez une nouvelle criée pour la planifier</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
