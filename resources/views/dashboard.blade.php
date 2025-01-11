<style>
    html, body {
        height: 100%;
        margin: 0;
    }

    @media (max-width: 600px) {
        html, body {
            background-repeat: repeat;
            background-size: auto;
        }
    }

    .dashboard-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        padding: 20px;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        width: 100%;
        max-width: 1200px;
        padding: 20px;
    }

    .box {
        width: 100%;
        aspect-ratio: 1 / 1;
        background-color: white;
        border: 2px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
    }

    .box img {
        width: 100%;
        height: 80%;
        object-fit: cover;
    }

    .box-text {
        height: 20%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        padding: 10px;
    }

    @media (max-width: 900px) {
        .dashboard-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .dashboard-grid {
            grid-template-columns: 1fr;
        }
        .box {
            height: 250px;
        }
    }
</style>

<x-app-layout>
    @section('content')
        <div class="dashboard-container">
            <div class="dashboard-grid">
                <div class="box">
                    <a href="/api/documentation" target="_blank">
                        <img src="http://placekitten.com/600/600" alt="NASA API">
                        <div class="box-text">NASA API</div>
                    </a>
                </div>
                <div class="box">
                    <a href="https://www.nasa.gov/nasalive" target="_blank">
                        <img src="http://placekitten.com/601/601" alt="NASA TV">
                        <div class="box-text">NASA TV - Official Stream</div>
                    </a>
                </div>
                <div class="box">
                    <a href="https://hubblesite.org/images/gallery" target="_blank">
                        <img src="http://placekitten.com/602/602" alt="Hubble Gallery">
                        <div class="box-text">Hubble Space Telescope - Image Gallery</div>
                    </a>
                </div>
                <div class="box">
                    <a href="https://apod.nasa.gov/apod/" target="_blank">
                        <img src="http://placekitten.com/603/603" alt="APOD">
                        <div class="box-text">Astronomy Picture of the Day</div>
                    </a>
                </div>
                <div class="box">
                    <a href="https://www.n2yo.com/?s=25544" target="_blank">
                        <img src="http://placekitten.com/604/604" alt="Track ISS">
                        <div class="box-text">Track the ISS</div>
                    </a>
                </div>
                <div class="box">
                    <a href="https://mars.nasa.gov/mars2020/" target="_blank">
                        <img src="http://placekitten.com/605/605" alt="Perseverance">
                        <div class="box-text">Perseverance Rover on Mars</div>
                    </a>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
