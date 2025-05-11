{{-- filepath: c:\mondossier\www\projetCriee\projetCriee\resources\views\acheteur\facture_pdf.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Facture</h1>
        <p>Panier ID : {{ $panier->idPanier }}</p>
        <p>Date : {{ now()->format('d/m/Y') }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Date de la pêche</th>
                <th>Prix de départ</th>
                <th>Poids</th>
                <th>Taille</th>
                <th>Qualité</th>
                <th>Espèce</th>
                <th>Prix Gagnant</th>
            </tr>
        </thead>
        <tbody>
            @foreach($panier->lots as $lot)
            <tr>
                <td>{{ $lot->idLot }}</td>
                <td>{{ \Carbon\Carbon::parse($lot->datePeche)->format('d/m/Y') }}</td>
                <td>{{ $lot->prixDepart }} €</td>
                <td>{{ $lot->poidsBrutLot }} kg</td>
                <td>{{ $lot->taille->specification ?? '—' }}</td>
                <td>{{ $lot->qualite->libeleQualite ?? '—' }}</td>
                <td>{{ $lot->espece->nomCommunEspece ?? '—' }}</td>
                <td>{{ $lot->prixEnchereMax }} €</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Total : {{ $panier->total }} €</strong></p>
</body>
</html>