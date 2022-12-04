var weathers;

/**
 *
 * @returns {Promise<void>}
 */
async function getCities() {
    let cities = await fetch('http://localhost:8000/api/ciudad/names.php').then(data => data.json());

    let html = '';

    for (const city of cities) {
        html += '<li>';
        html += `<a class="dropdown-item" onclick="getWeathers('${city.name}')">${city.name}</a>`;
        html += '</li>';
    }
    document.getElementById('btnCities').innerHTML = html;
}

/**
 *
 * @param city
 * @returns {Promise<void>}
 */
async function getWeathers(city) {
    weathers = await fetch(`http://localhost:8000/api/clima/read.php?city=${city}`).then(data => data.json());

    let temperatures = '';

    setWeather(0)

    document.getElementById('city_name').innerText = city;

    for (const [index, weather] of weathers.entries()) {
        temperatures += `<li><a href="#" onclick="setWeather(${index})">`;

        if (weather.clima === 'Nublado') {
            temperatures += `${weather.temperatura}° <i class="wi wi-windy"></i>`;
        }
        if (weather.clima === 'Soleado') {
            temperatures += `${weather.temperatura}° <i class="wi wi-day-sunny"></i>`;
        }
        if (weather.clima === 'Parcialmente Soleado') {
            temperatures += `${weather.temperatura}° <i class="wi wi-day-cloudy"></i>`;
        }
        if (weather.clima === 'Lluvioso') {
            temperatures += `${weather.temperatura}° <i class="wi wi-rain"></i>`;
        }


        temperatures += '</li>';
    }
    document.getElementById('temperature').innerHTML = temperatures;

}

/**
 *
 * @param position
 */
function setWeather(position) {
    document.getElementById('date').innerText = weathers[position].fecha;
    document.getElementById('grade').innerHTML = `${weathers[position].temperatura}<i class="wi wi-degrees"></i>`;
    document.getElementById('weather').innerText = weathers[position].clima;
    document.getElementById('humidity').innerText = `Humedad: ${weathers[position].humedad}`;

    const weatherCard = document.getElementById('weather-card');
    let backgroundUrl = '';
    if (weathers[position].clima === 'Nublado') {
        backgroundUrl = "url('../../web/images/nublado.png')";
    }
    if (weathers[position].clima === 'Soleado') {
        backgroundUrl = "url('../../web/images/soleado.png')";
    }
    if (weathers[position].clima === 'Parcialmente Soleado') {
        backgroundUrl = "url('../../web/images/parcialmente-soleado.png')";
    }

    if (weathers[position].clima === 'Lluvioso') {
        backgroundUrl = "url('../../web/images/lluvioso.png')";
    }

    weatherCard.style.backgroundImage = backgroundUrl;


}

getCities();