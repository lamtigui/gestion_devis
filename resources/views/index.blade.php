@extends('layouts.master')
@section('title')
    {{ __('Analytics') }}
@endsection
@section('links')
<link rel="stylesheet" href="{{ URL::asset('build/css/devis_index.css') }}">

@endsection
@section('content')
    <!-- page title -->
    <x-page-title title="Analytics" pagetitle="Dashboards" />
    <div class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

        <!-- Prospects -->
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <div class="flex justify-between items-center mb-4">
                <h6 class="text-lg font-medium text-gray-800">Prospects</h6>
                <i data-lucide="user-plus" class="text-green-500 size-5"></i>
            </div>
            <a href="{{ route('admin.client.create') }}"
                class="bg-green-500 text-white px-4 py-2 rounded-lg inline-flex items-center gap-2">
                <i data-lucide="plus" class="size-4"></i> Créer Prospect
            </a>
        </div>

        <!-- Appointment -->
        <div class="bg-white p-6 rounded-md shadow hover:shadow-lg transition">
            <div class="flex justify-between items-center mb-4">
                <h6 class="text-lg font-medium text-gray-800">Appointment</h6>
                <i data-lucide="calendar" class="text-green-400 size-5"></i>
            </div>
            <a href="{{ route('admin.client.index') }}"
                class="bg-emerald-500 text-white px-4 py-2 rounded-lg inline-flex items-center gap-2">
                <i data-lucide="plus" class="size-4"></i> Créer Rendez-vous
            </a>
        </div>

        <!-- Devis -->
        <div class="bg-white p-6 rounded-md shadow hover:shadow-lg transition">
            <div class="flex justify-between items-center mb-4">
                <h6 class="text-lg font-medium text-gray-800">Devis</h6>
                <i data-lucide="file-text" class="text-sky-500 size-5"></i>
            </div>
            <a href="{{ route('admin.devis.create') }}"
                class="bg-sky-500 text-white px-4 py-2 rounded-lg inline-flex items-center gap-2">
                <i data-lucide="plus" class="size-4"></i> Créer Devis
            </a>
        </div>

        <!-- Devis Générés -->
        <div class="bg-white p-6 rounded-md shadow hover:shadow-lg transition">
            <div class="flex justify-between items-center mb-4">
                <h6 class="text-lg font-medium text-gray-800">Devis Générés</h6>
                <i data-lucide="clipboard-list" class="text-orange-500 size-5"></i>
            </div>
            <a href="{{ route('admin.docsdevis.index') }}"
                class="bg-orange-500 text-white px-4 py-2 rounded-lg inline-flex items-center gap-2">
                <i data-lucide="eye" class="size-4"></i> Voir Les Devis Générés
            </a>
        </div>

        <!-- Factures -->
        <div class="bg-white p-6 rounded-md shadow hover:shadow-lg transition">
            <div class="flex justify-between items-center mb-4">
                <h6 class="text-lg font-medium text-gray-800">Factures</h6>
                <i data-lucide="file-text" class="text-gray-500 size-5"></i>
            </div>
            <a href="{{ route('admin.factures.create') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded-lg inline-flex items-center gap-2">
                <i data-lucide="plus" class="size-4"></i> Générer Facture
            </a>
        </div>

        <!-- Historique -->
        <div class="bg-white p-6 rounded-md shadow hover:shadow-lg transition">
            <div class="flex justify-between items-center mb-4">
                <h6 class="text-lg font-medium text-gray-800">Historique</h6>
                <i data-lucide="history" class="text-red-500 size-5"></i>
            </div>
            <a href="{{ route('admin.HistoriquePaiement') }}"
                class="bg-red-500 text-white px-4 py-2 rounded-lg inline-flex items-center gap-2">
                <i data-lucide="search" class="size-4"></i> Voir Historique
            </a>
        </div>

        <!-- Modèles Devis -->
        <div class="bg-white p-6 rounded-md shadow hover:shadow-lg transition">
            <div class="flex justify-between items-center mb-4">
                <h6 class="text-lg font-medium text-gray-800">Modèles Devis</h6>
                <i data-lucide="layers" class="text-pink-500 size-5"></i>
            </div>
            <a href="{{ route('admin.modeles.index') }}"
                class="bg-pink-500 text-white px-4 py-2 rounded-lg inline-flex items-center gap-2">
                <i data-lucide="plus" class="size-4"></i> Ajouter Modèle
            </a>
        </div>

    </div>
    <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12">
        <div class="xl:col-span-12">
            <div class="card" id="usersTable">
                <div class="card-body">
                    <div class="flex items-center">
                        <h6 class="text-15 grow">Devis List</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="-mx-5 -mb-5 div-table">
                        <table class="w-full border-separate table-custom border-spacing-y-1 whitespace-nowrap">
                            <thead class="text-left">
                                <tr class="relative rounded-md bg-slate-100 dark:bg-zink-600 after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="prospect-name">N° Devis</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="prospect-type">date devis</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="prospect-type">name Prospect</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="prospect-type">Type Prospect</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="prospect-ville">prospect ville</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="prospect-adresse">prospect adresse</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="prospect-phone">prospect phone</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="prospect-email">prospect email</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="date-demande">Prix HT I</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="date-demande">Remise Final</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="date-demande">Prix HT F</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="date-demande">Taux TVA</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="date-demande">Mantant TVA</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="date-demande">TTC</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="date-demande">Mode d'envoi</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="date-demande">Etat</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Action</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Remise</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Devi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($data as $item)
                                    <tr>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> 
                                            {{ $item->n_devis }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> 
                                            {{ $item->date }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->appointment->Client->name }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->appointment->Client->type_client }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->appointment->Client->ville }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->appointment->Client->adresse }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->appointment->Client->phone }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->appointment->Client->email }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> 
                                            {{ $item->prix_hors_taxe }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->getRemiseFinalAttrinute() }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->getMantantHTFinalAttrinute() }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->getNewTauxTvaAttribute() }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->getMantantTvaAttribute() }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->getMantantTtcAttribute() }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $item->mode_envoi == 'autre' ? $item->autre_mode_denvoi : $item->mode_envoi }}
                                        </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->etat }}</td>
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
                                                                <i data-lucide="file-text"
                                                                    class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i>
                                                                <span class="align-middle">Facture</span>
                                                            </a>
                                                        @else
                                                            <span
                                                                class="block px-4 py-1.5 text-base text-slate-400 dropdown-item cursor-not-allowed dark:text-zink-500">
                                                                <i data-lucide="file-text"
                                                                    class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i>
                                                                <span class="align-middle">Facture (Devis Not Signed)</span>
                                                            </span>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        @if ($item->isGenerated() === true)
                                                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                href="{{ route('admin.docsdevis.show', $item->id) }}">
                                                                <i data-lucide="eye"
                                                                    class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i>
                                                                <span class="align-middle">Voire </span></a>
                                                        @else
                                                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                href="{{ route('admin.devis_model', $item->id) }}">
                                                                <i data-lucide="file-input"
                                                                    class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i>
                                                                <span class="align-middle">Générer</span></a>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                            href="{{ route('admin.devis.show', $item) }}">
                                                            <i data-lucide="info"
                                                                class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i>
                                                            <span class="align-middle">Détails</span></a>
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
                                            <a href="{{ route('admin.generate_pdf', $item->id) }}"> <span
                                                    class="text-green-500  cursor-pointer  text-xl"><i
                                                        class="fa-solid fa-download"></i></span></a>

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
    
    
    <div class="grid grid-cols-12 gap-x-5">
                <div class="calendar col-span-12 lg:col-span-6 order-[13] 2xl:order-1 card 2xl:col-span-3">
                    <div class="calendar-header">
                        <button class="prev" onclick="changeMonth(-1)">&#10094;</button>
                        <span class="month-year" id="month-year"></span>
                        <button class="next" onclick="changeMonth(1)">&#10095;</button>
                    </div>
                    <div class="calendar-days">
                        <div class="day">Sun</div>
                        <div class="day">Mon</div>
                        <div class="day">Tue</div>
                        <div class="day">Wed</div>
                        <div class="day">Thu</div>
                        <div class="day">Fri</div>
                        <div class="day">Sat</div>
                    </div>
                    <div id="calendar-days-container" class="calendar-days-container"></div>
                </div>
                <div class="col-span-12 lg:col-span-6 order-[14] 2xl:order-1 card 2xl:col-span-3">
                    <div class="card-body">
                        <h6 class="text-15 grow text-center">📊 Résumé des Données</h6>
                        <ul class="flex flex-col gap-5">
                            @foreach ($stats as $model => $data)
                                @php
                                    // Associer des couleurs et icônes selon les modèles
                                    $icons = [
                                        'prospects' => ['icon' => 'user-plus', 'color' => 'sky'],
                                        'devis' => ['icon' => 'clipboard-list', 'color' => 'red'],
                                        'Devis Générés' => ['icon' => 'file-text', 'color' => 'pink'],
                                        'appointments' => ['icon' => 'calendar', 'color' => 'green'],
                                        'modele' => ['icon' => 'layers', 'color' => 'pink'],
                                        'facture' => ['icon' => 'file', 'color' => 'gray'],
                                        'default' => ['icon' => 'database', 'color' => 'slate'],
                                    ];
                
                                    $key = strtolower($model);
                                    $iconData = $icons[$key] ?? $icons['default'];
                                @endphp
                                <li class="flex items-center gap-3">
                                    <div class="flex items-center justify-center text-{{ $iconData['color'] }}-500 bg-{{ $iconData['color'] }}-100 rounded-md size-8 dark:bg-{{ $iconData['color'] }}-500/20 shrink-0">
                                        <i data-lucide="{{ $iconData['icon'] }}" class="size-4"></i>
                                    </div>
                                    <h6 class="grow capitalize">{{ ucfirst($model) }}</h6>
                                    <p class="text-slate-500 dark:text-zink-200">{{ $data['count'] }}</p>
                                    <div class="w-12 text-green-500 ltr:text-right rtl:text-left">
                                        {{-- Affichage du pourcentage calculé --}}
                                        {{ number_format($data['percentage'], 2) }}%
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                
                
                
                <div class="col-span-12 lg:col-span-6 order-[14] 2xl:order-1 card 2xl:col-span-3 shadow-lg">
                    <div class="card-body p-4">
                        <h6 class="text-15 grow text-center">Derniers Clients Créés</h6>
                        <ul class="list-group list-group-flush">
                            @foreach ($clients as $client)
                                <li class="list-group-item d-flex justify-content-between align-items-center py-3 border-b">
                                    <div class="d-flex align-items-center">
                                        <span class="font-medium text-gray-800">{{ $client->name }}</span>
                                    </div>
                                    <span class="badge bg-primary rounded-pill">{{ $client->phone }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                
        <div class="col-span-12 lg:col-span-6 order-[15] 2xl:order-1 card 2xl:col-span-3">
            <div class="card-body">
                <div class="flex items-center gap-4 mb-3">
                    <h6 class="text-15 grow text-center">Traffic Source</h6>
                </div>
                <div class="flex flex-col gap-5">
                    <div>
                        <div class="flex items-center justify-between gap-4 mb-2">
                            <h6>Google</h6>
                            <span class="text-slate-500 dark:text-zink-200">54,963</span>
                        </div>
                        <div class="w-full h-3.5 rounded bg-slate-200 dark:bg-zink-600">
                            <div class="h-3.5 rounded bg-custom-500" style="width: 89%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between gap-4 mb-2">
                            <h6>Social Media</h6>
                            <span class="text-slate-500 dark:text-zink-200">54,963</span>
                        </div>
                        <div class="w-full h-3.5 rounded bg-slate-200 dark:bg-zink-600">
                            <div class="h-3.5 rounded bg-yellow-500" style="width: 81%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between gap-4 mb-2">
                            <h6>Direct Message</h6>
                            <span class="text-slate-500 dark:text-zink-200">54,963</span>
                        </div>
                        <div class="w-full h-3.5 rounded bg-slate-200 dark:bg-zink-600">
                            <div class="h-3.5 rounded bg-green-500" style="width: 63%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between gap-4 mb-2">
                            <h6>Others</h6>
                            <span class="text-slate-500 dark:text-zink-200">54,963</span>
                        </div>
                        <div class="w-full h-3.5 rounded bg-slate-200 dark:bg-zink-600">
                            <div class="h-3.5 rounded bg-slate-500 dark:text-zink-500" style="width: 25%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let currentDate = new Date();

        function renderCalendar() {
            const monthYear = document.getElementById("month-year");
            const daysContainer = document.getElementById("calendar-days-container");

            const month = currentDate.getMonth();
            const year = currentDate.getFullYear();
            const today = new Date();
            const todayDay = today.getDate();
            const todayMonth = today.getMonth();
            const todayYear = today.getFullYear();

            const firstDay = new Date(year, month, 1).getDay();
            const lastDate = new Date(year, month + 1, 0).getDate();

            monthYear.innerText = `${currentDate.toLocaleString('default', { month: 'long' })} ${year}`;

            daysContainer.innerHTML = "";

            for (let i = 0; i < firstDay; i++) {
                daysContainer.innerHTML += `<div class="calendar-day"></div>`;
            }

            for (let date = 1; date <= lastDate; date++) {
                let dayClass = '';
                if (date === todayDay && month === todayMonth && year === todayYear) {
                    dayClass = 'today'; // Ajout de la classe pour le jour actuel
                }
                daysContainer.innerHTML += `<div class="calendar-day ${dayClass}">${date}</div>`;
            }
        }

        function changeMonth(direction) {
            currentDate.setMonth(currentDate.getMonth() + direction);
            renderCalendar();
        }

        renderCalendar();
    </script>

    <script>
        lucide.createIcons();
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
@endsection
@push('scripts')
    <!--apexchart js-->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>

    <!--dashboard analytics init js-->
    <script src="{{ URL::asset('build/js/pages/dashboards-analytics.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
