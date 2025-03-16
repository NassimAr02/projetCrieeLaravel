@extends("layouts.layout")

@section("title","Page d'accueil")

@section("content")

  <!-- Contenu principal -->
  <main>
    <div class="centering-wrapper">
      <h1>Criée des cornouailles</h1> <br>
      <p>Site de vente de poissons</p>

      @php 
        // $value = \App\User::where(['name' => $posts->username])->pluck('avatar')
        DB::table('acheteur')->first();
      @endphp

    </div>
  </main>

@endsection