<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head></head>
    <body>
        <form id="login-form">
            <div>
                <label>Username</label>
                <input type="text" name="username">
            </div>
            <div>
                <label>Password</label>
                <input type="text" name="password">
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </body>

    <script src="{{ url('jquery.js') }}"></script>

    <script>
        $('#login-form').submit(function(e) {
            e.preventDefault();
            var $this = $(this);

            // Set Form Data
            var formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            
            // Send Form Data
            $.ajax({
                type:'POST',
                url: "{{ url('login') }}",
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    alert(data.message)
                    window.location.href = `{{ url('wedding/guest') }}`;
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