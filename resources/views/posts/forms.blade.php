<label>
    Titulo <br>
    <input name="title" type="text" value="{{ old('title', $post->title) }}">
    @error('title')
        <br>
        <small style="color:red">{{ $message}}</small>
    @enderror
</label><br>
<label>
    Descripcion <br>
    <textarea name="body">{{ old('body', $post->body) }}</textarea>
    @error('body')
        <br>
        <small style="color:red">{{ $message}}</small>
    @enderror
</label><br>
<label>
    Categoría <br>
    <select name="category" value="{{ $post->category }}">
        <option value="tecnology" selected>Tecnología</option>
        <option value="music">Deportes</option>
        <option value="videogames">Video Juegos</option>
    </select>
    
</label>
<label>
    Imagen <br>
    <input type="file" name="image">
    @error('image')
        <br>
        <small style="color:red">{{ $message}}</small>
    @enderror
</label>
