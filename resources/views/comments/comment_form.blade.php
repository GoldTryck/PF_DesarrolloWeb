<div class=" container-fluid mb-4">
    <div class="row mb-2">
        <textarea name="body" class=" mt-5 form-control border p-3 w-full rounded-lg @error('name') border-red-400 @enderror" placeholder="Deja tu comentario aquí..." id="floatingTextarea2"
            style="height: 100px"></textarea>
        @error('body')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>
    <div class="row">
        <button type="submit" class=" mt-5 bg-emerald-400 hover:bg-emerald-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" type="button">Envíar</button>
    </div>
</div>
