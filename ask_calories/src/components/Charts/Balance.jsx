import React from 'react';
import ReactEcharts from 'echarts-for-react';

export function Balance() {
    const option = {

        xAxis: {
            type: 'category',
            data: ['Konsum', 'Verbrauch']
        },
        yAxis: {
            type: 'value'
        },
        series: [
            {
                data: [120, 200],
                type: 'bar'
            }
        ]
    };

    return (

        <div className="card">
            <div className='card-header'>
                <h2 className="card-title">
                    Kalorienbilanz
                </h2>
            </div>
            <div className="card-body">
                <ReactEcharts option={option} style={{ height: 400 }} />
            </div>
        </div>
    );
}