@extends("layouts.layout")

@section("title", "Conditions Générales de Vente - Criée de Poulgoazec")

@section("content")
  <!-- Contenu principal -->
  <main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Conditions Générales de Vente</h1>
    
    <div class="bg-white p-6 rounded-lg shadow-md">
      <!-- Article 1 : Objet -->
      <section class="mb-8">
        <h2 class="text-xl font-semibold text-blue-700 mb-3 border-b pb-2">1. Objet</h2>
        <p>Les présentes CGV régissent les ventes aux enchères de produits de la pêche (poissons et crustacés) organisées par la Criée de Poulgoazec, située à Plouhinec (Finistère), gérée par la Chambre de Commerce et d'Industrie (CCI) de Quimper.</p>
      </section>

      <!-- Article 2 : Acteurs -->
      <section class="mb-8">
        <h2 class="text-xl font-semibold text-blue-700 mb-3 border-b pb-2">2. Acteurs</h2>
        <ul class="list-disc pl-6 space-y-2">
          <li><strong>Vendeurs</strong> : Pêcheurs locaux ou extérieurs accrédités.</li>
          <li><strong>Acheteurs</strong> : Mareyeurs, transformateurs, représentants de la grande distribution, restaurateurs, etc., accrédités par l'Association Bretonne des Acheteurs.</li>
          <li><strong>Crieur</strong> : Directeur des ventes responsable de l'adjudication des lots.</li>
        </ul>
      </section>

      <!-- Article 3 : Description des lots -->
      <section class="mb-8">
        <h2 class="text-xl font-semibold text-blue-700 mb-3 border-b pb-2">3. Description des lots</h2>
        <p class="mb-3">Chaque lot est caractérisé par les critères ETPQ :</p>
        <ul class="list-disc pl-6 space-y-2 mb-3">
          <li><strong>Espèce</strong> (ex. : lieu jaune, bar)</li>
          <li><strong>Taille</strong> (codée de 1 à 9)</li>
          <li><strong>Présentation</strong> (entier, vidé, etc.)</li>
          <li><strong>Qualité</strong> (E : extra, A : glacé, B : déclassé)</li>
        </ul>
        <p>Le poids net est calculé après déduction de la tare du bac (2,5 kg pour les petits bacs, 4 kg pour les grands).</p>
      </section>

      <!-- Article 4 : Processus de vente -->
      <section class="mb-8">
        <h2 class="text-xl font-semibold text-blue-700 mb-3 border-b pb-2">4. Processus de vente</h2>
        <ul class="list-disc pl-6 space-y-2">
          <li><strong>Préparation</strong> : Les lots sont pesés, étiquetés et vérifiés par un vétérinaire avant la vente.</li>
          <li><strong>Enchères</strong> :
            <ul class="list-[circle] pl-6 mt-2 space-y-1">
              <li><strong>Descendantes</strong> : Le prix baisse jusqu'à atteindre un acheteur ou le prix plancher fixé par l'OPOB.</li>
              <li><strong>Ascendantes</strong> : Si plusieurs acheteurs sont intéressés, le prix monte jusqu'à l'adjudication au meilleur enchérisseur.</li>
            </ul>
          </li>
          <li><strong>Validation</strong> : Le crieur valide le prix final, qui doit être conforme au marché.</li>
        </ul>
      </section>

      <!-- Article 5 : Engagements des parties -->
      <section class="mb-8">
        <h2 class="text-xl font-semibold text-blue-700 mb-3 border-b pb-2">5. Engagements des parties</h2>
        <div class="grid md:grid-cols-2 gap-6">
          <div>
            <h3 class="font-medium text-blue-600 mb-2">Acheteurs :</h3>
            <ul class="list-disc pl-6 space-y-1">
              <li>Paiement sous 48 heures après adjudication.</li>
              <li>Respect des règles d'hygiène et de la chaîne du froid.</li>
            </ul>
          </div>
          <div>
            <h3 class="font-medium text-blue-600 mb-2">Vendeurs :</h3>
            <ul class="list-disc pl-6 space-y-1">
              <li>Garantie de la fraîcheur et de la conformité des lots aux critères ETPQ.</li>
              <li>Respect des quotas et périodes de pêche.</li>
            </ul>
          </div>
        </div>
      </section>

      <!-- Article 6 : Prix et paiement -->
      <section class="mb-8">
        <h2 class="text-xl font-semibold text-blue-700 mb-3 border-b pb-2">6. Prix et paiement</h2>
        <ul class="list-disc pl-6 space-y-2">
          <li>Les prix sont en euros par kilogramme.</li>
          <li>Le cours moyen est fixé par le marché (5,88 €/kg en 2007, référence indicative).</li>
          <li>Paiement par virement bancaire ou chèque.</li>
        </ul>
      </section>

      <!-- Article 7 : Litiges -->
      <section class="mb-8">
        <h2 class="text-xl font-semibold text-blue-700 mb-3 border-b pb-2">7. Litiges</h2>
        <ul class="list-disc pl-6 space-y-2">
          <li>Tout litige sur la qualité doit être signalé avant le départ du lot.</li>
          <li>En cas de contestation, le vétérinaire de la criée tranche.</li>
        </ul>
      </section>

      <!-- Article 8 : Responsabilités -->
      <section class="mb-8">
        <h2 class="text-xl font-semibold text-blue-700 mb-3 border-b pb-2">8. Responsabilités</h2>
        <ul class="list-disc pl-6 space-y-2">
          <li>La criée décline toute responsabilité après la livraison des lots.</li>
          <li>Les acheteurs sont responsables du transport et du respect de la chaîne du froid.</li>
        </ul>
      </section>

      <!-- Article 9 : Informatisation -->
      <section class="mb-8">
        <h2 class="text-xl font-semibold text-blue-700 mb-3 border-b pb-2">9. Informatisation</h2>
        <ul class="list-disc pl-6 space-y-2">
          <li>Les enchères sont gérées via une application client-serveur depuis 2025.</li>
          <li>Les acheteurs doivent s'identifier (login/mot de passe) pour participer.</li>
        </ul>
      </section>

      <!-- Article 10 : Divers -->
      <section>
        <h2 class="text-xl font-semibold text-blue-700 mb-3 border-b pb-2">10. Divers</h2>
        <ul class="list-disc pl-6 space-y-2">
          <li>Les présentes CGV sont régies par le droit français.</li>
          <li>Tout acheteur est réputé avoir pris connaissance et accepté ces conditions.</li>
        </ul>
      </section>

      <!-- Signature -->
      <div class="mt-8 pt-4 border-t text-right">
        <p class="font-medium">Fait à Plouhinec, le 26/03/2025</p>
        <p class="text-blue-700">La Direction de la Criée de Poulgoazec</p>
      </div>
    </div>
  </main>
@endsection