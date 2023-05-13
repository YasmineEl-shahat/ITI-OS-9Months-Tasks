const soap = require("soap");
require("dotenv").config();
const wsdlUrl =
  "http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";

const operations = {
  capitalCity: "CapitalCity",
  countryCurrency: "CountryCurrency",
  countryFlag: "CountryFlag",
  countryIntPhoneCode: "CountryIntPhoneCode",
  countryName: "CountryName",
  currencyName: "CurrencyName",
};

const country = process.env.COUNTRY;

if (!country) {
  console.error("country is not set");
  process.exit(1);
}

soap.createClient(wsdlUrl, function (err, client) {
  if (err) {
    console.error(err);
    process.exit(1);
  }

  const operation = process.argv[2];
  if (!operation || !operations[operation]) {
    console.error(`Invalid operation: ${operation}`);
    console.error(`Valid operations: ${Object.keys(operations).join(", ")}`);
    process.exit(1);
  }

  const args = { sCountryISOCode: country };
  const method = client[operations[operation]];
  method(args, function (err, result) {
    if (err) {
      console.error(err);
      process.exit(1);
    }
    console.log(JSON.stringify(result, null, 2));
  });
});
