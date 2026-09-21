<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Scores | Sports Tournament Manager</title>

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
            background: #ffffff;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .logo {
            font-size: 21px;
            font-weight: bold;
            color: #172554;
        }

        .logo span {
            color: #2563eb;
        }

        .home-btn {
            text-decoration: none;
            color: #172554;
            font-weight: bold;
        }

        .container {
            width: 86%;
            margin: 45px auto;
        }

        .page-heading {
            text-align: center;
            margin-bottom: 35px;
        }

        .page-heading .icon {
            font-size: 42px;
            margin-bottom: 8px;
        }

        .page-heading h1 {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .page-heading p {
            color: #64748b;
        }

        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 22px;
            font-weight: bold;
        }

        .add-btn {
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
        }

        .add-btn:hover {
            background: #1d4ed8;
        }

        .score-card {
            background: white;
            border-radius: 14px;
            padding: 28px;
            margin-bottom: 22px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 5px 18px rgba(0,0,0,0.06);
        }

        .match-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .tournament {
            color: #2563eb;
            font-weight: bold;
            font-size: 15px;
        }

        .date {
            color: #64748b;
            font-size: 14px;
        }

        .teams {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 45px;
        }

        .team {
            width: 220px;
            text-align: center;
        }

        .team-name {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .score {
            font-size: 38px;
            font-weight: bold;
            color: #172554;
        }

        .vs {
            font-size: 15px;
            font-weight: bold;
            color: #94a3b8;
        }

        .result {
            text-align: center;
            margin-top: 22px;
            font-weight: bold;
        }

        .winner {
            color: #16a34a;
        }

        .draw {
            color: #f97316;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 22px;
        }

        .edit-btn {
            background: #0ea5e9;
            color: white;
            text-decoration: none;
            padding: 9px 18px;
            border-radius: 7px;
        }

        .delete-btn {
            background: #ef4444;
            color: white;
            border: none;
            padding: 9px 18px;
            border-radius: 7px;
            cursor: pointer;
        }

        .empty {
            background: white;
            padding: 55px;
            text-align: center;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

    </style>

</head>

<body>

<nav class="navbar">

    <div class="logo">
        🏅 <span>Sports</span> Tournament Manager
    </div>

    <a href="{{ route('home') }}" class="home-btn">
        Home
    </a>

</nav>


<div class="container">

    <div class="page-heading">

        <div class="icon">
            🏅
        </div>

        <h1>Match Scores</h1>

        <p>
            Record and manage tournament match results
        </p>

    </div>


    <div class="top-section">

        <div class="section-title">
            🏆 Completed Matches
        </div>

        @if(auth()->user()->role === 'admin')
    <a href="{{ route('scores.create') }}" class="add-btn">
        + Add Score
    </a>
@endif

    </div>


    @forelse($scores as $score)

        <div class="score-card">

            <div class="match-info">

                <div class="tournament">
                    🏆 {{ $score->match->tournament->name }}
                </div>

                <div class="date">
                    📅 {{ $score->match->match_date }}
                </div>

            </div>


            <div class="teams">

                <div class="team">

                    <div class="team-name">
                        {{ $score->match->teamA->team_name }}
                    </div>

                    <div class="score">
                        {{ $score->team_a_score }}
                    </div>

                </div>


                <div class="vs">
                    VS
                </div>


                <div class="team">

                    <div class="team-name">
                        {{ $score->match->teamB->team_name }}
                    </div>

                    <div class="score">
                        {{ $score->team_b_score }}
                    </div>

                </div>

            </div>


            <div class="result">

                @if($score->team_a_score > $score->team_b_score)

                    <span class="winner">
                        🥇 Winner:
                        {{ $score->match->teamA->team_name }}
                    </span>

                @elseif($score->team_b_score > $score->team_a_score)

                    <span class="winner">
                        🥇 Winner:
                        {{ $score->match->teamB->team_name }}
                    </span>

                @else

                    <span class="draw">
                        🤝 Match Draw
                    </span>

                @endif

            </div>


            <div class="actions">

                @if(auth()->user()->role === 'admin')

    <a href="{{ route('scores.edit', $score->id) }}">
        Edit
    </a>

    <form action="{{ route('scores.destroy', $score->id) }}"
          method="POST"
          style="display:inline;">

        @csrf
        @method('DELETE')

        <button type="submit">
            Delete
        </button>

    </form>

@endif

            </div>

        </div>

    @empty

        <div class="empty">

            <div class="empty-icon">
                🏟️
            </div>

            <h2>No Scores Available</h2>

            <p style="margin-top:10px;color:#64748b;">
                Add a score for a tournament match.
            </p>

        </div>

    @endforelse

</div>

</body>

</html>