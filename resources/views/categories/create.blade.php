<x-layouts.app title="Nuevo comentario" meta-description="Formulario para crear un comentario" header="HACER COMENTARIO">
    @section('titulo')
        CREAR CATEGORIA
    @endsection
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class=" container-fluid mb-4">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
            <div class="row mb-2">
                <textarea name="category" class=" mt-5 form-control border p-3 w-full rounded-lg @error('name') border-red-400 @enderror"
                    placeholder="Crear categoria..." id="floatingTextarea2" style="height: 100px"></textarea>
                @error('category')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <button type="submit"
                    class=" mt-5 bg-emerald-400 hover:bg-emerald-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                    <i class="fas fa-paper-plane"></i> submit</button>
            </div>
        </div>
    </form>
</x-layouts.app>
