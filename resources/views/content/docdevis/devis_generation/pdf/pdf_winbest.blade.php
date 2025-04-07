<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Devis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .row div {
            margin-bottom: 10px;
        }
        .header {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .row div:nth-child(even) {
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>Devis N° {{ $devi->id }}</h2>

    <div class="container">
        <!-- Ligne avec les données -->
        <div class="row">
            <div><b>Date         :</b><span>{{ $devi->date }}</span></div>
            <div><b>Nom          :</b><span>{{ $devi->appointment->Client->name }}</span></div>
            <div><b>Type         :</b><span>{{ $devi->appointment->Client->type_client }}</span></div>
            <div><b>Ville        :</b><span>{{ $devi->appointment->Client->ville }}</span></div>
            <div><b>Adresse      :</b><span>{{ $devi->appointment->Client->adresse }}</span></div>
            <div><b>Téléphone    :</b><span>{{ $devi->appointment->Client->phone }}</span></div>
            <div><b>Email        :</b><span>{{ $devi->appointment->Client->email }}</span></div>
            <div><b>Prix HT I    :</b><span>{{ $devi->prix_hors_taxe }}</span></div>
            <div><b>Remise Finale:</b><span>{{ $devi->getRemiseFinalAttrinute() }}</span></div>
            <div><b>Prix HT F    :</b><span>{{ $devi->getMantantHTFinalAttrinute() }}</span></div>
            <div><b>TVA (%)      :</b><span>{{ $devi->getNewTauxTvaAttribute() }}</span></div>
            <div><b>Montant TVA  :</b><span>{{ $devi->getMantantTvaAttribute() }}</span></div>
            <div><b>TTC          :</b><span>{{ $devi->getMantantTtcAttribute() }}</span></div>
            <div><b>Mode d'envoi :</b><span>{{ $devi->mode_envoi == 'autre' ? $devi->autre_mode_denvoi : $devi->mode_envoi }}</span></div>
            <div><b>État         :</b><span>{{ $devi->etat }}</span></div>
        </div>
    </div>
</body>
</html>
