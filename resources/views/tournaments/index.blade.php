<!DOCTYPE html>
<html>
<head>
    <title>Sports Tournament Manager</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            color: #222;
        }

        .header {
            background: linear-gradient(90deg, #1677c8, #0d5ca8);
            color: white;
            padding: 24px 50px;
            border-bottom: 5px solid #f4c400;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
        }

        .header p {
            margin: 7px 0 0;
            color: #e8f3ff;
        }

        .color-line {
            height: 5px;
            background: linear-gradient(
                to right,
                #1677c8 20%,
                #f4c400 20% 40%,
                #222 40% 60%,
                #239b56 60% 80%,
                #e53935 80%
            );
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .title-box h2 {
            margin: 0;
            color: #1677c8;
            font-size: 27px;
        }

        .title-box p {
            margin: 6px 0 0;
            color: #777;
        }

        .add-btn {
            background: #f4c400;
            color: #222;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 7px;
            font-weight: bold;
        }

        .add-btn:hover {
            background: #d9ae00;
        }

        .tournament-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 22px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            border-top: 5px solid #1677c8;
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 9px 22px rgba(0, 0, 0, 0.12);
        }

        .card h3 {
            margin: 0 0 18px;
            color: #1677c8;
            font-size: 22px;
        }

        .info {
            margin: 11px 0;
            color: #555;
            font-size: 15px;
        }

        .info strong {
            color: #333;
        }

        .status {
            display: inline-block;
            padding: 6px 13px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .status.upcoming {
            background: #fff5c2;
            color: #806500;
        }

        .status.active {
            background: #dff5e8;
            color: #16733c;
        }

        .status.completed {
            background: #e8e8e8;
            color: #333;
        }

        .actions {
            margin-top: 20px;
            padding-top: 16px;
            border-top: 1px solid #eee;
            display: flex;
            gap: 10px;
        }

        .edit-btn {
            background: #1677c8;
            color: white;
            padding: 9px 17px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .edit-btn:hover {
            background: #0d5ca8;
        }

        .delete-btn {
            background: #e53935;
            color: white;
            padding: 9px 17px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .delete-btn:hover {
            background: #c62828;
        }

        .empty {
            background: white;
            text-align: center;
            padding: 60px 20px;
            border-radius: 14px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
        }

        .empty h3 {
            color: #1677c8;
            margin-bottom: 8px;
        }

        .empty p {
            color: #777;
        }

        .footer-note {
            text-align: center;
            margin-top: 35px;
            color: #888;
            font-size: 13px;
        }

        @media (max-width: 650px) {

            .header {
                padding: 20px;
            }

            .container {
                width: 94%;
                margin: 25px auto;
            }

            .top-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 18px;
            }

            .add-btn {
                width: 100%;
                text-align: center;
            }

            .tournament-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="header">

    <h1>🏆 Sports Tournament Manager</h1>

    <p>
        Manage tournaments, teams, players and matches easily
    </p>

</div>

<div class="color-line"></div>

<div class="container">

    <div class="top-section">

        <div class="title-box">

            <h2>🏅 Tournaments</h2>

            <p>View and manage all sports tournaments</p>

        </div>

        <a href="{{ route('tournaments.create') }}" class="add-btn">
            + Add Tournament
        </a>

    </div>


    @if($tournaments->count() > 0)

        <div class="tournament-grid">

            @foreach($tournaments as $tournament)

                <div class="card">

                    <h3>
                        🏆 {{ $tournament->name }}
                    </h3>

                    <div class="info">
                        🏅 <strong>Sport:</strong>
                        {{ $tournament->sport }}
                    </div>

                    <div class="info">
                        📅 <strong>Start:</strong>
                        {{ $tournament->start_date }}
                    </div>

                    @if($tournament->end_date)

                        <div class="info">
                            📅 <strong>End:</strong>
                            {{ $tournament->end_date }}
                        </div>

                    @endif

                    <div class="info">
                        📍 <strong>Location:</strong>
                        {{ $tournament->location }}
                    </div>

                    <div class="info">

                        @if($tournament->status == 'upcoming')

                            <span class="status upcoming">
                                Upcoming
                            </span>

                        @elseif($tournament->status == 'active')

                            <span class="status active">
                                Active
                            </span>

                        @else

                            <span class="status completed">
                                Completed
                            </span>

                        @endif

                    </div>


                    <div class="actions">

                        <a
                            href="{{ route('tournaments.edit', $tournament->id) }}"
                            class="edit-btn"
                        >
                            ✎ Edit
                        </a>


                        <form
                            action="{{ route('tournaments.destroy', $tournament->id) }}"
                            method="POST"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="delete-btn"
                                onclick="return confirm('Are you sure you want to delete this tournament?')"
                            >
                                🗑 Delete
                            </button>

                        </form>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty">

            <h3>🏆 No Tournaments Yet</h3>

            <p>
                Start by adding your first sports tournament.
            </p>

            <a href="{{ route('tournaments.create') }}" class="add-btn">
                + Add Tournament
            </a>

        </div>

    @endif


    <div class="footer-note">
        Sports Tournament Manager • Tournament Management
    </div>

</div>

</body>
</html>