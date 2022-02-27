<div class="table-responsive-sm">
    <table class="table table-striped" id="kontens-table">
        <thead>
            <tr>
                <th>Jenis</th>
        <th>Isi</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($kontens as $konten)
            <tr>
                <td>{{ $konten->jenis }}</td>
            <td>{{ $konten->isi }}</td>
                <td>
                    {!! Form::open(['route' => ['kontens.destroy', $konten->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('kontens.show', [$konten->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('kontens.edit', [$konten->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>