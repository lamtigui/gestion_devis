@extends('layouts.master')
@section('title')
    {{ __('rendez-vous List') }}
@endsection
@section('links')
<link rel="stylesheet" href="{{ URL::asset('build/css/devis_index.css') }}">

@endsection
@section('content')
    <!-- page title -->
    <x-page-title title="Devis List" pagetitle="Devis" />

    <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12">
        <div class="xl:col-span-12">
            <div class="card" id="usersTable">
                <div class="card-body">
                    <div class="flex items-center">
                        <h6 class="text-15 grow">Devis List</h6>
                    </div>
                </div>
                <div class="!py-3.5 card-body border-y border-dashed border-slate-200 dark:border-zink-500">
                    <form action="{{ route('admin.devis.index') }}" method="get">
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            <div class="relative xl:col-span-2">
                                <input type="text" name="name"
                                    value="{{ request()->has('name') ? request()->name : '' }}"
                                    class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Search byr name">
                            </div>
                            <div class="relative xl:col-span-2">
                                <input type="text" name="n_devi"
                                    value="{{ request()->has('n_devi') ? request()->n_devi : '' }}"
                                    class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Search numero de devis">
                            </div>
                            <div class="relative xl:col-span-2">
                                <select name="payment_status"
                                    class="form-input border-slate-300 focus:outline-none focus:border-custom-500"
                                    data-choices data-choices-sorting-false>
                                    <option value="">Choisir une Emmteur</option>
                                    <option value="1" @if (request('payment_status') == 1) selected @endif>Payeé</option>
                                    <option value="2" @if (request('payment_status') == 2) selected @endif>on cours
                                    </option>
                                    <option value="0" @if (request('payment_status') == 3) selected @endif>Nom Payeé
                                    </option>
                                </select>
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
                    <div class="-mx-5 -mb-5 div-table">
                        <table class="w-full border-separate table-custom border-spacing-y-1 whitespace-nowrap">
                            <thead class="text-left">
                                <tr
                                    class="relative rounded-md bg-slate-100 dark:bg-zink-600 after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="prospect-name">N° Devis</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="prospect-type">date devis</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="prospect-type">name Prospect</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="prospect-type">Type Prospect</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="prospect-ville">prospect ville</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="prospect-adresse">prospect adresse</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="prospect-phone">prospect phone</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="prospect-email">prospect email</th>
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
                                        data-sort="date-demande">Mode d'envoi</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="date-demande">Etat</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Action</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Remise</th>

                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Devi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($data as $item)
                                    <tr>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->n_devis }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->date }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->appointment->Client->name }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->appointment->Client->type_client }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->appointment->Client->ville }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->appointment->Client->adresse }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->appointment->Client->phone }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->appointment->Client->email }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->prix_hors_taxe }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->getRemiseFinalAttrinute() }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->getMantantHTFinalAttrinute() }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->getNewTauxTvaAttribute() }}
                                        </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->getMantantTvaAttribute() }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->getMantantTtcAttribute() }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->mode_envoi == 'autre' ? $item->autre_mode_denvoi : $item->mode_envoi }}
                                        </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->etat }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            <div class="relative dropdown">
                                                <button
                                                    class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20"
                                                    id="usersAction1" data-bs-toggle="dropdown"><i
                                                        data-lucide="more-horizontal" class="size-3"></i></button>
                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                                    aria-labelledby="usersAction1">
                                                    <li>

                                                        @if ($item->etat === 'signeé')
                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                           href="{{ route('admin.factures.create', ['devis' => $item->id]) }}">
                                                            <i data-lucide="file-text" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i>
                                                            <span class="align-middle">Facture</span>
                                                        </a>
                                                    @else
                                                        <span class="block px-4 py-1.5 text-base text-slate-400 dropdown-item cursor-not-allowed dark:text-zink-500">
                                                            <i data-lucide="file-text" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i>
                                                            <span class="align-middle">Facture (Devis Not Signed)</span>
                                                        </span>
                                                    @endif
                                                    </li>
                                                    <li>
                                                        @if($item->isGenerated()===true)
                                                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                            href="{{ route('admin.docsdevis.show', $item->id) }}">
                                                            <i
                                                                data-lucide="eye"
                                                                class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i>
                                                            <span  class="align-middle">Voire </span></a>
                                                        @else
                                                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                            href="{{ route('admin.devis_model', $item->id) }}">
                                                            <i data-lucide="file-input" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i>
                                                            <span  class="align-middle">Générer</span></a>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                            href="{{ route('admin.devis.show', $item) }}">
                                                            <i data-lucide="info" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i>
                                                                <span
                                                                class="align-middle">Détails</span></a>
                                                    </li>
                                                    <li>
                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                            href="{{ route('admin.devis.edit', $item) }}"><i
                                                                data-lucide="file-edit"
                                                                class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span
                                                                class="align-middle">Edit</span></a>
                                                    </li>
                                                    <li>
                                                        <form method="POST" id="delete-form-{{ $item->id }}"
                                                            style="display: none;"
                                                            action="{{ route('admin.devis.destroy', $item) }}">
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
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            <a href="{{ route('admin.RemiseOfDevis', $item) }}"
                                                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">+</a>

                                        </td>

                                   {{-- btn for install  devi --}}
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">

                                                {{-- <a href="{{ route('admin.factures.show', $item->id) }}" class="text-blue-500">Facture</a> --}}
                                                      <a  href="{{ route('admin.generate_pdf', $item->id ) }}"> <span class="text-green-500  cursor-pointer  text-xl"><i class="fa-solid fa-download"></i></span></a>

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
