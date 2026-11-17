<x-app-layout>
    <x-slot name="header">
        <x-eyebrow>Sua conta</x-eyebrow>
        <h1 class="font-brand text-3xl font-extrabold tracking-tight">{{ __('Profile') }}</h1>
    </x-slot>

    <div class="mx-auto max-w-4xl space-y-6 px-4 py-10 sm:px-6 lg:px-8">
        @foreach(['update-profile-information-form', 'update-password-form', 'delete-user-form'] as $partial)
            <div class="rounded-[20px] border border-base-300 bg-base-100 p-5 sm:p-8">
                <div class="max-w-xl">@include('profile.partials.'.$partial)</div>
            </div>
        @endforeach
    </div>
</x-app-layout>
