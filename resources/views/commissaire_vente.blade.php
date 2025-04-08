@extends("layouts.layout")

@section("title","Accueil Commissaire de ventes")

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
          @foreach ($crieesJour as $criee)
            <tr>
              <td>{{ date('d/m/Y', strtotime($criee->dateCriee)) }}</td>
              <td>{{ $criee->heureDebut }}</td>
              <td>{{ $criee->heureFin }}</td>
              <td>{{ $criee->lots_count }}</td>
              <td>
                <button>Débuter la vente</button>
              </td>
            </tr>
          @endforeach
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
            <tr>
              <td>{{ date('d/m/Y', strtotime($criee->dateCriee)) }}</td>
              <td>{{ $criee->heureDebut }}</td>
              <td>{{ $criee->heureFin }}</td>
              <td>{{ $criee->lots_count }}</td>
            </tr>
        </tbody>
      </table>
    </div>
  </main>
@endsection