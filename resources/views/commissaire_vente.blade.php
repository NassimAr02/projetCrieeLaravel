@extends("layouts.layout")

@section("title","Gestion des criées")

@section("content")
  <!-- Contenu principal -->
  <main>
      <!-- Section de la criée du jour -->
      <h2>Criée du Jour :</h2>
      <table>
        <thead>
          <tr>
            <th>Date</th>
            <th>Commencé à...</th>
            <th>Fin à...</th>
            <th>Nombre de lots</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($crieeJour as $criee)
            <tr>
              <td>{{ date('d/m/Y', strtotime($criee->dateCriee)) }}</td>
              <td>{{ $criee->heureDebut }}</td>
              <td>{{ $criee->heureFin }}</td>
              <td>{{ $criee->lots_count }}</td>
              <td>
                <button>Débuter la vente</button>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5">Aucune criée prévue aujourd'hui</td>
            </tr>
          @endforelse
      </tbody>
    </table>

      <!-- Section des criées à venir -->
      <h2>Criée à venir :</h2>
      <table>
        <thead>
          <tr>
            <th>Date</th>
            <th>Commencé à...</th>
            <th>Fin à...</th>
            <th>Nombre de lots</th>
          </tr>
        </thead>
        <tbody>
          @if($crieeAVenir)
            <tr>
              <td>{{ date('d/m/Y', strtotime($crieeAVenir->dateCriee)) }}</td>
              <td>{{ $crieeAVenir->heureDebut }}</td>
              <td>{{ $crieeAVenir->heureFin }}</td>
              <td>{{ $crieeAVenir->lots_count }}</td>
            </tr>
          @else
            <tr>
              <td colspan="4">Aucune criée à venir prévue</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </main>
@endsection