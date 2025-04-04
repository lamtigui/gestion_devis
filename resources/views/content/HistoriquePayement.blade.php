@extends('layouts.master')
@section('title')
    {{ __('rendez-vous List') }}
@endsection
@section('content')
    <!-- page title -->
    <x-page-title title="Devis List" pagetitle="Devis" />

    <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12">
        <div class="xl:col-span-12">
            <div class="card" id="usersTable">
                <div class="card-body">
                    <div class="flex items-center">
                        <h6 class="text-15 grow">Historique List</h6>
                    </div>
                </div>
                <div class="!py-3.5 card-body border-y border-dashed border-slate-200 dark:border-zink-500">
                    <form action="{{ route('admin.HistoriquePaiement') }}" method="get" id="search_form">
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            <div class="relative xl:col-span-2">
                                <input type="text" value="{{ request('client') }}" name="client"
                                    class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Search par nom">
                            </div>
                            <div class="relative xl:col-span-2">
                                <select name="payment_status"
                                    class="form-input border-slate-300 focus:outline-none focus:border-custom-500"
                                    data-choices data-choices-sorting-false>
                                    <option value="">Choisir status</option>
                                    <option value="1" @if (request('payment_status') == 1) selected @endif>Payeé</option>
                                    <option value="2" @if (request('payment_status') == 2) selected @endif>on cours
                                    </option>
                                    <option value="3" @if (request('payment_status') == 3) selected @endif>Nom Payeé
                                    </option>
                                </select>
                            </div>
                            <div class="relative xl:col-span-2">
                                <input type="text" value="{{ request('n_remise') }}" name="n_remise"
                                    class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Search for name">
                            </div>
                            <div class="relative xl:col-span-2">
                                <input type="date" name="date_debut" value="{{ request('date_debut') }}"
                                    class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Search By date">
                            </div>
                            <div class="relative xl:col-span-2">
                                <input type="date" name="date_fin" value="{{ request('date_fin') }}"
                                    class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Search By date">
                            </div>
                            <div>
                                <button type="submit"
                                    class="bg-white border-dashed text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20"><i
                                        data-lucide="search" class="inline-block size-4"></i></button>
                            </div>
                            <div class="xl:col-span-3">
                                <div class="flex gap-2 xl:justify-end">
                                        <div>
                                            <button type="button" id="exportExcel"
                                                class="border-dashed bg-green text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-green-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20"><i
                                                    data-lucide="download" class="inline-block size-4"></i> Admin</button>
                                        </div>
                                        <div>
                                            <button type="button" id="ExportFacturesForUser"
                                                class="bg-white border-dashed text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20"><i
                                                    data-lucide="download" class="inline-block size-4"></i> Clients</button>
                                        </div>
                                </div>

                            </div><!--end col-->
                        </div><!--end grid-->
                    </form>
                    <script>
                        document.getElementById("exportExcel").addEventListener("click", function() {
                            var formData = new FormData(document.getElementById("search_form"));

                            document.getElementById("search_form").setAttribute("action",
                                "{{ route('admin.excel.ExportFactures') }}");

                            document.getElementById("search_form").submit();

                            setTimeout(function() {
                                document.getElementById("exportExcel").setAttribute("action",
                                    "{{ route('admin.HistoriquePaiement') }}");
                            }, 5000);

                        });
                        document.getElementById("ExportFacturesForUser").addEventListener("click", function() {
                            var formData = new FormData(document.getElementById("search_form"));

                            document.getElementById("search_form").setAttribute("action",
                                "{{ route('admin.excel.ExportFacturesForUser') }}");

                            document.getElementById("search_form").submit();

                            setTimeout(function() {
                                document.getElementById("exportExcel").setAttribute("action",
                                    "{{ route('admin.HistoriquePaiement') }}");
                            }, 5000);

                        });
                    </script>
                </div>
                <div class="card-body">
                    <div class="-mx-5 -mb-5 overflow-x-auto">
                        <table class="w-full border-separate table-custom border-spacing-y-1 whitespace-nowrap">
                            <thead class="text-left">
                                <tr
                                    class="relative rounded-md bg-slate-100 dark:bg-zink-600 after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="prospect-name">Referance De Facture</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="prospect-type">date Facture</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="prospect-type">Entreprise name</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="prospect-ville">alternative</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="prospect-adresse">ETABLIE PAR</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="prospect-phone">Emmeteur</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="prospect-email">date validation</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="prospect-email">Type service</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="date-demande">Prix HT I</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="date-demande">Remise Final</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="date-demande">Prix HT F</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="date-demande">Taux TVA</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="date-demande">Mantant TVA</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="date-demande">TTC</th>
                                    <th class="text-center col-5">Mode</th>
                                    <th class="text-center col-5">Montant</th>
                                    <th class="text-center col-5">Date</th>
                                    <th class="text-center col-5">N° Cheque</th>
                                    <th class="text-center col-5">N° Remise</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($data as $item)
                                    @forelse ($item->payement as $payement)
                                        <tr style="background-color: {{ $item->status->color() }}">
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->n_facture }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->date_facture }}
                                            </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->client_name }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->alternative }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->etableur_name }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->emmeteur_name }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->date_validation }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->type_service_validation }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->getPrixHTInitial() }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->getRemiseFinale() }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->getMantantHt() }}
                                            </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->getTauxTva() }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->getTotalTva() }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->getMantantTTC() }} </td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                {{ $payement->date_paiement }}</td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                {{ $payement->montant }}</td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                {{ $payement->mode }}</td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                {{ $payement->numero_remise }}</td>
                                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                {{ $payement->numero_cheque }}</td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">

                                        </tr>
                                    @empty
                                        <tr style="background-color: {{ $item->status->color() }}">
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->n_facture }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->date_facture }}
                                            </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->client_name }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->alternative }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->etableur_name }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->emmeteur_name }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->date_validation }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->type_service_validation }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->getPrixHTInitial() }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->getRemiseFinale() }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->getMantantHt() }}
                                            </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->getTauxTva() }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->getTotalTva() }} </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                {{ $item->getMantantTTC() }} </td>
                                        </tr>
                                    @endforelse

                                @empty

                                    <div class="noresult" style="display: none">
                                        <div class="py-6 text-center">
                                            <i data-lucide="search"
                                                class="mx-auto size-6 text-sky-500 fill-sky-100 dark:fill-sky-500/20"></i>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="mb-0 text-slate-500 dark:text-zink-200">We've searched more than 199+
                                                users We
                                                did not find any users for you search.</p>
                                        </div>
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="flex flex-col items-center mt-8 md:flex-row">
                    </div>
                </div>
            </div><!--end card-->
            {{ $data->links() }}
        </div><!--end col-->
    </div><!--end grid-->
@endsection
@push('scripts')
    <script src="{{ URL::asset('build/js/pages/apps-user-list.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
