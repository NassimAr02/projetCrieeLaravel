@extends("layouts.layout")

@section("title","Accueil Acheteur")

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
    <body>
      <div>
          <h2>Liste des Acheteurs</h2>
          <table>
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Login</th>
                      <th>Entreprise</th>
                      <th>Ville</th>
                      <th>Code Postal</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($acheteurs as $acheteur)
                      <tr>
                          <td>{{ $acheteur->idAcheteur }}</td>
                          <td>{{ $acheteur->loginA }}</td>
                          <td>{{ $acheteur->raisonSocialeEntreprise }}</td>
                          <td>{{ $acheteur->ville }}</td>
                          <td>{{ $acheteur->cp }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </body>
  </main>

@endsection