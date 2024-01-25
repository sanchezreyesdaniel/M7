<?php

interface Observer {

    public function update(Observable $subject);

}

abstract class Widget implements Observer {

    protected $internalData = array();

    abstract public function draw();

    public function update(Observable $subject) {
        $this->internalData = $subject->getData();
    }
}

class Grafic extends Widget {

    public function draw() {

        $html = "<html><head>";
        $html .= "<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>";
        $html .= "</head><body>";
        $html .= "<div style='width: 1000px; height: 1000px;'><canvas id='myChart'></canvas></div>";
        $html .= "<script>
                    const ctx = document.getElementById('myChart');                    
                    const data = {
                        labels: [";

        $numFilas1 = count($this->internalData[0]); // numero de filas

        for ($i = 0; $i < $numFilas1; $i++) {

            $labels = $this->internalData[0];

            $html .= "'$labels[$i]',";
        }

        $html .= "],
            datasets: [{
                label: 'My First Dataset',
                data: [";

        $numFilas2 = count($this->internalData[1]); // numero de filas

        for ($i = 0; $i < $numFilas2; $i++) {

            $datas = $this->internalData[1];

            $html .= "$datas[$i],";
        }

        $html .= "],
            backgroundColor: [";

        $numFilas3 = count($this->internalData[2]); // numero de filas

        for ($i = 0; $i < $numFilas3; $i++) {

            $bgColors = $this->internalData[2];

            $html .= "'$bgColors[$i]',";
        }

        $html .= "],
            hoverOffset: 4
            }]
        };

        const getLineColor = function (ctx) {
            // Implementa la lógica de obtener el color del conjunto de datos
            // Puedes utilizar algo similar a Utils.color(ctx.datasetIndex);
            return 'blue'; // Sustituye esto con la lógica real
        };

        const alternatePointStyles = function (ctx) {
            const index = ctx.dataIndex;
            return index % 2 === 0 ? 'circle' : 'rect';
        };

        const makeHalfAsOpaque = function (ctx) {
            return 'rgba(255, 255, 255, 0.5)'; // Sustituye esto con la lógica real
        };

        const adjustRadiusBasedOnData = function (ctx) {
            const v = ctx.parsed.y;
            return v < 10 ? 5
                : v < 25 ? 7
                : v < 50 ? 9
                : v < 75 ? 11
                : 15;
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                plugins: {
                    legend: false,
                    tooltip: true,
                },
                elements: {
                    line: {
                        fill: false,
                        backgroundColor: getLineColor,
                        borderColor: getLineColor,
                    },
                    point: {
                        backgroundColor: getLineColor,
                        hoverBackgroundColor: makeHalfAsOpaque,
                        radius: adjustRadiusBasedOnData,
                        pointStyle: alternatePointStyles,
                        hoverRadius: 15,
                    }
                }
            }
        };

        new Chart(ctx, config);
        </script>
        </body></html>";
        echo $html;
    }
}
?>
