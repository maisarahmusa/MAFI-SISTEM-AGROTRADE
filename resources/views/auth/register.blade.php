{{-- @extends('layouts.base') --}}

{{-- @section('content') --}}
<x-guest-layout>
    {{-- <center><img src="/ecology.png" width="5%"></center> --}}
    <x-auth-card>
        <center><img src="/ecology.png" width="20%"></center>
        {{-- <img class="me-2" src="../../../assets/img/icons/spot-illustrations/falcon.png" alt="" width="58"> --}}
        {{-- <center><img src="/ecology.png" width="50%"></center> --}}
        {{-- <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot> --}}
        <div class="row flex-between-center mb-2">
            <div class="col-auto">
              <h5>Register</h5>
            </div>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <!-- Role -->
            <div>
                {{-- <x-label for="name" :value="__('Role')" /> --}}
                Role:
                <select class="form-control" name="role">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>

                {{-- <x-select id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus /> --}}
            </div> 

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
{{-- @endsection --}}