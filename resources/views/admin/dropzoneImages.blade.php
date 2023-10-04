<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<script>
    let arr = [];
    let myDropzone = new Dropzone("#dropimage", {
        url: "{{ route('admin.profile_images') }}",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function(file, res) {
            arr.push(res.url);
            $('#img').val(arr);
        }
    });
</script>
