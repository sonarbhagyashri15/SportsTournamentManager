<!DOCTYPE html>
<html>
<head>
    <title>Add Tournament</title>

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
            max-width: 650px;
            margin: 40px auto;
        }

        .form-card {
            background: white;
            padding: 32px;
            border-radius: 14px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.09);
            border-top: 5px solid #1677c8;
        }

        .form-card h2 {
            margin-top: 0;
            margin-bottom: 25px;
            color: #1677c8;
            font-size: 25px;
        }

        .form-card h2 span {
            color: #f4c400;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 12px 13px;
            margin-bottom: 18px;
            border: 1px solid #d6dbe0;
            border-radius: 7px;
            font-size: 15px;
            background: #fff;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #1677c8;
            box-shadow: 0 0 0 3px rgba(22, 119, 200, 0.12);
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 8px;
        }

        .save-btn {
            background: #1677c8;
            color: white;
            border: none;
            padding: 12px 23px;
            border-radius: 7px;
            font-weight: bold;
            cursor: pointer;
        }

        .save-btn:hover {
            background: #0d5ca8;
        }

        .back-btn {
            background: #222;
            color: white;
            padding: 12px 23px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
        }

        .back-btn:hover {
            background: #444;
        }

        .footer-note {
            text-align: center;
            margin-top: 20px;
            color: #777;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .header {
                padding: 20px;
            }

            .container {
                width: 94%;
                margin: 25px auto;
            }

            .form-card {
                padding: 23px;
            }

            .buttons {
                flex-direction: column;
            }

            .save-btn,
            .back-btn {
                text-align: center;
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="header">
    <h1>🏆 Sports Tournament Manager</h1>
    <p>Create and manage your sports tournaments</p>
</div>

<div class="color-line"></div>

<div class="container">

    <div class="form-card">

        <h2>Add <span>Tournament</span></h2>

        <form action="{{ route('tournaments.store') }}" method="POST">

            @csrf

            <label>Tournament Name</label>

            <input
                type="text"
                name="name"
                placeholder="Enter tournament name"
                required
            >

            <label>Sport</label>

            <input
                type="text"
                name="sport"
                placeholder="Example: Cricket"
                required
            >

            <label>Start Date</label>

            <input
                type="date"
                name="start_date"
                required
            >

            <label>End Date</label>

            <input
                type="date"
                name="end_date"
            >

            <label>Location</label>

            <input
                type="text"
                name="location"
                placeholder="Enter tournament location"
                required
            >

            <label>Status</label>

            <select name="status">

                <option value="upcoming">
                    Upcoming
                </option>

                <option value="active">
                    Active
                </option>

                <option value="completed">
                    Completed
                </option>

            </select>

            <div class="buttons">

                <button type="submit" class="save-btn">
                    ✓ Save Tournament
                </button>

                <a href="{{ route('tournaments.index') }}" class="back-btn">
                    ← Back
                </a>

            </div>

        </form>

    </div>

    <div class="footer-note">
        Sports Tournament Manager • Tournament Management
    </div>

</div>

</body>
</html>