<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard - Gestion des Criées') }}
        </h2>
    </x-slot>

    <div class="py-8">
        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="mb-6 text-right">
                        <a href="{{ route('admin.createCriee')}}" 
                           style="display: inline-block; padding: 0.5rem 1rem; background-color: #2563eb; color: white; border-radius: 0.375rem; font-weight: 600; text-decoration: none;"
                           onmouseover="this.style.backgroundColor='#1d4ed8'" 
                           onmouseout="this.style.backgroundColor='#2563eb'">
                           <i class="fas fa-plus mr-1"></i> Ajouter une Criée
                        </a>
                    </div>
        
                <!-- Section Prochaine Criée -->
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Prochaine Criée</h3>
                    
                    @if($prochaineCriee)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numéro</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Heure Début</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Heure Fin</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $prochaineCriee->idCriee }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $prochaineCriee->dateCriee->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $prochaineCriee->heureDebut }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $prochaineCriee->heureFin }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8 bg-gray-50 rounded-lg">
                            <p class="text-gray-500">Aucune criée programmée</p>
                        </div>
                    @endif
                </div>

                <!-- Section Liste des Criées -->
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Liste des Criées à Venir</h3>
                    
                    @if($criees && $criees->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numéro</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Heure Début</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Heure Fin</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($criees as $criee)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $criee->idCriee }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $criee->dateCriee->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $criee->heureDebut }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $criee->heureFin }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8 bg-gray-50 rounded-lg">
                            <p class="text-gray-500">Aucune criée à venir</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>