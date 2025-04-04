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
<x-page-title title="Devi Info # {{ $devi->n_devis }} " pagetitle="Products" />

<div class="card devis">
  <form id="form" method="POST">
    @csrf
    <input type="hidden" name="n_devis" value={{$devi->n_devis}}>
    <input type="hidden" name="devis_id" value={{$devi->id}}>
    <input type="hidden" name="societe" value={{$entreprise}}>
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
            <p>Référence : <span id="ref-span"></span><input type="text" name="reference" id="ref-input"
                placeholder="__" value="{{$docdevi->reference}}" /> </p>
            <p>Date : {{\Carbon\Carbon::parse($devi->date)->isoFormat('DD/MM/YYYY')}}</p>
            <p>N°client :<span id="nclient-span"></span> <input type="number" name="n_client" id="nclient-input"
                placeholder="__" value="{{$docdevi->n_client}}" /></p>
          </div>
        </div>
        <div class="header-right ">
          <div class="devis-titre">
            <div id="titre-div" class="titre-input" style="margin-bottom:10px">

            </div>
            <input type="text" name="titre" id="titre" placeholder="Titre du devis" value="{{$docdevi->titre}}">
          </div>
          <div class="client-nom">
            <input type="text" name="nom_client" placeholder="NOM DU CLIENT" class="nom-societe-input"
              id="nom-societe-input" value="{{$docdevi->nom_client}}">
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
              <td class="qt-td"> {{$devi->quantite}} </td>
              <td><textarea name="details" id="details-input" placeholder="Détails">
                      {{$docdevi->details}}          </textarea>
                <div id="details-div">

                </div>
              </td>
              <td class="prix-td">{{number_format($devi->prix_unitaire, 2) }}</td>
              <td class="prix-td">{{ number_format($devi->prix_hors_taxe, 2)}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="devis-info">
        <div class="mode-conditions">
          <div class="mode">
            <h6>Mode de régelement: <span id="mode_span"></span> <input type="text" name="mode_paiement" id="mode_input"
                value="{{$docdevi->mode_paiement}}" placeholder="mode de paiment"></h6>
          </div>
          <div class="conditions">
            <h6>Conditions de règlement: <span id="conditions_span"></span><input type="text" name="conditions"
                value="{{$docdevi->conditions}}" id="conditions_input" placeholder="Conditions de règlement"> </h6>

          </div>
        </div>
        <div class="prix-info">
          <table>
            <tr>
              <td>Total Hors Taxe</td>
              <td style="font-style:italic;">{{ number_format($devi->prix_hors_taxe, 2)}}</td>
            </tr>
            <tr>
              <td>TVA à {{$devi->getNewTauxTvaAttribute()}}</td>
              <td>{{ number_format($devi->getMantantTvaAttribute(), 2)}}</td>
            </tr>
            <tr>
              <th>Total TTC en MAD</th>
              <th>{{ number_format($devi->getMantantTtcAttribute(), 2)}}</th>
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
      @if($afficher_partnaires !== "false")
      <div class="partners" style="margin-bottom:20px">
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
      <button class="btn button btn-success" type="button" onclick="docFormLink()"> <i data-lucide="save"
          width="15px"></i>Sauvegarder Les
        Modification</button>
      <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn button btn-primary" type="button">
        <i data-lucide="file-check-2" width="15px"></i>Sauvegarder
        Comme Modèle</button>

    </div>
    <!-- MODAL -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="nom" class="form-label">Saisissez le nom du modèle</label>
              <input type="text" name="nom" class="form-control" id="nom_modele" placeholder="Modèle">
              <div id="oblg-msg" style="display:none">
                <p class="text-danger">Le nom est obligatoire.</p>
              </div>
              <div id="uniq-msg" style="display:none">
                <p class="text-danger">Ce nom existe déjà.</p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="modeleFormLink()">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </form>

</div><!--end grid-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<script>
  const myModal = document.getElementById('exampleModal')

  myModal.addEventListener('shown.bs.modal', () => {

  })
  const form = document.getElementById('form')
  function modeleFormLink() {
    const modeles_noms = @json($modeles_noms);
    if (!Array.isArray(modeles_noms)) {
      modeles_noms = Object.values(modeles_noms);
    }
    const modele_value = document.getElementById('nom_modele').value;
    const oblg_message = document.getElementById('oblg-msg');
    const uniq_message = document.getElementById('uniq-msg');
    if (modele_value === "") {
      oblg_message.style.display = "block"
      uniq_message.style.display = "none"

    }
    else if (modeles_noms.includes(modele_value)) {
      oblg_message.style.display = "none"
      uniq_message.style.display = "block"
    }
    else {
      oblg_message.style.display = "none"
      uniq_message.style.display = "none"
      console.log(form.action)
      form.action = `/admin/modeles`
      form.method = "POST"
      form.submit()
    }
  }

  function docFormLink() {
    deviId = @json($docdevi->id);
    form.action = `/admin/docsdevis/${deviId}`
    let methodInput = document.createElement("input");
    methodInput.type = "hidden";
    methodInput.name = "_method";
    methodInput.value = "PUT";
    form.appendChild(methodInput);
    // console.log(form)
    form.submit()

  }
  download_btn = document.getElementById("download")
  download_btn.addEventListener('click', function () {

    console.log('download')

    const divElement = document.querySelector('.devis-card');
    InputToDiv('details-input', 'details-div')
    InputToDiv('conditions_input', 'conditions_span')
    InputToDiv('titre', 'titre-div')
    InputToDiv('nom-societe-input', 'nom-societe-div')
    InputToDiv('mode_input', 'mode_span')
    InputToDiv('ref-input', 'ref-span')
    InputToDiv('nclient-input', 'nclient-span')
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
    DivToInput('conditions_input', 'conditions_span')
    DivToInput('ref-input', 'ref-span')
    DivToInput('nclient-input', 'nclient-span')
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
    Input.style.marginBottom = ''
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