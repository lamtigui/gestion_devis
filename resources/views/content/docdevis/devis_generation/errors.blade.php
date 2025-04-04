@extends('layouts.master')
@section('title')
{{ __('create-devis') }}
@endsection
@section('content')
<!-- page title -->
<x-page-title title="Creé devis" pagetitle="Pages" />
<div class="tab-content">
    <div class="block tab-pane" id="personalTabs">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-1 text-15">Creé un devis</h6><br>
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                    <div class="xl:col-span-4">
                        <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">Client
                            Name</label>
                        <input type="text" id="productCodeInput"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Product Code" value="{{ $appointement->Client->name }}" disabled>
                    </div><!--end col-->
                    <div class="xl:col-span-4">
                        <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">Entreprise
                            Name</label>
                        <input type="text" id="productCodeInput"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            value="{{ $appointement->Client ? $appointement->Client->entreprise_name : 'not found' }}"
                            disabled>
                    </div><!--end col-->
                    <div class="xl:col-span-4">
                        <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">Entreprise
                            Name</label>
                        <input type="text" id="productCodeInput"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            value="{{ $appointement->date_demande }}" disabled>
                    </div><!--end col-->
                </div><!--end col--> <br>
                <form action="{{ route('admin.devis.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="appointment_id" value="{{ $appointement->id }}">
                    <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
                    {{-- origine de demande section --}}
                    <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                        <div class="xl:col-span-6">
                            <label for="inputValue" class="inline-block mb-2 text-base font-medium">N° Devis</label>
                            <input type="text" id="inputValue" required
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                value="{{ old('n_devis') }}" name="n_devis">
                            @error('n_devis')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div><!--end col-->
                        <div class="xl:col-span-6">
                            <label for="inputValue" class="inline-block mb-2 text-base font-medium">Date Devis</label>
                            <input type="date" id="inputValue" required
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                value="{{ old('date', date('Y-m-d')) }}" name="date">
                            @error('date')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div><!--end col-->
                    </div>
                    <br>

                    <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                        <div class="xl:col-span-4">
                            <label for="type_codence" class="inline-block mb-2 text-base font-medium">Etat de
                                devis</label>
                            <select required
                                class="form-input border-slate-300 focus:outline-none focus:border-custom-500"
                                name="etat" data-choices data-choices-sorting-false>
                                <option value="">Choisir Etat</option>
                                <option value="signeé" {{ old('etat') == 'signeé' ? 'selected' : '' }}>signeé</option>
                                <option value="non signeé" {{ old('etat') == 'non signeé' ? 'selected' : '' }}>non
                                    signeé
                                </option>
                                <option value="en attente de réflexion" {{ old('etat') == 'en attente de réflexion' ? 'selected' : '' }}>en attente de
                                    réflexion</option>

                            </select>
                            @error('etat')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div><!--end col-->
                        <div class="xl:col-span-4">
                            <label for="type_codence" class="inline-block mb-2 text-base font-medium">Mode
                                D'envoi</label>
                            <select required
                                class="form-input border-slate-300 focus:outline-none focus:border-custom-500"
                                id="mode_envoi" name="mode_envoi" data-choices data-choices-sorting-false>
                                <option value="">Choisir une mode</option>
                                <option value="whatssap" {{ old('mode_envoi') == 'whatssap' ? 'selected' : '' }}>
                                    whatssap</option>
                                <option value="email" {{ old('mode_envoi') == 'email' ? 'selected' : '' }}>
                                    email</option>
                                <option value="autre" {{ old('mode_envoi') == 'autre' ? 'selected' : '' }}>
                                    Autre
                                </option>
                            </select>
                            @error('mode_envoi')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div><!--end col-->

                        <div class="xl:col-span-4" id="autre_mode_envoi" style="display: none">
                            <label for="autre_categorie_de_besoin_input" class="inline-block mb-2 text-base font-medium"
                                id="preciser_condence_label">Préciser mode d'envoi</label>
                            <input type="text" name="autre_mode_denvoi_devis" id="autre_categorie_de_besoin_input"
                                class="w-full form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Préciser le mode d'envoi">
                            @error('autre_mode_denvoi_devis')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <script>
                            // Function to handle changes in the dropdown
                            document.addEventListener('DOMContentLoaded', function () {
                                var modeEnvoiDropdown = document.getElementById('mode_envoi');
                                var autreModeEnvoiDiv = document.getElementById('autre_mode_envoi');

                                // Event listener for change in dropdown
                                modeEnvoiDropdown.addEventListener('change', function () {

                                    var selectedValue = this.value;

                                    // Reset display on each change
                                    autreModeEnvoiDiv.style.display = 'none';

                                    // Show the second div if "Autre" is selected
                                    if (selectedValue === 'autre') {
                                        autreModeEnvoiDiv.style.display = 'block';
                                    }
                                });

                                // Trigger change event once on page load to initialize
                                modeEnvoiDropdown.dispatchEvent(new Event('change'));
                            });
                        </script>


                    </div>

                    <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                        <div class="xl:col-span-4">
                            <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">Prix
                                Unitaire</label>
                            <input type="number" id="prix_unitaire" name="prix_unitaire"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="prix unitaire" required>
                            @error('prix_unitaire')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div><!--end col-->
                        <div class="xl:col-span-4">
                            <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">Quantité</label>
                            <input type="number" id="quantité" name="quantité"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Quantité" value=1 min=1 required>
                            @error('quantité')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div><!--end col-->
                    
                    <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                        <div class="xl:col-span-4">
                            <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">Prix Hors
                                Tax</label>
                            <input type="number"  id="prix_hors_taxe" 
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="prix hors tax" disabled>
                            @error('prix_hors_taxe')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div><!--end col-->
                        <div class="xl:col-span-4">
                            <label for="taxApplicable" class="inline-block mb-2 text-base font-medium">TAX TVA</label>
                            <select id="taux_tva"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                data-choices data-choices-search-false name="taux_tva" id="taxApplicable">
                                <option value="">Select TAX Applicable</option>
                                <option value="20">20 %</option>
                                <option value="0">0 %</option>
                                <option value="autre">autre</option>
                            </select>
                            @error('taux_tva')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div><!--end col-->
                    <div class="xl:col-span-4" style="display: none" id="autre_taux_tva_div">
                        <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">Specifier
                            Taux Tva</label>
                        <input type="number" id="autre_taux_tva" name="autre_taux_tva"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="speacifier taux tva">
                    </div><!--end col-->
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var taxApplicableSelect = document.getElementById('taux_tva');
                            var autreTauxTvaDiv = document.getElementById('autre_taux_tva_div');

                            // Event listener for change in dropdown
                            taxApplicableSelect.addEventListener('change', function () {
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

                    {{-- --}}
                    <div class="xl:col-span-6">
                        <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">Remise
                            01</label>
                        <input type="number" id="remise_01" name="remise_1"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="remise 01" required>
                    </div><!--end col-->
                    <div class="xl:col-span-6">
                        <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">date remise
                            1</label>
                        <input type="date" id="productDiscounts"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="date remise 1">
                    </div><!--end col-->


                    {{-- calcule --}}

                    <div class="xl:col-span-4">
                        <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">Prix HT
                            Final</label>
                        <input type="number" id="prixHTFinal" 
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Prix Hors Tax Final"   name="prix_hors_taxe">
                    </div><!--end col-->
                    <div class="xl:col-span-4">
                        <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">Mantant
                            TVA</label>
                        <input type="number" id="mantant_tva" disabled
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="remise 01">
                    </div><!--end col-->
                    <div class="xl:col-span-4">
                        <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">Prix
                            TTC</label>
                        <input type="number" id="prixTTC" disabled
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Prix TTC">
                    </div><!--end col-->


            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var prixUnitaireTaxeInput = document.getElementById('prix_unitaire');
                    var quantitéInput = document.getElementById('quantité');
                    var tauxTvaSelect = document.getElementById('taux_tva');
                    var autreTauxTvaInput = document.getElementById('autre_taux_tva');
                    var remise01Input = document.getElementById('remise_01');
                    var mantantTvaInput = document.getElementById('mantant_tva');
                    var prixTTCInput = document.getElementById('prixTTC');
                    var prixHTFinalInput = document.getElementById('prixHTFinal');

                    // Function to calculate and update values
                    function calculateAndDisplayValues() {
                        var prixHorsTaxe = parseFloat(prixUnitaireTaxeInput.value )* quantitéInput.value || 0;
                        var remise01 = parseFloat(remise01Input.value) || 0;
                        var tauxTva = tauxTvaSelect.value === 'autre' ? parseFloat(autreTauxTvaInput.value) : parseFloat(tauxTvaSelect.value);
                        var montantTVA = (prixHorsTaxe - remise01) * tauxTva / 100;
                        var prixTTC = (prixHorsTaxe + montantTVA) - remise01;
                        var prixHTFinal = prixHorsTaxe - remise01;

                        // Update disabled inputs
                        mantantTvaInput.value = montantTVA.toFixed(2);
                        prixTTCInput.value = prixTTC.toFixed(2);
                        prixHTFinalInput.value = prixHTFinal.toFixed(2);
                        console.log(prixHTFinalInput.value)
                    }

                    // Event listeners for inputs and select
                    prixUnitaireTaxeInput.addEventListener('input', calculateAndDisplayValues);
                    quantitéInput.addEventListener('input', calculateAndDisplayValues);
                    tauxTvaSelect.addEventListener('change', calculateAndDisplayValues);
                    autreTauxTvaInput.addEventListener('input', calculateAndDisplayValues);
                    remise01Input.addEventListener('input', calculateAndDisplayValues);

                    // Initial calculation on page load
                    calculateAndDisplayValues();
                });
            </script>

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