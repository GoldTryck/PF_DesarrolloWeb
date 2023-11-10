@php
    use Illuminate\Support\Facades\Route;
@endphp

@if (Route::currentRouteName() == 'register')
    <div class="mb-5">
        <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
            Nombre
        </label>
        <input
            id="name"
            name="name"
            type="text"
            placeholder="Tu Nombre"
            class="border p-3 w-full rounded-lg @error('name') border-red-400 @enderror"
            value="{{ old('name') }}"
        />
        @error('name')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">
                {{ $message }}
            </p>
        @enderror
    </div>
@endif

<div class="mb-5">
    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
        Email
    </label>
    <input
        id="email"
        name="email"
        type="email"
        placeholder="Tu Email de Registro"
        class="border p-3 w-full rounded-lg @error('email') border-red-400 @enderror"
        value="{{ old('email') }}"
    />
    @error('email')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">
            {{ $message }}
        </p>
    @enderror
</div>

@if (Route::currentRouteName() == 'register')
    <div class="mb-5">
        <label for="email_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
            Confirma tu Email
        </label>
        <input
            id="email_confirmation"
            name="email_confirmation"
            type="email"
            placeholder="Confirma tu Email"
            class="border p-3 w-full rounded-lg"
        />
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
    <input
        id="password"
        name="password"
        type="password"
        placeholder="Password de Registro"
        class="border p-3 w-full rounded-lg @error('password') border-red-400 @enderror"
        value="{{ old('password') }}"
    />
    @error('password')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">
            {{ $message }}
        </p>
    @enderror
</div>

@if (Route::currentRouteName() == 'register')
    <div class="mb-5">
        <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
            Repetir Password
        </label>
        <input
            id="password_confirmation"
            name="password_confirmation"
            type="password"
            placeholder="Repite tu Password"
            class="border p-3 w-full rounded-lg"
        />
        @error('password_confirmation')
            <br>
            <small style="color:red">{{ $message }}</small>
        @enderror
    </div>
@endif
