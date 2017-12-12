@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Список ферм</div>

                <div class="panel-body">
                    
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Название</th>
                                <th>Описание</th>
                                <th>Датчики</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($formics as $formic)
                            <tr>
                                <td>{{ $formic->id }}</td>
                                <td>{{ $formic->name }}</td>
                                <td>{{ $formic->desc }}</td>
                                <td>
                                    @foreach($formic->gpios as $gpio)
                                        <a href="#" class="btn btn-default btn-xs disabled" role="button">{{ $gpio->name }} ({{$gpio->type}})</a>
                                    @endforeach
                                    
                                </td>
                                <td>
                                    {!! Form::open([
                                        'route'     => ['formic.edit', $formic->id],
                                        'method'    => 'GET'
                                    ]) !!}
                                    {!! Form::submit('e', array('class' => 'btn btn-success btn-sm')) !!}
                                    {!! Form::close() !!}
                                    
                                    {!! Form::open([
                                        'route'     => ['formic.destroy', $formic->id],
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
