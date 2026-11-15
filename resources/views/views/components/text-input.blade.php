@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-[#7A8C9C] focus:border-[#9B83D6] focus:ring-[#0082A3] rounded-md shadow-sm']) }}>
