<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Relatório de Atendimentos por Médico</title>

    <!-- Styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            width: 90%;
            margin: 0 auto;
        }

        .text-center {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body style="background-color:white">
    <div class="content">
        <div class="text-center">
            <h1>Relatório de Atendimentos por Médico</h1>
            <p>Emitido em: {{ date('d/m/Y') }}</p>
            @if ($request->todo_periodo == 1)
                <p>Período: Todo o período</p>
            @else
                <p>Período de Abrangência:
                    {{ date('d/m/Y', strtotime($request->data_inicio)) }}
                    até
                    {{ date('d/m/Y', strtotime($request->data_fim)) }}
                </p>
            @endif
            <p>Os médicos que não fizeram atendimentos foram omitidos neste relatório</p>
        </div>

        <hr>

        <div>
            <h2>Resumo dos dados</h2>
            <p>Total de Médicos: {{ count($medicos) }}</p>
            <p>Total de Atendimentos:
                {{ $medicos->reduce(function ($carry, $medico) {
                    return $carry + count($medico->atendimentos);
                }, 0) }}
            </p>

            <table>
                <thead>
                    <tr>
                        <th>Médico</th>
                        <th>Quantidade de Atendimentos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicos as $medico)
                        <tr>
                            <td>{{ $medico->nome }}</td>
                            <td>{{ count($medico->atendimentos) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @foreach ($medicos as $medico)
            <h2>{{ $medico->nome }}</h2>
            <p>CRM: {{ $medico->crm }}</p>
            <p>Especialidade: {{ $medico->especialidade }}</p>
            <table>
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th>Data de Atendimento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medico->atendimentos as $atendimento)
                        <tr>
                            <td>{{ $atendimento->paciente->nome }}</td>
                            <td>{{ $atendimento->paciente->cpf }}</td>
                            <td>{{ $atendimento->paciente->email }}</td>
                            <td>{{ $atendimento->data_atendimento->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <hr>
        @endforeach
    </div>
</body>

</html>
