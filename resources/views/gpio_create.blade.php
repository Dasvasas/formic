@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Добавление датчика GPIO</div>

                <div class="panel-body">

                    {!! Form::open([
                        'route'     => 'gpio.store',
                        'class'     => 'form-horizontal',
                        'method'    => 'POST'
                    ]) !!}
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Название:</label>
                        <div class="col-sm-4">

                            {!! Form::text('name', null, array('class' => 'form-control', 'id' => 'name', 'required')) !!}

                        </div>
                        <label class="col-sm-2 control-label">№ PIN:</label>
                        <div class="col-sm-4">

                            {!! Form::text('pin', null, array('class' => 'form-control', 'id' => 'pin', 'required')) !!}

                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Тип:</label>
                        <div class="col-sm-4">

                            {!! Form::select('type', ['Out' => 'Получает данные', 'Int' => 'Выполняет действие'], null, ['class' => 'form-control']) !!}

                        </div>
                        <label class="col-sm-2 control-label">Команда:</label>
                        <div class="col-sm-4">

                            {!! Form::text('cmd', null, array('class' => 'form-control', 'id' => 'cmd', 'required')) !!}

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
