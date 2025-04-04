@extends('layouts.master')
@section('title')
{{ __('Overview') }}
@endsection
@section('links')
<link rel="stylesheet" href="{{ URL::asset('build/css/ara_devis.css') }}">
<!-- bootstrap links -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{ URL::asset('build/css/tailwind.min.css') }}">
</body>

@endsection

@section('content')
<!-- page title -->
<x-page-title title="Devi Info # {{ $modele->n_devis }} " pagetitle="Products" />

<div class="card devis">
  <form action="{{route('admin.modeles.update', $modele->id)}}" id="form" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="devis_id" value={{$modele->id}}>
    <input type="hidden" name="societe" value={{$modele->entreprise}}>
    <div class="card devis-card">

      <div class=" flex justify-between">
        <div class="header-left">
          <img src="{{asset('build/images/ARA_logo.png') }}" alt="">
          <div class="entr-info">
            <p>Adresse : 3ème étage, 10 Bd de la</p>
            <p>Liberté, Casablanca</p>
            <p>Téléphone : 0666 282 962</p>
          </div>
          <div class="devis-cle">
            <p>Référence : <input type="text" name="reference" placeholder="__" value="{{$modele->reference}}" /> </p>
            <p>Date : <span id="date-span"></span>
              <input type="date" placeholder="JJ/MM/AAAA" name="date" id="date-input" style="width:120px">
            </p>
            <p>N°client :<input type="number" name="n_client" placeholder="__" value="{{$modele->n_client}}" /></p>
          </div>
        </div>
        <div class="header-right ">
          <div class="devis-titre">
            <div id="titre-div" class="titre-input" style="margin-bottom:10px">

            </div>
            <input type="text" name="titre" id="titre" placeholder="Titre du devis" value="{{$modele->titre}}">
          </div>
          <div class="client-nom">
            <input type="text" name="nom_client" placeholder="NOM DU CLIENT" class="nom-societe-input"
              id="nom-societe-input" value="{{$modele->nom_client}}">
            <div id="nom-societe-div"></div>
          </div>
        </div>
      </div>
      <div class="devis-table">
        <table>
          <thead>
            <th>Quanité</th>
            <th>Désignation</th>
            <th>Prix unitaire HT</th>
            <th>Prix total HT </th>
          </thead>
          <tbody>
            <tr>
              <td class="qt-td"> <input type="number" id="qt" name="quantite" placeholder="_"
                  oninput="calculateTotalHT()" value="{{$modele->quantité}}"> </td>
              <td><textarea name="details" id="details-input" placeholder="Détails">{{$modele->details}}</textarea>
                <div id="details-div">

                </div>
              </td>
              <td class="prix-td" id="prix_unitaire"> <input type="number" id="pu" oninput="calculateTotalHT()"
                  name="prix_unitaire" placeholder="_" value="{{$modele->prix_unitaire}}"> </td>
              <td class="prix-td" id="total-ht">_</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="devis-info">
        <div class="mode-conditions">
          <div class="mode">
            <h6>Mode de régelement: <span id="mode_span"></span> <input type="text" name="mode_paiement" id="mode_input"
                value="{{$modele->mode_paiement}}" placeholder="mode de paiment"></h6>
          </div>
          <div class="conditions">
            <h6>Conditions de règlement: <span id="conditions_span"></span><input type="text" name="conditions"
                value="{{$modele->conditions}}" id="conditions_input" placeholder="Conditions de règlement"> </h6>

          </div>
        </div>
        <div class="prix-info">
          <table>
            <tr>
              <td>Total Hors Taxe</td>
              <td style="font-style:italic;" id="total">_</td>
            </tr>
            <tr>
              <td>TVA à <input type="number" id="tva" name="tva" placeholder="__" oninput="calculateTTC()"
                  value="{{$modele->tva}}">%</td>
              <td id="taux_tva">_</td>
            </tr>
            <tr>
              <th>Total TTC en MAD</th>
              <th id="ttc">_</th>
            </tr>
          </table>
        </div>
      </div>
      <div class="signer">
        <div class="signe-message">
          <h6>Si ce devis vous convient, veuillez-nous le retourner signé précédé de la mention :
            <br> "BON POUR ACCORD ET EXECUTION DU DEVIS"
          </h6>
        </div>
        <div class="date-signature">
          <h6>Date :</h6>
          <h6>Signature :</h6>
        </div>
      </div>
      @if($modele->afficher_partnaires !== "false")
      <div class="partners" style="margin-bottom:30px">
      <img src="{{asset('build/images/winbest_partners.jpg')}}" alt="">
      </div>
    @endif
      <div class="footer">
        <h6>Société à Responsabilité Limitée au capital de 100 000 DH <br>
          RC : 345691 -TP : 32293051 -IF : 24038918 -CNSS : 580327 <br>
          ICE: 001978474000053</h6>

      </div>
    </div>

    <div class="buttons">

      <button class="btn button btn-info" id="download" type="button">
        <i data-lucide="download" width="15px"></i>
        Télécharger</button>
      <button class="btn button btn-success" type="submit">
        <i data-lucide="file-check-2" width="15px"></i>Sauvegarder Les modifications</button>

    </div>

  </form>

</div><!--end grid-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<script>

  function calculateTotalHT() {
    const total_ht1 = document.getElementById('total');
    const total_ht2 = document.getElementById('total-ht');
    const quantite_value = document.getElementById('qt').value;
    const prix_unitaire_value = document.getElementById('pu').value;

    result = parseInt(quantite_value) * parseFloat(prix_unitaire_value)
    total_ht2.innerText = "";
    total_ht1.innerText = "";
    result = parseInt(quantite_value) * parseFloat(prix_unitaire_value)
    if (result >= 0) {
      total_ht2.innerText = result;
      total_ht1.innerText = result;

    }
    calculateTTC()
  }

  calculateTotalHT()
  function calculateTTC() {
    const tva = parseInt(document.getElementById('tva').value);
    const taux_tva = document.getElementById('taux_tva');
    const total_ttc = document.getElementById('ttc');
    const total_ht2 = parseFloat(document.getElementById('total').innerText);
    let tva_result = (total_ht2 * tva) / 100
    let result = total_ht2 + tva_result;
    taux_tva.innerText = ""
    total_ttc.innerText = "";
    if (result >= 0) {
      taux_tva.innerText = tva_result;
      total_ttc.innerText = result;
    }
  }

  const form = document.getElementById('form')

  download_btn = document.getElementById("download")
  download_btn.addEventListener('click', function () {

    console.log('download')
    const divElement = document.querySelector('.devis-card');
    InputToDiv('details-input', 'details-div')
    InputToDiv('conditions_input', 'conditions_span')
    InputToDiv('titre', 'titre-div')
    InputToDiv('nom-societe-input', 'nom-societe-div')
    InputToDiv('mode_input', 'mode_span')
    InputToDiv('date-input', 'date-span')
    const tds = document.querySelectorAll('.devis-table th, .devis-table td ,.devis-table tr , .prix-info table td, .prix-info table th')
    tds.forEach(item => {
      item.style.paddingBottom = "10px"
      item.style.paddingLeft = "10px"
    })

    var opt = {
      margin: 0.5,
      filename: 'downloaded-file.pdf',
      image: { type: 'jpeg', quality: 0.98 },
      html2canvas: { scale: 4 },
      jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };

    html2pdf().from(divElement).set(opt).toPdf().get('pdf').then(function (pdf) {
      var totalPages = pdf.internal.pages.length;

      for (var i = 1; i <= totalPages; i++) {
        pdf.setPage(i);
        pdf.setFont('helvetica', 'normal');
        pdf.setFontSize(10);
        var pages = totalPages - 1
        pdf.text(i + '/' + pages, 180, 290);
      }


      pdf.save('ARA-devis.pdf');
    });

    tds.forEach(item => {
      item.style.paddingBottom = ""
    })
    DivToInput('titre', 'titre-div')
    DivToInput('nom-societe-input', 'nom-societe-div')
    DivToInput('details-input', 'details-div')
    DivToInput('mode_input', 'mode_span')
    DivToInput('date-input', 'date-span')
    DivToInput('conditions_input', 'conditions_span')
  });

  function InputToDiv(inputId, divId) {
    const Div = document.getElementById(divId)
    const Input = document.getElementById(inputId)
    Div.style.display = ""
    Div.innerText = Input.value
    Input.style.display = 'none'
    Input.style.marginBottom = '20px'
  }
  function DivToInput(inputId, divId) {
    const Div = document.getElementById(divId)
    const Input = document.getElementById(inputId)
    Div.style.display = "none"
    Input.style.display = ''
  }
</script>
@endsection
@push('scripts')
  <!-- product overview init js-->
  <script src="{{ URL::asset('build/js/pages/apps-ecommerce-product-overview.init.js') }}"></script>
  <!-- App js -->
  <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush