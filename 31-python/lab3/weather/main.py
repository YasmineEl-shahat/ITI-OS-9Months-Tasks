from wheather import  WeatherAPIClient

client = WeatherAPIClient(api_key="899930358586479082c131646231204")
print(client.get_current_temperature(city="Mansoura"))
print(client.get_temperature_after(city="Mansoura", days=5, hour="2023-04-10 14:00"))
print(client.get_lat_and_long(city="Mansoura"))
