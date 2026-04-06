<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label" for="name">Name</label>
        <input
            type="text"
            class="form-control @error('name') is-invalid @enderror"
            id="name"
            name="name"
            value="{{ old('name', $product->name ?? '') }}"
            required
        >
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-4">
        <label class="form-label" for="sku">SKU</label>
        <input
            type="text"
            class="form-control @error('sku') is-invalid @enderror"
            id="sku"
            name="sku"
            value="{{ old('sku', $product->sku ?? '') }}"
            required
        >
        @error('sku')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-4">
        <label class="form-label" for="price">Price</label>
        <input
            type="number"
            step="0.01"
            min="0"
            class="form-control @error('price') is-invalid @enderror"
            id="price"
            name="price"
            value="{{ old('price', $product->price ?? '') }}"
            required
        >
        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-8">
        <label class="form-label" for="image_url">Image URL</label>
        <input
            type="url"
            class="form-control @error('image_url') is-invalid @enderror"
            id="image_url"
            name="image_url"
            value="{{ old('image_url', $product->image_url ?? '') }}"
        >
        @error('image_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-12">
        <label class="form-label" for="description">Description</label>
        <textarea
            class="form-control @error('description') is-invalid @enderror"
            id="description"
            name="description"
            rows="5"
            required
        >{{ old('description', $product->description ?? '') }}</textarea>
        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>
