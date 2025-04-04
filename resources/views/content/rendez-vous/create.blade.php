@extends('layouts.master')
@section('title')
    {{ __('t-appointment-create') }}
@endsection
@section('content')
    <!-- page title -->
    <x-page-title title="{{__('t-appointment-create')}}" pagetitle="Pages" />
    <div class="tab-content">
        <div class="block tab-pane" id="personalTabs">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-1 text-15">{{__('t-appointment-create')}}</h6><br>
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                        <div class="xl:col-span-6">
                            <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">
                                {{__('t-prospect-fuild-name')}}
                            </label>
                            <input type="text" id="productCodeInput"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Product Code" value="{{ $client->name }}" disabled required>
                        </div><!--end col-->
                        <div class="xl:col-span-6">
                            <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">
                                {{__('t-prospect-fuild-entreprise_name')}}
                            </label>
                            <input type="text" id="productCodeInput"  name="entreprise_name"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                value="{{ $client->entreprise_name ? $client->entreprise_name : 'not found' }}" 
                                >
                        </div><!--end col-->
                    </div><!--end col--> <br>


                    <form action="{{ route('admin.appointment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="client_id" value="{{ $client->id }}">
                        {{-- origine de demande section --}}
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            <div class="xl:col-span-4">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">
                                    Date De Demande
                                </label>
                                <input type="date" id="inputValue" required
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    value="{{ old('date_demande', date('Y-m-d')) }}" name="date_demande">

                                @error('date_demande')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-4">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">Origine de demande</label>
    <select required
        class="form-input border-slate-300 focus:outline-none focus:border-custom-500"
        id="origine" name="origine" data-choices data-choices-sorting-false required>
        <option value="">Choisir un champ</option>
        <option value="appele_telephone" {{ old('type_besoin') == 'appele_telephone' ? 'selected' : '' }}>Appele telephone</option>
        <option value="email" {{ old('type_besoin') == 'email' ? 'selected' : '' }}>Service et email</option>
        <option value="autre" {{ old('type_besoin') == 'autre' ? 'selected' : '' }}>Autre</option>
    </select>
    @error('type_besoin')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div><!--end col-->

<div class="xl:col-span-4" id="autreOriginDeDemande" style="display: none">
    <label for="inputValue" class="inline-block mb-2 text-base font-medium"><span id="origineDemandeLabel"></span></label>
    <div id="dynamicFields"></div>
    <input type="hidden" id="autreOrigineHidden" name="autre_origine">
    @error('autre_origine')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>

<script>
    document.getElementById('origine').addEventListener('change', function() {
        const selectedValue = this.value;
        const autreOriginDeDemandeDiv = document.getElementById('autreOriginDeDemande');
        const origineDemandeLabel = document.getElementById('origineDemandeLabel');
        const dynamicFields = document.getElementById('dynamicFields');
        const autreOrigineHidden = document.getElementById('autreOrigineHidden');

        autreOriginDeDemandeDiv.style.display = 'none';
        origineDemandeLabel.textContent = '';
        dynamicFields.innerHTML = '';
        autreOrigineHidden.value = ''; 

        switch (selectedValue) {
            case 'appele_telephone':
                autreOriginDeDemandeDiv.style.display = 'block';
                origineDemandeLabel.textContent = 'GSM';
               
                dynamicFields.innerHTML = `
                    <input type="text" id="GSMNumber" class="form-input border-slate-200 focus:outline-none focus:border-custom-500" placeholder="Entrer le numéro GSM">
                    
                    <label for="fixedLineNumber" class="block mt-4 mb-2 text-sm font-medium">Numéro fixe</label>
                    <input type="text" id="fixedLineNumber" class="form-input border-slate-200 focus:outline-none focus:border-custom-500" placeholder="Entrer le numéro fixe">
                `;

                document.getElementById('GSMNumber').addEventListener('input', updateAutreOrigineValue);
                document.getElementById('fixedLineNumber').addEventListener('input', updateAutreOrigineValue);
                break;

            case 'email':
                autreOriginDeDemandeDiv.style.display = 'block';
                origineDemandeLabel.textContent = 'Email';

                dynamicFields.innerHTML = `
                    <input type="text" id="emailInput" class="form-input border-slate-200 focus:outline-none focus:border-custom-500" placeholder="Entrer votre email">
                `;

                document.getElementById('emailInput').addEventListener('input', function() {
                    autreOrigineHidden.value = this.value;
                });
                break;

            case 'autre':
                autreOriginDeDemandeDiv.style.display = 'block';
                origineDemandeLabel.textContent = 'Autre origine';

                dynamicFields.innerHTML = `
                    <input type="text" id="autreInput" class="form-input border-slate-200 focus:outline-none focus:border-custom-500" placeholder="Précisez l'origine">
                `;

                document.getElementById('autreInput').addEventListener('input', function() {
                    autreOrigineHidden.value = this.value;
                });
                break;

            default:
                autreOriginDeDemandeDiv.style.display = 'none';
                break;
        }
    });

    function updateAutreOrigineValue() {
        const whatsappValue = document.getElementById('GSMNumber')?.value || '';
        const fixedLineValue = document.getElementById('fixedLineNumber')?.value || '';
        document.getElementById('autreOrigineHidden').value = `GSM: ${whatsappValue}, Fixe: ${fixedLineValue}`;
    }
</script>
                        </div>











                        <br>
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">

                            <div class="xl:col-span-3">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">Type De
                                    Besoin</label>
                                <select required
                                    class="form-input border-slate-300 focus:outline-none focus:border-custom-500"
                                    id="type_besoin" name="type_besoin" required data-choices data-choices-sorting-false>
                                    <option value="">Choisir un champ</option>
                                    <option value="service" {{ old('type_besoin') == 'service' ? 'selected' : '' }}>
                                        Service
                                    </option>
                                    <option value="marchandise"
                                        {{ old('type_besoin') == 'marchandise' ? 'selected' : '' }}>
                                        Marchandise
                                    </option>
                                    <option value="service_et_marchandise"
                                        {{ old('type_besoin') == 'service_et_marchandise' ? 'selected' : '' }}>Service
                                        et
                                        Marchandise
                                    </option>
                                    <option value="autre" {{ old('type_besoin') == 'autre' ? 'selected' : '' }}>autre
                                    </option>
                                </select>
                                @error('type_besoin')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->

                            <div class="xl:col-span-3" id="categorie_de_besoin" style="display: none">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">Categories de
                                    besoin</label>
                                <select required
                                    class="form-input border-slate-300 focus:outline-none focus:border-custom-500"
                                    id="categorie_de_besoin_select" name="categorie_besoin" data-choices
                                    data-choices-sorting-false>
                                    <option value="nettoyage"
                                        {{ old('categorie_besoin') == 'nettoyage' ? 'selected' : '' }}>Nettoyage
                                    </option>
                                    <option value="climatisation"
                                        {{ old('categorie_besoin') == 'climatisation' ? 'selected' : '' }}>
                                        Climatisation</option>
                                    <option value="deratisation"
                                        {{ old('categorie_besoin') == 'deratisation' ? 'selected' : '' }}>
                                        Dératisation</option>
                                    <option value="surveillance"
                                        {{ old('categorie_besoin') == 'surveillance' ? 'selected' : '' }}>
                                        Surveillance</option>
                                    <option value="plomberie"
                                        {{ old('categorie_besoin') == 'plomberie' ? 'selected' : '' }}>Plomberie
                                    </option>
                                    <option value="serrurier"
                                        {{ old('categorie_besoin') == 'serrurier' ? 'selected' : '' }}>Serrurier
                                    </option>
                                    <option value="gardiennage"
                                        {{ old('categorie_besoin') == 'gardiennage' ? 'selected' : '' }}>
                                        Gardiennage</option>
                                    <option value="peinture" {{ old('categorie_besoin') == 'peinture' ? 'selected' : '' }}>
                                        Peinture
                                    </option>
                                    <option value="electricite"
                                        {{ old('categorie_besoin') == 'electricite' ? 'selected' : '' }}>
                                        Electricité</option>
                                    <option value="demenagement"
                                        {{ old('categorie_besoin') == 'demenagement' ? 'selected' : '' }}>
                                        Déménagement</option>
                                    <option value="amenagement"
                                        {{ old('categorie_besoin') == 'amenagement' ? 'selected' : '' }}>
                                        Aménagement</option>
                                    <option value="bricolage"
                                        {{ old('categorie_besoin') == 'bricolage' ? 'selected' : '' }}>Bricolage
                                    </option>
                                    <option value="anti_nuisibles"
                                        {{ old('categorie_besoin') == 'anti_nuisibles' ? 'selected' : '' }}>Anti
                                        nuisibles</option>
                                    <option value="autre" {{ old('categorie_besoin') == 'autre' ? 'selected' : '' }}>
                                        Autres</option>
                                </select>
                                @error('categorie_besoin')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->

                            <div class="xl:col-span-3" id="autre_type_de_besoin_div" style="display: none">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">Precisez le type
                                    de
                                    besoin</label>
                                <input type="text" name="autre_type_besoin" id="autre_type_de_besoin_input"
                                    class="w-full form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                @error('nature_de_service')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->

                            <div class="xl:col-span-3" id="nature_service_div" style="display: none">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">Nature de
                                    service</label>
                                <input type="text" name="nature_service" id="nature_de_service_input"
                                    class="w-full form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                @error('nature_de_service')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->

                            <div class="xl:col-span-3" id="autre_categorie_de_besoin_div" style="display: none">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">Précisez la
                                    catégorie du besoin
                                </label>
                                <input type="text" name="autre_categorie_besoin" id="autre_categorie_de_besoin_input"
                                    class="w-full form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                @error('autre_categorie_de_besoin')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->

                            <div class="xl:col-span-3" id="marchandise_div" style="display: none">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">marchandise
                                </label>
                                <input type="text" name="marchandise" id="autre_categorie_de_besoin_input"
                                    class="w-full form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                @error('marchandise')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const typeBesoinSelect = document.getElementById('type_besoin');
                                    const categorieDeBesoinDiv = document.getElementById('categorie_de_besoin');
                                    const categorieDeBesoinSelect = document.getElementById('categorie_de_besoin_select');
                                    const autreCategorieDeBesoinDiv = document.getElementById('autre_categorie_de_besoin_div');
                                    const autreTypeDeBesoinDiv = document.getElementById('autre_type_de_besoin_div');
                                    const marchandiseDiv = document.getElementById('marchandise_div');
                                    const autreCategorieSelect = document.getElementById('autre_categorie_de_besoin_input');
                                    const natureServiceDiv = document.getElementById('nature_service_div');

                                    function showElement(element) {
                                        element.style.display = 'block';
                                    }

                                    function hideElement(element) {
                                        element.style.display = 'none';
                                    }

                                    function handleCategorieDeBesoinChange() {
                                        const selectedValue = categorieDeBesoinSelect.value;

                                        hideElement(autreCategorieDeBesoinDiv);

                                        if (selectedValue === 'autre') {
                                            showElement(autreCategorieDeBesoinDiv);
                                        }
                                    }

                                    function handleDropdownChange() {
                                        const selectedValue = typeBesoinSelect.value;

                                        hideElement(categorieDeBesoinDiv);
                                        hideElement(autreCategorieDeBesoinDiv);
                                        hideElement(autreTypeDeBesoinDiv);
                                        hideElement(marchandiseDiv);
                                        hideElement(natureServiceDiv);

                                        if (selectedValue === 'autre') {
                                            showElement(autreTypeDeBesoinDiv);
                                        }
                                        if (selectedValue === "service" ) {
                                            showElement(categorieDeBesoinDiv);
                                            showElement(natureServiceDiv);
                                        }if ( selectedValue ===  "marchandise") {
                                            showElement(marchandiseDiv);
                                            showElement(categorieDeBesoinDiv);
                                        }
                                        if (selectedValue === "service_et_marchandise" ) {
                                            showElement(marchandiseDiv);
                                            showElement(categorieDeBesoinDiv);
                                            showElement(natureServiceDiv);
                                        }
                                    }

                                    typeBesoinSelect.addEventListener('change', handleDropdownChange);

                                    categorieDeBesoinSelect.addEventListener('change', handleCategorieDeBesoinChange);

                                    handleDropdownChange();
                                    handleCategorieDeBesoinChange();
                                });
                            </script>
                        </div><!--end col-->
                        <br>

                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">

                            <div class="xl:col-span-6">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">Nom De Commercial
                                </label>
                                <input type="text" name="commercial_name" placeholder="Nom De Commercial"
                                    class="w-full form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                @error('commercial_name')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-6">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">Date
                                    Visiste</label>
                                <input type="date" id="inputValue"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    value="{{ old('date_visite', date('Y-m-d')) }}" name="date_visite">
                                @error('date_visite')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                        </div><!--end col-->
                        <br>
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">

                            <div class="xl:col-span-6">
                                <label for="type_codence" class="inline-block mb-2 text-base font-medium">Précisez la Type
                                    de cadence</label>
                                <select required
                                    class="form-input border-slate-300 focus:outline-none focus:border-custom-500"
                                    id="type_codence" name="type_cadence" data-choices data-choices-sorting-false>
                                    <option value="">Choisir un type</option>
                                    <option value="ponctuelle"
                                        {{ old('type_codence') == 'ponctuelle' ? 'selected' : '' }}>
                                        Ponctuelle</option>
                                    <option value="reguliere"
                                        {{ old('type_codence') == 'reguliere' ? 'selected' : '' }}>
                                        Régulière</option>
                                    <option value="autre"
                                        {{ old('type_codence') == 'autre' ? 'selected' : '' }}>
                                        Autre
                                    </option>
                                </select>
                                @error('type_codence')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->

                            <div class="xl:col-span-6" id="preciser_condence" style="display: none">
                                <label for="autre_categorie_de_besoin_input"
                                    class="inline-block mb-2 text-base font-medium" id="preciser_condence_label">Préciser
                                    la cadence</label>
                            <select name="autre_type_cadence" id="autre_categorie_de_besoin_input"
                                class="w-full form-input border-slate-200">
                                <option value="">Choisir un type</option>
                                <option value="trimestriel">Trimestriel</option>
                                <option value="semestriel">Semestriel</option>
                                <option value="annuel">Annuel</option>
                            </select>
                                @error('preciser_condence')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->


                            <div class="xl:col-span-6" id="preciser_condenceAutre" style="display: none">
                                <label for="autre_categorie_de_besoin_input"
                                    class="inline-block mb-2 text-base font-medium" id="preciser_condence_label">Préciser
                                    la cadence</label>
                            <input  type="text" name="autre_type_cadence" id="autre_categorie_de_besoin_input"
                                class="w-full form-input border-slate-200">
                              
                                @error('preciser_condence')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->

                            <script>
                                // Function to handle changes in the dropdown
                                document.getElementById('type_codence').addEventListener('change', function() {
                                    var selectedValue = this.value;
                                    var preciserCodenceDiv = document.getElementById('preciser_condence');
                                    var preciserCodenceAutreDiv = document.getElementById('preciser_condenceAutre');
                                    var preciserCodenceLabel = document.getElementById('preciser_condence_label');
                                    var autreCategorieInput = document.getElementById('autre_categorie_de_besoin_input');

                                    // Reset the display style, label, and input value on each change
                                    preciserCodenceDiv.style.display = 'none';
                                    preciserCodenceAutreDiv.style.display = 'none';
                                    preciserCodenceLabel.textContent = 'Préciser la cadence';
                                    autreCategorieInput.value = '';

                                    // Update label and placeholder for "Régulière"
                                    if (selectedValue === 'reguliere') {
                                        preciserCodenceDiv.style.display = 'block';
                                        preciserCodenceLabel.textContent = 'Cadence régulière';
                                        autreCategorieInput.style.display = 'none'; 
                                        var cadenceSelect = document.getElementById('cadence_type_select');
                                        cadenceSelect.style.display = 'block'; 
                                    } else if (selectedValue === 'autre') {
                                        preciserCodenceAutreDiv.style.display = 'block';
                                        preciserCodenceLabel.textContent = 'Autre type de cadence';
                                        autreCategorieInput.placeholder = 'Autre type de cadence';
                                    } else {
                                        // For other options, the placeholder remains the default
                                        autreCategorieInput.placeholder = 'Préciser la cadence';
                                    }
                                });
                            </script>


                            <div class="xl:col-span-12">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">Détail du service
                                </label>
                                <textarea name="detail"
                                    class="w-full form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="exampleFormControlTextarea" placeholder="Enter your description" rows="5">{{ old('adresse') }}</textarea>

                                @error('preciser_condence')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->


                        </div><!--end grid-->
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
