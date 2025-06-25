<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2025 Baca Cerpen. All rights reserved.</p>
</footer>
<script>
    $(document).ready(function() {
        // Initialize Summernote
        $('#summernote').summernote({
            height: 500,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            placeholder: 'Tulis isi cerpen di sini...'
        });
    });
</script>