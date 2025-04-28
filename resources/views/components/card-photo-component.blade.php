<a href="{{ $link }}"
    class="h-[calc(fit-content+2rem)] border w-full lg:w-96 p-5 hover:border hover:border-third rounded-lg border-primary shadow-xl bg-slate-50 dark:border dark:bg-slate-900 dark:border-gray-700 transition-all duration-100 ease-linear">
    <section class="w-full h-72 object-cover">
        <img src="{{ $img }}" alt="" class="object-cover h-full w-full rounded-sm shadow">
    </section>
    <h5 class="font-semibold text-2xl my-2">{{ $name }}</h5>
    <p class="text-slate-500 mt-2 sm:text-xl">{{ $desc }}</p>
</a>
