<form method="POST" action="{{ url('players/import') }}" enctype="multipart/form-data">
    @csrf
    <div class="col-12">
        <h6 class="text-center">Import/Export Spreadsheet</h3>
        <div class="mb-2">
            <div class="custom-file">
                <input 
                    type="file" 
                    class="custom-file-input
                        @error('import_file') is-invalid @enderror"
                    id="import_file"
                    name="import_file"
                    accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                <label 
                    class="custom-file-label" 
                    for="import_file">
                    File
                </label>
            </div>
        </div>
        
        <div class="d-flex justify-content-between pl-1 pr-1">
            <a class="btn btn-success flex-fill mr-1" href="{{ url('players/export') }}">
                <i class="bi bi-download"></i>
                Export
            </a>
            <button class="btn btn-primary flex-fill ml-1" type="submit">
                <i class="bi bi-upload"></i>
                Import
            </button>
        </div>
    </div>
</form>

<script>
document.querySelector('#import_file').addEventListener('change', function(e) {
    var fileName = e.target.files[0].name;
    var label = e.target.nextElementSibling;
    label.innerText = fileName;
});
</script>