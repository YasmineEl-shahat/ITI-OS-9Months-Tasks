const express = require("express");
const soap = require("soap");

const app = express();
const PORT = 8001;
const endPoint = "calculator";
const url = `http://localhost:${PORT}/${endPoint}`;

const arrange = (arr) => arr.map((el) => el["$value"] * 1);
const add = (...args) => {
  let sum = 0;
  args = arrange(args);
  console.log(args);
  for (let i = 0; i < args.length; i++) {
    console.log(args[i]);
    if (args[i]) sum += args[i];
  }
  return sum;
};
const subtract = (...args) => {
  args = arrange(args);
  let sum = args[0];
  console.log(args);
  for (let i = 1; i < args.length; i++) {
    if (args[i]) sum -= args[i];
  }
  return sum;
};
const multiply = (...args) => {
  let sum = 1;
  args = arrange(args);
  console.log(args);

  for (let i = 0; i < args.length; i++) {
    if (args[i]) sum *= args[i];
  }
  return sum;
};
const divide = (...args) => {
  let sum = args[0];
  args = arrange(args);
  for (let i = 1; i < args.length; i++) {
    if (args[i]) sum /= args[i];
  }
  return sum;
};

var myService = {
  MyService: {
    MyPort: {
      Add: ({ intA, intB, intC, intD, intE }) => ({
        AddResult: add(intA, intB, intC, intD, intE),
      }),
      Subtract: ({ intA, intB, intC, intD, intE }) => ({
        SubtractResult: subtract(intA, intB, intC, intD, intE),
      }),
      Multiply: ({ intA, intB, intC, intD, intE }) => ({
        MultiplyResult: multiply(intA, intB, intC, intD, intE),
      }),
      Divide: ({ intA, intB, intC, intD, intE }) => ({
        DivideResult: divide(intA, intB, intC, intD, intE),
      }),
    },
  },
};

const xml = `
<definitions name = "MyService"
             targetNamespace = "http://www.examples.com/wsdl/MyService.wsdl"
             xmlns = "http://schemas.xmlsoap.org/wsdl/"
             xmlns:soap = "http://schemas.xmlsoap.org/wsdl/soap/"
             xmlns:tns = "http://www.examples.com/wsdl/MyService.wsdl"
             xmlns:xsd = "http://www.w3.org/2001/XMLSchema">
    <message name="MyFunctionRequest">
        <part name="intA" type="xsd:int"/>
        <part name="intB" type="xsd:int"/>
        <part name="intC" type="xsd:int"/>
        <part name="intD" type="xsd:int"/>
        <part name="intE" type="xsd:int"/>
    </message>
    <message name="MyFunctionResponse">
        <part name="name" type="xsd:string"/>
    </message>
    <portType name="MyPort">
        <operation name="Add">
            <input message="tns:MyFunctionRequest"/>
            <output message="tns:MyFunctionResponse"/>
        </operation>
        <operation name="Subtract">
            <input message="tns:MyFunctionRequest"/>
            <output message="tns:MyFunctionResponse"/>
        </operation>
        <operation name="Multiply">
            <input message="tns:MyFunctionRequest"/>
            <output message="tns:MyFunctionResponse"/>
        </operation>
        <operation name="Divide">
            <input message="tns:MyFunctionRequest"/>
            <output message="tns:MyFunctionResponse"/>
        </operation>
    </portType>
    <binding name = "MyFunction_Binding" type="tns:MyPort">
        <soap:binding style="rpc" transport="http://schemas.xmlsoap.org/soap/http"/>
        <operation name="Add">
            <soap:operation soapAction="Add"/>
            <input>
                <soap:body encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" namespace="urn:examples:MyService" use="encoded"/>
            </input>
            <output>
                <soap:body encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" namespace="urn:examples:MyService" use="encoded"/>
            </output>
        </operation>
        <operation name="Subtract">
            <soap:operation soapAction="Subtract"/>
            <input>
                <soap:body encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" namespace="urn:examples:MyService" use="encoded"/>
            </input>
            <output>
                <soap:body encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" namespace="urn:examples:MyService" use="encoded"/>
            </output>
        </operation>
        <operation name="Multiply">
            <soap:operation soapAction="Multiply"/>
            <input>
                <soap:body encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" namespace="urn:examples:MyService" use="encoded"/>
            </input>
            <output>
                <soap:body encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" namespace="urn:examples:MyService" use="encoded"/>
            </output>
        </operation>
        <operation name="Divide">
            <soap:operation soapAction="Divide"/>
            <input>
                <soap:body encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" namespace="urn:examples:MyService" use="encoded"/>
            </input>
            <output>
                <soap:body encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" namespace="urn:examples:MyService" use="encoded"/>
            </output>
        </operation>
        
    </binding>
    <service name="MyService">
        <documentation>WSDL File for MyService</documentation>
        <port binding="tns:MyFunction_Binding" name="MyPort">
            <soap:address location = "${url}" />
        </port>
    </service>
</definitions>
`;

app.listen(PORT, function () {
  soap.listen(app, "/" + endPoint, myService, xml, function () {
    console.log(`server initialized, ${url}?wsdl`);
  });
});
