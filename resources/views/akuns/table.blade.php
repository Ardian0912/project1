<div class="table-responsive-sm">
    <table class="table table-striped" id="akuns-table">
        <thead>
            <tr>
                
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($akuns as $akun)
            <tr>
                
                <td>
                    {!! Form::open(['route' => ['akuns.destroy', $akun->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('akuns.show', [$akun->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('akuns.edit', [$akun->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>