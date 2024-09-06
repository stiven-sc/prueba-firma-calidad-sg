// public/js/app.js
document.querySelector('#weather-form').addEventListener('submit', function(e) {
    e.preventDefault();
    let city = document.querySelector('#city').value;

    fetch('/fetchWeather', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `city=${city}`
    })
    .then(response => response.json())
    .then(data => {
        document.querySelector('#weather-result').innerHTML = `
            <h3>Weather in ${data.name}</h3>
            <p>Temperature: ${data.main.temp}°C</p>
            <p>Description: ${data.weather[0].description}</p>
        `;
    });
});
