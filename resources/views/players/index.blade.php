<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Players - Sports Tournament Manager</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:Arial,sans-serif;
            background:#f8fafc;
            color:#172554;
        }

        .navbar{
            background:#111827;
            padding:18px 7%;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .logo{
            color:white;
            font-size:20px;
            font-weight:bold;
        }

        .logo span{
            color:#38bdf8;
        }

        .back{
            color:#cbd5e1;
            text-decoration:none;
            font-size:14px;
        }

        .container{
            width:90%;
            max-width:1100px;
            margin:40px auto;
        }

        .top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;
        }

        h1{
            font-size:32px;
        }

        .top p{
            color:#64748b;
            margin-top:7px;
        }

        .add-btn{
            background:linear-gradient(135deg,#7c3aed,#4f46e5);
            color:white;
            text-decoration:none;
            padding:13px 20px;
            border-radius:8px;
            font-weight:bold;
        }

        .players-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:20px;
        }

        .player-card{
            background:white;
            padding:25px;
            border-radius:16px;
            border:1px solid #e2e8f0;
            box-shadow:0 8px 25px rgba(15,23,42,.07);
            transition:.3s;
        }

        .player-card:hover{
            transform:translateY(-5px);
            box-shadow:0 15px 30px rgba(15,23,42,.12);
        }

        .player-icon{
            width:55px;
            height:55px;
            display:flex;
            align-items:center;
            justify-content:center;
            background:#ede9fe;
            border-radius:14px;
            font-size:27px;
            margin-bottom:17px;
        }

        .player-card h2{
            font-size:20px;
            margin-bottom:10px;
        }

        .team{
            color:#7c3aed;
            font-weight:bold;
            margin-bottom:15px;
        }

        .info{
            color:#64748b;
            font-size:14px;
            line-height:1.8;
        }

        .actions{
            margin-top:18px;
            display:flex;
            gap:8px;
        }

        .edit{
            background:#e0f2fe;
            color:#0369a1;
            padding:8px 14px;
            border-radius:6px;
            text-decoration:none;
            font-size:13px;
            font-weight:bold;
        }

        .delete{
            background:#fee2e2;
            color:#b91c1c;
            padding:8px 14px;
            border:none;
            border-radius:6px;
            font-weight:bold;
            cursor:pointer;
        }

        .empty{
            background:white;
            padding:50px;
            text-align:center;
            border-radius:15px;
            color:#64748b;
        }

        @media(max-width:800px){
            .players-grid{
                grid-template-columns:1fr;
            }

            .top{
                flex-direction:column;
                align-items:flex-start;
                gap:20px;
            }
        }

    </style>

</head>

<body>

<nav class="navbar">

    <div class="logo">
        🏆 <span>Sports</span> Tournament Manager
    </div>

    <a href="{{ url('/') }}" class="back">
        ← Home
    </a>

</nav>


<div class="container">

    <div class="top">

        <div>
            <h1>Players</h1>
            <p>Manage players participating in your tournaments.</p>
        </div>

        @if(auth()->user()->role === 'admin')
    <a href="{{ route('players.create') }}" class="add-btn">
        + Add Player
    </a>
@endif

    </div>


    @if($players->count() > 0)

        <div class="players-grid">

            @foreach($players as $player)

                <div class="player-card">

                    <div class="player-icon">
                        🧑‍💼
                    </div>

                    <h2>
                        {{ $player->player_name }}
                    </h2>

                    <div class="team">
                        🏆 {{ $player->team->team_name }}
                    </div>

                    <div class="info">

                        Jersey No:
                        {{ $player->jersey_number ?? 'N/A' }}

                        <br>

                        Position:
                        {{ $player->position }}

                        <br>

                        Phone:
                        {{ $player->phone ?? 'N/A' }}

                    </div>


                    <div class="actions">
@if(auth()->user()->role === 'admin')

    <a href="{{ route('players.edit', $player->id) }}">
        Edit
    </a>

    <form action="{{ route('players.destroy', $player->id) }}"
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

            @endforeach

        </div>

    @else

        <div class="empty">

            <h2>No Players Added Yet</h2>

            <p>Add your first player to get started.</p>

        </div>

    @endif

</div>

</body>
</html>