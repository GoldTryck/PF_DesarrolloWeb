<x-layouts.app
    title="FI | ABOUT"
    meta-description="Descrición del Home"
    header="SOBRE NOSOTROS">
    <div class="form-group">
        <label for="foto_perfil" class="mb-2 block uppercase text-gray-500 font-bold">Foto de Perfil:</label>
        <input type="file" name="foto_perfil" id="foto_perfil">
    </div>
<br>
    <div class="form-group">
        <label for="descripcion"class="mb-2 block uppercase text-gray-500 font-bold" >Descripción:</label>
        <textarea class=" text-white my-2 rounded-lg text-sm text-center p-2" name="descripcion" id="descripcion" rows="4"></textarea>
    </div>

    <button type="submit" class="mt-5 bg-emerald-400 hover:bg-emerald-600 transition-colors cursor-pointer uppercase font-bold w-auto p-3 text-white rounded-lg">Guardar</button>


</x-layouts.app>