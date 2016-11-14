<body>
<div class="container">
    <div class="animated fadeInRight"><center><h4>Test Facturación</h4></center>
    </div><br><br>
    <div  class="animated fadeInRight">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <botton class="btn btn-success" onclick="generar_token();"> Generar Token</botton>
            <botton class="btn btn-primary" onclick="ejemplo_facturar();"> Ejemplo Facturar</botton>
        </div>
    </div>
</div>
</body>
<script>
token_esp='';
    function generar_token()
    {
        var data = {
            grant_type: "password",
            username: "76017396-7",
            password: "723405"
        };
        $.ajax({
            type: "POST",
            url: 'http://demo.facturasonline.cl:450/api/token',
            contentType: "application/x-www-form-urlencoded",
            dataType:"json",
            data:data,
            success: function(token)
            {
                token_esp=token["token_type"]+' '+token["access_token"];
            }
        });

    }

    function ejemplo_facturar()
    {
        var settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://demo.facturasonline.cl:450/api/documents/CreateInvoice",
        "method": "POST",
        "headers": {
            "authorization": token_esp,
            "content-type": "application/json",
        },
        "processData": false,
        "data": "{\r\n\"Receiver\":{\r\n\t\t\"RUT\":\"77946290-0\",\r\n\t\t\"Name\":\"SOCIEDAD EDUCACIONAL CARAMPANGUE LIMITADA \",\r\n\t\t\"Address\":\"Camino Melipilla 270\",\r\n\t\t\"MunicipalityName\":\"Talagante\",\r\n\t\t\"CityName\":\"Santiago\",\r\n\t\t\"BusinessActivity\":\"EDUCACION\"},\r\n\"Items\":[{\r\n\t\"Code\":3105,\r\n\t\"ExemptIndicator\":0,\r\n\t\"Name\":\"2016 MENSUALIDAD Cuota #7\",\r\n\t\"Quantity\":1,\r\n\t\"MeasureUnit\":\"UN\",\r\n\t\"UnitPrice\":306000,\r\n\t\"TotalItemAmount\":306000,\r\n\t\"IsExempt\":false}],\r\n\"PaymentType\":1,\r\n\"IssueDate\":\"2016-10-25T13:56:36.838Z\",\r\n\"NetAmount\":1000000,\r\n\"IVAFee\":19,\r\n\"IVAAmount\":190000,\r\n\"ExemptAmount\":306000,\r\n\"RegistrationDate\":\"2016-10-25T13:56:36.838Z\",\r\n\"TotalAmount\":306000}"
    }

        $.ajax(settings).done(function (response) {
            console.log(response);
        });
        /*
        var data = {
            "Receiver":{
                "RUT":"77787900-6",
                "Name":"DALIA LTDA",
                "Address":"JSE URETA 7990",
                "MunicipalityName":"La Cisterna",
                "CityName":"Santiago",
                "BusinessActivity":"IMPORTACION"
            },

            "Items":[{
                "Code":"9999",
                "Name":"CONSUMO",
                "Quantity":1,
                "MeasureUnit":"UN",
                "UnitPrice":1000,
                "TotalItemAmount":1000
            }],

            "PaymentType": 1,
            "IssueDate":"2016-03-08T11:49:39.748Z",
            "NetAmount":1000,
            "IVAFee":19,
            "IVAAmount":190,
            "TotalAmount":1190
        };
        $.ajax({
            url: "http://demo.facturasonline.cl:450/api/documents/CreateManualInvoice",
            type: "POST",
            contentType: "application/json",
            dataType: "json",
            beforeSend: function (xhr){
                xhr.setRequestHeader('authorization',token_esp );
            },
            data: data,
            success: function (results) {
                console.log(results);
                //{"Folio":1127,"TypeDescription":"Factura Electrónica"}
            }
        });*/
    }
</script>