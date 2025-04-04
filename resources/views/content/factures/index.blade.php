@extends('layouts.master')
@section('title')
    {{ __('facture List') }}
@endsection
@section('content')
    <!-- page title -->
    <x-page-title title="factures List" pagetitle="factures" />

    <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12">
        <div class="xl:col-span-12">
            <div class="card">
                <div class="card-body">
                    <div class="flex items-center">
                        <h6 class="text-15 grow">Factures List</h6>
                        <div>
                            <a href="{{route('admin.factures.create')}}"
                                class="bg-white border-dashed text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20"><span
                                    class="align-middle">Create Facture</span></a>
                        </div>
                    </div>
                </div>
                <div class="!py-3.5 card-body border-y border-dashed border-slate-200 dark:border-zink-500">
                    <form action="{{ route('admin.factures.index') }}" method="get">
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            <div class="relative xl:col-span-2">
                                <input type="text" name="name"
                                    value="{{ request()->has('name') ? request()->name : '' }}"
                                    class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Search for name">
                            </div>
                            <div class="relative xl:col-span-2">
                                <input type="text" name="n_facture"
                                    value="{{ request()->has('n_facture') ? request()->n_facture : '' }}"
                                    class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Search numero facture">
                            </div>
                            <div class="relative xl:col-span-2">
                                <input type="date" name="date_debut"
                                    value="{{ request()->has('date_debut') ? request()->date_debut : '' }}"
                                    class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="date debut">
                            </div>
                            <div class="relative xl:col-span-2">
                                <input type="date" name="date_fin"
                                    value="{{ request()->has('date_fin') ? request()->date_fin : '' }}"
                                    class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="date fin">
                            </div>
                            <div class="xl:col-span-3 xl:col-start-10">
                                <div class="flex gap-2 xl:justify-end">
                                    <button
                                        class="flex items-center justify-center size-[37.5px] p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20"><i
                                            data-lucide="sliders-horizontal" class="size-4"></i></button>
                                </div>
                            </div><!--end col-->
                        </div><!--end grid-->
                    </form>
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
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="date-demande">status</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($data as $item)
                                    <tr>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->n_facture }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->date_facture }} </td>
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
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->getTypeService() }} </td>
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
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->status->lang() }}
                                            {{-- {{ $item->getFacturePayementStatus() }} --}}
                                        </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            <div class="relative dropdown">
                                                <button
                                                    class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20"
                                                    id="usersAction1" data-bs-toggle="dropdown"><i
                                                        data-lucide="more-horizontal" class="size-3"></i></button>
                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                                    aria-labelledby="usersAction1">
                                                    @if ($item->devis_id)
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
                                                            href="{{ route('admin.factures.show', $item) }}"><i
                                                                data-lucide="eye"
                                                                class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span
                                                                class="align-middle">Overview</span></a>
                                                    </li>
                                                    <li>
                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                            href="{{ route('admin.factures.edit', $item) }}"><i
                                                                data-lucide="file-edit"
                                                                class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span
                                                                class="align-middle">Edit</span></a>
                                                    </li>
                                                    <li>
                                                        <form method="POST" id="delete-form-{{ $item->id }}"
                                                            style="display: none;"
                                                            action="{{ route('admin.factures.destroy', $item) }}">
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
    <!-- list js-->
    {{-- <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script> --}}

    <!-- User list init js -->
    <script src="{{ URL::asset('build/js/pages/apps-user-list.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
