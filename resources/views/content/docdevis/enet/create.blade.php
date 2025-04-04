@extends('layouts.master')
@section('title')
{{ __('Overview') }}
@endsection
@section('links')
<link rel="stylesheet" href="{{ URL::asset('build/css/enet_devis.css') }}">
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
                    <img src="{{asset('build/images/ENET_logo.png') }}" alt="">

                </div>
                <div class="header-right ">
                    <div class="num-ref">
                        DEVIS : <input type="text" name="reference" placeholder="__" class="ref-input" id="ref-input">
                        <span id="ref-div"></span>
                    </div>
                    <div class="date">
                        <p>
                            DATE : {{\Carbon\Carbon::parse($devi->date)->isoFormat('DD/MM/YYYY') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="devis-table">
                <table>
                    <thead id="header-head">
                        <th colspan="2">
                            ENET NETTOYAGE <br>
                            SIÈGE COMMERCIAL N 01, 19 Rue Pierre Parent,<br>
                            Casablanca<br>
                            TELEPHONE : 0658-97623<br>
                        </th>
                        <th colspan="3" id="info-client">
                            CLIENT: <span id="nom-client-span"></span>  <input type="text" name="nom_client" id="nom-client-input" placeholder="client"> <br>
                            <input type="text" placeholder="Lieux"><br>
                            TELEPHONE: <span id="telephone-span"></span> <input type="number" id="telephone-input" placeholder="06_____"> <br>
                        </th>
                    </thead>
                    <thead>
                        <th>N° </th>
                        <th>DESIGNATION </th>
                        <th>QTE</th>
                        <th>P.U/HT</th>
                        <th>P.T/HT</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="num_table"><input type="number" placeholder="__" min="0"></td>
                            <td class="description" id="description-td">
                                <textarea name="details" id="details-input" placeholder="Description"></textarea>
                                <div id="details-div"></div>
                            </td>
                            <td class="qte-td">{{$devi->quantite}}</td>
                            <td class="prix-unit-td">{{$devi->prix_unitaire}}</td>
                            <td class="total-td">{{$devi->getMantantHTFinalAttrinute()}}</td>
                        </tr>
                    </tbody>
                </table>
                <table id="foot-table">
                    <thead>
                        <th>Total HT:</th>
                        <th>TVA {{$devi->getNewTauxTvaAttribute()}} :</th>
                        <th>Total HT:</th>
                    </thead>
                    <tbody>

                <tr >
                            
                            <td class="prices">
                                {{number_format($devi->getMantantHTFinalAttrinute(), 2)}}
                            </td>
                       
                            <td class="prices">
                                {{number_format($devi->getMantantTvaAttribute(), 2)}}
                            </td>
                        
                            <td class="prices">
                                {{number_format($devi->getMantantTtcAttribute(), 2)}}
                            </td>
                        </tr>
                        </tbody>
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

        const divElement = document.querySelector('.devis-card');
        InputToDiv('details-input', 'details-div')
        InputToDiv('nom-client-input', 'nom-client-span')
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


            pdf.save('ENET-devis.pdf');
        });
        DivToInput('details-input', 'details-div')
        DivToInput('nom-client-input', 'nom-client-span')
        DivToInput('ref-input', 'ref-div')
    });

    function InputToDiv(inputId, divId) {
        const Div = document.getElementById(divId)
        const Input = document.getElementById(inputId)
        if (Div.style.display === 'none' || Div.style.display === '') {
            Div.style.display = '';
            Div.style.height = "100%"
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