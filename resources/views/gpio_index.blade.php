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
                                <th>Команда</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($gpios as $gpio)
                            <tr>
                                <td>{{ $gpio->pin }}</td>
                                <td>{{ $gpio->name }}</td>
                                <td>{{ $gpio->cmd }}</td>
                                <td><a href="{{ route('gpio.edit', ['gpio' => $gpio->id]) }}">[Edit]</a></td>
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
