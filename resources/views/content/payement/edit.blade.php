@extends('layouts.master')
@section('title')
    {{ __('Account Settings') }}
@endsection
@section('content')
    <!-- page title -->
    <x-page-title title="Modifier Payement De Facture # {{ $payement->facture->n_facture }} " pagetitle="Pages" />

    <div class="tab-content">
        <div class="block tab-pane" id="personalTabs">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-1 text-15">{{ __('t-editPayement') }}</h6>
                    </p>
                    <form action="{{ route('admin.payements.update' , $payement) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            <div class="xl:col-span-6">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">Date</label>
                                <input type="date" id="inputValue"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Enter your value"
                                    value="{{ old('date_paiement', $payement->date_paiement) }}" name="date_paiement"
                                    required>
                                @error('date_paiement')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-6">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">montant :(max
                                    montant is
                                    {{ $payement->facture->getMantantTTC() - $payement->facture->Payement->sum('montant') }} )</label>
                                <input type="text" id="montantInput" type="number" min="0"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="montant de payement" value="{{ old('montant', $payement->montant) }}"
                                    name="montant" required>
                                @error('montant')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                                <script>
                                    // Get a reference to the input element
                                    const montantInput = document.getElementById('montantInput');
                                    // Calculate the maximum allowed value dynamically
                                    const maxAllowedValue = {{ $payement->facture->getMantantTTC() - $payement->facture->Payement->sum('montant') }};
                                    // Add an event listener for input change
                                    montantInput.addEventListener('input', function() {
                                        // Get the current value entered by the user
                                        const enteredValue = parseFloat(montantInput.value);

                                        // Check if enteredValue is greater than maxAllowedValue
                                        if (enteredValue > maxAllowedValue) {
                                            // If greater, reset the input value to maxAllowedValue
                                            montantInput.value = maxAllowedValue;
                                        }
                                    });
                                </script>
                            </div><!--end col-->
                        </div><!--end col-->
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            <div class="xl:col-span-4">
                                <label for="mode_de_payement" class="inline-block mb-2 text-base font-medium">Mode De
                                    Payement</label>
                                <select id="mode_de_payement" name="mode" onchange="toggleFieldsVisibility()" required
                                    class="form-input border-slate-300 focus:outline-none focus:border-custom-500"
                                    data-choices data-choices-sorting-false>
                                    <option value="" disabled>[MODE DE RÈGLEMENT]</option>
                                    <option @selected(old('mode', $payement->mode) === 'ESPÈCE') value="ESPÈCE">ESPÈCE</option>
                                    <option @selected(old('mode', $payement->mode) === 'VIREMENT ESPÈCE') value="VIREMENT ESPÈCE">VIREMENT ESPÈCE</option>
                                    <option @selected(old('mode', $payement->mode) === 'CHEQUE') value="CHEQUE">CHÈQUE</option>
                                    <option @selected(old('mode', $payement->mode) === 'VIREMENT') value="VIREMENT">VIREMENT</option>
                                    <option @selected(old('mode', $payement->mode) === 'PAR EFFET') value="PAR EFFET">NUMERO D'EFFET</option>
                                </select>
                                @error('mode')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="xl:col-span-4" id="remiseFields" style="display: none;">
                                <label for="numero_remise" class="inline-block mb-2 text-base font-medium">N Remise</label>
                                <input type="text" id="numero_remise"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500
                                                disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500
                                                dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                                                dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Numero de remise"
                                    value="{{ old('numero_remise', $payement->numero_remise) }}" name="numero_remise">
                                @error('numero_remise')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="xl:col-span-4" id="chequeFields" style="display: none;">
                                <label for="numero_cheque" class="inline-block mb-2 text-base font-medium"
                                    id="label_numero">Numéro de chèque</label>
                                <input type="text" id="numero_cheque"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500
                                                disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500
                                                dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                                                dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    value="{{ old('numero_cheque', $payement->numero_cheque) }}" name="numero_cheque">
                                @error('numero_cheque')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <script>
                                function toggleFieldsVisibility() {
                                    var mode = document.getElementById('mode_de_payement').value;
                                    if (mode === 'CHEQUE') {
                                        document.getElementById('chequeFields').style.display = 'block';
                                        document.getElementById('remiseFields').style.display = 'block';
                                        document.getElementById('label_numero').textContent = 'Numéro de chèque';
                                    } else if (mode === 'PAR EFFET') {
                                        document.getElementById('remiseFields').style.display = 'block';
                                        document.getElementById('chequeFields').style.display = 'block';
                                        document.getElementById('label_numero').textContent = 'Numéro d\'effet';
                                    }else{
                                        document.getElementById('remiseFields').style.display = 'none';
                                        document.getElementById('chequeFields').style.display = 'none';

                                    }
                                }

                                // Initial call to set visibility based on initial select value
                                toggleFieldsVisibility();
                            </script>

                        </div>

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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var villeSelect = document.getElementById('ville');
            var autreVilleDiv = document.getElementById('autre_ville_div');
            var autreVilleInput = document.getElementById('autre_ville');

            // Fonction pour afficher ou masquer le champ de saisie en fonction de la sélection
            function toggleAutreVilleInput() {
                if (villeSelect.value === 'Autre') {
                    autreVilleDiv.style.display = 'block';
                    autreVilleInput.setAttribute('required', 'required');

                } else {
                    autreVilleDiv.style.display = 'none';
                }
            }

            toggleAutreVilleInput();

            villeSelect.addEventListener('change', function() {
                toggleAutreVilleInput();
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var typeSelect = document.getElementById('type_client');
            var entrepriseDiv = document.getElementById('entreprise_name_div');
            var entrepriseInput = document.getElementById('entreprise_name');

            function toggleEntrepriseNameInput() {
                if (typeSelect.value === 'entreprise') {
                    entrepriseDiv.style.display = 'block';
                    entrepriseInput.setAttribute('required', 'required');
                } else {
                    entrepriseDiv.style.display = 'none';
                }
            }

            // Appeler la fonction pour afficher ou masquer le champ de saisie lorsque la page est chargée
            toggleEntrepriseNameInput();

            // Écouter les changements dans la liste déroulante de la ville
            typeSelect.addEventListener('change', function() {
                // Appeler la fonction pour afficher ou masquer le champ de saisie
                toggleEntrepriseNameInput();
            });
        });
    </script>
@endpush
