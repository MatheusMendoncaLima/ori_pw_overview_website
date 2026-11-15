@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'rounded-[14px] border border-[#7A8C9C] bg-white text-[#102A45] focus:border-[#0082A3] focus:ring-[#D2E6F5] dark:bg-[#142230] dark:text-[#E4EDF4]']) }}>
