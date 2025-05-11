<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control @error('title') is-invalid @enderror" id="title"
        aria-describedby="emailHelp" value="{{ $initiative->name }}">
    @error('name')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>


<div class="mb-3">
    <label class="form-label">Location</label>
    <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="location"
        aria-describedby="emailHelp" value="{{ $initiative->location }}">
    @error('location')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Start Data For Initiative</label>
    <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" id="start_date"
        aria-describedby="emailHelp" value="{{ $initiative->start_date }}">
    @error('start_date')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>


<div class="mb-3">
    <label class="form-label">Last Date For Apply Initiative</label>
    <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" id="end_date"
        aria-describedby="emailHelp" value="{{ $initiative->end_date }}">
    @error('end_date')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Max Participants</label>
    <input type="integer" name="max_participants" class="form-control @error('max_participants') is-invalid @enderror" id="max_participants"
        aria-describedby="emailHelp" value="{{ $initiative->max_participants }}">
    @error('max_participants')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>


<div class="mb-3">
    <label class="form-label">Details</label>
    <input type="text" name="details" class="form-control @error('details') is-invalid @enderror" id="details"
        aria-describedby="emailHelp" value="{{ $initiative->details }}">
    @error('details')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Hours</label>
    <input type="integer" name="hours" class="form-control @error('hours') is-invalid @enderror" id="hours"
        aria-describedby="emailHelp" value="{{ $initiative->hours }}">
    @error('hours')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>


<div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
    {{-- <input type="text" name="details" class="form-control @error('details') is-invalid @enderror" id="name" aria-describedby="emailHelp" value="{{ $news->details }}"> --}}
    @error('image')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>
