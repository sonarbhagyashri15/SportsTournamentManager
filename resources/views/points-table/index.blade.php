<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Points Table | Sports Tournament Manager</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.08), transparent 30%),
                radial-gradient(circle at bottom right, rgba(124, 58, 237, 0.08), transparent 30%),
                #f5f7fa;
            color: #172554;
            min-height: 100vh;
        }

        /* NAVBAR */

        .navbar {
            height: 70px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 3px 15px rgba(23, 37, 84, 0.08);
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: #172554;
        }

        .logo span {
            color: #2563eb;
        }

        .nav-links {
            display: flex;
            gap: 22px;
        }

        .nav-links a {
            text-decoration: none;
            color: #334155;
            font-weight: 600;
            transition: 0.2s;
        }

        .nav-links a:hover {
            color: #2563eb;
        }

        /* MAIN */

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 45px auto;
        }

        /* WINNING HEADER */

        .hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(
                135deg,
                #172554,
                #1e3a8a,
                #2563eb
            );
            color: white;
            border-radius: 20px;
            padding: 38px 35px;
            margin-bottom: 28px;
            box-shadow: 0 12px 30px rgba(23, 37, 84, 0.18);
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border: 25px solid rgba(255, 255, 255, 0.06);
            border-radius: 50%;
            right: 60px;
            top: -80px;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            border: 18px solid rgba(249, 115, 22, 0.15);
            border-radius: 50%;
            right: 180px;
            bottom: -70px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .trophy {
            font-size: 48px;
            margin-bottom: 10px;
        }

        .hero h1 {
            font-size: 36px;
            margin-bottom: 8px;
        }

        .hero p {
            color: #dbeafe;
            font-size: 15px;
        }

        /* FILTER */

        .filter-card {
            background: #ffffff;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 25px;
            box-shadow: 0 6px 20px rgba(23, 37, 84, 0.07);
            border: 1px solid #e5e7eb;
        }

        .filter-form {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .filter-form label {
            font-weight: bold;
            color: #172554;
        }

        .filter-form select {
            flex: 1;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            background: white;
            color: #172554;
            font-size: 15px;
            outline: none;
        }

        .filter-form select:focus {
            border-color: #2563eb;
        }

        .view-btn {
            border: none;
            padding: 12px 23px;
            background: #2563eb;
            color: white;
            border-radius: 9px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .view-btn:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        /* TOURNAMENT HEADER */

        .tournament-header {
            background: linear-gradient(
                135deg,
                #ffffff,
                #eff6ff
            );
            border: 1px solid #dbeafe;
            border-left: 5px solid #2563eb;
            padding: 23px 26px;
            border-radius: 15px 15px 0 0;
        }

        .tournament-header h2 {
            color: #172554;
            font-size: 23px;
            margin-bottom: 6px;
        }

        .tournament-header p {
            color: #64748b;
            font-size: 14px;
        }

        /* TABLE */

        .table-card {
            background: white;
            border-radius: 0 0 15px 15px;
            overflow-x: auto;
            box-shadow: 0 7px 22px rgba(23, 37, 84, 0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #172554;
            color: white;
        }

        th {
            padding: 17px 12px;
            text-align: center;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        td {
            padding: 18px 12px;
            text-align: center;
            border-bottom: 1px solid #e5e7eb;
            font-size: 15px;
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        /* WINNER ROW */

        .winner-row {
            background: linear-gradient(
                90deg,
                #fff7ed,
                #ffffff,
                #eff6ff
            );
        }

        .winner-row td {
            border-bottom: 1px solid #fed7aa;
        }

        .winner-row .team-name {
            color: #172554;
        }

        .rank {
            font-weight: bold;
            width: 80px;
            color: #2563eb;
        }

        .medal {
            font-size: 25px;
        }

        .team-name {
            text-align: left;
            font-weight: bold;
            color: #172554;
        }

        .team-icon {
            margin-right: 7px;
        }

        .points {
            font-size: 20px;
            font-weight: bold;
            color: #7c3aed;
        }

        .winner-badge {
            display: inline-block;
            margin-left: 8px;
            padding: 4px 9px;
            background: #fff7ed;
            color: #ea580c;
            border: 1px solid #fed7aa;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        /* POINT RULES */

        .rules {
            margin-top: 25px;
            background: #ffffff;
            padding: 22px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(23, 37, 84, 0.06);
        }

        .rules h3 {
            color: #172554;
            margin-bottom: 15px;
        }

        .rule-list {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .rule {
            padding: 10px 17px;
            border-radius: 9px;
            font-weight: 600;
            background: #f1f5f9;
            color: #334155;
        }

        .win-rule {
            border-left: 4px solid #2563eb;
        }

        .loss-rule {
            border-left: 4px solid #f97316;
        }

        /* EMPTY */

        .empty {
            background: white;
            padding: 50px;
            text-align: center;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(23, 37, 84, 0.06);
        }

        .empty-icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        .empty h3 {
            color: #172554;
            margin-bottom: 8px;
        }

        .empty p {
            color: #64748b;
        }

        /* MOBILE */

        @media (max-width: 750px) {

            .navbar {
                padding: 0 4%;
            }

            .nav-links {
                gap: 10px;
            }

            .nav-links a {
                font-size: 12px;
            }

            .container {
                width: 94%;
            }

            .hero {
                padding: 30px 24px;
            }

            .hero h1 {
                font-size: 28px;
            }

            .filter-form {
                flex-direction: column;
                align-items: stretch;
            }

            table {
                min-width: 650px;
            }
        }

    </style>
</head>

<body>

    <!-- NAVBAR -->

    <nav class="navbar">

        <div class="logo">
            🏆 Sports<span>Tournament</span>
        </div>

        <div class="nav-links">

            <a href="{{ route('home') }}">
                Home
            </a>

            <a href="{{ route('tournaments.index') }}">
                Tournaments
            </a>

            <a href="{{ route('teams.index') }}">
                Teams
            </a>

            <a href="{{ route('matches.index') }}">
                Matches
            </a>

            <a href="{{ route('scores.index') }}">
                Scores
            </a>

        </div>

    </nav>


    <div class="container">

        <!-- WINNING HERO -->

        <div class="hero">

            <div class="hero-content">

                <div class="trophy">
                    🏆
                </div>

                <h1>
                    Championship Points Table
                </h1>

                <p>
                    Track team performance and discover the tournament leaders.
                </p>

            </div>

        </div>


        <!-- TOURNAMENT SELECT -->

        @if($tournaments->count() > 0)

            <div class="filter-card">

                <form
                    method="GET"
                    action="{{ route('points.index') }}"
                    class="filter-form"
                >

                    <label>
                        Select Tournament
                    </label>

                    <select name="tournament_id">

                        @foreach($tournaments as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ $tournament && $tournament->id == $item->id ? 'selected' : '' }}
                            >
                                {{ $item->name }}
                            </option>

                        @endforeach

                    </select>

                    <button type="submit" class="view-btn">
                        View Table
                    </button>

                </form>

            </div>


            @if($tournament)

                <!-- TOURNAMENT -->

                <div class="tournament-header">

                    <h2>
                        🏅 {{ $tournament->name }}
                    </h2>

                    <p>
                        {{ $tournament->sport }} Tournament
                    </p>

                </div>


                <!-- TABLE -->

                <div class="table-card">

                    @if($pointsTable->count() > 0)

                        <table>

                            <thead>

                                <tr>

                                    <th>
                                        Rank
                                    </th>

                                    <th>
                                        Team
                                    </th>

                                    <th>
                                        Played
                                    </th>

                                    <th>
                                        Won
                                    </th>

                                    <th>
                                        Lost
                                    </th>

                                    <th>
                                        Points
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach($pointsTable as $index => $row)

                                    <tr class="{{ $index == 0 ? 'winner-row' : '' }}">

                                        <td class="rank">

                                            @if($index == 0)

                                                <span class="medal">
                                                    🥇
                                                </span>

                                            @elseif($index == 1)

                                                <span class="medal">
                                                    🥈
                                                </span>

                                            @elseif($index == 2)

                                                <span class="medal">
                                                    🥉
                                                </span>

                                            @else

                                                {{ $index + 1 }}

                                            @endif

                                        </td>


                                        <td class="team-name">

                                            <span class="team-icon">
                                                ⚽
                                            </span>

                                            {{ $row['team']->team_name }}

                                            @if($index == 0)

                                                <span class="winner-badge">
                                                    LEADER
                                                </span>

                                            @endif

                                        </td>


                                        <td>
                                            {{ $row['played'] }}
                                        </td>


                                        <td>
                                            {{ $row['won'] }}
                                        </td>


                                        <td>
                                            {{ $row['lost'] }}
                                        </td>


                                        <td class="points">
                                            {{ $row['points'] }}
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    @else

                        <div class="empty">

                            <div class="empty-icon">
                                🏟️
                            </div>

                            <h3>
                                No Match Results Yet
                            </h3>

                            <p>
                                Add scores to completed matches to generate the points table.
                            </p>

                        </div>

                    @endif

                </div>


                <!-- RULES -->

                <div class="rules">

                    <h3>
                        📋 Points System
                    </h3>

                    <div class="rule-list">

                        <div class="rule win-rule">
                            🏆 Win = 3 Points
                        </div>

                        <div class="rule loss-rule">
                            ❌ Loss = 0 Points
                        </div>

                    </div>

                </div>

            @endif

        @else

            <div class="empty">

                <div class="empty-icon">
                    🏟️
                </div>

                <h3>
                    No Tournaments Found
                </h3>

                <p>
                    Create a tournament first to view the points table.
                </p>

            </div>

        @endif

    </div>

</body>

</html>