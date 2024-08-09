<style>
    html, body {
        height: 100%;
        margin: 0;
    }

    .centered-box {
        width: 50%;
        height: 50%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: justify;
        box-sizing: border-box;
        padding: 20px;
        font-size: 25px;
    }

    .centered-box ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .centered-box li {
        margin-bottom: 10px;
    }

    .centered-box a {
        color: black;
        text-decoration: none;
        font-weight: bold;
    }

    .centered-box a:hover {
        text-decoration: underline;
    }

    @media (max-width: 600px) {
        .centered-box {
            width: 80%;
            height: 60%;
        }
    }

</style>
<x-app-layout>
    @section('content')
        <div class="centered-box">
            <ul>
                <li><a href="/api/documentation" target="_blank">NASA API</a></li>
                <li><a href="https://www.nasa.gov/nasalive" target="_blank">NASA TV - Official Stream</a></li>
                <li><a href="https://hubblesite.org/images/gallery" target="_blank">Hubble Space Telescope - Image Gallery</a></li>
                <li><a href="https://apod.nasa.gov/apod/" target="_blank">Astronomy Picture of the Day</a></li>
                <li><a href="https://www.n2yo.com/?s=25544" target="_blank">Track the ISS</a></li>
                <li><a href="https://mars.nasa.gov/mars2020/" target="_blank">Perseverance Rover on Mars</a></li>
                <li><a href="https://eyes.nasa.gov/" target="_blank">Explore with NASA's Eyes</a></li>
            </ul>
        </div>
    @endsection

</x-app-layout>
