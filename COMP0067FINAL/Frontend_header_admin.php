

<style>
    div.topbar {
        position: absolute;
    }

    .logo {
        height: 5.4vw;
        width: auto;
        position: absolute;
        top: 1vw;
        left: 1vw;
    }

    a.myhome {
        position: absolute;
        background-color: white;
        color: #FCC05E;
        border-radius: 20px;
        text-decoration: none;
        left: 15vw;
        top: 3.4vw;
        font-weight: bold;
        font-family: sans-serif;
        font-size: 1.2vw;
    }

    a.myhome:hover {
        color: #4E515B;
    }

    a.sdgs {
        position: absolute;
        background-color: white;
        color: #FCC05E;
        border-radius: 20px;
        text-decoration: none;
        left: 22vw;
        top: 3.4vw;
        font-weight: bold;
        font-family: sans-serif;
        font-size: 1.2vw;
        text-align: center;
    }

    a.sdgs:hover {
        color: #4E515B;
    }

    a.control_panel {
        position: absolute;
        background-color: white;
        color: #FCC05E;
        border-radius: 20px;
        text-decoration: none;
        left: 28.5vw;
        top: 3.4vw;
        font-weight: bold;
        font-family: sans-serif;
        font-size: 1.2vw;
        text-align: center;
    }

    a.control_panel:hover {
        color: #4E515B;
    }

    a.display_stats {
        position: absolute;
        background-color: white;
        color: #FCC05E;
        border-radius: 20px;
        text-decoration: none;
        left: 40.5vw;
        top: 3.4vw;
        font-weight: bold;
        font-family: sans-serif;
        font-size: 1.2vw;
    }

    a.display_stats:hover {
        color: #4E515B;
    }

    a.search {
        position: absolute;
        background-color: white;
        color: #FCC05E;
        border-radius: 20px;
        text-decoration: none;
        left: 55vw;
        top: 3.4vw;
        font-weight: bold;
        font-family: sans-serif;
        font-size: 1.2vw;
    }

    a.search:hover {
        color: #4E515B;
    }

    a.username {
        position: absolute;
        background-color: white;
        color: #4E515B;
        border-radius: 20px;
        text-decoration: none;
        right: 7.5vw;
        top: 3.4vw;
        font-weight: bold;
        font-family: sans-serif;
        font-size: 1.2vw;
    }

    a.username:hover {
        color: #FCC05E;
    }

    .profilepicture {
        height: 2vw;
        width: auto;
        position: absolute;
        right: 4.6vw;
        top: 2.9vw;
    }

    a.logout {

        position: absolute;
        background-color: white;
        padding: 0.6vw 2.3vw;
        color: #4E515B;
        border-style: solid;
        border-width: 0.2vw;
        border-radius: 17px;
        border-color: firebrick;
        text-decoration: none;
        left: 78vw;
        top: 2.7vw;
        font-weight: bold;
        font-family: sans-serif;
        font-size: 1vw;
        z-index: 1;
    }

    a.logout:hover {
        background-color: lightgrey;
        color: black;
    }

</style>


<div class="topbar">
    <div id="logo">

        <a href="Frontend_Admin_Welcome.php"><img class='logo' src="ANCSSC_logo.png"></a>

    </div>
</div>

<a class='myhome' href='Frontend_Admin_Welcome.php' title='home'>HOME</a>

<a class='sdgs' href='Frontend_SDGs.php' title='sustainable development goals'>SDGs</a>

<a class='control_panel' href='Frontend_Admin_Navigation_Page.php' title='add ngos and projects'>CONTROL PANEL</a>

<a class='search' href='Frontend_Admin_Search.php' title='search'>SEARCH</a>

<a class='display_stats' href='xxxx.php' title='display statistics'>DISPLAY STATISTICS</a>

<a class='logout' href='auth_logout.php' title='logout'>LOGOUT</a>

<a class='username' title='my profile'>ADMIN</a>

<img class='profilepicture' src="profile_pic.png">