<!DOCTYPE html>
<html>
<head>
    <title>Add Team</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fa;
        }

        .header {
            background: linear-gradient(90deg, #1677c8, #0d5ca8);
            color: white;
            padding: 24px 50px;
            border-bottom: 5px solid #f4c400;
        }

        .header h1 {
            margin: 0;
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
            max-width: 650px;
            margin: 40px auto;
        }

        .form-card {
            background: white;
            padding: 32px;
            border-radius: 14px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.09);
            border-top: 5px solid #1677c8;
        }

        h2 {
            color: #1677c8;
            margin-top: 0;
            margin-bottom: 25px;
        }

        h2 span {
            color: #f4c400;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #d6dbe0;
            border-radius: 7px;
            font-size: 15px;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #1677c8;
        }

        .buttons {
            display: flex;
            gap: 12px;
        }

        .save-btn {
            background: #1677c8;
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 7px;
            font-weight: bold;
            cursor: pointer;
        }

        .back-btn {
            background: #222;
            color: white;
            padding: 12px 22px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
        }

        @media (max-width: 600px) {
            .header {
                padding: 20px;
            }

            .container {
                width: 94%;
            }

            .buttons {
                flex-direction: column;
            }

            .save-btn,
            .back-btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="header">
    <h1>🏆 Sports Tournament Manager</h1>
    <p>Add a new participating team</p>
</div>

<div class="color-line"></div>

<div class="container">

    <div class="form-card">

        <h2>Add <span>Team</span></h2>

        <form action="{{ route('teams.store') }}" method="POST">

            @csrf

            <label>Select Tournament</label>

            <select name="tournament_id" required>

                <option value="">-- Select Tournament --</option>

                @foreach($tournaments as $tournament)

                    <option value="{{ $tournament->id }}">
                        {{ $tournament->name }}
                    </option>

                @endforeach

            </select>

            <label>Team Name</label>

            <input
                type="text"
                name="team_name"
                placeholder="Enter team name"
                required
            >

            <label>Captain</label>

            <input
                type="text"
                name="captain"
                placeholder="Enter captain name"
                required
            >

            <label>Coach</label>

            <input
                type="text"
                name="coach"
                placeholder="Enter coach name"
                required
            >

            <div class="buttons">

                <button type="submit" class="save-btn">
                    ✓ Save Team
                </button>

                <a href="{{ route('teams.index') }}" class="back-btn">
                    ← Back
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>