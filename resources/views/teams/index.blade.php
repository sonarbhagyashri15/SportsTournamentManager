<!DOCTYPE html>
<html>
<head>
    <title>Teams</title>

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

        h2 {
            color: #1677c8;
            margin: 0;
        }

        .subtitle {
            color: #777;
            margin-top: 6px;
        }

        .add-btn {
            background: #f4c400;
            color: #222;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 7px;
            font-weight: bold;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 22px;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            border-top: 5px solid #1677c8;
        }

        .card h3 {
            margin-top: 0;
            color: #1677c8;
            font-size: 22px;
        }

        .info {
            margin: 11px 0;
            color: #555;
        }

        .tournament {
            background: #fff5c2;
            color: #806500;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
        }

        .actions {
            margin-top: 20px;
            padding-top: 15px;
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

        .delete-btn {
            background: #e53935;
            color: white;
            padding: 9px 17px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        .empty {
            background: white;
            padding: 60px;
            text-align: center;
            border-radius: 14px;
        }

        @media (max-width: 650px) {
            .header {
                padding: 20px;
            }

            .container {
                width: 94%;
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
        }
    </style>
</head>

<body>

<div class="header">
    <h1>🏆 Sports Tournament Manager</h1>
    <p>Manage teams participating in tournaments</p>
</div>

<div class="color-line"></div>

<div class="container">

    <div class="top-section">

        <div>
            <h2>🏅 Teams</h2>
            <div class="subtitle">
                View and manage all participating teams
            </div>
        </div>

        @if(auth()->user()->role === 'admin')
    <a href="{{ route('teams.create') }}" class="add-btn">
        + Add Team
    </a>
@endif

    </div>

    @if($teams->count() > 0)

        <div class="team-grid">

            @foreach($teams as $team)

                <div class="card">

                    <h3>🏆 {{ $team->team_name }}</h3>

                    <div class="info">
                        🏅 <strong>Tournament:</strong>
                        <span class="tournament">
                            {{ $team->tournament->name }}
                        </span>
                    </div>

                    <div class="info">
                        👤 <strong>Captain:</strong>
                        {{ $team->captain }}
                    </div>

                    <div class="info">
                        👨‍🏫 <strong>Coach:</strong>
                        {{ $team->coach }}
                    </div>

                    <div class="actions">

                        @if(auth()->user()->role === 'admin')

    <a href="{{ route('teams.edit', $team->id) }}">
        Edit
    </a>

    <form action="{{ route('teams.destroy', $team->id) }}"
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

            <h3>🏆 No Teams Yet</h3>

            <p>Add your first team to a tournament.</p>

            
                @if(auth()->user()->role === 'admin')
    <a href="{{ route('teams.create') }}" class="add-btn">
        + Add Team
    </a>
@endif
           

        </div>

    @endif

</div>

</body>
</html>