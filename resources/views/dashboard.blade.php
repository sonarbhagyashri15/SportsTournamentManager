<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Dashboard | Sports Tournament Manager</title>

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
            background: #ffffff;
            height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 7%;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .logo span {
            color: #2563eb;
        }

        .logout {
            background: #ea580c;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        .container {
            width: 88%;
            max-width: 1200px;
            margin: 45px auto;
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

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 18px rgba(0,0,0,0.06);
        }

        .icon {
            font-size: 30px;
            margin-bottom: 12px;
        }

        .stat-card h2 {
            font-size: 28px;
            margin-bottom: 5px;
        }

        .stat-card p {
            color: #64748b;
        }

        .section-title {
            margin-bottom: 20px;
        }

        .modules {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .module {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            padding: 25px;
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
            font-size: 32px;
            margin-bottom: 12px;
        }

        .module h3 {
            margin-bottom: 8px;
        }

        .module p {
            color: #64748b;
            font-size: 14px;
            line-height: 1.5;
        }

        .view {
            display: inline-block;
            margin-top: 15px;
            color: #2563eb;
            font-weight: bold;
        }

        @media(max-width: 850px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .modules {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 550px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .container {
                width: 92%;
            }

            .welcome h1 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">

    <div class="logo">
        🏆 Sports<span>Tournament</span>
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit" class="logout">
            Logout
        </button>
    </form>

</nav>


<div class="container">

    <div class="welcome">

        <h1>Welcome 👋</h1>

        <p>
            View tournament teams, matches, scores and results.
        </p>

    </div>


    <div class="stats">

        <div class="stat-card">
            <div class="icon">👥</div>
            <h2>{{ $teamCount }}</h2>
            <p>Teams</p>
        </div>

        <div class="stat-card">
            <div class="icon">🏃</div>
            <h2>{{ $playerCount }}</h2>
            <p>Team Members</p>
        </div>

        <div class="stat-card">
            <div class="icon">🏟️</div>
            <h2>{{ $matchCount }}</h2>
            <p>Matches</p>
        </div>

        <div class="stat-card">
            <div class="icon">📊</div>
            <h2>{{ $scoreCount }}</h2>
            <p>Scores</p>
        </div>

    </div>


    <h2 class="section-title">
        Tournament Information
    </h2>


    <div class="modules">

        <a href="{{ route('teams.index') }}" class="module">

            <div class="module-icon">👥</div>

            <h3>Teams & Team Members</h3>

            <p>
                View participating teams and their registered players.
            </p>

            <span class="view">
                View Teams →
            </span>

        </a>


        <a href="{{ route('matches.index') }}" class="module">

            <div class="module-icon">🏟️</div>

            <h3>Matches</h3>

            <p>
                View upcoming and completed tournament matches.
            </p>

            <span class="view">
                View Matches →
            </span>

        </a>


        <a href="{{ route('scores.index') }}" class="module">

            <div class="module-icon">📊</div>

            <h3>Scores</h3>

            <p>
                View match scores and winning teams.
            </p>

            <span class="view">
                View Scores →
            </span>

        </a>


        <a href="{{ route('points.index') }}" class="module">

            <div class="module-icon">🥇</div>

            <h3>Winning & Losing</h3>

            <p>
                View team performance and winning or losing results.
            </p>

            <span class="view">
                View Results →
            </span>

        </a>

    </div>

</div>

</body>
</html>