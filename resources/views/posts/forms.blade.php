<div class="mb-5">
    <label class="mb-2 block uppercase text-gray-500 font-bold">
        Titulo
    </label>
    <input name="title" type="text" value="{{ old('title', $post->title) }}" placeholder="Titulo de tu post"
        class="border p-3 w-full rounded-lg @error('name') border-red-400 @enderror">
    @error('title')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">
            {{ $message }}
        </p>
    @enderror
    <br>
</div>
<div class="mb-5">
    <label class="mb-2 block uppercase text-gray-500 font-bold">
        Descripcion <br>
        <textarea name="body" type="text" value="{{ old('body', $post->body) }}"
            class="border p-3 w-full rounded-lg @error('name') border-red-400 @enderror"> 
        </textarea>
        @error('body')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">
                {{ $message }}
            </p>
        @enderror
    </label><br>
</div>

<label for="category_id" class="mb-2 block uppercase text-gray-500 font-bold">Categoría:</label>
<select name="category_id" id="category_id">
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->category }}</option>
    @endforeach
</select>
<label>
    <div class="mb-2 block uppercase text-emerald-400 font-bold">Seleciona una imagen que quieras subir a Finstagram
    </div> <br>
    <input type="file" name="image">
    @error('image')
        <br>
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">
            {{ $message }}
        @enderror
</label>
