<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Login (Identifiant utilisateur) -->
        <div>
            <x-input-label for="loginA" :value="__('Identifiant utilisateur')" />
            <x-text-input id="loginA" class="block mt-1 w-full" type="text" name="loginA" :value="old('loginA')" required autofocus autocomplete="loginA" />
            <x-input-error :messages="$errors->get('loginA')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="telA" :value="__('Téléphone')" />
            <x-text-input id="telA" class="block mt-1 w-full" type="text" name="telA" :value="old('telA')" required autocomplete="telA" />
            <x-input-error :messages="$errors->get('telA')" class="mt-2" />
        </div>

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

        <!-- Raison Sociale Entreprise -->
        <div class="mt-4">
            <x-input-label for="raisonSocialeEntreprise" :value="__('Raison Sociale Entreprise')" />
            <x-text-input id="raisonSocialeEntreprise" class="block mt-1 w-full" type="text" name="raisonSocialeEntreprise" :value="old('raisonSocialeEntreprise')" required autocomplete="raisonSocialeEntreprise" />
            <x-input-error :messages="$errors->get('raisonSocialeEntreprise')" class="mt-2" />
        </div>

        <!-- LocRue -->
        <div class="mt-4">
            <x-input-label for="locRue" :value="__('Localisation Rue')" />
            <x-text-input id="locRue" class="block mt-1 w-full" type="text" name="locRue" :value="old('locRue')" required autocomplete="locRue" />
            <x-input-error :messages="$errors->get('locRue')" class="mt-2" />
        </div>

        <!-- Rue -->
        <div class="mt-4">
            <x-input-label for="rue" :value="__('Rue')" />
            <x-text-input id="rue" class="block mt-1 w-full" type="text" name="rue" :value="old('rue')" required autocomplete="rue" />
            <x-input-error :messages="$errors->get('rue')" class="mt-2" />
        </div>

        <!-- Ville -->
        <div class="mt-4">
            <x-input-label for="ville" :value="__('Ville')" />
            <x-text-input id="ville" class="block mt-1 w-full" type="text" name="ville" :value="old('ville')" required autocomplete="ville" />
            <x-input-error :messages="$errors->get('ville')" class="mt-2" />
        </div>

        <!-- Code Postal -->
        <div class="mt-4">
            <x-input-label for="cp" :value="__('Code Postal')" />
            <x-text-input id="cp" class="block mt-1 w-full" type="text" name="cp" :value="old('cp')" required autocomplete="cp" />
            <x-input-error :messages="$errors->get('cp')" class="mt-2" />
        </div>

        <!-- NumHabilitation -->
        <div class="mt-4">
            <x-input-label for="numHabilitation" :value="__('Numéro d\'habilitation')" />
            <x-text-input id="numHabilitation" class="block mt-1 w-full" type="text" name="numHabilitation" :value="old('numHabilitation')" required autocomplete="numHabilitation" />
            <x-input-error :messages="$errors->get('numHabilitation')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Déjà inscrit ? Se connecter') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Créer le compte') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>