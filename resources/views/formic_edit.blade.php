@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Добавление фермы</div>

                <div class="panel-body">

                    {!! Form::model($formic, [
                        'route'     => ['formic.update', $formic->id],
                        'class'     => 'form-horizontal',
                        'method'    => 'PUT'
                    ]) !!}
                    
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Название:</label>
                        <div class="col-sm-8">

                            {!! Form::text('name', null, array('class' => 'form-control', 'id' => 'name', 'required')) !!}

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Описание:</label>
                        <div class="col-sm-8">

                            {!! Form::text('desc', null, array('class' => 'form-control', 'id' => 'desc', 'required')) !!}

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Датчики:</label>
                        <div class="col-sm-6">
                            {!! Form::select('gpios[]', $gpios, null, array('class' => 'form-control', 'multiple', 'required')) !!}
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                    
                        {!! Form::submit('Добавить', array('class' => 'btn btn-primary')) !!}
                    
                    </div>
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
