<aside
    class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
    aria-expanded="false">
    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
            sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700"
            href="/" target="_blank">
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Puncak Permata</span>
        </a>
    </div>

    <hr
        class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class="py-2.7 {{ ($title == 'Beranda' ? 'bg-blue-500/13' : '') }} text-sm ease-nav-brand mx-2 flex items-center rounded-lg px-4 font-semibold text-slate-700 dark:text-white dark:opacity-80 transition-colors"
                    href="/dashboard">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg text-blue-500">
                        <i class="ni ni-tv-2"></i>
                    </div>
                    <span class="ml-1">Beranda</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 {{ ($title == 'Banner' ? 'bg-blue-500/13' : '') }} text-sm ease-nav-brand mx-2 flex items-center rounded-lg px-4 font-semibold text-slate-700 dark:text-white dark:opacity-80 transition-colors"
                    href="/banner">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg text-stone-800">
                        <i class="ni ni-notification-70"></i>
                    </div>
                    <span class="ml-1">Banner</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 {{ ($title == 'Article' ? 'bg-blue-500/13' : '') }} text-sm ease-nav-brand mx-2 flex items-center rounded-lg px-4 font-semibold text-slate-700 dark:text-white dark:opacity-80 transition-colors"
                    href="/article">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg text-yellow-400">
                        <i class="ni ni-building"></i>
                    </div>
                    <span class="ml-1">Article</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 {{ ($title == 'Testimoni' ? 'bg-blue-500/13' : '') }} text-sm ease-nav-brand mx-2 flex items-center rounded-lg px-4 font-semibold text-slate-700 dark:text-white dark:opacity-80 transition-colors"
                    href="/testimoni">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg text-green-900">
                        <i class="ni ni-check-bold"></i>
                    </div>
                    <span class="ml-1">Testimoni</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 {{ ($title == 'User' ? 'bg-blue-500/13' : '') }} text-sm ease-nav-brand mx-2 flex items-center rounded-lg px-4 font-semibold text-slate-700 dark:text-white dark:opacity-80 transition-colors"
                    href="/user">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg text-green-900">
                        <i class="ni ni-single-02"></i>
                    </div>
                    <span class="ml-1">User</span>
                </a>
            </li>
        </ul>
    </div>
{{-- 
    <div class="mx-4 mt-6">
        <div
            class="p-4 bg-gradient-to-r from-yellow-300 to-yellow-500 text-slate-800 rounded-xl shadow-md text-center">
            <h6 class="text-sm font-bold mb-1">Jelajahi Nusantara!</h6>
            <p class="text-xs opacity-80">Temukan destinasi wisata terbaik di Indonesia 🌴✨</p>
            <a href="#destinasi"
                class="mt-3 inline-block w-full px-4 py-2 text-xs font-bold text-center text-white bg-orange-500 hover:bg-orange-600 rounded-lg transition-all duration-200">
                Lihat Destinasi
            </a>
        </div>
    </div> --}}
</aside>
