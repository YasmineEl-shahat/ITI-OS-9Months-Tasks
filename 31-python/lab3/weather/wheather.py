import requests,re

class WeatherAPIClient:
    def __init__(self, api_key):
        self.api_key = api_key

    def _make_request(self, url):
        response = requests.get(url)
        if response.status_code != 200:
            raise Exception(f"Failed to get data: {response.status_code} - {response.json()['error']['message']}")
        return response.json()

    def get_current_temperature(self, city):
        url = f"http://api.weatherapi.com/v1/current.json?key={self.api_key}&q={city}"
        data = self._make_request(url)
        return data["current"]["temp_c"]

    def get_temperature_after(self, city, days, hour=None):
        url = f"http://api.weatherapi.com/v1/forecast.json?key={self.api_key}&q={city}&days={days}"
        data = self._make_request(url)
        if hour is not None:
            if not re.match(r'\d{4}-\d{2}-\d{2} \d{2}:\d{2}', hour):
                raise ValueError("Invalid hour format provided. Use 'YYYY-MM-DD HH:MM'.")
            for hour_data in data["forecast"]["forecastday"]:
                if hour_data["date"] == hour[:10]:
                    return hour_data["hour"][int(hour[11:13])]["temp_c"]
            raise ValueError("Invalid hour value provided.")
        return data["forecast"]["forecastday"][0]["day"]["avgtemp_c"]

    def get_lat_and_long(self, city):
        url = f"http://api.weatherapi.com/v1/current.json?key={self.api_key}&q={city}"
        data = self._make_request(url)
        return data["location"]["lat"], data["location"]["lon"]
