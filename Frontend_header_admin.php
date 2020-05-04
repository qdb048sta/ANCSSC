<style>
    .logo {
        height: 6.4vw;
        width: auto;
        position: absolute;
        top: 1vw;
        left: 1vw;
    }

    a.myhome {
        background-color: white;
        color: #FCC05E;
        border-radius: 20px;
        text-decoration: none;
        position: absolute;
        top: 3.4vw;
        left: 10vw;
        font-weight: bold;
        font-family: sans-serif;
        font-size: calc(5px + 0.9vw);
    }


    a.myhome:hover {
        color: #4E515B;
    }

    a.sdgs {
        position: absolute;
        top: 3.4vw;
        left: 19vw;
        background-color: white;
        color: #FCC05E;
        border-radius: 20px;
        text-decoration: none;
        font-weight: bold;
        font-family: sans-serif;
        font-size: calc(5px + 0.9vw);
        text-align: center;
    }

    a.sdgs:hover {
        color: #4E515B;
    }

    a.control_panel {
        background-color: white;
        color: #FCC05E;
        position: absolute;
        top: 3.4vw;
        left: 27vw;
        border-radius: 20px;
        text-decoration: none;
        font-weight: bold;
        font-family: sans-serif;
        font-size: calc(5px + 0.9vw);
        text-align: center;
    }

    a.control_panel:hover {
        color: #4E515B;
    }

    a.display_stats {
        /*position: absolute;*/
        background-color: white;
        color: #FCC05E;
        position: absolute;
        top: 3.4vw;
        left: calc(40vw + 29px);
        border-radius: 20px;
        text-decoration: none;
        font-weight: bold;
        font-family: sans-serif;
        font-size: calc(5px + 0.9vw);
    }

    a.display_stats:hover {
        color: #4E515B;
    }

    a.search {
        background-color: white;
        color: #FCC05E;
        border-radius: 20px;
        text-decoration: none;
        position: absolute;
        top: 3.4vw;
        left: calc(50vw + 49px);
        font-weight: bold;
        font-family: sans-serif;
        font-size: calc(5px + 0.9vw);
    }

    a.search:hover {
        color: #4E515B;
    }

    a.username {
        position: absolute;
        top: 3.4vw;
        left: 75vw;
        background-color: white;
        color: #4E515B;
        border-radius: 20px;
        text-decoration: none;
        font-weight: bold;
        font-family: sans-serif;
        font-size: calc(5px + 0.9vw);
    }


    .profilepicture {
        height: 2vw;
        position: absolute;
        right: 1vw;
        top: 2.9vw;
    }

    a.logout {
        position: absolute;
        top: 2.7vw;
        left: 83vw;
        background-color: white;
        padding: 0.6vw 2.3vw;
        color: #4E515B;
        border-style: solid;
        border-width: 0.2vw;
        border-radius: 17px;
        border-color: firebrick;
        text-decoration: none;
        font-weight: bold;
        font-family: sans-serif;
        font-size: calc(4px + 0.8vw);
        z-index: 1;
    }

    a.logout:hover {
        background-color: lightgrey;
        color: black;
    }

    .row {
        width: 100%;
    }

</style>




<div class="row">
    <div id="logo">

        <a href="Frontend_Admin_Welcome.php"><img class='logo' src="ANCSSC.png"></a>

    </div>
    <a class='myhome' href='Frontend_Admin_Welcome.php' title='home'>HOME</a>

    <a class='sdgs' href='Frontend_SDGs.php' title='sustainable development goals'>SDGs</a>

    <a class='control_panel' href='Frontend_Admin_Navigation_Page.php' title='add ngos and projects'>CONTROL PANEL</a>

    <a class='display_stats' href='Frontend_statistics.php' title='display statistics'>STATISTICS</a>

    <a class='search' href='Frontend_Search.php' title='search'>SEARCH</a>

    <a class='logout' href='auth_logout.php' title='logout'>LOGOUT</a>

    <a class='username' title='my profile'>ADMIN</a>

    <img class='profilepicture' src="profile_pic.png">

</div>

