@extends('layouts.master')
@section('title')
{{ __('Overview') }}
@endsection
@section('links')
<link rel="stylesheet" href="{{ URL::asset('build/css/devis.css') }}">
<!-- bootstrap links -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{ URL::asset('build/css/tailwind.min.css') }}">
</body>

@endsection

@section('content')
<!-- page title -->
<x-page-title title="Devi Info # {{ $modele->nom }} " pagetitle="Products" />

@error('n_devis')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
@enderror
<div class="card devis">
    <form action="{{route('admin.modeles.update', $modele->id)}}" id="form" method="POST">
        @csrf
        @method('PUT')
        <div class="card devis-card">

            <div class=" flex justify-between ">
                <div>
                    <img src="{{asset('build/images/LOGO-win.webp') }}" alt="">
                </div>
                <div class="right  flex gap-6">
                    <div class="head-info">
                        <div class="entr-info">
                            <h6>WINBEST SERVICES </h6>
                            <p>SIEGE : 46 Bd Zerktouni 2ème étage N6</p>
                            <p>Casablanca MAROC </p>
                            <p>41 Avenue OQBA BNOU bbNAFIAA AGDAL </p>
                            <p>RABAT</p>
                            <p>GSM : +212 644 271 049</p>
                            <p>www.nettoyage-casablanca-maroc.com
                            </p>
                        </div>
                        <div class="date-lieu">
                            <p>Casablanca, le <input type="text" placeholder="JJ, MMMM AAAA" name="date"
                                    style="width:140px">
                            </p>
                        </div>
                        <div class="nom-societe">
                            <div id="nom-societe-div" class="nom-societe-input" style="margin-bottom:10px">

                            </div>
                            <input type="text" name="nom_client" placeholder="NOM DU CLIENT"
                                value="{{$modele->nom_client}}" class="nom-societe-input" id="nom-societe-input">
                        </div>
                    </div>
                    <div class="stars">
                        <img src="{{asset('build/images/top_rated.jpeg') }}" alt="" style='width:100px'>

                    </div>
                </div>
            </div>
            <div class="num">
                <h2> DEVIS N°<input type="number" name="n_devis" style="width:60px;color: rgb(0, 18, 100);"
                        value={{$modele->n_devis}}></h2>
            </div>
            <div class="prestation">
                <div id="prestation-div" style="display:none;margin-bottom:10px">

                </div>
                <textarea type="text" name="titre" placeholder="TITRE DU DEVIS" class="prestation-input"
                    id="prestation-input"> {{$modele->titre}} </textarea>
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
                                <div id="prestation-nom-div" style="display:none;margin-bottom:10px">

                                </div>
                                <textarea name="prestation" id="prestation-nom-input"
                                    placeholder="PRESTATION">{{$modele->prestation}} </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="details" id="details-td">
                                <div id="details-div" style="display:none;margin-bottom:10px">
                                </div>
                                <textarea name="details" id="details"
                                    placeholder="Détails">{{$modele->details}}</textarea>
                            </td>
                            <td class="quantity" id="qt-th">
                                <input type="number" min=1 id="quantite_value" oninput="calculateTotalHT()"
                                    name="quantite" value={{$modele->quantite ? $modele->quantite : 1}}>
                            </td>
                            <td class="prix-unitaire">
                                <input type="number" min=1 id="prix_unitaire" oninput="calculateTotalHT()"
                                    name="prix_unitaire" value={{$modele->prix_unitaire ? $modele->prix_unitaire : 0}}>
                            </td>
                            <td id="pt_ht">{{$modele->getTotalHtAttribute()}}</td>
                        </tr>
                        <tr>
                            <td colspan="2" rowspan="50" class="politique" id="politique-td">
                                <div id="politique-div" style="display:none;margin-bottom:10px">

                                </div>
                                <textarea name="politique" id="politique"
                                    placeholder="Politique de gestion des agents">{{$modele->politique}}</textarea>

                            </td>
                            <th class="total-ht">
                                <p style="display:flex;justify-content:center;align-items:center"> TOTAL HT 01</p>
                            </th>
                            <td class="total-ht" id="total-ht1">{{$modele->getTotalHtAttribute()}}</td>
                        </tr>
                        @if($modele->remise_1)
                            <tr class="remise">
                                <th>REMISE 01</th>
                                <td colspan="2" class="remsie_tr"> <input type='number' oninput="calculateHT2()"
                                        name="remise_1" class="remise_input" value={{$modele->remise_1}}> </td>
                            </tr>
                        @endif
                        @if($modele->remise_2)
                            <tr class="remise">
                                <th>REMISE 02</th>
                                <td colspan="2" class="remsie_tr"> <input type='number' oninput="calculateHT2()"
                                        name="remise_2" class="remise_input" value={{$modele->remise_2}}> </td>
                            </tr>
                        @endif
                        @if($modele->remise_3)
                            <tr class="remise">
                                <th>REMISE 03</th>
                                <td colspan="2" class="remsie_tr"> <input type='number' oninput="calculateHT2()"
                                        name="remise_3" class="remise_input" value={{$modele->remise_3}}> </td>
                            </tr>
                        @endif
                        @if($modele->remise_4)
                            <tr class="remise">
                                <th>REMISE 04</th>
                                <td colspan="2" class="remsie_tr"> <input type='number' oninput="calculateHT2()"
                                        name="remise_4" class="remise_input" value={{$modele->remise_4}}> </td>

                            </tr>
                        @endif
                        @if($modele->remise_5)
                            <tr class="remise">
                                <th>REMISE 05</th>
                                <td colspan="2" class="remsie_tr"> <input type='number' oninput="calculateHT2()"
                                        name="remise_5" class="remise_input" value={{$modele->remise_5}}> </td>

                            </tr>
                        @endif
                        <td colspan="2" class="addRemiseBtn"> <button type="button" onclick="addRemise()"
                                id="addRemiseBtn">+ Ajouter
                                Remise</button></td>

                        <tr>
                            <th class="total-ht">TOTAL HT 02</th>
                            <td colspan="2" class="total-ht" id="total-ht2"> {{$modele->getMantantHTFinalAttrinute()}}
                            </td>
                        </tr>
                        <tr>
                            <th class="tva">TVA 20%</th>
                            <td colspan="2" class="tva"> <input type="number" oninput="calculateTTC()" id="taux_tva"
                                    name="taux_tva" style="width:30px" min="0" value={{$modele->tva}}>% </td>
                        </tr>
                        <tr>
                            <th class="total-ttc">TOTAL TTC</th>
                            <td colspan="2" class="total-ttc" id="total_ttc"> {{$modele->getMantantTtcAttribute()}}
                            </td>
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
            @if($modele->afficher_partnaires !== "false")
                <div class="partners">
                    <img src="{{asset('build/images/winbest_partners.jpg')}}" alt="">
                </div>
            @endif
            <div class="footer">
                <div class="mode-pay">
                    <p> <span class="titre">MODE DE PAIEMENT : </span>
                        <textarea name="mode_paiement" id="mode-pay"
                            placeholder="Mode de paiement"> {{$modele->mode_paiement}} </textarea>
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
        const prix_total_ht = document.getElementById('pt_ht');
        const total_ht1 = document.getElementById('total-ht1');
        const quantite_value = document.getElementById('quantite_value').value;
        const prix_unitaire_value = document.getElementById('prix_unitaire').value;

        result = parseInt(quantite_value) * parseFloat(prix_unitaire_value)
        prix_total_ht.innerText = "";
        total_ht1.innerText = "";
        result = parseInt(quantite_value) * parseFloat(prix_unitaire_value)
        if (result >= 0) {
            prix_total_ht.innerText = result;
            total_ht1.innerText = result;

        }
        calculateHT2()
    }
    function addRemise() {
        remises = document.getElementsByClassName('remise').length
        if (remises < 5) {
            remise_row = document.createElement('tr');
            remise_row.className = "remise"
            remise_row.innerHTML = `
                <th> REMISE 0${remises + 1} </th>
                <td colspan="2" class="remsie_tr"> <input type='number' oninput="calculateHT2()" name="remise_${remises + 1}" class="remise_input" > </td>

               `
            let remiseBtnRow = document.querySelector('.addRemiseBtn').parentElement;
            remiseBtnRow.parentElement.insertBefore(remise_row, remiseBtnRow);
            remises = document.getElementsByClassName('remise').length
            if (remises === 5) {
                document.querySelector('.addRemiseBtn').style.display = 'none'
            }
        }
    }

    function calculateHT2() {
        let total_remise = 0;
        const total_ht1 = document.getElementById('total-ht1').innerText ? document.getElementById('total-ht1').innerText : 0;
        const remises_input = document.getElementsByClassName('remise_input');
        const total_ht2 = document.getElementById('total-ht2')
        prev_totalht2 = total_ht2.innerText
        total_ht2.innerText = "";
        Array.from(remises_input).forEach(element => {
            if (element === NaN) {
                console.log('WEZ')
            }
            total_remise += element.value >= 0 ? parseInt(element.value) : 0
        });
        let result = parseFloat(total_ht1) - total_remise

        if (result >= 0) {
            total_ht2.innerText = result
        } else {
            total_ht2.innerText = prev_totalht2
        }
        calculateTTC()
    }

    function calculateTTC() {
        const tva = document.getElementById('taux_tva').value;
        const total_ttc = document.getElementById('total_ttc');
        const total_ht2 = parseFloat(document.getElementById('total-ht2').innerText);

        let result = total_ht2 + (total_ht2 * tva) / 100;
        total_ttc.innerText = "";
        total_ttc.innerText = result;


    }
    download_btn = document.getElementById("download")
    download_btn.addEventListener('click', function () {

        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF();

        const divElement = document.querySelector('.devis-card');
        const remiseBtnRow = document.querySelector('.addRemiseBtn').parentElement;
        remiseBtnRow.style.display = "none"
        InputToDiv('details', 'details-div')
        InputToDiv('politique', 'politique-div')
        InputToDiv('prestation-nom-input', 'prestation-nom-div')
        InputToDiv('prestation-input', 'prestation-div')
        InputToDiv('nom-societe-input', 'nom-societe-div')
        InputToDiv('mode-pay', 'mode-pay-span')
         html2canvas(divElement, {
            scale: 2,

        }).then((canvas) => {
            const imgData = canvas.toDataURL('image/png');

            const pdf = new jsPDF({
                orientation: 'portrait',
                unit: 'px',
                format: [794, 1253]
            });
            pdf.addImage(imgData, 'PNG', 0, 0, 794, 1253);
            pdf.save('devis-content.pdf');
        }); 
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


            pdf.save('WINBEST-devis.pdf');
        });
        remiseBtnRow.style.display = ""

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