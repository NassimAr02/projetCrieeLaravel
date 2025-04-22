@extends("layouts.layout")

@section("title","Criée en cours")

@section("content")

{{-- Trouver un moyen pour que le CSS FONCTIONNE grace au fichier style.css --}}
<style>
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600);

  *, *:before, *:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  }

  table {
  background: #012B39;
  border-radius: 0.25em;
  border-collapse: collapse;
  margin: 1em;
  }
  th {
  border-bottom: 1px solid #364043;
  color: #E2B842;
  font-size: 0.85em;
  font-weight: 600;
  padding: 0.5em 1em;
  text-align: left;
  }
  td {
  color: #fff;
  font-weight: 400;
  padding: 0.65em 1em;
  }
  .disabled td {
  color: #4F5F64;
  }
  tbody tr {
  transition: background 0.25s ease;
  }
  tbody tr:hover {
  background: #014055;
  }
</style>



  <!-- Contenu principal -->
  <main>

    {{-- TABLE 1 --}}
    <table>
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
      <tbody>
        @foreach ($encheres as $enchere)
          <tr>
            <td>{{ $enchere->datePeche }}</td>
            <td>{{ $enchere->heureDebutEnchere }}</td>
            <td>HEUREFIN PLACEHOLDER</td>
            <td>nom article PLACEHOLDER</td>

            {{-- C'est le prix de depart, dmder a nassim s'il faut changer --}}
            <td>{{ $enchere->prixDepart }}</td> 
            <td>temps PLACEHOLDER</td>
            <td><button>Entrer dans l'enchère</button>
          </tr>
        @endforeach

        {{-- <tr>
          <td>date
          <td>heuredebut
          <td>heurefin
          <td>nom article
          <td>PRIX de l'enchere
          <td>temps 
          <td><button>Entrer dans l'enchère</button> --}}


      </tbody>
    </table>


    {{-- TABLE 2 --}}
    <table>
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
    </table>
    
  </main>

@endsection
