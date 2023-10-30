<label>
    Comentario: <br>
    <textarea name="body"></textarea>
    @error('body')
        <br>
        <small style="color:red">{{ $message }}</small>
    @enderror
</label>
