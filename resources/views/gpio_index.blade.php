@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Список датчиков GPIO</div>

                <div class="panel-body">
                    
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>№ Pin</th>
                                <th>Название</th>
                                <th>Тип</th>
                                <th>Команда</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($gpios as $gpio)
                            <tr>
                                <td>{{ $gpio->pin }}</td>
                                <td>{{ $gpio->name }}</td>
                                <td>{{ $gpio->type }}</td>
                                <td>{{ $gpio->cmd }}</td>
                                <td>
                                    {!! Form::open([
                                        'route'     => ['gpio.edit', $gpio->id],
                                        'method'    => 'GET'
                                    ]) !!}
                                    {!! Form::submit('e', array('class' => 'btn btn-success btn-sm')) !!}
                                    {!! Form::close() !!}
                                    
                                    {!! Form::open([
                                        'route'     => ['gpio.destroy', $gpio->id],
                                        'method'    => 'DELETE'
                                    ]) !!}
                                    {!! Form::submit('х', array('class' => 'btn btn-danger btn-sm')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
