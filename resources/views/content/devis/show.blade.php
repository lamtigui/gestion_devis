@extends('layouts.master')
@section('title')
    {{ __('Overview') }}
@endsection
@section('content')
    <!-- page title -->
    <x-page-title title="Devi Info # {{ $devi->n_devis }} " pagetitle="Products" />

    <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12">
        <div class="xl:col-span-4">
            <div class="sticky top-[calc(theme('spacing.header')_*_1.3)] mb-5">
                <div class="card">
                    <div class="border-b card-body border-slate-200 dark:border-zink-500">
                        <div class="flex">
                            <h6 class="grow text-15"><span class="align-middle">Mantant HT I : {{ $devi->prix_hors_taxe }}
                                </span></h6>
                        </div>
                        <div class="flex">
                            <h6 class="grow text-15"><span class="align-middle">Remise Final :
                                    {{ $devi->getRemiseFinalAttrinute() }}
                                </span></h6>
                        </div>
                        <div class="flex">
                            <h6 class="grow text-15"><span class="align-middle">Mantant HT F :
                                    {{ $devi->getMantantHTFinalAttrinute() }}
                                </span></h6>
                        </div>
                        <div class="flex">
                            <h6 class="grow text-15"><span class="align-middle">Taux TVA :
                                    {{ $devi->getNewTauxTvaAttribute() }}
                                </span></h6>
                        </div>
                        <div class="flex">
                            <h6 class="grow text-15"><span class="align-middle">Mantant TVA :
                                    {{ $devi->getMantantTvaAttribute() }}
                                </span></h6>
                        </div>
                        <div class="flex">
                            <h6 class="grow text-15"><span class="align-middle">Mantant TTC :
                                    {{ $devi->getMantantTtcAttribute() }}
                                </span></h6>
                        </div>
                    </div>
                </div><!--end card-->
            </div>
        </div><!--end col-->
        <div class="xl:col-span-8">
            <div class="card">
                <div class="card-body">
                    <div class="relative ltr:float-right rtl:float-left dropdown">
                        <button
                            class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20"
                            id="categoryNotes1" data-bs-toggle="dropdown"><i data-lucide="more-horizontal"
                                class="size-3"></i></button>
                        <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                            aria-labelledby="categoryNotes1">
                            <li>
                                <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                    href="{{ route('admin.devis.edit' , $devi) }}"><i data-lucide="file-edit"
                                        class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span
                                        class="align-middle">Edit</span></a>
                            </li>
                        </ul>
                    </div>
                    <span
                        class="px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-sky-100 border-sky-100 text-sky-500 dark:bg-sky-400/20 dark:border-transparent">
                        {{ $devi->etat }}</span>
                    <h5 class="mt-3 mb-1">{{ $devi->n_devis }}</h5>
                    <ul class="flex flex-wrap items-center gap-4 mb-5 text-slate-500 dark:text-zink-200">
                        <li>date: <span class="font-medium">{{ $devi->date }}</span></li>
                        <li>Mode: <span class="font-medium">{{ $devi->mode_envoi }}
                                {{ $devi->autre_mode_denvoi_devis }}</span></li>
                    </ul>


                    <h6 class="mt-5 mb-3 text-15">Prospect Information</h6>
                    <ul class="flex flex-col gap-2">
                        <li>
                            name :{{ $devi->appointment->Client->name }} -> {{ $devi->appointment->Client->type_client }}
                            {{ $devi->appointment->Client->entreprise_name }}
                        </li>
                        <li>
                            phone :{{ $devi->appointment->Client->phone }}
                        </li>
                        <li>
                            email :{{ $devi->appointment->Client->email }}
                        </li>
                    </ul>

                    <div class="mt-5">
                        <h6 class="mb-3 text-15">Remises:</h6>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <tbody>
                                    @if ($devi->remise_1)
                                        <tr>
                                            <th
                                                class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">
                                                Remise 1 : {{ $devi->remise_1 }}
                                            </th>
                                            <td class="px-3.5 py-2.5 border-b border-transparent">
                                                {{ $devi->date_remise_1 }}</td>
                                            <td class="px-3.5 py-2.5 border-b border-transparent">
                                                {{ $devi->detail_remise_1 }}</td>
                                        </tr>
                                    @endif

                                    @if ($devi->remise_2)
                                        <tr>
                                            <th
                                                class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">
                                                Remise 2 : {{ $devi->remise_2 }}
                                            </th>
                                            <td class="px-3.5 py-2.5 border-b border-transparent">
                                                {{ $devi->date_remise_2 }}</td>
                                            <td class="px-3.5 py-2.5 border-b border-transparent">
                                                {{ $devi->detail_remise_2 }}</td>
                                        </tr>
                                    @endif

                                    @if ($devi->remise_3)
                                        <tr>
                                            <th
                                                class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">
                                                Remise 3 : {{ $devi->remise_3 }}
                                            </th>
                                            <td class="px-3.5 py-2.5 border-b border-transparent">
                                                {{ $devi->date_remise_3 }}</td>
                                            <td class="px-3.5 py-2.5 border-b border-transparent">
                                                {{ $devi->detail_remise_3 }}</td>
                                        </tr>
                                    @endif

                                    @if ($devi->remise_4)
                                        <tr>
                                            <th
                                                class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">
                                                Remise 4 : {{ $devi->remise_4 }}
                                            </th>
                                            <td class="px-3.5 py-2.5 border-b border-transparent">
                                                {{ $devi->date_remise_4 }}</td>
                                            <td class="px-3.5 py-2.5 border-b border-transparent">
                                                {{ $devi->detail_remise_4 }}</td>
                                        </tr>
                                    @endif

                                    @if ($devi->remise_5)
                                        <tr>
                                            <th
                                                class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">
                                                Remise 5 : {{ $devi->remise_5 }}
                                            </th>
                                            <td class="px-3.5 py-2.5 border-b border-transparent">
                                                {{ $devi->date_remise_5 }}</td>
                                            <td class="px-3.5 py-2.5 border-b border-transparent">
                                                {{ $devi->detail_remise_5 }}</td>
                                        </tr>
                                    @endif


                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end grid-->
@endsection
@push('scripts')
    <!-- product overview init js-->
    <script src="{{ URL::asset('build/js/pages/apps-ecommerce-product-overview.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
