import React from 'react';
import ReactEcharts from 'echarts-for-react';

export function Calories() {
    const option = {

        tooltip: {
            trigger: 'item'
        },
        legend: {
            top: '5%',
            left: 'center'
        },
        series: [{
            name: 'Access From',
            type: 'pie',
            radius: ['40%', '70%'],
            avoidLabelOverlap: false,
            label: {
                show: false,
                position: 'center'
            },
            emphasis: {
                label: {
                    show: true,
                    fontSize: '18',
                    fontWeight: 'bold'
                }
            },
            labelLine: {
                show: false
            },
            data: [
                {
                    value: 735,
                    name: 'Passiv'
                },
                {
                    value: 580,
                    name: 'Aktiv'
                }
            ]
        }]
    };

    return (

        <div className="card">
            <div className='card-header'>
                <h2 className="card-title">
                    Verbrauchte Kalorien
                </h2>
            </div>
            <div className="card-body">
                <ReactEcharts option={option} style={{ height: 400 }} />
            </div>
        </div>
    );
}