@php
    use Illuminate\Support\Facades\Route;
@endphp
@if (Route::currentRouteName() == 'register')
    <div class="mb-5">
        <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
            Nombre de Usuario
        </label>
        <input id="name" name="name" value="{{ old('name') }}" type="text" placeholder="Tu Nombre"
            class="border p-3 w-full rounded-lg" />
        @error('name')
            <br>
            <small style="color:red">{{ $message }}</small>
        @enderror
    </div>
@endif
<div class="mb-5">
    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
        E-mail
    </label>
    <input id="email" name="email" type="email" placeholder="Tu E-mail de Registro"
        class="border p-3 w-full rounded-lg" />
    @error('email')
        <br>
        <small style="color:red">{{ $message }}</small>
    @enderror
</div>
@if (Route::currentRouteName() == 'register')
    <div class="mb-5">
        <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
            E-mail
        </label>
        <input id="email" name="email_confirmation" type="email" placeholder="Tu E-mail de Registro"
            class="border p-3 w-full rounded-lg" />
        @error('email_confirmation')
            <br>
            <small style="color:red">{{ $message }}</small>
        @enderror
    </div>
@endif
<div class="mb-5">
    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
        Password
    </label>
    <input id="password" name="password" type="password" placeholder="Password de Registor"
        class="border p-3 w-full rounded-lg" />
    @error('password')
        <br>
        <small style="color:red">{{ $message }}</small>
    @enderror
</div>
@if (Route::currentRouteName() == 'register')
    <div class="mb-5">
        <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
            Rrpetir Password
        </label>
        <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repite tu password"
            class="border p-3 w-full rounded-lg" />
        @error('password_confirmation')
            <br>
            <small style="color:red">{{ $message }}</small>
        @enderror
    </div>
@endif
