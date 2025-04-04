@extends("layouts.layout")

@section("title","Criée en cours")

@section("content")

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
        <tr>
          <td>date
          <td>heuredebut
          <td>heurefin
          <td>nom article
          <td>PRIX de l'enchere
          <td>temps 
          <td><button>Entrer dans l'enchère</button>
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
