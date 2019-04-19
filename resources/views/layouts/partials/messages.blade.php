@if($text = session('success'))
    <script>
        alert('here');
    </script>
    @push('js')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                type: 'success',
                title: 'Signed in successfully'
            })
        </script>
    @endpush
@endif