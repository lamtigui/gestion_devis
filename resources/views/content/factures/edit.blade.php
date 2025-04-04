@extends('layouts.master')
@section('title')
    {{ __('modifier-facture') }}
@endsection
@section('content')
    <!-- page title -->
    <x-page-title title="Modifier Facture" pagetitle="Pages" />
    <div class="tab-content">
        <div class="block tab-pane" id="personalTabs">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-1 text-15">Creé une Fcature</h6><br>
                    @if (isset($facture->devis_id))
                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                            <div class="xl:col-span-6">
                                <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">Client
                                    Name</label>
                                <input type="text" id="productCodeInput"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Product Code" value="{{ $facture->devis->appointment->Client->name }}"
                                    disabled>
                            </div><!--end col-->
                            <div class="xl:col-span-6">
                                <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">Entreprise
                                    Name</label>
                                <input type="text" id="productCodeInput"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    value="{{ $facture->devis->appointment->Client ? $facture->devis->appointment->Client->entreprise_name : 'not found' }}"
                                    disabled>
                            </div><!--end col-->
                        </div><!--end col--> <br>
                    @endif
                    <form action="{{ route('admin.factures.update', $facture) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="devis_id" value="{{ $facture->devis_id }}">
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            <div class="xl:col-span-4">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">Referance de
                                    facture</label>
                                <input type="text" id="inputValue" required placeholder="REferance de facture"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    value="{{ old('n_facture', $facture->n_facture) }}" name="n_facture">
                                @error('n_facture')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-4">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">alternative</label>
                                <input type="text" required placeholder="alternative"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    value="{{ old('alternative', $facture->alternative) }}" name="alternative">
                                @error('alternative')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-4">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">Nom
                                    Entreprise</label>
                                <input type="text"
                                    @if (isset($facture->devis_id)) disabled value="{{ $facture->devis->appointment->Client->entreprise_name }}" @endif
                                    required placeholder="Nom de l'entreprise"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    value="{{ old('client_name', $facture->client_name) }}" name="client_name">
                                @error('client_name')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                        </div>
                        <br>

                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            <div class="xl:col-span-4">
                                <label for="type_codence" class="inline-block mb-2 text-base font-medium">Date de
                                    facture</label>
                                <input type="date" required placeholder="date de facture"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    value="{{ old('date_facture', $facture->date_facture) }}" name="date_facture">
                                @error('date_facture')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-4">
                                <label for="type_codence" class="inline-block mb-2 text-base font-medium">Etablit
                                    Par</label>
                                <input type="text" required placeholder="Etablit Par"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    value="{{ old('etableur_name', $facture->etableur_name) }}" name="etableur_name">
                                @error('etableur_name')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            @php
                            $services = [
                                'winbest nettoyage',
                                'winbest Devalisation',
                                'winbest Jardinage',
                                'winbest Camera Surveillance',
                                'winbest Serrurier',
                                'winbest Demenagement',
                                'winbest Amenagement',
                                'winbest Gardennage',
                                'winbest Desinfection',
                                'winbest Peinture',
                            ];
                        @endphp
                            <div class="xl:col-span-4">
                                <label class="inline-block mb-2 text-base font-medium">Emmeteur</label>
                                <select required
                                    class="form-input border-slate-300 focus:outline-none focus:border-custom-500"
                                    name="emmeteur_name" data-choices data-choices-sorting-false>
                                    <option value="">Choisir une Emmteur</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service }}"
                                            {{ old('service') == $service || $facture->emmeteur_name === $service ? 'selected' : '' }}>
                                            {{ $service }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('emmeteur_name')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                        </div>
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            <div class="xl:col-span-4">
                                <label for="type_codence" class="inline-block mb-2 text-base font-medium">Date de
                                    Validation</label>
                                <input type="date" required
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    value="{{ old('date_validation', $facture->date_validation) }}" name="date_validation">
                                @error('date_validation')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-4">
                                <label for="type_codence" class="inline-block mb-2 text-base font-medium">Type de
                                    validation</label>
                                <select required
                                    class="form-input border-slate-300 focus:outline-none focus:border-custom-500"
                                    name="type_validation" id="type_validation" data-choices data-choices-sorting-false>
                                    <option value="">Choisir une Validation</option>
                                    <option value="whatssap"
                                        {{ old('type_validation', $facture->type_validation) == 'whatssap' ? 'selected' : '' }}>
                                        whatssap</option>
                                    <option value="email"
                                        {{ old('type_validation', $facture->type_validation) == 'email' ? 'selected' : '' }}>
                                        email</option>
                                    <option value="bon_command"
                                        {{ old('type_validation', $facture->type_validation) == 'bon_command' ? 'selected' : '' }}>
                                        Bon de commande</option>
                                    <option value="autre"
                                        {{ old('type_validation', $facture->type_validation) == 'autre' ? 'selected' : '' }}>
                                        autre</option>
                                </select>
                                @error('type_validation')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="xl:col-span-4" id="autre_type_validation_div" style="display: none">
                                <label class="inline-block mb-2 text-base font-medium"><span
                                        id="autre_type_validation_label"></span></label>
                                <input type="text"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    value="{{ old('autre_type_validation', $facture->autre_type_validation) }}"
                                    name="autre_type_validation" id="autre_type_validation_input"
                                    placeholder="Autre Type de Validation">
                                @error('autre_type_validation')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var typeValidationSelect = document.getElementById('type_validation');
                                    var autreTypeValidationDiv = document.getElementById('autre_type_validation_div');
                                    var autreTypeValidationLabel = document.getElementById('autre_type_validation_label');
                                    var autreTypeValidationInput = document.getElementById('autre_type_validation_input');

                                    typeValidationSelect.addEventListener('change', function() {
                                        var selectedOption = this.value;
                                        switch (selectedOption) {
                                            case 'whatssap':
                                                showValidationInput('Whatssap Number', 'Enter Whatssap Number');
                                                break;
                                            case 'email':
                                                showValidationInput('Email Address', 'Enter Email Address');
                                                break;
                                            case 'bon_command':
                                                showValidationInput('Bon de commande', 'Enter Bon de commande');
                                                break;
                                            case 'autre':
                                                showValidationInput('Autre Type de Validation', 'Enter Autre Type de Validation');
                                                break;
                                            default:
                                                hideValidationInput();
                                                break;
                                        }
                                    });

                                    function showValidationInput(labelText, placeholderText) {
                                        autreTypeValidationDiv.style.display = 'block';
                                        autreTypeValidationLabel.textContent = labelText;
                                        autreTypeValidationInput.placeholder = placeholderText;
                                    }

                                    function hideValidationInput() {
                                        autreTypeValidationDiv.style.display = 'none';
                                    }

                                    // Trigger change event initially if old value is set to a specific option
                                    switch (typeValidationSelect.value) {
                                        case 'whatssap':
                                            showValidationInput('Whatssap Number', 'Enter Whatssap Number');
                                            break;
                                        case 'email':
                                            showValidationInput('Email Address', 'Enter Email Address');
                                            break;
                                        case 'bon_command':
                                            showValidationInput('Bon de commande', 'Enter Bon de commande');
                                            break;
                                        case 'autre':
                                            showValidationInput('Autre Type de Validation', 'Enter Autre Type de Validation');
                                            break;
                                        default:
                                            hideValidationInput();
                                            break;
                                    }
                                });
                            </script>
                        </div>
                        {{-- service list --}}
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            @if (isset($facture->devis_id))
                                <div class="xl:col-span-12">
                                    <label for="type_service_validation"
                                        class="inline-block mb-2 text-base font-medium">Type
                                        de services</label>
                                    <input type="text"
                                        value="{{ $facture->devis->appointment->type_besoin }} -> {{ $facture->devis->appointment->autre_type_besoin }}"
                                        disabled
                                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                </div>
                            @else
                                <div class="xl:col-span-6">
                                    <label for="type_service_validation"
                                        class="inline-block mb-2 text-base font-medium">Type
                                        de services</label>
                                    <select required
                                        class="form-input border-slate-300 focus:outline-none focus:border-custom-500"
                                        name="type_service_validation" id="type_service_validation" data-choices
                                        data-choices-sorting-false>
                                        <option value="">Choisir un type de service</option>
                                        <option value="services"
                                            {{ old('type_service_validation', $facture->type_service_validation) == 'services' ? 'selected' : '' }}>
                                            Services
                                        </option>
                                        <option value="marchandise"
                                            {{ old('type_service_validation', $facture->type_service_validation) == 'marchandise' ? 'selected' : '' }}>
                                            Marchandise
                                        </option>
                                        <option value="service_et_marchandise"
                                            {{ old('type_service_validation', $facture->type_service_validation) == 'service_et_marchandise' ? 'selected' : '' }}>
                                            Service et marchandise</option>
                                        <option value="autre"
                                            {{ old('type_service_validation', $facture->type_service_validation) == 'autre' ? 'selected' : '' }}>
                                            Autre
                                        </option>
                                    </select>
                                    @error('type_service_validation')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="xl:col-span-6" id="autre_type_service_div" style="display: none">
                                    <label class="inline-block mb-2 text-base font-medium"><span
                                            id="autre_type_service_label"></span></label>
                                    <input type="text"
                                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                        value="{{ old('autre_type_service', $facture->autre_type_service) }}"
                                        name="autre_type_service" id="autre_type_service_input" placeholder="">
                                    @error('autre_type_service')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var typeServiceSelect = document.getElementById('type_service_validation');
                                        var autreTypeServiceDiv = document.getElementById('autre_type_service_div');
                                        var autreTypeServiceLabel = document.getElementById('autre_type_service_label');
                                        var autreTypeServiceInput = document.getElementById('autre_type_service_input');

                                        typeServiceSelect.addEventListener('change', function() {
                                            var selectedOption = this.value;
                                            switch (selectedOption) {
                                                case 'services':
                                                    showServiceInput('Services', 'Entrez les informations sur les services');
                                                    break;
                                                case 'marchandise':
                                                    showServiceInput('Marchandise', 'Entrez les informations sur la marchandise');
                                                    break;
                                                case 'service_et_marchandise':
                                                    showServiceInput('Service et marchandise',
                                                        'Entrez les informations sur le service et la marchandise');
                                                    break;
                                                case 'autre':
                                                    showServiceInput('Autre', 'Entrez autre type de service');
                                                    break;
                                                default:
                                                    hideServiceInput();
                                                    break;
                                            }
                                        });

                                        function showServiceInput(labelText, placeholderText) {
                                            autreTypeServiceDiv.style.display = 'block';
                                            autreTypeServiceLabel.textContent = labelText;
                                            autreTypeServiceInput.placeholder = placeholderText;
                                        }

                                        function hideServiceInput() {
                                            autreTypeServiceDiv.style.display = 'none';
                                        }

                                        // Trigger change event initially if old value is set to a specific option
                                        switch (typeServiceSelect.value) {
                                            case 'services':
                                                showServiceInput('Services', 'Entrez les informations sur les services');
                                                break;
                                            case 'marchandise':
                                                showServiceInput('Marchandise', 'Entrez les informations sur la marchandise');
                                                break;
                                            case 'service_et_marchandise':
                                                showServiceInput('Service et marchandise',
                                                    'Entrez les informations sur le service et la marchandise');
                                                break;
                                            case 'autre':
                                                showServiceInput('Autre', 'Entrez autre type de service');
                                                break;
                                            default:
                                                hideServiceInput();
                                                break;
                                        }
                                    });
                                </script>
                            @endif
                        </div>
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            <div class="xl:col-span-6">
                                <label for="numero_livraison" class="inline-block mb-2 text-base font-medium">Numero de
                                    livraison</label>
                                <input type="text"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    value="{{ old('autre_type_service', $facture->numero_livraison) }}"
                                    name="numero_livraison" placeholder="numero de livraison">
                                @error('numero_livraison')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="xl:col-span-6">
                                <label class="inline-block mb-2 text-base font-medium">date de livraison</label>
                                <input type="date"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    value="{{ old('date_livraison', $facture->date_livraison) }}"
                                    name="autre_type_service" placeholder="">
                                @error('date_livraison')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            <div class="xl:col-span-3">
                                <label for="mantant_ht" class="inline-block mb-2 text-base font-medium">Mantant HT
                                </label>
                                <input type="text" id="prixht" oninput="CalculatTvaAndTtc()"
                                    @if (isset($facture->devis_id)) disabled value="{{ $facture->devis->prix_hors_taxe }}" @endif
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    value="{{ old('mantant_ht', $facture->mantant_ht) }}" name="mantant_ht"
                                    placeholder="montant HT">
                                @error('mantant_ht')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="xl:col-span-3">
                                <label for="taxApplicable" class="inline-block mb-2 text-base font-medium">TAX TVA</label>
                                @if (isset($facture->devis_id))
                                    <input type="number" value="{{ $facture->devis->getNewTauxTvaAttribute() }}"
                                        disabled
                                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                        placeholder="speacifier taux tva">
                                @else
                                    <select id="taux_tva" onchange="CalculatTvaAndTtc()" required
                                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                        data-choices data-choices-search-false name="taux_tva" id="taxApplicable">
                                        <option value="">Select TAX Applicable</option>
                                        <option value="20.00" @selected(old('taux_tva') == '20.00' || $facture->taux_tva == 20.00)>
                                            20 %
                                        </option>
                                        <option @selected(old('taux_tva' == 0.00, $facture->taux_tva == 0)) value="0.00">0 %</option>
                                        <option @selected(old('taux_tva' == "autre", $facture->taux_tva == "autre")) value="autre">autre</option>
                                    </select>
                                @endif
                                @error('taux_tva')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="xl:col-span-3" style="display: none" id="autre_taux_tva_div">
                                <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">Specifier
                                    Taux Tva</label>
                                <input type="number" id="taux_tva_input" name="autre_taux_tva"
                                    oninput="CalculatTvaAndTtc()"
                                    value="{{ old('autre_taux_tva', $facture->autre_taux_tva) }}"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="speacifier taux tva">
                            </div>
                            @if (!isset($facture->devis_id))
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var taxApplicableSelect = document.getElementById('taux_tva');
                                        var autreTauxTvaDiv = document.getElementById('autre_taux_tva_div');

                                        // Event listener for change in dropdown
                                        taxApplicableSelect.addEventListener('change', function() {
                                            var selectedValue = this.value;

                                            // Reset display on each change
                                            autreTauxTvaDiv.style.display = 'none';

                                            // Show the second div if "autre" is selected
                                            if (selectedValue === 'autre') {
                                                autreTauxTvaDiv.style.display = 'block';
                                            }
                                        });

                                        // Trigger change event once on page load to initialize
                                        taxApplicableSelect.dispatchEvent(new Event('change'));
                                    });
                                </script>
                            @endif
                            <div class="xl:col-span-3">
                                <label for="remise" class="inline-block mb-2 text-base font-medium">Remise </label>
                                <input type="number" id="remise" oninput="CalculatTvaAndTtc()"
                                    @if ($facture->devis_id) value="{{ $facture->devis->getRemiseFinalAttrinute() }}" disabled
                                @else
                                    value="{{ old('remise', $facture->remise) }}" name="remise" @endif
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="remise">
                                @error('remise')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            <div class="xl:col-span-3">
                                <label for="mantant_ht" class="inline-block mb-2 text-base font-medium">Mantant TVA
                                </label>
                                <input type="text" id="mantant_tva"
                                    @if (isset($facture->devis_id)) disabled value="{{ $facture->devis->getMantantTvaAttribute() }}" @endif
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="montant TVA">
                            </div>
                            <div class="xl:col-span-3">
                                <label for="mantant_ht" class="inline-block mb-2 text-base font-medium">Mantant HT finale
                                </label>
                                <input type="number" id="mantantHTF"
                                    @if (isset($facture->devis_id)) disabled value="{{ $facture->devis->getMantantHTFinalAttrinute() }}" @endif
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Mantant ht final">
                            </div>
                            <div class="xl:col-span-3">
                                <label for="" class="inline-block mb-2 text-base font-medium">Mantant TTC </label>
                                <input type="text" id="mantant_ttc"
                                    @if (isset($facture->devis_id)) disabled value="{{ $facture->devis->getMantantTtcAttribute() }}" @endif
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="montant TTC">
                            </div>
                            @if (!isset($facture->devis_id))
                                <script>
                                    function CalculatTvaAndTtc() {
                                        var tauxtva = parseFloat(document.getElementById('taux_tva').value);
                                        var autretauxtva = parseFloat(document.getElementById('taux_tva_input').value);
                                        var prixht = parseFloat(document.getElementById('prixht').value);
                                        var remise = parseFloat(document.getElementById('remise').value);

                                        if ((tauxtva >= 0 || autretauxtva > 0) && prixht > 0 && remise > 0) {
                                            var newtauxtva = tauxtva >= 0 ? tauxtva : autretauxtva;

                                            var prixHTfInal = prixht - remise;
                                            var mantantTVA = (newtauxtva * prixHTfInal) / 100;
                                            var mantantTTC = prixHTfInal + mantantTVA;

                                            document.getElementById('mantantHTF').value = prixHTfInal;
                                            document.getElementById('mantant_tva').value = mantantTVA;
                                            document.getElementById('mantant_ttc').value = mantantTTC;
                                        }
                                    }
                                    CalculatTvaAndTtc();
                                </script>
                            @endif
                        </div>


                        <div class="flex justify-end mt-6 gap-x-4">
                            <button type="submit"
                                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Create</button>
                        </div>
                    </form><!--end form-->
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ URL::asset('build/js/pages/pages-account-setting.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
