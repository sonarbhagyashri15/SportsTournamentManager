<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Player</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:Arial,sans-serif;
            background:linear-gradient(135deg,#eef2ff,#f8fafc);
            min-height:100vh;
            padding:50px 20px;
        }

        .form-container{
            max-width:600px;
            margin:auto;
            background:white;
            padding:40px;
            border-radius:18px;
            box-shadow:0 15px 40px rgba(15,23,42,.1);
        }

        h1{
            color:#172554;
            margin-bottom:8px;
        }

        .subtitle{
            color:#64748b;
            margin-bottom:30px;
        }

        .form-group{
            margin-bottom:20px;
        }

        label{
            display:block;
            font-weight:bold;
            color:#334155;
            margin-bottom:7px;
        }

        input,
        select{
            width:100%;
            padding:13px;
            border:1px solid #cbd5e1;
            border-radius:8px;
            outline:none;
            background:white;
        }

        input:focus,
        select:focus{
            border-color:#7c3aed;
            box-shadow:0 0 0 3px rgba(124,58,237,.1);
        }

        .buttons{
            margin-top:25px;
            display:flex;
            gap:10px;
        }

        .save{
            background:#7c3aed;
            color:white;
            border:none;
            padding:13px 25px;
            border-radius:8px;
            font-weight:bold;
            cursor:pointer;
        }

        .cancel{
            background:#e2e8f0;
            color:#334155;
            text-decoration:none;
            padding:13px 25px;
            border-radius:8px;
            font-weight:bold;
        }

        .error{
            background:#fee2e2;
            color:#991b1b;
            padding:12px;
            border-radius:8px;
            margin-bottom:20px;
        }

    </style>

</head>

<body>

<div class="form-container">

    <h1>👤 Add Player</h1>

    <p class="subtitle">
        Add a player to a participating team.
    </p>


    @if($errors->any())

        <div class="error">

            @foreach($errors->all() as $error)

                <div>{{ $error }}</div>

            @endforeach

        </div>

    @endif


    <form action="{{ route('players.store') }}" method="POST">

        @csrf

        <div class="form-group">

            <label>Team</label>

            <select name="team_id" required>

                <option value="">
                    Select Team
                </option>

                @foreach($teams as $team)

                    <option value="{{ $team->id }}">
                        {{ $team->team_name }}
                    </option>

                @endforeach

            </select>

        </div>


        <div class="form-group">

            <label>Player Name</label>

            <input
                type="text"
                name="player_name"
                placeholder="Enter player name"
                required
            >

        </div>


        <div class="form-group">

            <label>Jersey Number</label>

            <input
                type="number"
                name="jersey_number"
                placeholder="Example: 10"
            >

        </div>


        <div class="form-group">

            <label>Position</label>

            <input
                type="text"
                name="position"
                placeholder="Example: Forward / Batsman / Defender"
                required
            >

        </div>


        <div class="form-group">

            <label>Phone</label>

            <input
                type="text"
                name="phone"
                placeholder="Enter phone number"
            >

        </div>


        <div class="buttons">

            <button type="submit" class="save">
                Save Player
            </button>

            <a href="{{ route('players.index') }}"
               class="cancel">
                Cancel
            </a>

        </div>

    </form>

</div>

</body>

</html>