   <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
       navbar-main navbar-scroll="false">
       <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
           <nav>
               <!-- breadcrumb -->
               <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                   <li class="text-sm leading-normal">
                       <a class="text-dark opacity-50" href="javascript:;">Pages</a>
                   </li>
                   <li class="text-sm pl-2 capitalize leading-normal text-dark before:float-left before:pr-2 before:text-dark before:content-['/']"
                       aria-current="page">
                       {{ $title ?? 'Admin' }}
                   </li>
               </ol>
               <h6 class="mb-0 font-bold text-dark capitalize">{{ $title ?? 'Admin' }}</h6>
           </nav>
           <!-- BURGER TOGGLE DI NAVBAR -->
           <li class="flex items-center pl-4 xl:hidden">
               <a href="javascript:;" class="block p-0 text-sm text-dark transition-all ease-nav-brand"
                   id="sidenavToggler">
                   <div class="w-4.5 overflow-hidden">
                       <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-dark transition-all"></i>
                       <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-dark transition-all"></i>
                       <i class="ease relative block h-0.5 rounded-sm bg-dark transition-all"></i>
                   </div>
               </a>
           </li>



           <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
               <div class="flex items-center md:ml-auto md:pr-4">
                   <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">

                   </div>
               </div>
               <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                   <li class="flex items-center">
                       <form action="{{ route('logout') }}" method="POST" class="inline">
                           @csrf
                           <button type="submit"
                               class="block px-0 py-2 text-sm font-semibold text-dark transition-all ease-nav-brand">
                               <i class="fa fa-sign-out-alt sm:mr-1"></i>
                               <span class="hidden sm:inline">Logout</span>
                           </button>
                       </form>
                   </li>


                   <li class="flex items-center px-4">
                       <a href="javascript:;" class="p-0 text-sm text-dark transition-all ease-nav-brand">
                           <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
                           <!-- fixed-plugin-button-nav  -->
                       </a>
                   </li>

                   <!-- notifications -->

                   <li class="relative flex items-center pr-2">
                       <p class="hidden transform-dropdown-show"></p>
                       <a href="javascript:;" class="block p-0 text-sm text-dark transition-all ease-nav-brand"
                           dropdown-trigger aria-expanded="false">
                           <i class="cursor-pointer fa fa-bell"></i>
                       </a>

                       @php $user = Auth::user(); @endphp

                       <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                           <!-- Profil -->
                           <li class="relative flex items-center">
                               <a class="d-flex align-items-center" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                   <img src="{{ $user->profile_photo_url ?? asset('admassets/img/ivancik.jpg') }}"
                                       class="rounded-circle me-2" width="36" height="36" alt="User">
                                   {{-- <span class="d-none d-lg-inline fw-semibold">{{ $user->name }}</span> --}}
                                   <i class="fa fa-caret-down ms-1"></i>
                               </a>
                               <ul class="dropdown-menu dropdown-menu-end mt-2 bg-white shadow rounded-lg text-sm">
                                   <li class="dropdown-item">{{ auth()->user()->name }}</li>
                                   <li>
                                       <hr class="dropdown-divider">
                                   </li>
                                   <li>
                                       <form action="{{ route('logout') }}" method="POST">
                                           @csrf
                                           <button type="submit" class="dropdown-item text-danger">
                                               <i class="fa fa-sign-out-alt me-2"></i> Keluar
                                           </button>
                                       </form>
                                   </li>
                               </ul>
                           </li>
                       </ul>

                   </li>
               </ul>
           </div>
       </div>
   </nav>
   <script>
       document.addEventListener("DOMContentLoaded", function() {
           const toggler = document.getElementById("sidenavToggler");
           const sidenav = document.querySelector("aside[aria-expanded]");

           toggler.addEventListener("click", function() {
               const expanded = sidenav.getAttribute("aria-expanded") === "true";

               if (expanded) {
                   sidenav.classList.add("-translate-x-full");
                   sidenav.classList.remove("xl:translate-x-0");
                   sidenav.setAttribute("aria-expanded", "false");
               } else {
                   sidenav.classList.remove("-translate-x-full");
                   sidenav.classList.add("xl:translate-x-0");
                   sidenav.setAttribute("aria-expanded", "true");
               }
           });

           // Optional: Close icon on top-right
           const closeBtn = document.querySelector("[sidenav-close]");
           if (closeBtn) {
               closeBtn.addEventListener("click", () => {
                   sidenav.classList.add("-translate-x-full");
                   sidenav.classList.remove("xl:translate-x-0");
                   sidenav.setAttribute("aria-expanded", "false");
               });
           }
       });
   </script>
