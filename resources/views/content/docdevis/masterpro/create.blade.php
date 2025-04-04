@extends('layouts.master')
@section('title')
{{ __('Overview') }}
@endsection
@section('links')
<link rel="stylesheet" href="{{ URL::asset('build/css/masterpro_devis.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{ URL::asset('build/css/tailwind.min.css') }}">
@endsection

@section('content')
<!-- page title -->
<x-page-title title="Devi Info # {{ $devi->n_devis }} " pagetitle="Products" />

<div class="card devis">
    <form action="{{route(name: 'admin.docsdevis.store')}}" method="POST" id="form">
        @csrf
        <div class="card devis-card">
            <input type="hidden" name="devis_id" value="{{$devi->id}}">
            <input type="hidden" name="societe" value="{{$entreprise}}">
            <input type="hidden" name="partenaires_img" value="{{$afficher_partnaires}}">
            <div class=" flex justify-between">
                <div style="display:flex; align-items:center;">
                    <h6 class=" flex align-center">MASTERPRO NETTOYAGE</h6>
                </div>
                <div class="right flex gap-6">
                    <div class="head-info">
                        <div class="entr-info">
                            <h6>WINBEST GROUP : MASTERPRO </h6>
                            <p>SIEGE : 46 Bd Zerktouni 2ème étage N6</p>
                            <p>Casablanca MAROC </p>
                            <p>41 Avenue OQBA BNOU NAFIAA AGDAL </p>
                            <p>RABAT</p>
                            <p>GSM 01 : +212 666 282 962</p>
                            <p>GSM 02 : +212 644 271 049</p>
                            <br>
                            <p>www.nettoyage-casablanca-maroc.com </p>
                            <br>

                        </div>
                        <div class="date-lieu">
                            <p>Casablanca, le
                                {{\Carbon\Carbon::parse($devi->date)->locale('fr')->isoFormat('Do MMMM YYYY') }}
                            </p>
                        </div>
                        <div class="nom-societe">
                            <div id="nom-societe-div" class="nom-societe-input" style="margin-bottom:10px">

                            </div>
                            <input type="text" name="nom_client" placeholder="NOM DU CLIENT" class="nom-societe-input"
                                id="nom-societe-input">
                        </div>
                    </div>
                    <div class="stars">
                        <img src="{{asset('build/images/top_rated.jpeg') }}" alt="" style='width:100px'>

                    </div>
                </div>
            </div>
            <div class="num">
                <h2> DEVIS N°{{$devi->n_devis}} </h2>
            </div>
            <div class="prestation">
                <div id="prestation-div" style="">

                </div>
                <textarea type="text" name="titre" placeholder="TITRE DU DEVIS" class="prestation-input"
                    id="prestation-input"></textarea>
            </div>
            <div class="table-devis" style="margin-bottom:50px  ">
                <table>
                    <thead>
                        <tr>
                            <th scope="col" id="designation-th">DESIGNATION</th>
                            <th scope="col">QTE</th>
                            <th scope="col" id="pu-th">P.U (HT)</th>
                            <th scope="col" id="pt-th">P.T (HT)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4" class="prestation-nom">
                                <div id="prestation-nom-div" style="margin-bottom:10px;display:none;">

                                </div>
                                <textarea name="prestation" id="prestation-nom-input"
                                    placeholder="PRESTATION"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="details" id="details-td">
                                <div id="details-div" style="margin-bottom:10px">
                                </div>
                                <textarea name="details" id="details" placeholder="Détails"></textarea>
                            </td>
                            <td class="quantity" id="qt-th">
                                {{$devi->quantite}}
                            </td>
                            <td class="prix-unitaire"> {{$devi->prix_unitaire}}
                            </td>
                            <td>{{$devi->prix_hors_taxe}}</td>
                        </tr>
                        <tr>
                            <td colspan="2" rowspan="9" class="politique" id="politique-td">
                                <div id="politique-div" style="margin-bottom:10px">

                                </div>
                                <textarea name="politique" id="politique"
                                    placeholder="Politique de gestion des agents"></textarea>
                            </td>
                            <th class="total-ht">
                                <p style="display:flex;justify-content:center;align-items:center"> TOTAL HT 01</p>
                            </th>
                            <td class="total-ht">{{$devi->prix_hors_taxe}}</td>
                        </tr>
                        @if($devi->remise_1)
                            <tr class="remise">
                                <th>REMISE 01</th>
                                <td colspan="2"> {{$devi->remise_1}} </td>
                            </tr>
                        @endif
                        @if($devi->remise_2)
                            <tr class="remise">
                                <th>REMISE 02</th>
                                <td colspan="2"> {{$devi->remise_2}} </td>
                            </tr>
                        @endif
                        @if($devi->remise_3)
                            <tr class="remise">
                                <th>REMISE 03</th>
                                <td colspan="2"> {{$devi->remise_3}} </td>
                            </tr>
                        @endif
                        @if($devi->remise_4)
                            <tr class="remise">
                                <th>REMISE 04</th>
                                <td colspan="2"> {{$devi->remise_4}} </td>
                            </tr>
                        @endif
                        @if($devi->remise_5)
                            <tr class="remise">
                                <th>REMISE 05</th>
                                <td colspan="2"> {{$devi->remise_5}} </td>
                            </tr>
                        @endif
                        <tr>
                            <th class="total-ht">TOTAL HT 02</th>
                            <td colspan="2" class="total-ht"> {{$total_ht2}} </td>
                        </tr>
                        <tr>
                            <th class="tva">TVA 20%</th>
                            <td colspan="2" class="tva"> {{$devi->getNewTauxTvaAttribute()}}% </td>
                        </tr>
                        <tr>
                            <th class="total-ttc">TOTAL TTC</th>
                            <td colspan="2" class="total-ttc"> {{$devi->getMantantTtcAttribute()}} </td>
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="50" style="text-align:center">Nous restons à votre disposition pour toute
                                information complémentaire.</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            @if($afficher_partnaires !== "false")
                <div class="partners">
                    <img src="{{asset('build/images/winbest_partners.jpg')}}" alt="">
                </div>
            @endif
            <div class="footer">
                <div class="mode-pay">
                    <p> <span class="titre">MODE DE PAIEMENT : </span>
                        <textarea name="mode_paiement" id="mode-pay" placeholder="Mode de paiement"></textarea>
                        <span id="mode-pay-span"></span>
                    </p>
                </div>
                <div class="info-societe">
                    <p>Société à Responsabilité Limitée au capital de 100 000 DH
                        <br>RC : 395099 -TP : 34295056 -IF : 25038913 -CNSS : 5840328
                        <br>ICE: 001962479000093
                    </p>
                </div>
            </div>
        </div>
        <div class="buttons">

            <button class="btn button btn-info" id="download" type="button">
                <i data-lucide="download" width="15px"></i>
                Télécharger</button>
            <button class="btn button btn-success" type="submit"> <i data-lucide="save" width="15px"></i>Sauvegarder Les
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
    download_btn = document.getElementById("download")
    download_btn.addEventListener('click', function () {

        console.log('download')
        // Initialize jsPDF instance

        // Get the HTML content of the div you want to convert to PDF
        const divElement = document.querySelector('.devis-card');
        InputToDiv('details', 'details-div')
        InputToDiv('politique', 'politique-div')
        InputToDiv('prestation-nom-input', 'prestation-nom-div')
        InputToDiv('prestation-input', 'prestation-div')
        InputToDiv('nom-societe-input', 'nom-societe-div')
        InputToDiv('mode-pay', 'mode-pay-span')
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


            pdf.save('MASTERPRO-devis.pdf');
        });
        DivToInput('details', 'details-div')
        DivToInput('politique', 'politique-div')
        DivToInput('prestation-nom-input', 'prestation-nom-div')
        DivToInput('prestation-input', 'prestation-div')
        DivToInput('nom-societe-input', 'nom-societe-div')
        DivToInput('mode-pay', 'mode-pay-span')
    });

    function InputToDiv(inputId, divId) {
        const Div = document.getElementById(divId)
        const Input = document.getElementById(inputId)
        if (Div.style.display === 'none' || Div.style.display === '') {
            Div.style.display = '';  // Show the div
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