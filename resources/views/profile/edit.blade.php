{{--
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
--}} 
@extends('general.index-two') @section('content')
<div class="container account-page">
    <div class="container text-center">
        <div class="row pt-5 pb-5">
            <div class="col-lg-2">
                <a href="{{ url('account', $user->id) }}/edit"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
            </div>
            <div class="col-lg-8">
                <p>Update Password</p>
            </div>
            <div class="col-lg-2"></div>
        </div>

    </div>
    
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <p>Ensure your account is using a long, random password to stay secure.</p>
            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf @method('put')

                <div>
                    <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                    <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="update_password_password" :value="__('New Password')" />
                    <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center gap-4">
                    {{-- <x-primary-button>{{ __('Save') }}</x-primary-button> --}}
                    <button type="submit" class="btn btn-warning">Save</button>
                    @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
@endsection
