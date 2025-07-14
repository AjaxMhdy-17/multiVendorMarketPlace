@extends('user.dashboardLayout.main')

@section('title', 'profile')

@section('content')
    <div class="wsus__dash_form">
        <div>
            <h5>New Item</h5>
        </div>
        <form action="#">
            <div class="row">
                <div class="col-12">
                    <x-user.input-text type="text" name="name" :label="__('Name')" :required="true" />
                </div>
                <div class="col-12">
                    <x-user.text-area name="description" :label="__('Description')" :required="true" id="tiny" />
                </div>
            </div>
            <button type="button" class="btn btn-main btn-md mt-2">Save
                Information</button>
        </form>
    </div>
@endsection

@push('js')
    <script>
        tinymce.init({
            selector: 'textarea#tiny',
            plugins: 'autolink link image lists table',
            menubar: 'file edit view insert format tools table',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | bullist numlist | link image table',
            height: 350,
            toolbar_mode: 'sliding',
            contextmenu: 'link image table',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
            file_picker_callback: function(callback, value, meta) {
                // Create input element and trigger click
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file = this.files[0];

                    // You can add your image upload logic here
                    // For example, using FileReader to preview:
                    var reader = new FileReader();
                    reader.onload = function() {
                        callback(reader.result, {
                            alt: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            }
        });
    </script>
@endpush
