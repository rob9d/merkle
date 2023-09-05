<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head></head>
    <body>
        <form id="guest-form">
            <div>
                <label>Nama</label>
                <input type="text" name="name">
            </div>
            <div>
                <label>Alamat</label>
                <input type="text" name="address">
            </div>
            <div>
                <label>Telepon</label>
                <input type="number" name="phone">
            </div>
            <div>
                <label>Catatan</label>
                <textarea name="notes"></textarea>
            </div>
            <div>
                <button type="submit">Tambah Data</button>
            </div>
        </form>
    </body>

    <script src="{{ url('jquery.js') }}"></script>

    <script>
        $('#guest-form').submit(function(e) {
            e.preventDefault();
            var $this = $(this);

            // Set Form Data
            var formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            
            // Send Form Data
            $.ajax({
                type:'POST',
                url: "{{ url('wedding/guest/insert') }}",
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    alert(data.message)
                },
                error: function(xhr, status, errors) {
                    // // Validation
                    // if (typeof xhr.responseJSON.errors !== 'undefined') {
                    //     $.each(xhr.responseJSON.errors, function( index, value ) {
                    //         $this.find(`[name="${index}"]`).addClass('is-invalid');
                    //         $this.find(`[name="${index}"]`).siblings(':input').addClass('is-invalid');
                    //         $this.find(`[name="${index}"]`).siblings( ".invalid-feedback" ).html(value);
                    //     });
                    // }

                    // // Notification
                    // Swal.fire({
                    //     title: "Oops...",
                    //     text: xhr.responseJSON.message,
                    //     icon: "error"
                    // });
                    console.log(xhr, status, errors)
                    alert('Gagal Error')
                }
            });
        });
    </script>
</html>