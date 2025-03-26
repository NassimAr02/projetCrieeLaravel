@extends("layouts.layout")

@section("title", "Mentions Légales - Criée de Poulgoazec")

@section("content")
  <!-- Contenu principal -->
  <main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Mentions Légales</h1>
    
    <section class="bg-white p-6 rounded-lg shadow-md mb-8">
      <h2 class="text-xl font-semibold text-blue-700 mb-4">Éditeur du site / Gestionnaire</h2>
      <ul class="space-y-2">
        <li><strong>Criée de Poulgoazec</strong></li>
        <li>Gérée par : Chambre de Commerce et d'Industrie (CCI) de Quimper</li>
        <li>Quartier maritime d'Audierne, 29780 Plouhinec</li>
        <li>SIRET : 123 456 789 00012</li>
        <li>TVA intracommunautaire : FRXX 123456789</li>
        <li>Téléphone : 02 98 45 67 89</li>
        <li>Email : contact@poulgoazec.fr</li>
      </ul>
    </section>

    <section class="bg-white p-6 rounded-lg shadow-md mb-8">
      <h2 class="text-xl font-semibold text-blue-700 mb-4">Activité réglementée</h2>
      <p class="mb-2">Vente aux enchères de produits de la pêche (poissons et crustacés) réservée aux professionnels.</p>
      <p><strong>Référence légale :</strong> Concession du Conseil Général du Finistère, identifiant de site F-29.197.500-CE.</p>
    </section>

    <section class="bg-white p-6 rounded-lg shadow-md mb-8">
      <h2 class="text-xl font-semibold text-blue-700 mb-4">Conditions Générales de Vente (CGV)</h2>
      <p class="mb-4">Les transactions sont régies par nos <a href="{{ route ('cgv')}}" class="text-blue-600 hover:underline font-medium">Conditions Générales de Vente</a>, incluant :</p>
      <ul class="list-disc pl-6 space-y-2">
        <li>Processus d'enchères (descendantes/ascendantes)</li>
        <li>Engagements des acheteurs (paiement sous 48h)</li>
        <li>Critères ETPQ des lots (Espèce, Taille, Présentation, Qualité)</li>
      </ul>
    </section>

    <section class="bg-white p-6 rounded-lg shadow-md mb-8">
      <h2 class="text-xl font-semibold text-blue-700 mb-4">Hébergement</h2>
      <p>OVH SAS</p>
      <p>2 rue Kellermann, 59100 Roubaix</p>
      <p>Site web : <a href="https://www.ovh.com" class="text-blue-600 hover:underline">www.ovh.com</a></p>
    </section>

    <section class="bg-white p-6 rounded-lg shadow-md mb-8">
      <h2 class="text-xl font-semibold text-blue-700 mb-4">Protection des données</h2>
      <p class="mb-4">Conformément au RGPD, les données des acheteurs (identifiants, transactions) sont sécurisées. Pour exercer vos droits :</p>
      <ul class="list-disc pl-6 space-y-2">
        <li>Délégué à la protection des données : Jean Dupon</li>
        <li>Email : rgpd@quimper.cci.fr</li>
      </ul>
    </section>

    <section class="bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-xl font-semibold text-blue-700 mb-4">Propriété intellectuelle</h2>
      <p>Le système d'enchères informatisé et les processus métiers sont la propriété de la CCI de Quimper. Toute reproduction interdite.</p>
    </section>
  </main>
@endsection