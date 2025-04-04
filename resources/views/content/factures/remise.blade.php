@extends('layouts.master')
@section('title')
    {{ __('create-devis') }}
@endsection
@section('content')
    <!-- page title -->
    <x-page-title title="Ajouter Remise pour le devis # {{ $devi->n_devis }} " pagetitle="Pages" />
    <div class="tab-content">
        <div class="block tab-pane" id="personalTabs">
            <div class="card">
                <div class="card-body">
                    {{-- <h6 class="mb-1 text-15">Creé un devis</h6><br> --}}
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                        <div class="xl:col-span-6">
                            <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">Client
                                Name</label>
                            <input type="text" id="productCodeInput"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Product Code" value="{{ $devi->appointment->Client->name }}" disabled>
                        </div><!--end col-->
                        <div class="xl:col-span-6">
                            <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">Entreprise
                                Name</label>
                            <input type="text" id="productCodeInput"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                value="{{ $devi->appointment->Client ? $devi->appointment->Client->entreprise_name : 'not found' }}"
                                disabled>
                        </div><!--end col-->
                    </div><!--end col--> <br>
                    <form action="{{ route('admin.UpdateRemises', $devi) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- origine de demande section --}}
                        <div
                            class="grid grid-cols-1 gap-5 xl:grid-cols-12 {{ $devi->remise_1 > 0 ? '' : 'discount-container' }}">
                            <div class="xl:col-span-12">
                                <label for="remise1" class="inline-block mb-2 text-base font-medium">Remise 1</label>
                                <input type="number" disabled id="remise1" value="{{ $devi->remise_1 }}" name="remise_1"
                                    class="remise form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                            <div class="xl:col-span-12">
                                <input type="date" id="date_remise1" value="{{ $devi->date_remise_1 }}"
                                    name="date_remise_1"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                            <div class="xl:col-span-12">
                                <input type="text" id="detail_remise1" value="{{ $devi->detail_remise_1 }}"
                                    placeholder="detail remise 1" name="detail_remise_1"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                        </div>

                        <div
                            class="grid grid-cols-1 gap-5 xl:grid-cols-12 {{ $devi->remise_2 > 0 ? '' : 'discount-container' }}">
                            <!-- Remise 2 -->
                            <div class="xl:col-span-12">
                                <label for="remise2" class="inline-block mb-2 text-base font-medium">Remise 2</label>
                                <input type="number" id="remise2" value="{{ $devi->remise_2 }}" placeholder="remise 2"
                                    name="remise_2"
                                    class="remise form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                            <div class="xl:col-span-12">
                                <input type="date" id="date_remise2" value="{{ $devi->date_remise_2 }}"
                                    name="date_remise_2"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                            <div class="xl:col-span-12">
                                <input type="text" id="detail_remise2" value="{{ $devi->detail_remise_2 }}"
                                    placeholder="detail remise 2" name="detail_remise_2"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                        </div>

                        <div
                            class="grid grid-cols-1 gap-5 xl:grid-cols-12 {{ $devi->remise_3 > 0 ? '' : 'discount-container' }}">
                            <!-- Remise 3 -->
                            <div class="xl:col-span-12">
                                <label for="remise3" class="inline-block mb-2 text-base font-medium">Remise 3</label>
                                <input type="number" id="remise3" value="{{ $devi->remise_3 }}" placeholder="remise 3"
                                    name="remise_3"
                                    class="remise form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                            <div class="xl:col-span-12">
                                <input type="date" id="date_remise3" value="{{ $devi->date_remise_3 }}"
                                    name="date_remise_3"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                            <div class="xl:col-span-12">
                                <input type="text" id="detail_remise3" value="{{ $devi->detail_remise_3 }}"
                                    placeholder="detail remise 3" name="detail_remise_3"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                        </div>

                        <div
                            class="grid grid-cols-1 gap-5 xl:grid-cols-12 {{ $devi->remise_4 > 0 ? '' : 'discount-container' }}">
                            <!-- Remise 4 -->
                            <div class="xl:col-span-12">
                                <label for="remise4" class="inline-block mb-2 text-base font-medium">Remise 4</label>
                                <input type="number" id="remise4" value="{{ $devi->remise_4 }}" placeholder="remise 4"
                                    name="remise_4"
                                    class="remise form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                            <div class="xl:col-span-12">
                                <input type="date" id="date_remise4" value="{{ $devi->date_remise_4 }}"
                                    name="date_remise_4"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                            <div class="xl:col-span-12">
                                <input type="text" id="detail_remise4" value="{{ $devi->detail_remise_4 }}"
                                    placeholder="detail remise 4" name="detail_remise_4"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                        </div>

                        <div
                            class="grid grid-cols-1 gap-5 xl:grid-cols-12 {{ $devi->remise_5 > 0 ? '' : 'discount-container' }}">
                            <!-- Remise 5 -->
                            <div class="xl:col-span-12">
                                <label for="remise5" class="inline-block mb-2 text-base font-medium">Remise 5</label>
                                <input type="number" id="remise5" value="{{ $devi->remise_5 }}"
                                    placeholder="remise 5" name="remise_5"
                                    class="remise form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                            <div class="xl:col-span-12">
                                <input type="date" id="date_remise5" value="{{ $devi->date_remise_5 }}"
                                    name="date_remise_5"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                            <div class="xl:col-span-12">
                                <input type="text" id="detail_remise5" value="{{ $devi->detail_remise_5 }}"
                                    placeholder="detail remise 5" name="detail_remise_5"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-x-auto">
                                    <table class="w-full">
                                        <thead class="ltr:text-left rtl:text-right">
                                            <tr>
                                                <th
                                                    class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">
                                                    nombre Remise</th>
                                                <th
                                                    class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">
                                                    Remise Final</th>
                                                <th
                                                    class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">
                                                    MHT I</th>
                                                <th
                                                    class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">
                                                    MH F</th>
                                                <th
                                                    class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">
                                                    TAUX TVA</th>
                                                <th
                                                    class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">
                                                    mantant TVA</th>
                                                <th
                                                    class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">
                                                    TTC</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                    <span id="nbrRemise"></span>
                                                </td>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                    <span id="remiseFinal"></span>
                                                </td>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $devi->prix_hors_taxe }}</td>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                    <span id="MHF"></span>
                                                </td>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $devi->taux_tva == 'autre' ? $devi->autre_taux_tva : $devi->taux_tva }}
                                                </td>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                    <span id="mantantTVA"></span>
                                                </td>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                    <span id="mantantTTC"></span>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!--end card-->

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                // Initially hide all but the first discount container
                                $('.discount-container').not(':first').hide();
                        
                                // Variables to store total count and amount
                                var totalRemises = 0;
                                var totalAmount = 0;
                                function updateTotals() {
                                    totalRemises = $('.remise').filter(function() {
                                        return $(this).val() !== '';
                                    }).length;
                        
                                    totalAmount = 0;
                                    $('.remise').each(function() {
                                        var value = parseFloat($(this).val());
                                        if (!isNaN(value)) {
                                            totalAmount += value;
                                        }
                                    });
                                    var MHTF = {{ $devi->prix_hors_taxe }} - totalAmount.toFixed(2);
                                    var MantantTVA = (MHTF *
                                        {{ $devi->taux_tva == 'autre' ? $devi->autre_taux_tva : $devi->taux_tva }}) / 100;
                        
                                    $('#nbrRemise').text(totalRemises);
                                    $('#remiseFinal').text(totalAmount.toFixed(2));
                                    $('#MHF').text(MHTF.toFixed(2));
                                    $('#mantantTVA').text(MantantTVA.toFixed(2));
                                    $('#mantantTTC').text((MantantTVA + MHTF).toFixed(2));
                                }
                        
                                // Monitor changes in the 'remise' class inputs
                                $('.remise').on('input', function() {
                                    updateTotals();
                                });
                        
                                // Initial call to updateTotals() to set initial values
                                updateTotals();
                            });
                        </script>
                        


                        <div class="flex justify-end mt-6 gap-x-4">
                            <button type="submit"
                                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                Submit
                            </button>
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
