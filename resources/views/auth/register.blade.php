<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="nombre_completo" value="{{ __('¡Hola! ¿Cómo te llamas?') }}" />
                <x-input id="nombre_completo" class="block mt-1 w-full" type="text" name="nombre_completo" :value="old('nombre_completo')" required autofocus autocomplete="nombre_completo" />
            </div>

            <div>
                <x-label for="name" value="{{ __('Elige un nombre de usuario único') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Tu correo electrónico') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Escribe una contraseña segura') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirma la contraseña') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="photo" value="{{ __('Pega la URL de la foto') }}" />
                <x-input id="photo" class="block mt-1 w-full" type="text" name="photo" autocomplete="photo" />
            </div>
            
            <div class="mt-4">
                <x-label for="descripcion_perfil" value="{{ __('Puedes añadir una breve descripción a tu perfil.') }}" />
                <x-input id="descripcion_perfil" class="block mt-1 w-full" type="text" name="descripcion_perfil" autocomplete="descripcion_perfil" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('¿Ya tienes una cuenta?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Regístrate') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
