<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Matches - Sports Tournament Manager</title>

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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 22px;
            font-weight: bold;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            background: #0ea5e9;
            padding: 10px 18px;
            border-radius: 8px;
        }

        .container {
            width: 86%;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 30px;
        }

        .add-btn {
            text-decoration: none;
            background: #7c3aed;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
        }

        .match-card {
            background: white;
            border-radius: 14px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .match-top {
            display: flex;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .tournament {
            color: #0ea5e9;
            font-weight: bold;
        }

        .status {
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .scheduled {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .completed {
            background: #dcfce7;
            color: #15803d;
        }

        .cancelled {
            background: #fee2e2;
            color: #dc2626;
        }

        .teams {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            margin: 25px 0;
        }

        .team {
            width: 220px;
            text-align: center;
            font-size: 21px;
            font-weight: bold;
        }

        .vs {
            font-size: 18px;
            color: #f97316;
            font-weight: bold;
        }

        .details {
            display: flex;
            justify-content: center;
            gap: 25px;
            color: #64748b;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .edit-btn {
            text-decoration: none;
            background: #0ea5e9;
            color: white;
            padding: 9px 18px;
            border-radius: 7px;
        }

        .delete-btn {
            border: none;
            background: #ef4444;
            color: white;
            padding: 9px 18px;
            border-radius: 7px;
            cursor: pointer;
        }

        .empty {
            background: white;
            padding: 50px;
            text-align: center;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="logo">🏆 Sports Tournament Manager</div>

    <a href="{{ route('home') }}" class="nav-link">
        Home
    </a>
</nav>

<div class="container">

    <div class="header">
        <h1>🏟️ Tournament Matches</h1>

        @if(auth()->user()->role === 'admin')
    <a href="{{ route('matches.create') }}" class="add-btn">
        + Create Match
    </a>
@endif
    </div>

    @forelse($matches as $match)

        <div class="match-card">

            <div class="match-top">

                <div class="tournament">
                    {{ $match->tournament->name }}
                </div>

                <div class="status {{ $match->status }}">
                    {{ $match->status }}
                </div>

            </div>

            <div class="teams">

                <div class="team">
                    {{ $match->teamA->team_name }}
                </div>

                <div class="vs">
                    VS
                </div>

                <div class="team">
                    {{ $match->teamB->team_name }}
                </div>

            </div>

            <div class="details">

                <span>
                    📅 {{ $match->match_date }}
                </span>

                <span>
                    ⏰ {{ $match->match_time ?? 'Not Set' }}
                </span>

                <span>
                    📍 {{ $match->venue ?? 'Not Set' }}
                </span>

            </div>

            <div class="actions">

                @if(auth()->user()->role === 'admin')

    <a href="{{ route('matches.edit', $match->id) }}">
        Edit
    </a>

    <form action="{{ route('matches.destroy', $match->id) }}"
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

            <h2>No Matches Found</h2>

            <p style="margin-top:10px;">
                Add your first tournament match.
            </p>

        </div>

    @endforelse

</div>

</body>
</html>