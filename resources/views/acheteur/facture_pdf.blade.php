{{-- filepath: c:\mondossier\www\projetCriee\projetCrieeLaravel\resources\views\acheteur\facture_pdf.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            background: #f8f8f8;
        }
        .facture-container {
            background: #fff;
            max-width: 800px;
            margin: 30px auto 0 auto;
            padding: 40px 30px 80px 30px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            position: relative;
            box-shadow: 0 2px 8px #e0e0e0;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .infos-acheteur {
            margin-bottom: 30px;
        }
        .infos-acheteur p {
            margin: 2px 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f4f4f4;
        }
        .total {
            text-align: right;
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
        }
        .paye-stamp {
            position: absolute;
            left: 50%;
            bottom: 30px;
            transform: translateX(-50%);
            opacity: 0.5;
            z-index: 10;
        }
    </style>
</head>
<body>
    <div class="facture-container">
        <div class="header">
            <h1>FACTURE</h1>
            <p>Panier n°{{ $facture->idPanier }} — Date : {{ now()->format('d/m/Y') }}</p>
        </div>
        <div class="infos-acheteur">
            <p><strong>Acheteur :</strong> {{ $infoA->numHabilitation }}</p>
            <p><strong>Email :</strong> {{ $infoA->email }}</p>
            <p><strong>Téléphone :</strong> {{ $infoA->telA }}</p>
            <p><strong>Raison sociale :</strong> {{ $infoA->raisonSocialeEntreprise }}</p>
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
                @foreach($facture->lots as $lot)
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
        <div class="total">
            Total à payer : {{ $facture->total }} €
        </div>
        <img src="{{ asset('image/paye.png') }}" alt="Payé" class="paye-stamp" style="width:220px;">
    </div>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>