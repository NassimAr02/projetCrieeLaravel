@extends("layouts.layout")

@section("title","Accueil Acheteur")

@section("content")

  <!-- Contenu principal -->
  <main>
    <body>
      <div class="container mt-5">
          <h2>Liste des Acheteurs</h2>
          <table class="table table-bordered">
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