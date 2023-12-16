<div class="row pb-10">
    <div class="col-md-8 mb-20 bg-white" id="chart">
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            var options = {
                series: [{
                        name: "Session Duration",
                        data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
                    },
                    {
                        name: "Page Views",
                        data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
                    },
                    {
                        name: 'Total Visits',
                        data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
                    }
                ],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [5, 7, 5],
                    curve: 'straight',
                    dashArray: [0, 8, 5]
                },
                title: {
                    text: 'Statistics des ventes',
                    align: 'left'
                },
                legend: {
                    tooltipHoverFormatter: function(val, opts) {
                        return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                    }
                },
                markers: {
                    size: 0,
                    hover: {
                        sizeOffset: 6
                    }
                },
                xaxis: {
                    categories: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre',
                        'Octobre', 'Nov', 'Déc'
                    ],
                },
                tooltip: {
                    y: [{
                            title: {
                                formatter: function(val) {
                                    return val + " (mins)"
                                }
                            }
                        },
                        {
                            title: {
                                formatter: function(val) {
                                    return val + " per session"
                                }
                            }
                        },
                        {
                            title: {
                                formatter: function(val) {
                                    return val;
                                }
                            }
                        }
                    ]
                },
                grid: {
                    borderColor: '#f1f1f1',
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        </script>
    </div>
    <!--Fin ApexChart -->

    <!--Debut side card -->
    <div class="col-md-4 mb-20">
        <div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#455a64" style="background-color: rgb(69, 90, 100);">
            <div class="d-flex justify-content-between pb-20 text-white">
                <div class="icon h1 text-white">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <!-- <i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i> -->
                </div>
                <div class="font-14 text-right">
                    <div><i class="icon-copy ion-arrow-up-c"></i> 2.69%</div>
                    <div class="font-12">Since last month</div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end">
                <div class="text-white">
                    <div class="font-14">Appointment</div>
                    <div class="font-24 weight-500">1865</div>
                </div>
                <div class="max-width-150" style="position: relative;">
                    <div id="appointment-chart" style="min-height: 70px;">
                        <div id="apexcharts2d82d9" class="apexcharts-canvas apexcharts2d82d9 apexcharts-theme-light" style="width: 150px; height: 70px;"><svg id="SvgjsSvg2855" width="150" height="70" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                <g id="SvgjsG2857" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)">
                                    <defs id="SvgjsDefs2856">
                                        <linearGradient id="SvgjsLinearGradient2860" x1="0" y1="0" x2="0" y2="1">
                                            <stop id="SvgjsStop2861" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                            <stop id="SvgjsStop2862" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            <stop id="SvgjsStop2863" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMask2d82d9">
                                            <rect id="SvgjsRect2865" width="154" height="70" x="-2" y="0" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMask2d82d9">
                                            <rect id="SvgjsRect2866" width="152" height="72" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                        </clipPath>
                                    </defs>
                                    <rect id="SvgjsRect2864" width="5.357142857142857" height="70" x="0" y="0" rx="0" ry="0" fill="url(#SvgjsLinearGradient2860)" opacity="1" stroke-width="0" stroke-dasharray="3" class="apexcharts-xcrosshairs" y2="70" filter="none" fill-opacity="0.9"></rect>
                                    <g id="SvgjsG2878" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG2879" class="apexcharts-xaxis-texts-g" transform="translate(0, 2.75)"></g>
                                    </g>
                                    <g id="SvgjsG2881" class="apexcharts-grid">
                                        <g id="SvgjsG2882" class="apexcharts-gridlines-horizontal">
                                            <line id="SvgjsLine2884" x1="0" y1="0" x2="150" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2885" x1="0" y1="17.5" x2="150" y2="17.5" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2886" x1="0" y1="35" x2="150" y2="35" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2887" x1="0" y1="52.5" x2="150" y2="52.5" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2888" x1="0" y1="70" x2="150" y2="70" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG2883" class="apexcharts-gridlines-vertical"></g>
                                        <line id="SvgjsLine2890" x1="0" y1="70" x2="150" y2="70" stroke="transparent" stroke-dasharray="0"></line>
                                        <line id="SvgjsLine2889" x1="0" y1="1" x2="0" y2="70" stroke="transparent" stroke-dasharray="0"></line>
                                    </g>
                                    <g id="SvgjsG2868" class="apexcharts-bar-series apexcharts-plot-series">
                                        <g id="SvgjsG2869" class="apexcharts-series" rel="1" seriesName="Week" data:realIndex="0">
                                            <path id="SvgjsPath2871" d="M 8.035714285714285 70L 8.035714285714285 18.839285714285715Q 10.714285714285714 16.16071428571429 13.392857142857142 18.839285714285715L 13.392857142857142 70L 8.035714285714285 70" fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2d82d9)" pathTo="M 8.035714285714285 70L 8.035714285714285 18.839285714285715Q 10.714285714285714 16.16071428571429 13.392857142857142 18.839285714285715L 13.392857142857142 70L 8.035714285714285 70" pathFrom="M 8.035714285714285 70L 8.035714285714285 70L 13.392857142857142 70L 13.392857142857142 70L 8.035714285714285 70" cy="17.5" cx="29.46428571428571" j="0" val="21" barHeight="52.5" barWidth="5.357142857142857"></path>
                                            <path id="SvgjsPath2872" d="M 29.46428571428571 70L 29.46428571428571 16.339285714285715Q 32.14285714285714 13.660714285714286 34.82142857142857 16.339285714285715L 34.82142857142857 70L 29.46428571428571 70" fill="rgba(0,227,150,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2d82d9)" pathTo="M 29.46428571428571 70L 29.46428571428571 16.339285714285715Q 32.14285714285714 13.660714285714286 34.82142857142857 16.339285714285715L 34.82142857142857 70L 29.46428571428571 70" pathFrom="M 29.46428571428571 70L 29.46428571428571 70L 34.82142857142857 70L 34.82142857142857 70L 29.46428571428571 70" cy="15" cx="50.89285714285714" j="1" val="22" barHeight="55" barWidth="5.357142857142857"></path>
                                            <path id="SvgjsPath2873" d="M 50.89285714285714 70L 50.89285714285714 46.339285714285715Q 53.57142857142857 43.660714285714285 56.24999999999999 46.339285714285715L 56.24999999999999 70L 50.89285714285714 70" fill="rgba(254,176,25,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2d82d9)" pathTo="M 50.89285714285714 70L 50.89285714285714 46.339285714285715Q 53.57142857142857 43.660714285714285 56.24999999999999 46.339285714285715L 56.24999999999999 70L 50.89285714285714 70" pathFrom="M 50.89285714285714 70L 50.89285714285714 70L 56.24999999999999 70L 56.24999999999999 70L 50.89285714285714 70" cy="45" cx="72.32142857142857" j="2" val="10" barHeight="25" barWidth="5.357142857142857"></path>
                                            <path id="SvgjsPath2874" d="M 72.32142857142857 70L 72.32142857142857 1.3392857142857142Q 75 -1.3392857142857142 77.67857142857143 1.3392857142857142L 77.67857142857143 70L 72.32142857142857 70" fill="rgba(255,69,96,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2d82d9)" pathTo="M 72.32142857142857 70L 72.32142857142857 1.3392857142857142Q 75 -1.3392857142857142 77.67857142857143 1.3392857142857142L 77.67857142857143 70L 72.32142857142857 70" pathFrom="M 72.32142857142857 70L 72.32142857142857 70L 77.67857142857143 70L 77.67857142857143 70L 72.32142857142857 70" cy="0" cx="93.75" j="3" val="28" barHeight="70" barWidth="5.357142857142857"></path>
                                            <path id="SvgjsPath2875" d="M 93.75 70L 93.75 31.339285714285715Q 96.42857142857143 28.66071428571429 99.10714285714286 31.339285714285715L 99.10714285714286 70L 93.75 70" fill="rgba(119,93,208,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2d82d9)" pathTo="M 93.75 70L 93.75 31.339285714285715Q 96.42857142857143 28.66071428571429 99.10714285714286 31.339285714285715L 99.10714285714286 70L 93.75 70" pathFrom="M 93.75 70L 93.75 70L 99.10714285714286 70L 99.10714285714286 70L 93.75 70" cy="30" cx="115.17857142857143" j="4" val="16" barHeight="40" barWidth="5.357142857142857"></path>
                                            <path id="SvgjsPath2876" d="M 115.17857142857143 70L 115.17857142857143 18.839285714285715Q 117.85714285714286 16.16071428571429 120.53571428571429 18.839285714285715L 120.53571428571429 70L 115.17857142857143 70" fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2d82d9)" pathTo="M 115.17857142857143 70L 115.17857142857143 18.839285714285715Q 117.85714285714286 16.16071428571429 120.53571428571429 18.839285714285715L 120.53571428571429 70L 115.17857142857143 70" pathFrom="M 115.17857142857143 70L 115.17857142857143 70L 120.53571428571429 70L 120.53571428571429 70L 115.17857142857143 70" cy="17.5" cx="136.60714285714286" j="5" val="21" barHeight="52.5" barWidth="5.357142857142857"></path>
                                            <path id="SvgjsPath2877" d="M 136.60714285714286 70L 136.60714285714286 38.839285714285715Q 139.28571428571428 36.160714285714285 141.96428571428572 38.839285714285715L 141.96428571428572 70L 136.60714285714286 70" fill="rgba(0,227,150,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2d82d9)" pathTo="M 136.60714285714286 70L 136.60714285714286 38.839285714285715Q 139.28571428571428 36.160714285714285 141.96428571428572 38.839285714285715L 141.96428571428572 70L 136.60714285714286 70" pathFrom="M 136.60714285714286 70L 136.60714285714286 70L 141.96428571428572 70L 141.96428571428572 70L 136.60714285714286 70" cy="37.5" cx="158.03571428571428" j="6" val="13" barHeight="32.5" barWidth="5.357142857142857"></path>
                                        </g>
                                        <g id="SvgjsG2870" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine2891" x1="0" y1="0" x2="150" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine2892" x1="0" y1="0" x2="150" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG2893" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG2894" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG2895" class="apexcharts-point-annotations"></g>
                                </g>
                                <g id="SvgjsG2880" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                            </svg>
                            <div class="apexcharts-legend"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 143, 251);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 151px; height: 71px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-box min-height-200px pd-20" data-bgcolor="#265ed7" style="background-color: rgb(38, 94, 215);">
            <div class="d-flex justify-content-between pb-20 text-white">
                <div class="icon h1 text-white">
                    <i class="fa fa-stethoscope" aria-hidden="true"></i>
                </div>
                <div class="font-14 text-right">
                    <div><i class="icon-copy ion-arrow-down-c"></i> 3.69%</div>
                    <div class="font-12">Since last month</div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end">
                <div class="text-white">
                    <div class="font-14">Surgery</div>
                    <div class="font-24 weight-500">250</div>
                </div>
                <div class="max-width-150" style="position: relative;">
                    <div id="surgery-chart" style="min-height: 70px;">
                        <div id="apexcharts2d82f7" class="apexcharts-canvas apexcharts2d82f7 apexcharts-theme-light" style="width: 150px; height: 70px;"><svg id="SvgjsSvg2609" width="150" height="70" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                <g id="SvgjsG2611" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)">
                                    <defs id="SvgjsDefs2610">
                                        <linearGradient id="SvgjsLinearGradient2614" x1="0" y1="0" x2="0" y2="1">
                                            <stop id="SvgjsStop2615" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                            <stop id="SvgjsStop2616" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            <stop id="SvgjsStop2617" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMask2d82f7">
                                            <rect id="SvgjsRect2619" width="154" height="70" x="-2" y="0" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMask2d82f7">
                                            <rect id="SvgjsRect2620" width="152" height="72" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                        </clipPath>
                                    </defs>
                                    <rect id="SvgjsRect2618" width="5.357142857142857" height="70" x="0" y="0" rx="0" ry="0" fill="url(#SvgjsLinearGradient2614)" opacity="1" stroke-width="0" stroke-dasharray="3" class="apexcharts-xcrosshairs" y2="70" filter="none" fill-opacity="0.9"></rect>
                                    <g id="SvgjsG2632" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG2633" class="apexcharts-xaxis-texts-g" transform="translate(0, 2.75)"></g>
                                    </g>
                                    <g id="SvgjsG2635" class="apexcharts-grid">
                                        <g id="SvgjsG2636" class="apexcharts-gridlines-horizontal">
                                            <line id="SvgjsLine2638" x1="0" y1="0" x2="150" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2639" x1="0" y1="17.5" x2="150" y2="17.5" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2640" x1="0" y1="35" x2="150" y2="35" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2641" x1="0" y1="52.5" x2="150" y2="52.5" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2642" x1="0" y1="70" x2="150" y2="70" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG2637" class="apexcharts-gridlines-vertical"></g>
                                        <line id="SvgjsLine2644" x1="0" y1="70" x2="150" y2="70" stroke="transparent" stroke-dasharray="0"></line>
                                        <line id="SvgjsLine2643" x1="0" y1="1" x2="0" y2="70" stroke="transparent" stroke-dasharray="0"></line>
                                    </g>
                                    <g id="SvgjsG2622" class="apexcharts-bar-series apexcharts-plot-series">
                                        <g id="SvgjsG2623" class="apexcharts-series" rel="1" seriesName="Week" data:realIndex="0">
                                            <path id="SvgjsPath2625" d="M 8.035714285714285 70L 8.035714285714285 36.339285714285715Q 10.714285714285714 33.660714285714285 13.392857142857142 36.339285714285715L 13.392857142857142 70L 8.035714285714285 70" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2d82f7)" pathTo="M 8.035714285714285 70L 8.035714285714285 36.339285714285715Q 10.714285714285714 33.660714285714285 13.392857142857142 36.339285714285715L 13.392857142857142 70L 8.035714285714285 70" pathFrom="M 8.035714285714285 70L 8.035714285714285 70L 13.392857142857142 70L 13.392857142857142 70L 8.035714285714285 70" cy="35" cx="29.46428571428571" j="0" val="10" barHeight="35" barWidth="5.357142857142857"></path>
                                            <path id="SvgjsPath2626" d="M 29.46428571428571 70L 29.46428571428571 43.339285714285715Q 32.14285714285714 40.660714285714285 34.82142857142857 43.339285714285715L 34.82142857142857 70L 29.46428571428571 70" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2d82f7)" pathTo="M 29.46428571428571 70L 29.46428571428571 43.339285714285715Q 32.14285714285714 40.660714285714285 34.82142857142857 43.339285714285715L 34.82142857142857 70L 29.46428571428571 70" pathFrom="M 29.46428571428571 70L 29.46428571428571 70L 34.82142857142857 70L 34.82142857142857 70L 29.46428571428571 70" cy="42" cx="50.89285714285714" j="1" val="8" barHeight="28" barWidth="5.357142857142857"></path>
                                            <path id="SvgjsPath2627" d="M 50.89285714285714 70L 50.89285714285714 18.839285714285715Q 53.57142857142857 16.16071428571429 56.24999999999999 18.839285714285715L 56.24999999999999 70L 50.89285714285714 70" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2d82f7)" pathTo="M 50.89285714285714 70L 50.89285714285714 18.839285714285715Q 53.57142857142857 16.16071428571429 56.24999999999999 18.839285714285715L 56.24999999999999 70L 50.89285714285714 70" pathFrom="M 50.89285714285714 70L 50.89285714285714 70L 56.24999999999999 70L 56.24999999999999 70L 50.89285714285714 70" cy="17.5" cx="72.32142857142857" j="2" val="15" barHeight="52.5" barWidth="5.357142857142857"></path>
                                            <path id="SvgjsPath2628" d="M 72.32142857142857 70L 72.32142857142857 29.339285714285715Q 75 26.66071428571429 77.67857142857143 29.339285714285715L 77.67857142857143 70L 72.32142857142857 70" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2d82f7)" pathTo="M 72.32142857142857 70L 72.32142857142857 29.339285714285715Q 75 26.66071428571429 77.67857142857143 29.339285714285715L 77.67857142857143 70L 72.32142857142857 70" pathFrom="M 72.32142857142857 70L 72.32142857142857 70L 77.67857142857143 70L 77.67857142857143 70L 72.32142857142857 70" cy="28" cx="93.75" j="3" val="12" barHeight="42" barWidth="5.357142857142857"></path>
                                            <path id="SvgjsPath2629" d="M 93.75 70L 93.75 1.3392857142857142Q 96.42857142857143 -1.3392857142857142 99.10714285714286 1.3392857142857142L 99.10714285714286 70L 93.75 70" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2d82f7)" pathTo="M 93.75 70L 93.75 1.3392857142857142Q 96.42857142857143 -1.3392857142857142 99.10714285714286 1.3392857142857142L 99.10714285714286 70L 93.75 70" pathFrom="M 93.75 70L 93.75 70L 99.10714285714286 70L 99.10714285714286 70L 93.75 70" cy="0" cx="115.17857142857143" j="4" val="20" barHeight="70" barWidth="5.357142857142857"></path>
                                            <path id="SvgjsPath2630" d="M 115.17857142857143 70L 115.17857142857143 22.339285714285715Q 117.85714285714286 19.66071428571429 120.53571428571429 22.339285714285715L 120.53571428571429 70L 115.17857142857143 70" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2d82f7)" pathTo="M 115.17857142857143 70L 115.17857142857143 22.339285714285715Q 117.85714285714286 19.66071428571429 120.53571428571429 22.339285714285715L 120.53571428571429 70L 115.17857142857143 70" pathFrom="M 115.17857142857143 70L 115.17857142857143 70L 120.53571428571429 70L 120.53571428571429 70L 115.17857142857143 70" cy="21" cx="136.60714285714286" j="5" val="14" barHeight="49" barWidth="5.357142857142857"></path>
                                            <path id="SvgjsPath2631" d="M 136.60714285714286 70L 136.60714285714286 46.839285714285715Q 139.28571428571428 44.160714285714285 141.96428571428572 46.839285714285715L 141.96428571428572 70L 136.60714285714286 70" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2d82f7)" pathTo="M 136.60714285714286 70L 136.60714285714286 46.839285714285715Q 139.28571428571428 44.160714285714285 141.96428571428572 46.839285714285715L 141.96428571428572 70L 136.60714285714286 70" pathFrom="M 136.60714285714286 70L 136.60714285714286 70L 141.96428571428572 70L 141.96428571428572 70L 136.60714285714286 70" cy="45.5" cx="158.03571428571428" j="6" val="7" barHeight="24.5" barWidth="5.357142857142857"></path>
                                        </g>
                                        <g id="SvgjsG2624" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine2645" x1="0" y1="0" x2="150" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine2646" x1="0" y1="0" x2="150" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG2647" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG2648" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG2649" class="apexcharts-point-annotations"></g>
                                </g>
                                <g id="SvgjsG2634" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                            </svg>
                            <div class="apexcharts-legend"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 255, 255);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 151px; height: 71px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>