@extends('admin.layout')
@section('content')
    <!-- Main content -->
    <section class="content">
        {!! $content !!}
    </section>
    <!-- /.content -->
@endsection

@section('navigation')
    {!! $navigation !!}
@endsection
@push('scripts')
    <script>
        $(document).on('click', 'a.page-link', function (event) {
            event.preventDefault();
            ajaxLoad($(this).attr('href'));
        });
        function ajaxLoad(filename, content) {
            content = typeof content !== 'undefined' ? content : 'content';
            console.log(content);
            // $('.loading').show();
            $.ajax({
                type: "GET",
                url: filename,
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                success: function (data) {
                    $("." + content).html(data);
                    // $('.loading').hide();
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            });
        }

    </script>
@endpush