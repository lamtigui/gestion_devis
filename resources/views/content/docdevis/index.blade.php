@extends('layouts.master')
@section('title')
{{ __('Documents de devis') }}
@endsection
@section('links')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwind.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwind.min.js"></script>
@endsection

@section('content')
<!-- page title -->
<x-page-title title="Devis Générés" pagetitle="Devis" />

<div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12">
 <table class="w-full border-separate table-custom border-spacing-y-1 whitespace-nowrap">
  <thead class="text-left">
   <tr
    class="relative rounded-md bg-slate-100 dark:bg-zink-600 after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="prospect-name">N° Devis</th>
    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="prospect-name">Titre</th>
    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="prospect-name">Entreprise</th>
    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="prospect-type">date devis</th>
    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="prospect-type">name Prospect</th>
    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="prospect-type">Type Prospect</th>
    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="date-demande">Prix HT I</th>
    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="date-demande">Remise Final</th>
    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="date-demande">Prix HT F</th>
    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="date-demande">Taux TVA</th>
    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="date-demande">Mantant TVA</th>
    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="date-demande">TTC</th>
    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="date-demande">Etat</th>
    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold"></th>
   </tr>
  </thead>
  <tbody class="list">
   @foreach ($docdevis as $doc)

   <tr>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $doc->devi->n_devis }} </td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $doc->titre }} </td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $doc->societe }} </td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $doc->devi->date }} </td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
     {{ $doc->devi->appointment->Client->name }}
    </td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
     {{ $doc->devi->appointment->Client->type_client }}
    </td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $doc->devi->prix_hors_taxe }} </td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
     {{ $doc->devi->getRemiseFinalAttrinute() }}
    </td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
     {{ $doc->devi->getMantantHTFinalAttrinute() }}
    </td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
     {{ $doc->devi->getNewTauxTvaAttribute() }}
    </td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
     {{ $doc->devi->getMantantTvaAttribute() }}
    </td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
     {{ $doc->devi->getMantantTtcAttribute() }}
    </td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ $doc->devi->etat }} </td>
    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
     <div class="relative dropdown">
      <button
       class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20"
       id="usersAction1" data-bs-toggle="dropdown"><i data-lucide="more-horizontal" class="size-3"></i></button>
      <ul
       class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
       aria-labelledby="usersAction1">
       <li>
        <a
         class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
         href="{{ route('admin.docsdevis.show',  $doc->devi->id) }}"><i data-lucide="eye"
          class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Voire</span></a>
       </li>
       <li>
        <form method="POST" id="delete-form-{{ $doc->id }}" style="display: none;"
         action="{{ route('admin.docsdevis.destroy', $doc) }}">
         @csrf
         @method('delete')
        </form>
        <button onclick="confirmDelete({{ $doc->id }});"
         class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"><i
          data-lucide="trash-2" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span
          class="align-middle">Supprimer</span></button>
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


   <div class="noresult" style="display: none">
    <div class="py-6 text-center">
     <i data-lucide="search" class="mx-auto size-6 text-sky-500 fill-sky-100 dark:fill-sky-500/20"></i>
     <h5 class="mt-2">Sorry! No Result Found</h5>
     <p class="mb-0 text-slate-500 dark:text-zink-200">We've searched more than 199+
      users We
      did not find any users for you search.</p>
    </div>
   </div>
   @endforeach
  </tbody>
 </table>
 <div class="mt-6">
   {{$docdevis->links()}}
 </div>
</div><!--end grid-->
@endsection
@push('scripts')
 <script>
  // $(document).ready(function() {
  //       $('#example').DataTable({paging: true,
  //       searching: true,
  //       info: true,
  //      });
  //   });
 </script>
 <!-- list js-->
 {{--
 <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
 <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script> --}}

 <!-- User list init js -->
 <script src="{{ URL::asset('build/js/pages/apps-user-list.init.js') }}"></script>

 <!-- App js -->
 <script src="{{ URL::asset('build/js/app.js') }}"></script>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush