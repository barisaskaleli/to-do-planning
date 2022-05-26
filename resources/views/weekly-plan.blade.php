<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Weekly Plan</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="m-5">
            <div class="row">
                <div class="col-md-12">
                    <h1>Weekly Plan</h1>
                </div>
                <div class="col-md-12">
                    @foreach($developerTasks as $devName => $weeklyTasks)
                    <div class="card mb-1">
                        <div class="card-header">{{ $devName }}</div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($weeklyTasks as $week => $tasks)
                                <div class="card border-secondary m-1 col-md-12" style="max-width: 25rem;">
                                    <div class="card-header">Week {{ $week }}</div>
                                    <div class="card-body text-secondary">
                                        <h5>Total Work Hour: {{ $tasks['totalWorkingHour'] }}</h5>
                                        <hr>
                                        @php unset($tasks['totalWorkingHour']) @endphp
                                        @foreach($tasks as $key => $task)
                                            <p>{{ $task[0] }} ({{ $task[1] }} Hours)</p>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
