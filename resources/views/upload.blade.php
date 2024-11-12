@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="file" class="form-label">Upload Excel File</label>
        <input type="file" id="file" name="file" class="form-control" required>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary w-100">Add</button>
    </div>
</form>

