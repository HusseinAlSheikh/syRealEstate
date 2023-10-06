@props(['name'])
@error($name)
    <div class="text-sm font-medium   text-danger">{{ $message }}</div>
@enderror