@extends('layouts.app')

@section('content')

<style>
/* ------------------ 共通スタイル ------------------ */
body, html { font-family: 'Source Serif Pro', serif; background-color: white; }

.full-page-container { display: flex; justify-content: center; align-items: flex-start; min-height: 100vh; padding-top: 80px; }
.post-container { width: 100%; max-width: 760px; padding: 40px 30px; border: 1px solid #9F6B46; border-radius: 5px; background-color: white; }
.post-header { display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: #9F6B46; font-weight: 700; margin-bottom: 2rem; padding-bottom: 15px; border-bottom: 1px solid #9F6B46; }
.post-header i { font-size: 1.5em; margin-right: 10px; }
.post-label { font-weight: 600; margin-bottom: 0.3rem; display: block; text-align: left; font-size: 1rem; color: #9F6B46; }
.post-input, .form-select.post-input { height: 40px; border-radius: 5px; padding: 0.375rem 1rem; border: 1px solid #ced4da; font-size: 1rem; width: 100%; color: #9F6B46; }
textarea.post-input { height: 120px; resize: vertical; padding: 1rem; }
.post-input:focus { box-shadow: 0 0 0 0.25rem rgba(159,107,70,0.25); border-color:#9F6B46; }
.post-input::placeholder { color:#9F6B46 !important; opacity:0.8; }

.time-input { width: 60px !important; text-align: center; padding: 0.375rem 0.5rem; }
.time-unit { margin: 0 5px; color:#9F6B46; }

.range-wrap { display:flex; align-items:center; padding:5px 0; }
.range-input { width:100%; height:5px; background:#F8C7B3; border-radius:5px; appearance:none; cursor:pointer; }
.range-input::-webkit-slider-thumb { appearance:none; width:15px; height:15px; background:#9F6B46; border-radius:50%; }
.cost-display { color:#9F6B46; font-weight:600; margin-left:10px; min-width:60px; }

.image-controls { display:flex; align-items:center; margin-bottom:15px; }
.image-btn { background-color: #F8F8F8; border:1px solid #9F6B46; color:#9F6B46; padding:5px 10px; border-radius:5px; cursor:pointer; margin-right:10px; font-weight:500; }
.image-preview-area { display:flex; gap:15px; margin-top:10px; overflow-x:auto; padding-bottom:10px; }
.image-item { width:100px; height:100px; border-radius:5px; overflow:hidden; position:relative; flex-shrink:0; border:1px solid #ccc; }
.image-item img { width:100%; height:100%; object-fit:cover; }
.remove-btn { position:absolute; top:3px; right:3px; background:#9F6B46; color:#fff; border-radius:50%; width:20px; height:20px; display:flex; justify-content:center; align-items:center; cursor:pointer; font-weight:bold; }

.form-footer { display:flex; justify-content:flex-end; gap:15px; padding-top:20px; }
.btn-cancel { background-color:white; color:#F8C7B3; border:1px solid #F8C7B3; padding:8px 25px; font-weight:600; border-radius:5px; }
.btn-post { background-color:#F8C7B3; color:white; border:1px solid #F8C7B3; padding:8px 25px; font-weight:600; border-radius:5px; }
</style>

@php
$images = [];
if (!empty($post->image)) {
    $decoded = json_decode($post->image, true);
    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
        $images = array_filter($decoded, fn($img) => !empty($img));
    }
}
@endphp

<div class="full-page-container">
    <div class="post-container">
        <div class="post-header"><i class="fa-solid fa-circle-plus"></i> Edit Post</div>

        <form method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-3">
                <label class="form-label post-label" for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control post-input @error('title') is-invalid @enderror" 
                    value="{{ old('title', $post->title) }}" required placeholder="Arakurayamasengen Park">
                @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label class="form-label post-label" for="content">Description</label>
                <textarea id="content" name="content" class="form-control post-input @error('content') is-invalid @enderror" rows="4" required placeholder="Description...">{{ old('content', $post->content) }}</textarea>
                @error('content') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Date & Time --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label post-label" for="date">Date</label>
                   <input 
                    type="date" 
                    name="date" 
                    value="{{ old('date', $post->visited_at ? $post->visited_at->format('Y-m-d') : '') }}"
                    >

                    @error('date') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label post-label">Time</label>
                    <div class="d-flex align-items-center">
                        <input type="number" name="time_hour" class="form-control post-input time-input @error('time_hour') is-invalid @enderror" 
                            value="{{ old('time_hour', $post->time_hour ?? 0) }}" min="0" max="23">
                        <span class="time-unit">hour</span>
                        <input type="number" name="time_min" class="form-control post-input time-input @error('time_min') is-invalid @enderror" 
                            value="{{ old('time_min', $post->time_min ?? 0) }}" min="0" max="59">
                        <span class="time-unit">min</span>
                    </div>
                    @error('time_hour') <div class="text-danger small">{{ $message }}</div> @enderror
                    @error('time_min') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            </div>

            {{-- Categories --}}
            <div class="mb-3">
                <label class="post-label">Categories</label>
                <div id="category-checkboxes" class="d-flex flex-wrap gap-3">
                    @foreach ($all_categories as $category)
                        <div class="form-check">
                            <input type="checkbox" name="category[]" value="{{ $category->id }}" 
                                class="form-check-input category-checkbox"
                                {{ in_array($category->id, old('category', $post->categories->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ ucfirst($category->name) }}</label>
                        </div>
                    @endforeach
                </div>
                @error('category') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Prefecture --}}
            <div class="mb-3">
                <label class="post-label" for="prefecture_id">Prefecture</label>
                <select name="prefecture_id" class="form-select post-input @error('prefecture_id') is-invalid @enderror">
                    <option value="">Select Prefecture</option>
                    @foreach ($prefectures as $prefecture)
                        <option value="{{ $prefecture->id }}" {{ old('prefecture_id', $post->prefecture_id) == $prefecture->id ? 'selected' : '' }}>
                            {{ $prefecture->name }}
                        </option>
                    @endforeach
                </select>
                @error('prefecture_id') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Cost --}}
            <div class="mb-4" style="width: 60%;">
                <label class="post-label" for="cost-slider">Cost</label>
                <div class="range-wrap">
                    <span class="cost-display" id="cost-current">¥{{ old('cost', $post->cost ?? 0) }}</span>
                    <input type="range" id="cost-slider" name="cost" min="0" max="10000" step="100" 
                        value="{{ old('cost', $post->cost ?? 0) }}" class="range-input">
                </div>
                @error('cost') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Images --}}
            <div class="mb-4">
                <label class="post-label">Images (up to 3)</label>
                <div class="image-controls">
                    <label for="file-upload" class="image-btn">+ Add</label>
                    <input type="file" id="file-upload" name="image[]" accept="image/*" multiple hidden>
                </div>
                <div id="image-previews" class="image-preview-area">
                    @foreach ($images as $img)
                        <div class="image-item">
                            <img src="data:image/jpeg;base64,{{ $img }}">
                            <span class="remove-btn" onclick="this.parentNode.remove()">×</span>
                        </div>
                    @endforeach
                </div>
                @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Footer --}}
            <div class="form-footer">
                <button type="button" class="btn-cancel" onclick="window.history.back()">Cancel</button>
                <button type="submit" class="btn-post">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const MAX_IMAGES = 3;
    const input = document.getElementById('file-upload');
    const previewArea = document.getElementById('image-previews');
    const costSlider = document.getElementById('cost-slider');
    const costDisplay = document.getElementById('cost-current');
    const checkboxes = document.querySelectorAll('.category-checkbox');

    // コストスライダー更新
    costSlider?.addEventListener('input', () => {
        costDisplay.textContent = '¥' + costSlider.value;
    });

    // 画像プレビュー処理
    input?.addEventListener('change', function(e) {
        const files = Array.from(e.target.files);
        const existing = previewArea.querySelectorAll('.image-item').length;
        const addable = Math.min(files.length, MAX_IMAGES - existing);

        files.slice(0, addable).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(ev) {
                const div = document.createElement('div');
                div.classList.add('image-item');

                const img = document.createElement('img');
                img.src = ev.target.result;

                const removeBtn = document.createElement('span');
                removeBtn.classList.add('remove-btn');
                removeBtn.textContent = '×';
                removeBtn.onclick = () => div.remove();

                div.appendChild(img);
                div.appendChild(removeBtn);
                previewArea.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    });

    // カテゴリ選択（最大3つ）
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const checked = document.querySelectorAll('.category-checkbox:checked');
            if (checked.length > 3) {
                this.checked = false;
                alert('Up to 3 categories allowed.');
            }
        });
    });
});
</script>

@endsection
