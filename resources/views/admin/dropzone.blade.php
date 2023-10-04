<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<script>
    let myDropzone = new Dropzone("#dropimage", {
        url: "{{ route('admin.profile_image') }}",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function(file, res) {
            console.log(res.url);
            $('#img').val(res.url);
            $('.admin_img_wrapper').html(img)

        }
    });
</script>
