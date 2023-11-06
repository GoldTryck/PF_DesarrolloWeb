<div class=" container-fluid mb-4">
    <div class="row mb-2">
        <textarea name="body" class="form-control" placeholder="Deja tu comentario aquí..." id="floatingTextarea2"
            style="height: 100px"></textarea>
        @error('body')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>
    <div class="row">
        <button type="submit" class="btn btn-neon cian-text btn-lg">Envíar</button>
    </div>
</div>
