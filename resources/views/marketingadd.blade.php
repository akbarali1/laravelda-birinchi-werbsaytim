@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('store-input-fields') }}" method="POST">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <p>{{ Session::get('success') }}</p>
            </div>
            @endif
            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Ф.И.О</th>
                    <th>Должность</th>
                    <th>Специалность</th>
                    <th>Сертификаты</th>
                    <th>Файлы</th>
                    <th>Amallar</th>
                </tr>
                <tr>
                    <td><input type="text" name="addMoreInputFields[0][fio]" class="form-control" /></td>
                    <td><input type="text" name="addMoreInputFields[0][dojnost]" class="form-control" /></td>
                    <td><input type="text" name="addMoreInputFields[0][spes]" class="form-control" /></td>
                    <td><input type="text" name="addMoreInputFields[0][sertifat]" class="form-control" /></td>
                    <td><input type="file" name="addMoreInputFields[0][file]"  class="form-control" /></td>
                    <td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td>
                </tr>
            </table>
            <button id="dynamic-ar" type="button" class="btn btn-outline-primary">Добавить</button>
            <button type="submit" class="btn btn-outline-success btn-block">Сохранить</button>
        </form>
    </div>
</body>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append(`<tr>
                    <td><input type="text" name="addMoreInputFields[${i}][fio]" class="form-control" /></td>
                    <td><input type="text" name="addMoreInputFields[${i}][dojnost]" class="form-control" /></td>
                    <td><input type="text" name="addMoreInputFields[${i}][spes]" class="form-control" /></td>
                    <td><input type="text" name="addMoreInputFields[${i}][sertifat]" class="form-control" /></td>
                    <td><input type="file" name="addMoreInputFields[${i}][file]"  class="form-control" /></td>
                    <td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td>
                </tr>`);
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection
