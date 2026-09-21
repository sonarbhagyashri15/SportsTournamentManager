<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | Sports Tournament Manager</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f8fafc;
            color: #172554;
        }

        .navbar {
            height: 70px;
            background: #172554;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 6%;
            color: white;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .logo span {
            color: #38bdf8;
        }

        .admin-badge {
            background: #7c3aed;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            margin-left: 10px;
        }

        .logout-btn {
            background: #f97316;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #ea580c;
        }

        .container {
            width: 88%;
            max-width: 1250px;
            margin: 40px auto;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            font-size: 34px;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #64748b;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
            margin-bottom: 38px;
        }

        .card {
            background: white;
            padding: 23px;
            border-radius: 15px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 5px 18px rgba(0,0,0,0.06);
        }

        .icon {
            font-size: 28px;
            margin-bottom: 12px;
        }

        .card h2 {
            font-size: 28px;
            margin-bottom: 5px;
        }

        .card p {
            color: #64748b;
            font-size: 14px;
        }

        .section-title {
            margin-bottom: 18px;
        }

        .modules {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .module {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 22px;
            text-decoration: none;
            color: #172554;
            transition: 0.3s;
        }

        .module:hover {
            transform: translateY(-4px);
            border-color: #2563eb;
            box-shadow: 0 8px 20px rgba(37,99,235,0.12);
        }

        .module-icon {
            font-size: 30px;
            margin-bottom: 12px;
        }

        .module h3 {
            margin-bottom: 7px;
        }

        .module p {
            color: #64748b;
            font-size: 14px;
        }

        .view-btn {
            display: inline-block;
            margin-top: 14px;
            color: #2563eb;
            font-weight: bold;
            font-size: 14px;
        }

        @media(max-width: 1000px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .modules {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 600px) {
            .navbar {
                padding: 0 4%;
            }

            .admin-badge {
                display: none;
            }

            .container {
                width: 92%;
            }

            .cards,
            .modules {
                grid-template-columns: 1fr;
            }

            .welcome h1 {
                font-size: 27px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">

    <div class="logo">
        🏆 Sports<span>Tournament</span>
        <span class="admin-badge">ADMIN</span>
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit" class="logout-btn">
            Logout
        </button>
    </form>

</nav>


<div class="container">

    <div class="welcome">

        <h1>Admin Dashboard 👋</h1>

        <p>
            Manage tournaments, teams, players, matches and scores.
        </p>

    </div>


    <!-- Statistics -->

    <div class="cards">

        <div class="card">
            <div class="icon">🏆</div>
            <h2>{{ $tournamentCount }}</h2>
            <p>Tournaments</p>
        </div>

        <div class="card">
            <div class="icon">👥</div>
            <h2>{{ $teamCount }}</h2>
            <p>Teams</p>
        </div>

        <div class="card">
            <div class="icon">🏃</div>
            <h2>{{ $playerCount }}</h2>
            <p>Players</p>
        </div>

        <div class="card">
            <div class="icon">🏟️</div>
            <h2>{{ $matchCount }}</h2>
            <p>Matches</p>
        </div>

        <div class="card">
            <div class="icon">📊</div>
            <h2>{{ $scoreCount }}</h2>
            <p>Scores</p>
        </div>

    </div>


    <!-- Management -->

    <h2 class="section-title">
        Tournament Management
    </h2>

    <div class="modules">

        <a href="{{ route('tournaments.index') }}" class="module">

            <div class="module-icon">🏆</div>

            <h3>Tournaments</h3>

            <p>
                Create, edit and delete tournaments.
            </p>

            <span class="view-btn">
                Manage →
            </span>

        </a>


        <a href="{{ route('teams.index') }}" class="module">

            <div class="module-icon">👥</div>

            <h3>Teams</h3>

            <p>
                Manage participating teams.
            </p>

            <span class="view-btn">
                Manage →
            </span>

        </a>


        <a href="{{ route('players.index') }}" class="module">

            <div class="module-icon">🏃</div>

            <h3>Players</h3>

            <p>
                Manage team members and player details.
            </p>

            <span class="view-btn">
                Manage →
            </span>

        </a>


        <a href="{{ route('matches.index') }}" class="module">

            <div class="module-icon">🏟️</div>

            <h3>Matches</h3>

            <p>
                Create fixtures and manage matches.
            </p>

            <span class="view-btn">
                Manage →
            </span>

        </a>


        <a href="{{ route('scores.index') }}" class="module">

            <div class="module-icon">📊</div>

            <h3>Scores</h3>

            <p>
                Add and update match scores.
            </p>

            <span class="view-btn">
                Manage →
            </span>

        </a>


        <a href="{{ route('points.index') }}" class="module">

            <div class="module-icon">🥇</div>

            <h3>Winning & Losing</h3>

            <p>
                View team performance and results.
            </p>

            <span class="view-btn">
                View →
            </span>

        </a>

    </div>

</div>

</body>
</html>