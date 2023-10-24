@php
    use Illuminate\Support\Facades\Route;
@endphp
@if (Route::currentRouteName() == 'register')
    <label>
        Nombre de Usuario <br>
        <input name="name" type="text" value="{{ old('name') }}">
        @error('name')
            <br>
            <small style="color:red">{{ $message}}</small>
        @enderror
    </label><br>
@endif

<label>
    E-mail <br>
    <input name="email" type="text">
    @error('email')
        <br>
        <small style="color:red">{{ $message}}</small>
    @enderror
</label><br>
@if (Route::currentRouteName() == 'register')
    <label>
        Confirmar E-mail <br>
        <input name="email_confirmation" type="text">
        @error('email_confirmation')
            <br>
            <small style="color:red">{{ $message}}</small>
        @enderror
    </label><br>
@endif
<label>
    Contraseña <br>
    <input name="password" type="password">
    @error('password')
        <br>
        <small style="color:red">{{ $message}}</small>
    @enderror
</label><br>

@if (Route::currentRouteName() == 'register')
    <label>
        Confirmar Contraseña <br>
        <input name="password_confirmation" type="password">
        @error('password_confirmation')
            <br>
            <small style="color:red">{{ $message}}</small>
        @enderror
    </label><br>
@endif