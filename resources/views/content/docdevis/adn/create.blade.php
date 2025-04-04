@extends('layouts.master')
@section('title')
{{ __('Overview') }}
@endsection
@section('links')
<link rel="stylesheet" href="{{ URL::asset('build/css/adn_devis.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{ URL::asset('build/css/tailwind.min.css') }}">
@endsection

@section('content')
<!-- page title -->
<x-page-title title="Devi Info #  " pagetitle="Products" />

<div class="card devis">
    <form action="{{route(name: 'admin.docsdevis.store')}}" method="POST" id="form">
        @csrf
        <input type="hidden" name="devis_id" value={{$devi->id}}>
        <input type="hidden" name="n_devis" value={{$devi->n_devis}}>
        <input type="hidden" name="societe" value={{$entreprise}}>
        <div class="card devis-card">

            <div class=" flex justify-between">
                <div class="header-left">
                    <img src="{{asset('build/images/ADN_logo.png') }}" alt="">
                </div>
                <div class="header-right ">
                    <div class="devis-titre">
                        <div id="titre-div" class="titre-input" style="margin-bottom:10px">

                        </div>
                        <input type="text" name="titre" id="titre" placeholder="Titre du devis">
                    </div>
                    <div class="num-ref">
                        N° DE REF N°<input type="text" name="reference" placeholder="__" class="ref-input"
                            id="ref-input">
                        <span id="ref-div"></span>
                    </div>
                    <div class="date">
                        <p>
                            Date: {{\Carbon\Carbon::parse($devi->date)->isoFormat('DD/MM/YYYY') }}
                        </p>
                    </div>
                    <div class="client-nom">
                        <input type="text" name="nom_client" placeholder="NOM DU CLIENT" class="nom-societe-input"
                            id="nom-societe-input">
                        <div id="nom-societe-div"></div>
                    </div>
                </div>
            </div>
            <div class="devis-table">
                <table>
                    <thead>
                        <th>Description</th>
                        <th>Qté</th>
                        <th>Prix Unitaire</th>
                        <th>TVA</th>
                        <th>Total HT</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="description" id="description-td">
                                <textarea name="details" id="details-input"></textarea>
                                <div id="details-div"></div>
                            </td>
                            <td class="qte-td">{{$devi->quantite}}</td>
                            <td class="prix-unit-td">{{$devi->prix_unitaire}}</td>
                            <td class="tva-td">{{$devi->getNewTauxTvaAttribute()}}</td>
                            <td class="total-td">{{$devi->getMantantHTFinalAttrinute()}}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="not-bordred">
                            <td colspan="2" rowspan="5" class="conditions">
                                <h6>Conditions de paiement</h6>
                                <textarea name="conditions" id="conditions-input"></textarea>
                                <div id="conditions-div"></div>
                            </td>
                            <td class="not-bordred">

                            </td>
                            <td class="not-bordred totals">
                                <h6>Total HT:</h6>
                            </td>
                            <td class="prices">
                                {{number_format($devi->getMantantHTFinalAttrinute(), 2)}}
                            </td>
                        </tr>
                        <tr class="not-bordred">
                            <td class="not-bordred">

                            </td>
                            <td class="not-bordred totals">
                                <h6>TVA {{$devi->getNewTauxTvaAttribute()}} :</h6>
                            </td>
                            <td class="prices">
                                {{number_format($devi->getMantantTvaAttribute(), 2)}}
                            </td>
                        </tr>
                        <tr class="not-bordred">
                            <td class="not-bordred">

                            </td>
                            <td class="not-bordred totals">
                                <h6>Total TTC :</h6>
                            </td>
                            <td class="prices">
                                {{number_format($devi->getMantantTtcAttribute(), 2)}}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            @if($afficher_partnaires !== "false")
                <div class="partners">
                    <img src="{{asset('build/images/winbest_partners.jpg')}}" alt="">
                </div>
            @endif
        </div>
        <div class="buttons">

            <button class="btn button btn-info" id="download" type="button">
                <i data-lucide="download" width="15px"></i>
                Télécharger</button>
            <button class="btn button btn-success" type="submit"> <i data-lucide="save" width="15px"></i>Sauvegarder Les
                Modification</button>
            <button data-bs-toggle="modal" data-bs-target="#modelenomModal" class="btn button btn-primary"
                type="button">
                <i data-lucide="file-check-2" width="15px"></i>Sauvegarder
                Comme Modèle</button>
        </div>
        <!-- MODAL -->
        <div class="modal fade" id="modelenomModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
    const myModal = document.getElementById('modelenomModal')

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
    download_btn = document.getElementById("download")
    download_btn.addEventListener('click', function () {

        console.log('download')
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF();

        const divElement = document.querySelector('.devis-card');
        InputToDiv('details-input', 'details-div')
        InputToDiv('conditions-input', 'conditions-div')
        InputToDiv('titre', 'titre-div')
        InputToDiv('nom-societe-input', 'nom-societe-div')
        InputToDiv('ref-input', 'ref-div')
        const tds = document.querySelectorAll('.devis-table th, .devis-table td ,.devis-table tr ')
        tds.forEach(item => {
            item.style.paddingBottom = "10px"
            item.style.paddingLeft = "10px"
        })
        var opt = {
            margin: 0.5,
            filename: 'downloaded-file.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 4 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
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


            pdf.save('ADN-devis.pdf');
        });
        DivToInput('details-input', 'details-div')
        DivToInput('conditions-input', 'conditions-div')
        DivToInput('titre', 'titre-div')
        DivToInput('nom-societe-input', 'nom-societe-div')
        DivToInput('ref-input', 'ref-div')
    });

    function InputToDiv(inputId, divId) {
        const Div = document.getElementById(divId)
        const Input = document.getElementById(inputId)
        if (Div.style.display === 'none' || Div.style.display === '') {
            Div.style.display = '';
        }
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