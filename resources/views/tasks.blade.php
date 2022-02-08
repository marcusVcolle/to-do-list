<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body style="background-color: hsl(0, 0%, 90%)">
    <div class="container">
        <div class="row" style="margin-top: 30px; margin-bottom:50px;">
            <img src="/storage/images/logo.png"/>
        </div>

        <div class="row">
            <div class="col-md-4">
                <!-- New Task Form -->
                <form action="/task" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div>
                            <input type="text" name="description" id="description" placeholder="Insert task name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary" style="width: 100%;">
                            Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-8">
                <!-- Current Tasks -->
                @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table">

                            <!-- Table Headings -->
                            <thead>
                                <th> # Task</th>
                                <th></th>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                                @foreach ($tasks as $task)
                                <tr>
                                    @if($task->completed === 1)
                                    <!-- Task Name -->
                                    <td>{{$task->id}}</td>
                                    <td class="table-text">
                                        <div style="text-decoration: line-through">{{ $task->description }}</div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    @else
                                    <!-- Task Name -->
                                  
                                    <td>{{$task->id}}</td>
                                  
                                    <td class="table-text">
                                        <div>{{ $task->description }}</div>
                                    </td>

                                    <!-- Delete Button -->
                                    <td class="text-right">
                                        <form action="/task/{{ $task->id }}/update" method="POST"
                                            class="form-horizontal" enctype="multipart/form-data">
                                            {{ csrf_field() }}

                                            <button class="btn btn-success">&#10003</button>
                                        </form>
                                    </td>

                                    <!-- Delete Button -->
                                    <td>
                                        <a href="/task/{{$task->id}}" class="btn btn-danger">&#215</a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div style="margin-top: 150px;">
            <p class="text-center">Copyright © 2020All Rights Reserved</p>
        </div>
    </div>
</body>
</html>
