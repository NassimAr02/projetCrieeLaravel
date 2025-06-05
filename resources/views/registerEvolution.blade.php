<x-guest-layout>
    <form method="POST" action="{{ route('criee_evolution.register.submit') }}">
        @csrf

        <!-- Login (Identifiant utilisateur) -->
        <div>
            <x-input-label for="nomUser" :value="__('Nom utilisateur')" />
            <x-text-input id="nomUser" class="block mt-1 w-full" type="text" name="nomUser" :value="old('nomUser')" required autofocus autocomplete="loginA" />
            <x-input-error :messages="$errors->get('nomUser')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="prenomUser" :value="__('Prenom utilisateur')" />
            <x-text-input id="prenomUser" class="block mt-1 w-full" type="text" name="prenomUser" :value="old('prenomUser')" required autofocus autocomplete="loginA" />
            <x-input-error :messages="$errors->get('prenomUser')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="pwd" :value="__('Mot de passe')" />
            <x-text-input id="pwd" class="block mt-1 w-full"
                            type="password"
                            name="pwd"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('pwd')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="pwd_confirmation" :value="__('Confirmer le mot de passe')" />
            <x-text-input id="pwd_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="pwd_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('pwd_confirmation')" class="mt-2" />
        </div>

        

        <!-- Submit Button -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('criee_evolution.login') }}">
                {{ __('Déjà inscrit ? Se connecter') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Créer le compte') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>