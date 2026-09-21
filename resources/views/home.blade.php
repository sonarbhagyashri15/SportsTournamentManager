<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sports Tournament Manager</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fc;
            color: #101a33;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            min-height: 78px;
            padding: 0 8%;
            background: linear-gradient(
                100deg,
                #050d22,
                #0b2454 65%,
                #123d83
            );

            display: flex;
            align-items: center;
            justify-content: space-between;

            color: white;
            box-shadow: 0 8px 25px rgba(4,16,45,.24);
        }

        .logo {
            font-size: 23px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .logo span {
            color: #c8ff32;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            transition: .25s;
        }

        .nav-links a:hover {
            color: #20d9ff;
        }

        .login-btn {
            background: #c8ff32;
            color: #07152f !important;
            padding: 10px 20px;
            border-radius: 999px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
        }

        /* ================= COLOR STRIP ================= */

        .color-strip {
            height: 6px;

            background: linear-gradient(
                90deg,
                #1769ff,
                #20d9ff,
                #c8ff32,
                #ff7a18,
                #ff315b
            );
        }

        /* ================= HERO ================= */

        .hero {
            min-height: 650px;

            padding: 80px 8%;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 60px;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    rgba(5,13,34,.98),
                    rgba(9,49,112,.97) 62%,
                    rgba(17,107,177,.94)
                );

            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: "";

            position: absolute;

            width: 430px;
            height: 430px;

            right: -180px;
            top: -170px;

            border: 55px solid rgba(32,217,255,.10);

            border-radius: 50%;

            transform: rotate(25deg);
        }

        .hero-content {
            max-width: 650px;
            position: relative;
            z-index: 2;
        }

        .eyebrow {
            display: inline-block;

            background: rgba(200,255,50,.12);

            border: 1px solid rgba(200,255,50,.45);

            color: #c8ff32;

            padding: 9px 16px;

            border-radius: 30px;

            font-size: 11px;

            font-weight: bold;

            letter-spacing: 1px;

            margin-bottom: 22px;
        }

        .hero h1 {
            font-size: clamp(45px, 5vw, 76px);

            line-height: 1.02;

            font-weight: 900;

            text-transform: uppercase;

            margin-bottom: 22px;
        }

        .hero h1 span {
            color: #c8ff32;
        }

        .hero-description {
            color: #dcecff;

            font-size: 17px;

            line-height: 1.7;

            max-width: 570px;

            margin-bottom: 32px;
        }

        .hero-buttons {
            display: flex;
            gap: 14px;
        }

        .primary-btn {
            display: inline-block;

            background: #c8ff32;

            color: #07152f;

            padding: 14px 27px;

            border-radius: 999px;

            text-decoration: none;

            font-weight: bold;

            box-shadow: 0 5px 0 #8bbd00;

            transition: .25s;
        }

        .primary-btn:hover {
            transform: translateY(-3px);
            background: #d9ff70;
        }

        .secondary-btn {
            display: inline-block;

            color: white;

            border: 1px solid rgba(255,255,255,.5);

            padding: 13px 27px;

            border-radius: 999px;

            text-decoration: none;

            font-weight: bold;

            transition: .25s;
        }

        .secondary-btn:hover {
            color: #20d9ff;
            border-color: #20d9ff;
        }

        /* ================= REGISTERED TEAMS ================= */

        .team-area {
            width: 430px;

            position: relative;

            z-index: 2;
        }

        .registered-team-box {
            background: linear-gradient(
                145deg,
                #101a2e,
                #050b18
            );

            border: 1px solid rgba(32,217,255,.4);

            border-radius: 24px;

            padding: 28px;

            box-shadow:
                0 0 0 6px rgba(32,217,255,.04),
                0 25px 65px rgba(0,0,0,.45);
        }

        .registered-title {
            display: flex;

            align-items: center;

            gap: 14px;

            padding-bottom: 20px;

            border-bottom: 1px solid #28374a;

            margin-bottom: 18px;
        }

        .registered-title-icon {
            width: 52px;
            height: 52px;

            border-radius: 15px;

            background: linear-gradient(
                145deg,
                #1769ff,
                #20d9ff
            );

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 25px;
        }

        .registered-title small {
            color: #20d9ff;

            font-size: 10px;

            font-weight: bold;

            letter-spacing: 1.5px;
        }

        .registered-title h2 {
            color: white;

            font-size: 23px;

            margin-top: 4px;
        }

        .registered-team-list {
            display: flex;

            flex-direction: column;

            gap: 12px;

            max-height: 340px;

            overflow-y: auto;
        }

        .registered-team {
            display: flex;

            align-items: center;

            gap: 14px;

            padding: 14px;

            background: #12233a;

            border: 1px solid #254563;

            border-radius: 12px;

            transition: .25s;
        }

        .registered-team:hover {
            transform: translateX(5px);

            border-color: #20d9ff;
        }

        .team-symbol {
            width: 45px;
            height: 45px;

            flex-shrink: 0;

            border-radius: 12px;

            background: linear-gradient(
                145deg,
                #1769ff,
                #20d9ff
            );

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 21px;
        }

        .team-info h3 {
            color: white;

            font-size: 14px;

            margin-bottom: 4px;
        }

        .team-info span {
            color: #c8ff32;

            font-size: 10px;

            font-weight: bold;
        }

        .no-team {
            color: #9fb1c2;

            text-align: center;

            padding: 25px 10px;

            font-size: 13px;
        }

        /* ================= SPORTS BAR ================= */

        .sports-bar {
            background: white;

            padding: 22px 8%;

            display: grid;

            grid-template-columns: repeat(6, 1fr);

            gap: 14px;

            box-shadow: 0 4px 18px rgba(0,0,0,.07);
        }

        .sport-item {
            text-align: center;

            color: #536273;

            font-size: 13px;

            font-weight: bold;

            padding: 13px 8px;

            border: 1px solid #e2e9f5;

            border-radius: 14px;

            background: linear-gradient(
                180deg,
                #fff,
                #f4f8ff
            );

            transition: .25s;
        }

        .sport-item:hover {
            transform: translateY(-5px);

            border-color: #20d9ff;

            color: #1769ff;
        }

        .sport-item div {
            font-size: 25px;

            margin-bottom: 5px;
        }

        /* ================= FEATURES ================= */

        .section {
            padding: 75px 8%;

            text-align: center;
        }

        .section-heading {
            color: #102b61;

            font-size: 34px;

            font-weight: 900;

            text-transform: uppercase;

            margin-bottom: 10px;
        }

        .section-description {
            color: #687995;

            margin-bottom: 42px;
        }

        .feature-grid {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 22px;
        }

        .feature {
            background: white;

            border-radius: 20px;

            padding: 30px 22px;

            border: 1px solid #e3eaf5;

            box-shadow: 0 10px 30px rgba(18,43,86,.07);

            transition: .3s;
        }

        .feature:hover {
            transform: translateY(-8px);

            box-shadow: 0 18px 35px rgba(18,43,86,.14);
        }

        .feature-icon {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            width: 76px;
            height: 76px;

            border-radius: 22px;

            background: #eef5ff;

            font-size: 40px;

            margin-bottom: 17px;
        }

        .feature h3 {
            color: #0b3d70;

            margin-bottom: 10px;
        }

        .feature p {
            color: #748091;

            font-size: 14px;

            line-height: 1.6;
        }

        /* ================= HOW IT WORKS ================= */

        .steps-section {
            padding: 75px 8%;

            text-align: center;

            background: linear-gradient(
                180deg,
                #f8faff,
                #eef4fc
            );
        }

        .steps {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 25px;
        }

        .step-number {
            width: 58px;
            height: 58px;

            margin: auto auto 15px;

            border-radius: 50%;

            background: linear-gradient(
                145deg,
                #1769ff,
                #20d9ff
            );

            color: white;

            display: flex;

            align-items: center;
            justify-content: center;

            font-weight: bold;

            font-size: 18px;
        }

        .step:nth-child(2) .step-number {
            background: linear-gradient(
                145deg,
                #c8ff32,
                #8bd000
            );

            color: #07152f;
        }

        .step:nth-child(3) .step-number {
            background: linear-gradient(
                145deg,
                #20d9ff,
                #1769ff
            );
        }

        .step:nth-child(4) .step-number {
            background: linear-gradient(
                145deg,
                #ff315b,
                #ff7a18
            );
        }

        .step h3 {
            color: #0b3d70;

            margin-bottom: 8px;
        }

        .step p {
            color: #748091;

            font-size: 13px;
        }

        /* ================= CTA ================= */

        .cta {
            margin: 70px 8%;

            padding: 55px 25px;

            border-radius: 18px;

            text-align: center;

            color: white;

            background: linear-gradient(
                135deg,
                #1769ff,
                #102b61 70%,
                #07152f
            );

            box-shadow: 0 18px 45px rgba(16,43,97,.22);
        }

        .cta h2 {
            font-size: 33px;

            margin-bottom: 12px;
        }

        .cta p {
            color: #d8e9f7;

            margin-bottom: 25px;
        }

        .cta a {
            display: inline-block;

            background: #c8ff32;

            color: #07152f;

            text-decoration: none;

            padding: 13px 26px;

            border-radius: 999px;

            font-weight: bold;

            box-shadow: 0 5px 0 #8bbd00;
        }

        /* ================= FOOTER ================= */

        footer {
            background: #050d22;

            color: #9fb1c2;

            text-align: center;

            padding: 25px;

            font-size: 13px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1000px) {

            .hero {
                flex-direction: column;

                text-align: center;

                padding: 70px 6%;
            }

            .hero-buttons {
                justify-content: center;
            }

            .team-area {
                width: 100%;

                max-width: 450px;
            }

            .feature-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .steps {
                grid-template-columns: repeat(2, 1fr);
            }

            .sports-bar {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 650px) {

            .navbar {
                padding: 16px 5%;

                flex-direction: column;

                gap: 15px;
            }

            .logo {
                font-size: 17px;
            }

            .nav-links {
                gap: 12px;
            }

            .hero {
                padding: 55px 6%;
            }

            .hero h1 {
                font-size: 43px;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .sports-bar {
                grid-template-columns: repeat(3, 1fr);

                padding: 16px 5%;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .steps {
                grid-template-columns: 1fr;
            }

            .cta {
                margin: 45px 5%;
            }
        }

    </style>

</head>

<body>

    <!-- ================= NAVBAR ================= -->

    <nav class="navbar">

        <div class="logo">
            🏆 Sports <span>Tournament Manager</span>
        </div>

        <div class="nav-links">

            <a href="{{ route('home') }}">
                Home
            </a>

            <a href="{{ route('register') }}">
                Register Now
            </a>

            <a href="{{ route('login') }}" class="login-btn">
                Login
            </a>

        </div>

    </nav>


    <div class="color-strip"></div>


    <!-- ================= HERO ================= -->

    <section class="hero">

        <div class="hero-content">

            <div class="eyebrow">
                🏅 OFFICIAL TOURNAMENT MANAGEMENT PLATFORM
            </div>

            <h1>
                Compete.
                <span>Perform.</span>
                Win.
            </h1>

            <p class="hero-description">
                Manage your complete sports tournament —
                from teams and players to matches, scores
                and final results.
            </p>

            <div class="hero-buttons">

                <a
                    href="{{ route('register') }}"
                    class="primary-btn"
                >
                    Register Now
                </a>

                <a
                    href="{{ route('login') }}"
                    class="secondary-btn"
                >
                    Login
                </a>

            </div>

        </div>


        <!-- ================= REGISTERED TEAMS ================= -->

        <div class="team-area">

            <div class="registered-team-box">

                <div class="registered-title">

                    <div class="registered-title-icon">
                        🏆
                    </div>

                    <div>

                        <small>
                            TOURNAMENT
                        </small>

                        <h2>
                            Registered Teams
                        </h2>

                    </div>

                </div>


                <div class="registered-team-list">

                    @forelse($teams as $team)

                        <div class="registered-team">

                            <div class="team-symbol">
                                🏅
                            </div>

                            <div class="team-info">

                                <h3>
                                    {{ $team->team_name }}
                                </h3>

                                <span>
                                    ✓ Registered Team
                                </span>

                            </div>

                        </div>

                    @empty

                        <div class="no-team">
                            No teams registered yet.
                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </section>


    <!-- ================= SPORTS ================= -->

    <div class="sports-bar">

        <div class="sport-item">
            <div>⚽</div>
            Football
        </div>

        <div class="sport-item">
            <div>🏏</div>
            Cricket
        </div>

        <div class="sport-item">
            <div>🏀</div>
            Basketball
        </div>

        <div class="sport-item">
            <div>🏸</div>
            Badminton
        </div>

        <div class="sport-item">
            <div>🎾</div>
            Tennis
        </div>

        <div class="sport-item">
            <div>🏐</div>
            Volleyball
        </div>

    </div>


    <!-- ================= FEATURES ================= -->

    <section class="section">

        <h2 class="section-heading">
            Everything You Need
        </h2>

        <p class="section-description">
            Simple tools for complete tournament management.
        </p>


        <div class="feature-grid">

            <div class="feature">

                <div class="feature-icon">
                    🏆
                </div>

                <h3>
                    Tournaments
                </h3>

                <p>
                    Organize and manage sports tournaments
                    in one place.
                </p>

            </div>


            <div class="feature">

                <div class="feature-icon">
                    👥
                </div>

                <h3>
                    Teams & Players
                </h3>

                <p>
                    Manage registered teams and
                    their team members.
                </p>

            </div>


            <div class="feature">

                <div class="feature-icon">
                    ⚔️
                </div>

                <h3>
                    Matches
                </h3>

                <p>
                    Schedule matches and manage
                    tournament fixtures.
                </p>

            </div>


            <div class="feature">

                <div class="feature-icon">
                    📊
                </div>

                <h3>
                    Scores & Results
                </h3>

                <p>
                    Record scores and view winning
                    and losing results.
                </p>

            </div>

        </div>

    </section>


    <!-- ================= HOW IT WORKS ================= -->

    <section class="steps-section">

        <h2 class="section-heading">
            From Start to Victory
        </h2>

        <p class="section-description">
            Simple steps to manage your tournament.
        </p>


        <div class="steps">

            <div class="step">

                <div class="step-number">
                    01
                </div>

                <h3>
                    Tournament
                </h3>

                <p>
                    Organize your sports tournament.
                </p>

            </div>


            <div class="step">

                <div class="step-number">
                    02
                </div>

                <h3>
                    Teams
                </h3>

                <p>
                    Register teams and team members.
                </p>

            </div>


            <div class="step">

                <div class="step-number">
                    03
                </div>

                <h3>
                    Matches
                </h3>

                <p>
                    Schedule tournament matches.
                </p>

            </div>


            <div class="step">

                <div class="step-number">
                    04
                </div>

                <h3>
                    Results
                </h3>

                <p>
                    Record scores and view results.
                </p>

            </div>

        </div>

    </section>


    <!-- ================= CTA ================= -->

    <section class="cta">

        <h2>
            Ready for the Next Match?
        </h2>

        <p>
            Register your team and become part of the tournament.
        </p>

        <a href="{{ route('register') }}">
            Register Now
        </a>

    </section>


    <!-- ================= FOOTER ================= -->

    <footer>

        © {{ date('Y') }} Sports Tournament Manager

    </footer>


</body>

</html>