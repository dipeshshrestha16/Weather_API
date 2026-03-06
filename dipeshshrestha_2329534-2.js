async function fetchData(city) {
    let url;
    // if (city) {
    //     url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=076f57868b4c911300602e866ae2ea8b`;
    // } else {
        url = `https://api.openweathermap.org/data/2.5/weather?q=siddharthanagar&appid=076f57868b4c911300602e866ae2ea8b`;
    // }
    const response = await fetch(url);
    const data = await response.json();
    console.log(data);
    const cityvar = document.getElementById("city");
    cityvar.innerHTML = data.name;
    const tempvar = document.getElementById("temp");
    tempvar.innerHTML = (data.main.temp - 273.15).toFixed(2) + "°C";
    const humivar = document.getElementById("humidity");
    humivar.innerHTML = data.main.humidity + "%";
    const desvar = document.getElementById("description");
    desvar.innerHTML = data.weather[0].description;
    const wi = document.getElementById("wind");
    wi.innerHTML = data.wind.speed + "m/s";
    const timevar = document.getElementById("timezone");
    const localTime = new Date();
    const aTime = localTime.getTime() + (localTime.getTimezoneOffset() * 60000);
    const locationTime = new Date(aTime + (1000 * data.timezone));
    timevar.innerHTML = locationTime.toLocaleString(locationTime);
    const icon = document.querySelector(".icon");
    if(data.weather[0].description == "clear sky"){
        icon.innerHTML = `<img src="img/clear.png"/>`;}
    
    else if(data.weather[0].description == "few clouds"){
        icon.innerHTML = `<img src="img/few.png"/>`;}
    else if(data.weather[0].description == "scattered clouds"){
        icon.innerHTML = `<img src="img/broken.png"/>`;}
    else if(data.weather[0].description == "overcast clouds"){
        icon.innerHTML = `<img src="img/broken.png"/>`;}
    
    else if(data.weather[0].description == "broken clouds"){
        icon.innerHTML = `<img src="img/broken.png"/>`;}
    
    else if(data.weather[0].description == "shower rain"){
        icon.innerHTML = `<img src="img/shower.png"/>`;}
    
    else if(data.weather[0].description== "rain"){
        icon.innerHTML = `<img src="img/rain.png"/>`;}
    
    else if(data.weather[0].description == "thunderstorm"){
        icon.innerHTML = `<img src="img/thunder.png"/>`;}
    
    else if(data.weather[0].description == "snow"){
        icon.innerHTML = `<img src="img/snow.png"/>`;}
    
    else if(data.weather[0].description == "mist"){
        icon.innerHTML = `<img src="img/mist.png"/>`;}
    else{
        icon.innerHTML = `<img src="http://openweathermap.org/img/w/${data.weather[0].icon}.png" alt="Weather Icon"/>`;}
    }
fetchData();

async function handleSearch() {
    const cityInput = document.getElementById("fsearch");
    const city = cityInput.value;
    await fetchData(city);
}

const searchButton = document.getElementById("search");
searchButton.addEventListener("click", handleSearch);