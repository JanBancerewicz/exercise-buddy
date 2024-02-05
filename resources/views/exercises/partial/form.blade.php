<div class="containter">
    <div class="row py-5">
        <div class="col-sm-12 col-lg-8 offset-lg-2">
            <p>
                <a href="{{ route('exercises.index') }}"> &larr; Main page</a>
            </p>
            <form action="{{ route('exercises.store') }}" method="POST" novalidate>
                <div class="input-group mb-3">
                    <span class="input-group-text">Exercise title</span>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" placeholder="What to do..." value="{{ old('title') }}" />
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group">
                    <span class="input-group-text">Content:</span>
                    <textarea class="form-control @error('content') is-invalid @enderror" rows="5" id="content" name="content" placeholder="Description..."
                        maxlength="1000">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br />
                <div class="input-group mb-3">
                    <span class="input-group-text">Category</span>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category') }}" >
                            <option selected>Select a difficulty...</option>
                            <option value="0">Warm-up</option>
                            <option value="1">Easy</option>
                            <option value="2">Medium</option>
                            <option value="3">Hard</option>
                            <option value="4">Advanced</option>
                        </select>
                    @error('category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="input-group mb-3">
                    <span class="input-group-text">Weight</span>
                    <input type="number" min="0" max="100" class="form-control @error('weight') is-invalid @enderror" id="weight"
                        name="weight" placeholder="Weight in kg..." value="{{ old('weight') }}" />
                    @error('weight')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="input-group mb-3">
                    <span class="input-group-text">Reps</span>
                    <input type="number" min="0" max="100" class="form-control @error('reps') is-invalid @enderror" id="reps"
                        name="reps" placeholder="Number of reps..." value="{{ old('reps') }}" />
                    @error('reps')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="input-group mb-3">
                    <span class="input-group-text">Sets</span>
                    <input type="number" min="0" max="10" class="form-control @error('sets') is-invalid @enderror" id="sets"
                        name="sets" placeholder="Number of sets..." value="{{ old('sets') }}"/>
                    @error('sets')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Rest Time</span>
                        <select class="form-select @error('restTime') is-invalid @enderror" id="restTime" name="restTime" value="{{ old('restTime') }}" >
                            <option selected>Select the rest time...</option>
                            <option value="0">0s</option>
                            <option value="30">30s</option>
                            <option value="60">60s</option>
                            <option value="90">90s</option>
                            <option value="120">120s</option>
                            <option value="180">180s</option>
                        </select>
                    @error('restTime')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br />
                <button type="submit" class="btn btn-success">Submit</button>
                <input type="hidden" name="status" value="{{ $defaultStatus }}" />

                @csrf
                @method('POST')
            </form>
        </div>
    </div>
</div>
