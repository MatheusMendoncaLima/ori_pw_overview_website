<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#D32F2F] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#D32F2F] active:bg-[#D32F2F] focus:outline-none focus:ring-2 focus:ring-[#D32F2F] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
