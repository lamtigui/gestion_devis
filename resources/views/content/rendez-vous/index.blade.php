@extends('layouts.master')
@section('title')
    {{ __('rendez-vous List') }}
@endsection
@section('content')
    <!-- page title -->
    <x-page-title title="rendez-vous List" pagetitle="Users" />

    <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12">
        <div class="xl:col-span-12">
            <div class="card" id="usersTable">
                <div class="card-body">
                    <div class="flex items-center">
                        <h6 class="text-15 grow">Rendez-vous List</h6>
                    </div>
                </div>
                <div class="!py-3.5 card-body border-y border-dashed border-slate-200 dark:border-zink-500">
                    <form action="{{ route('admin.appointment.index') }}" method="get">
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            <div class="relative xl:col-span-2">
                                <input type="text" name="name"
                                    value="{{ request()->has('name') ? request()->name : '' }}"
                                    class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Search for name">
                                <i data-lucide="search"
                                    class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
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
                                        data-sort="prospect-name">Prospect name
                                    </th>
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
                                        data-sort="date-demande">date demande</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="nom-commercial">nom commercial</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="type-besoin">Type Besoin</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="nature-service">Nature Service</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="nature-service">marchandise</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="categorie-besoin">categorie besoin</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="service">
                                        Service</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="type-codence">Type codence</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="type-codence">Type codence</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="date-visite">date visite</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                        data-sort="Origine-demande">Origine demande</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($data as $item)
                                    <tr>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->Client->name }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->Client->type_client->lang() }}
                                        </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->Client->ville }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ Str::limit($item->Client->adresse, 20, '...') }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->Client->phone }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->Client->email }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->date_demande }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->commercial_name }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->type_besoin }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->nature_service }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->categorie_besoin }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->nature_service }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->marchandise }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->type_cadence }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->autre_type_cadence }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->date_visite }} </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $item->origine }} ->
                                            {{ $item->autre_origine }} </td>
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
                                                            href="{{ route('admin.devis.create', ['rendez-vous' => $item->id]) }}"><i
                                                                data-lucide="eye"
                                                                class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span
                                                                class="align-middle">devis</span></a>
                                                    </li>
                                                    <li>
                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                            href="{{ route('admin.appointment.edit', $item) }}"><i
                                                                data-lucide="file-edit"
                                                                class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span
                                                                class="align-middle">Edit</span></a>
                                                    </li>
                                                    <li>
                                                        <form method="POST" id="delete-form-{{ $item->id }}"
                                                            style="display: none;"
                                                            action="{{ route('admin.appointment.destroy', $item) }}">
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





    {{-- <div id="deleteModal" modal-center
        class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
        <div class="w-screen md:w-[25rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto px-6 py-8">
                <div class="float-right">
                    <button data-modal-close="deleteModal"
                        class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500"><i
                            data-lucide="x" class="size-5"></i></button>
                </div>
                <img src="{{ URL::asset('build/images/delete.png') }}" alt="" class="block h-12 mx-auto">
                <div class="mt-5 text-center">
                    <h5 class="mb-1">Are you sure?</h5>
                    <p class="text-slate-500 dark:text-zink-200">Are you certain you want to delete this record?</p>
                    <div class="flex justify-center gap-2 mt-6">
                        <button type="reset" data-modal-close="deleteModal"
                            class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">Cancel</button>
                        <button type="submit"
                            class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Yes,
                            Delete It!</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
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
