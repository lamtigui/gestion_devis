@extends('layouts.master')

@section('title')
{{ __('generate-devis') }}
@endsection
@section('links')
<link rel="stylesheet" href="{{ URL::asset('build/css/devis.css') }}">

@endsection
@section('content')
    <!-- page title -->
    <x-page-title title="Générer Devi # {{ $devi->n_devis }} " pagetitle="Devis" />

    <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12">
        <div class="xl:col-span-5">
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
                <div class="card">
                <div class="card-body">
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
            
            </div>
        </div><!--end col-->
        <div class="xl:col-span-5">
            
        <form action="{{route('admin.generate',$devi->id)}} " method="POST">
                            @csrf
            <div class="card col-6">
                    <div class=" col-6 border-b card-body border-slate-200 dark:border-zink-500" style="width:100%">
                        
                            <div class="mb-3">
                                <label for="entreprise" class="form-label">Choisir l'entreprise:</label>
                                <select class="form-select {{$errors->has('entreprise') ? 'is-invalid' : '' }}" name="entreprise" aria-label="Default select example">
                                    <option selected ></option>
                                    <option value="WINBEST">WinBest</option>
                                    <option value="ARA">ARA</option>
                                    <option value="ADN">ADN</option>
                                    <option value="NSS">NSS</option>
                                    <option value="MASTERPRO">MASTERPRO</option>
                                    <option value="ENET">ENET</option>
                                </select>
                                @error('entreprise')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-check">
                                <h6 class="text-info"> Ajouter les partenaires :  </h6>
                                <input class="form-check-input" type="radio" name="afficher_partnaires" value=true id="afficher_partnaires1" >
                                <label class="form-check-label" for="afficher_partnaires1">
                                    Oui
                                </label>
                                <input class="form-check-input" type="radio" name="afficher_partnaires" id="afficher_partnaires2" value=false checked>
                                <label class="form-check-label" for="afficher_partnaires2">
                                    Non
                                </label>
                            </div>
                        
                    </div>
                </div><!--end card-->
            <input type="submit" class="btn btn-info" value="Générer">
        </form> 
        </div><!--end col-->       
    </div><!--end grid-->
@endsection
@push('scripts')
    <!-- product overview init js-->
    <script src="{{ URL::asset('build/js/pages/apps-ecommerce-product-overview.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
