<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Score | Sports Tournament Manager</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            color: #172554;
        }

        .navbar {
            background: white;
            padding: 18px 7%;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .logo {
            font-size: 21px;
            font-weight: bold;
        }

        .logo span {
            color: #2563eb;
        }

        .container {
            width: 58%;
            margin: 45px auto;
        }

        .heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .heading .icon {
            font-size: 42px;
        }

        .heading h1 {
            margin-top: 8px;
            font-size: 30px;
        }

        .heading p {
            color: #64748b;
            margin-top: 7px;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 15px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        select,
        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
            background: white;
        }

        select:focus,
        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .row {
            display: flex;
            gap: 20px;
        }

        .row .form-group {
            width: 50%;
        }

        .score-box {
            background: #f8fafc;
            padding: 20px;
            border-radius: 10px;
            margin-top: 10px;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .save-btn {
            border: none;
            background: #2563eb;
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
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .no-match {
            background: #fff7ed;
            color: #c2410c;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

    </style>

</head>

<body>

<div class="navbar">

    <div class="logo">
        🏅 <span>Sports</span> Tournament Manager
    </div>

</div>


<div class="container">

    <div class="heading">

        <div class="icon">
            🏆
        </div>

        <h1>Add Match Score</h1>

        <p>
            Enter the final score of a tournament match
        </p>

    </div>


    <div class="card">

        @if($errors->any())

            <div class="error">

                @foreach($errors->all() as $error)

                    <div>{{ $error }}</div>

                @endforeach

            </div>

        @endif


        @if($matches->count() == 0)

            <div class="no-match">

                <strong>No matches available.</strong>

                <br>

                First create a match from the Matches section.

            </div>

        @endif


        <form action="{{ route('scores.store') }}"
              method="POST">

            @csrf


            <div class="form-group">

                <label>
                    Select Match
                </label>

                <select name="tournament_match_id" required>

                    <option value="">
                        -- Select Tournament Match --
                    </option>

                    @foreach($matches as $match)

                        <option value="{{ $match->id }}">

                            {{ $match->tournament->name }}
                            -
                            {{ $match->teamA->team_name }}
                            VS
                            {{ $match->teamB->team_name }}
                            -
                            {{ $match->match_date }}

                        </option>

                    @endforeach

                </select>

            </div>


            <div class="score-box">

                <div class="row">

                    <div class="form-group">

                        <label>
                            Team A Score
                        </label>

                        <input type="number"
                               name="team_a_score"
                               min="0"
                               value="0"
                               required>

                    </div>


                    <div class="form-group">

                        <label>
                            Team B Score
                        </label>

                        <input type="number"
                               name="team_b_score"
                               min="0"
                               value="0"
                               required>

                    </div>

                </div>

            </div>


            <div class="buttons">

                <button type="submit"
                        class="save-btn">

                    Save Score

                </button>

                <a href="{{ route('scores.index') }}"
                   class="back-btn">

                    Back

                </a>

            </div>

        </form>

    </div>

</div>

</body>

</html>