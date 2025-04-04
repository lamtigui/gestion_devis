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
    <form action="{{route('admin.modeles.update', $modele->id)}}" id="form" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="devis_id" value={{$modele->id}}>
        <input type="hidden" name="societe" value={{$modele->entreprise}}>
        <div class="card devis-card">

            <div class=" flex justify-between">
                <div class="header-left">
                    <img src="{{asset('build/images/ADN_logo.png') }}" alt="">
                </div>
                <div class="header-right ">
                    <div class="devis-titre">
                        <div id="titre-div" class="titre-input" style="margin-bottom:10px">

                        </div>
                        <input type="text" name="titre" id="titre" placeholder="Titre du devis"
                            value="{{$modele->titre}}">
                    </div>
                    <div class="num-ref">
                        N° DE REF N°<input type="text" name="reference" placeholder="__" class="ref-input"
                            id="ref-input" value="{{$modele->reference}}">
                        <span id="ref-div"></span>
                    </div>
                    <div class="date">
                        <p>
                            Date: <span id="date-span"></span>
                            <input type="date" placeholder="JJ/MM/AAAA" name="date" id="date-input" style="width:120px">
                        </p>
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
                        <th>Description</th>
                        <th>Qté</th>
                        <th>Prix Unitaire</th>
                        <th>TVA</th>
                        <th>Total HT</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="description" id="description-td">
                                <textarea name="details" id="details-input">{{$modele->details}}</textarea>
                                <div id="details-div"></div>
                            </td>
                            <td class="qte-td"><input type="number" id="qt" min="1" name="quantite" placeholder="_"
                                    class="small-inputs" oninput="calculateTotalHT()" value="{{$modele->quantité}}">
                            </td>
                            <td class="prix-unit-td"><input type="number" id="pu" oninput="calculateTotalHT()"
                                    class="small-inputs" name="prix_unitaire" placeholder="_"
                                    value="{{$modele->prix_unitaire}}"></td>
                            <td class="tva-td"><input type="number" id="tva" name="tva" placeholder="__"
                                    class="small-inputs" oninput="calculateTTC()" value="{{$modele->tva}}" min="0">%
                            </td>
                            <td class="total-td" id="total-ht"></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="not-bordred">
                            <td colspan="2" rowspan="5" class="conditions">
                                <h6>Conditions de paiement</h6>
                                <textarea name="conditions" id="conditions-input">{{$modele->conditions}}</textarea>
                                <div id="conditions-div"></div>
                            </td>
                            <td class="not-bordred">

                            </td>
                            <td class="not-bordred totals">
                                <h6>Total HT:</h6>
                            </td>
                            <td class="prices" id="total-ht-2">

                            </td>
                        </tr>
                        <tr class="not-bordred">
                            <td class="not-bordred">

                            </td>
                            <td class="not-bordred totals">
                                <h6>TVA <span id="tva-2">0</span>% :</h6>
                            </td>
                            <td class="prices" id="taux_tva">

                            </td>
                        </tr>
                        <tr class="not-bordred">
                            <td class="not-bordred">

                            </td>
                            <td class="not-bordred totals">
                                <h6>Total TTC :</h6>
                            </td>
                            <td class="prices" id="ttc">

                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            @if($modele->afficher_partnaires !== "false")
                <div class="partners" style="margin-top:50px">
                    <img src="{{asset('build/images/winbest_partners.jpg')}}" alt="">
                </div>
            @endif
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<script>
    calculateTotalHT()
    function calculateTotalHT() {
        const qt_value = parseInt(document.getElementById("qt").value);
        const pu_value = parseInt(document.getElementById("pu").value);
        const total_ht = document.getElementById("total-ht");
        const total_ht2 = document.getElementById("total-ht-2");

        let result = qt_value * pu_value;
        if (result > 0) {
            total_ht.innerText = result
            total_ht2.innerText = result
        }
        calculateTTC()
    }
    function calculateTTC() {
        const tva_value = parseInt(document.getElementById('tva').value);
        const tva_content = document.getElementById('tva-2');
        const taux_tva_content = document.getElementById('taux_tva');
        const ttc_content = document.getElementById('ttc');
        const total_ht = parseFloat(document.getElementById("total-ht").innerText);

        tva_content.innerText = tva_value ? tva_value : 0

        let taux_tva_result = (total_ht * tva_value) / 100;
        let ttc_result = total_ht + parseFloat(taux_tva_result);
        console.log('total ht', total_ht)
        console.log('taux_tva_result', taux_tva_result)
        console.log('ttc', ttc_result)
        if (ttc_result > 0) {
            taux_tva_content.innerText = taux_tva_result;
            ttc_content.innerText = ttc_result
        }

    }
    const form = document.getElementById('form')


    download_btn = document.getElementById("download")
    download_btn.addEventListener('click', function () {

        console.log('download')
        const divElement = document.querySelector('.devis-card');
        InputToDiv('details-input', 'details-div')
        InputToDiv('conditions-input', 'conditions-div')
        InputToDiv('titre', 'titre-div')
        InputToDiv('nom-societe-input', 'nom-societe-div')
        InputToDiv('date-input', 'date-span')
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
        tds.forEach(item => {
            item.style.paddingBottom = ""
            item.style.paddingLeft = ""
        })
        DivToInput('details-input', 'details-div')
        DivToInput('conditions-input', 'conditions-div')
        DivToInput('titre', 'titre-div')
        DivToInput('nom-societe-input', 'nom-societe-div')
        DivToInput('date-input', 'date-span')
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