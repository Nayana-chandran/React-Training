<!DOCTYPE HTML>
<html>
<head>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
    <div id="tableClass">
        <h1>Asia Olympics 2018</h1>
        <label>Country : </label>
        <input name="country" id="country"/></br>
        <label>Gold : </label>
        <input name="gold" id="goldcount" onkeyup="validNumber(this.value, goldcount)"/></br>
        <label>Silver : </label>
        <input name="silver" id="silvercount" onkeyup="validNumber(this.value, silvercount)"/></br>
        <label>Bronze : </label>
        <input name="bronze" id="bronzecount" onkeyup="validNumber(this.value, bronzecount)"/></br>
        <p id="error_display"></p>
        <button id="save" type="button" onclick="savedata()">Submit</button>
    </div>
    <button ype="button" onclick="showGraph()">Show as Bar Diagram</button>
    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
</body>
<script>

    // Validate number for medals count
    function validNumber(val, number) {
        number.value = val.replace(/[^0-9]/g, "");
    }

    let olympics = [];
    // Save form data function
    function savedata(){
        let contry = document.getElementById('country').value;
        let gold = document.getElementById('goldcount').value;
        let silver = document.getElementById('silvercount').value;
        let bronze = document.getElementById('bronzecount').value;
        let error = document.getElementById('error_display');
        error.style.display = 'none';
        if(contry == '' || gold == '' || silver == '' || bronze == '') {
          error.innerHTML = 'Please enter all the fileds!';
          error.style.display = 'block';
          error.style.color = 'red';
          return false;
        }
        let obj = {contry, gold, silver,bronze};
        olympics.push(obj);
        localStorage.setItem('olympicsData', JSON.stringify(olympics));
        contry = '';
        gold = '';
        silver = '';
        bronze = '';
        showGraph();
    }

    // Show the pie diagram chart
    function showGraph() {
        let details = JSON.parse(localStorage.getItem("olympicsData"));
        let dps1 = [];
        let dps2 = [];
        let dps3 = [];
        details.map((data) => {
            dps1.push({y: parseInt(data.gold), label: data.contry});
            dps2.push({y: parseInt(data.silver), label: data.contry});
            dps3.push({y: parseInt(data.bronze), label: data.contry});
        } )

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Asia Olympics - 2018"
            },
            data: [
            {
                type: 'bar',
                yValueFormatString: "##\" Gold medals\"",
                indexLabel: "{y}",
                dataPoints: dps1
            },
            {
                type: 'bar',
                yValueFormatString: "##\" Silver medals\"",
                indexLabel: "{y}",
                dataPoints: dps2
            },
            {
                type: 'bar',
                yValueFormatString: "##\" Bronze medals\"",
                indexLabel: "{y}",
                dataPoints: dps3
            }
            ]
        });
        chart.render();
    }
</script>
</html>
