<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Match - Sports Tournament Manager</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #172554;
        }

        .navbar {
            background: #172554;
            padding: 18px 7%;
            color: white;
            font-size: 22px;
            font-weight: bold;
        }

        .container {
            width: 60%;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        }

        h1 {
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
        }

        .row {
            display: flex;
            gap: 20px;
        }

        .row .form-group {
            width: 50%;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .update-btn {
            border: none;
            background: #0ea5e9;
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .back-btn {
            text-decoration: none;
            background: #64748b;
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="navbar">
    🏆 Sports Tournament Manager
</div>

<div class="container">

    <div class="card">

        <h1>Edit Tournament Match</h1>

        @if($errors->any())

            <div class="error">

                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach

            </div>

        @endif

        <form action="{{ route('matches.update', $match->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>Tournament</label>

                <select name="tournament_id" required>

                    @foreach($tournaments as $tournament)

                        <option value="{{ $tournament->id }}"
                            {{ $match->tournament_id == $tournament->id ? 'selected' : '' }}>

                            {{ $tournament->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="row">

                <div class="form-group">

                    <label>Team A</label>

                    <select name="team_a_id" required>

                        @foreach($teams as $team)

                            <option value="{{ $team->id }}"
                                {{ $match->team_a_id == $team->id ? 'selected' : '' }}>

                                {{ $team->team_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="form-group">

                    <label>Team B</label>

                    <select name="team_b_id" required>

                        @foreach($teams as $team)

                            <option value="{{ $team->id }}"
                                {{ $match->team_b_id == $team->id ? 'selected' : '' }}>

                                {{ $team->team_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

            <div class="row">

                <div class="form-group">

                    <label>Match Date</label>

                    <input type="date"
                           name="match_date"
                           value="{{ $match->match_date }}"
                           required>

                </div>

                <div class="form-group">

                    <label>Match Time</label>

                    <input type="time"
                           name="match_time"
                           value="{{ $match->match_time }}">

                </div>

            </div>

            <div class="form-group">

                <label>Venue</label>

                <input type="text"
                       name="venue"
                       value="{{ $match->venue }}"
                       required>

            </div>

            <div class="form-group">

                <label>Status</label>

                <select name="status" required>

                    <option value="scheduled"
                        {{ $match->status == 'scheduled' ? 'selected' : '' }}>
                        Scheduled
                    </option>

                    <option value="completed"
                        {{ $match->status == 'completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                    <option value="cancelled"
                        {{ $match->status == 'cancelled' ? 'selected' : '' }}>
                        Cancelled
                    </option>

                </select>

            </div>

            <div class="buttons">

                <button type="submit" class="update-btn">
                    Update Match
                </button>

                <a href="{{ route('matches.index') }}"
                   class="back-btn">
                    Back
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>