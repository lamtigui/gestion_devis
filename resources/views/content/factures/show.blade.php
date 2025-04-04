@extends('layouts.master')
@section('title')
    {{ __('Basic Table') }}
@endsection
@section('content')
    <!-- page title -->
    <x-page-title title="Facture Info #{{ $facture->n_facture }}" pagetitle="Tables" />

    <div class="xl:col-span-12">
        <div class="card">
            <div class="card-body">
                {{-- <h6 class="mb-4 text-15"></h6> --}}

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="ltr:text-left rtl:text-right">
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
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Action</th>
                                </tr>
                            </thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $facture->n_facture }} </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $facture->date_facture }} </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                    {{ $facture->client_name }} </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                    {{ $facture->alternative }} </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                    {{ $facture->etableur_name }} </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                    {{ $facture->emmeteur_name }} </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                    {{ $facture->date_validation }} </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $facture->getTypeService() }} </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                    {{ $facture->getPrixHTInitial() }} </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                    {{ $facture->getRemiseFinale() }} </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                    {{ $facture->getMantantHt() }}
                                </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                    {{ $facture->getTauxTva() }} </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                    {{ $facture->getTotalTva() }} </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                    {{ $facture->getMantantTTC() }} </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                    <div class="relative dropdown">
                                        <button
                                            class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20"
                                            id="usersAction1" data-bs-toggle="dropdown"><i data-lucide="more-horizontal"
                                                class="size-3"></i></button>
                                        <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                            aria-labelledby="usersAction1">
                                            @if ($facture->devis_id)
                                                <li>
                                                    <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                        href="{{ route('admin.devis.show', $item->devis_id) }}"><i
                                                            data-lucide="eye"
                                                            class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span
                                                            class="align-middle">Devis</span></a>
                                                </li>
                                            @endif
                                            <li>
                                                <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                    href="{{ route('admin.devis.show', $facture) }}"><i data-lucide="eye"
                                                        class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span
                                                        class="align-middle">Overview</span></a>
                                            </li>
                                            <li>
                                                <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                    href="{{ route('admin.factures.edit', $facture) }}"><i
                                                        data-lucide="file-edit"
                                                        class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span
                                                        class="align-middle">Edit</span></a>
                                            </li>
                                            <li>
                                                <form method="POST" id="delete-form-{{ $facture->id }}"
                                                    style="display: none;"
                                                    action="{{ route('admin.factures.destroy', $facture) }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                <button onclick="confirmDelete({{ $facture->id }});"
                                                    class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"><i
                                                        data-lucide="trash-2"
                                                        class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span
                                                        class="align-middle">Delete</span></button>
                                            </li>
                                            <script>
                                                function confirmDelete(itemId) {
                                                    Swal.fire({
                                                        title: "Are you sure?",
                                                        text: "You won't be able to revert this!",
                                                        icon: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#3085d6",
                                                        cancelButtonColor: "#d33",
                                                        confirmButtonText: "Yes, delete it!"
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('delete-form-' + itemId).submit();
                                                            Swal.fire({
                                                                title: "Deleted!",
                                                                text: "Your file has been deleted.",
                                                                icon: "success"
                                                            });
                                                        }
                                                    });
                                                }
                                            </script>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--end card-->
    </div>
    <div class="xl:col-span-12">
        <div class="card">
            <div class="card-body">
                @if ($facture->Payement->sum('montant') < $facture->getMantantTTC())
                    <div class="shrink-0">
                        <a href="{{ route('admin.payements.create', ['facture_id' => $facture->id]) }}" type="button"
                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i
                                data-lucide="plus" class="inline-block size-4"></i> <span class="align-middle">Add
                                Payement</span></a>
                    </div>
                @endif
                <h6 class="mb-4 text-15">Payement Info</h6>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="ltr:text-left rtl:text-right">
                            <tr>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">
                                    Date</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">
                                    montant
                                </th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">Mode
                                </th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">N°
                                    Cheque |Effet
                                </th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">
                                    Remise
                                </th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($facture->Payement as $item)
                                <tr>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                        {{ $item->date_paiement }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                        {{ $item->montant }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                        {{ $item->mode }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                        {{ $item->numero_remise }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                        {{ $item->numero_cheque }}</td>
                                    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                        <div class="relative dropdown">
                                            <button
                                                class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20"
                                                id="usersAction1" data-bs-toggle="dropdown"><i
                                                    data-lucide="more-horizontal" class="size-3"></i></button>
                                            <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                                aria-labelledby="usersAction1">
                                                <li>
                                                    <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                        href="{{ route('admin.payements.edit', $item) }}"><i
                                                            data-lucide="file-edit"
                                                            class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span
                                                            class="align-middle">Edit</span></a>
                                                </li>
                                                <li>
                                                    <form method="POST" id="delete-form-payement-{{ $item->id }}"
                                                        style="display: none;"
                                                        action="{{ route('admin.payements.destroy', $item) }}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    <button onclick="confirmDelete({{ $item->id }});"
                                                        class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"><i
                                                            data-lucide="trash-2"
                                                            class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span
                                                            class="align-middle">Delete</span></button>
                                                </li>
                                                <script>
                                                    function confirmDelete(itemId) {
                                                        Swal.fire({
                                                            title: "Are you sure?",
                                                            text: "You won't be able to revert this!",
                                                            icon: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonColor: "#3085d6",
                                                            cancelButtonColor: "#d33",
                                                            confirmButtonText: "Yes, delete it!"
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById('delete-form-payement-' + itemId).submit();
                                                                Swal.fire({
                                                                    title: "Deleted!",
                                                                    text: "Your file has been deleted.",
                                                                    icon: "success"
                                                                });
                                                            }
                                                        });
                                                    }
                                                </script>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                no payement found
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--end card-->
    </div>
@endsection
@push('scripts')
    <!-- App js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
