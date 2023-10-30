<label>
    Titulo <br>
    <input name="title" type="text" value="{{ old('title', $post->title) }}">
    @error('title')
        <br>
        <small style="color:red">{{ $message }}</small>
    @enderror
</label><br>
<label>
    Descripcion <br>
    <textarea name="body">{{ old('body', $post->body) }}</textarea>
    @error('body')
        <br>
        <small style="color:red">{{ $message }}</small>
    @enderror
</label><br>
<label for="category_id">Categoría:</label>
<select name="category_id" id="category_id">
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->category }}</option>
    @endforeach
</select>
<label>
    Imagen <br>
    <input type="file" name="image">
    @error('image')
        <br>
        <small style="color:red">{{ $message }}</small>
    @enderror
</label>
