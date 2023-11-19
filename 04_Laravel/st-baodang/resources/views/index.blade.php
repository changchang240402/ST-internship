@extends('default')

@section('content')

    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Congratulations John! 🎉</h5>
                            <p class="mb-4">
                                You have done <span class="fw-medium">72%</span> more sales today. Check your new badge
                                in
                                your profile.
                            </p>

                            <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                 alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                 data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success"
                                         class="rounded">
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-medium d-block mb-1">Profit</span>
                            <h3 class="card-title mb-2">$12,628</h3>
                            <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card"
                                         class="rounded">
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span>Sales</span>
                            <h3 class="card-title text-nowrap mb-1">$4,679</h3>
                            <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Revenue -->
        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                        <div id="totalRevenueChart" class="px-2" style="min-height: 315px;">
                            <div id="apexchartsrecyafi8"
                                 class="apexcharts-canvas apexchartsrecyafi8 apexcharts-theme-light"
                                 style="width: 512px; height: 300px;">
                                <svg id="SvgjsSvg1571" width="512" height="300" xmlns="http://www.w3.org/2000/svg"
                                     version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                     transform="translate(0, 0)" style="background: transparent;">
                                    <foreignObject x="0" y="0" width="512" height="300">
                                        <div class="apexcharts-legend apexcharts-align-left apx-legend-position-top"
                                             xmlns="http://www.w3.org/1999/xhtml"
                                             style="right: 0px; position: absolute; left: 0px; top: 4px; max-height: 150px;">
                                            <div class="apexcharts-legend-series" rel="1" seriesname="2021"
                                                 data:collapsed="false" style="margin: 2px 10px;"><span
                                                    class="apexcharts-legend-marker" rel="1" data:collapsed="false"
                                                    style="background: rgb(105, 108, 255) !important; color: rgb(105, 108, 255); height: 8px; width: 8px; left: -3px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                    class="apexcharts-legend-text" rel="1" i="0"
                                                    data:default-text="2021" data:collapsed="false"
                                                    style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">2021</span>
                                            </div>
                                            <div class="apexcharts-legend-series" rel="2" seriesname="2020"
                                                 data:collapsed="false" style="margin: 2px 10px;"><span
                                                    class="apexcharts-legend-marker" rel="2" data:collapsed="false"
                                                    style="background: rgb(3, 195, 236) !important; color: rgb(3, 195, 236); height: 8px; width: 8px; left: -3px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                    class="apexcharts-legend-text" rel="2" i="1"
                                                    data:default-text="2020" data:collapsed="false"
                                                    style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">2020</span>
                                            </div>
                                        </div>
                                        <style type="text/css">

                                            .apexcharts-legend {
                                                display: flex;
                                                overflow: auto;
                                                padding: 0 10px;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom, .apexcharts-legend.apx-legend-position-top {
                                                flex-wrap: wrap
                                            }

                                            .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
                                                flex-direction: column;
                                                bottom: 0;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left, .apexcharts-legend.apx-legend-position-top.apexcharts-align-left, .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
                                                justify-content: flex-start;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center, .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                justify-content: center;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right, .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                justify-content: flex-end;
                                            }

                                            .apexcharts-legend-series {
                                                cursor: pointer;
                                                line-height: normal;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series, .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                                                display: flex;
                                                align-items: center;
                                            }

                                            .apexcharts-legend-text {
                                                position: relative;
                                                font-size: 14px;
                                            }

                                            .apexcharts-legend-text *, .apexcharts-legend-marker * {
                                                pointer-events: none;
                                            }

                                            .apexcharts-legend-marker {
                                                position: relative;
                                                display: inline-block;
                                                cursor: pointer;
                                                margin-right: 3px;
                                                border-style: solid;
                                            }

                                            .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series, .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                                display: inline-block;
                                            }

                                            .apexcharts-legend-series.apexcharts-no-click {
                                                cursor: auto;
                                            }

                                            .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {
                                                display: none !important;
                                            }

                                            .apexcharts-inactive-legend {
                                                opacity: 0.45;
                                            }</style>
                                    </foreignObject>
                                    <g id="SvgjsG1573" class="apexcharts-inner apexcharts-graphical"
                                       transform="translate(53.7890625, 52)">
                                        <defs id="SvgjsDefs1572">
                                            <linearGradient id="SvgjsLinearGradient1577" x1="0" y1="0" x2="0" y2="1">
                                                <stop id="SvgjsStop1578" stop-opacity="0.4"
                                                      stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                <stop id="SvgjsStop1579" stop-opacity="0.5"
                                                      stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                <stop id="SvgjsStop1580" stop-opacity="0.5"
                                                      stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            </linearGradient>
                                            <clipPath id="gridRectMaskrecyafi8">
                                                <rect id="SvgjsRect1582" width="448.2109375" height="222.73" x="-5"
                                                      y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                      stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMaskrecyafi8"></clipPath>
                                            <clipPath id="nonForecastMaskrecyafi8"></clipPath>
                                            <clipPath id="gridRectMarkerMaskrecyafi8">
                                                <rect id="SvgjsRect1583" width="442.2109375" height="220.73" x="-2"
                                                      y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                      stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                        </defs>
                                        <rect id="SvgjsRect1581" width="21.910546875" height="216.73" x="0" y="0" rx="0"
                                              ry="0" opacity="1" stroke-width="0" stroke-dasharray="3"
                                              fill="url(#SvgjsLinearGradient1577)" class="apexcharts-xcrosshairs"
                                              y2="216.73" filter="none" fill-opacity="0.9"></rect>
                                        <g id="SvgjsG1603" class="apexcharts-xaxis" transform="translate(0, 0)">
                                            <g id="SvgjsG1604" class="apexcharts-xaxis-texts-g"
                                               transform="translate(0, -4)">
                                                <text id="SvgjsText1606" font-family="Helvetica, Arial, sans-serif"
                                                      x="31.30078125" y="245.73" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="13px" font-weight="400"
                                                      fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                      style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1607">Jan</tspan>
                                                    <title>Jan</title></text>
                                                <text id="SvgjsText1609" font-family="Helvetica, Arial, sans-serif"
                                                      x="93.90234375" y="245.73" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="13px" font-weight="400"
                                                      fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                      style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1610">Feb</tspan>
                                                    <title>Feb</title></text>
                                                <text id="SvgjsText1612" font-family="Helvetica, Arial, sans-serif"
                                                      x="156.50390625" y="245.73" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="13px" font-weight="400"
                                                      fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                      style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1613">Mar</tspan>
                                                    <title>Mar</title></text>
                                                <text id="SvgjsText1615" font-family="Helvetica, Arial, sans-serif"
                                                      x="219.10546875" y="245.73" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="13px" font-weight="400"
                                                      fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                      style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1616">Apr</tspan>
                                                    <title>Apr</title></text>
                                                <text id="SvgjsText1618" font-family="Helvetica, Arial, sans-serif"
                                                      x="281.70703125" y="245.73" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="13px" font-weight="400"
                                                      fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                      style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1619">May</tspan>
                                                    <title>May</title></text>
                                                <text id="SvgjsText1621" font-family="Helvetica, Arial, sans-serif"
                                                      x="344.30859375" y="245.73" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="13px" font-weight="400"
                                                      fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                      style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1622">Jun</tspan>
                                                    <title>Jun</title></text>
                                                <text id="SvgjsText1624" font-family="Helvetica, Arial, sans-serif"
                                                      x="406.91015625" y="245.73" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="13px" font-weight="400"
                                                      fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                      style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1625">Jul</tspan>
                                                    <title>Jul</title></text>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1640" class="apexcharts-grid">
                                            <g id="SvgjsG1641" class="apexcharts-gridlines-horizontal">
                                                <line id="SvgjsLine1643" x1="0" y1="0" x2="438.2109375" y2="0"
                                                      stroke="#eceef1" stroke-dasharray="0" stroke-linecap="butt"
                                                      class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1644" x1="0" y1="43.346" x2="438.2109375" y2="43.346"
                                                      stroke="#eceef1" stroke-dasharray="0" stroke-linecap="butt"
                                                      class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1645" x1="0" y1="86.692" x2="438.2109375" y2="86.692"
                                                      stroke="#eceef1" stroke-dasharray="0" stroke-linecap="butt"
                                                      class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1646" x1="0" y1="130.03799999999998" x2="438.2109375"
                                                      y2="130.03799999999998" stroke="#eceef1" stroke-dasharray="0"
                                                      stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1647" x1="0" y1="173.384" x2="438.2109375"
                                                      y2="173.384" stroke="#eceef1" stroke-dasharray="0"
                                                      stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1648" x1="0" y1="216.73" x2="438.2109375" y2="216.73"
                                                      stroke="#eceef1" stroke-dasharray="0" stroke-linecap="butt"
                                                      class="apexcharts-gridline"></line>
                                            </g>
                                            <g id="SvgjsG1642" class="apexcharts-gridlines-vertical"></g>
                                            <line id="SvgjsLine1650" x1="0" y1="216.73" x2="438.2109375" y2="216.73"
                                                  stroke="transparent" stroke-dasharray="0"
                                                  stroke-linecap="butt"></line>
                                            <line id="SvgjsLine1649" x1="0" y1="1" x2="0" y2="216.73"
                                                  stroke="transparent" stroke-dasharray="0"
                                                  stroke-linecap="butt"></line>
                                        </g>
                                        <g id="SvgjsG1584" class="apexcharts-bar-series apexcharts-plot-series">
                                            <g id="SvgjsG1585" class="apexcharts-series" seriesName="2021" rel="1"
                                               data:realIndex="0">
                                                <path id="SvgjsPath1587"
                                                      d="M 20.3455078125 120.03800000000001L 20.3455078125 62.01520000000002Q 20.3455078125 52.01520000000002 30.3455078125 52.01520000000002L 26.256054687499997 52.01520000000002Q 36.2560546875 52.01520000000002 36.2560546875 62.01520000000002L 36.2560546875 62.01520000000002L 36.2560546875 120.03800000000001Q 36.2560546875 130.038 26.256054687499997 130.038L 30.3455078125 130.038Q 20.3455078125 130.038 20.3455078125 120.03800000000001z"
                                                      fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                      stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                      stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                      clip-path="url(#gridRectMaskrecyafi8)"
                                                      pathTo="M 20.3455078125 120.03800000000001L 20.3455078125 62.01520000000002Q 20.3455078125 52.01520000000002 30.3455078125 52.01520000000002L 26.256054687499997 52.01520000000002Q 36.2560546875 52.01520000000002 36.2560546875 62.01520000000002L 36.2560546875 62.01520000000002L 36.2560546875 120.03800000000001Q 36.2560546875 130.038 26.256054687499997 130.038L 30.3455078125 130.038Q 20.3455078125 130.038 20.3455078125 120.03800000000001z"
                                                      pathFrom="M 20.3455078125 120.03800000000001L 20.3455078125 120.03800000000001L 36.2560546875 120.03800000000001L 36.2560546875 120.03800000000001L 36.2560546875 120.03800000000001L 36.2560546875 120.03800000000001L 36.2560546875 120.03800000000001L 20.3455078125 120.03800000000001"
                                                      cy="52.01520000000002" cx="79.9470703125" j="0" val="18"
                                                      barHeight="78.02279999999999" barWidth="21.910546875"></path>
                                                <path id="SvgjsPath1588"
                                                      d="M 82.9470703125 120.03800000000001L 82.9470703125 109.69580000000002Q 82.9470703125 99.69580000000002 92.9470703125 99.69580000000002L 88.85761718750001 99.69580000000002Q 98.85761718750001 99.69580000000002 98.85761718750001 109.69580000000002L 98.85761718750001 109.69580000000002L 98.85761718750001 120.03800000000001Q 98.85761718750001 130.038 88.85761718750001 130.038L 92.9470703125 130.038Q 82.9470703125 130.038 82.9470703125 120.03800000000001z"
                                                      fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                      stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                      stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                      clip-path="url(#gridRectMaskrecyafi8)"
                                                      pathTo="M 82.9470703125 120.03800000000001L 82.9470703125 109.69580000000002Q 82.9470703125 99.69580000000002 92.9470703125 99.69580000000002L 88.85761718750001 99.69580000000002Q 98.85761718750001 99.69580000000002 98.85761718750001 109.69580000000002L 98.85761718750001 109.69580000000002L 98.85761718750001 120.03800000000001Q 98.85761718750001 130.038 88.85761718750001 130.038L 92.9470703125 130.038Q 82.9470703125 130.038 82.9470703125 120.03800000000001z"
                                                      pathFrom="M 82.9470703125 120.03800000000001L 82.9470703125 120.03800000000001L 98.85761718750001 120.03800000000001L 98.85761718750001 120.03800000000001L 98.85761718750001 120.03800000000001L 98.85761718750001 120.03800000000001L 98.85761718750001 120.03800000000001L 82.9470703125 120.03800000000001"
                                                      cy="99.69580000000002" cx="142.5486328125" j="1" val="7"
                                                      barHeight="30.3422" barWidth="21.910546875"></path>
                                                <path id="SvgjsPath1589"
                                                      d="M 145.5486328125 120.03800000000001L 145.5486328125 75.01900000000002Q 145.5486328125 65.01900000000002 155.5486328125 65.01900000000002L 151.45917968749998 65.01900000000002Q 161.45917968749998 65.01900000000002 161.45917968749998 75.01900000000002L 161.45917968749998 75.01900000000002L 161.45917968749998 120.03800000000001Q 161.45917968749998 130.038 151.45917968749998 130.038L 155.5486328125 130.038Q 145.5486328125 130.038 145.5486328125 120.03800000000001z"
                                                      fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                      stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                      stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                      clip-path="url(#gridRectMaskrecyafi8)"
                                                      pathTo="M 145.5486328125 120.03800000000001L 145.5486328125 75.01900000000002Q 145.5486328125 65.01900000000002 155.5486328125 65.01900000000002L 151.45917968749998 65.01900000000002Q 161.45917968749998 65.01900000000002 161.45917968749998 75.01900000000002L 161.45917968749998 75.01900000000002L 161.45917968749998 120.03800000000001Q 161.45917968749998 130.038 151.45917968749998 130.038L 155.5486328125 130.038Q 145.5486328125 130.038 145.5486328125 120.03800000000001z"
                                                      pathFrom="M 145.5486328125 120.03800000000001L 145.5486328125 120.03800000000001L 161.45917968749998 120.03800000000001L 161.45917968749998 120.03800000000001L 161.45917968749998 120.03800000000001L 161.45917968749998 120.03800000000001L 161.45917968749998 120.03800000000001L 145.5486328125 120.03800000000001"
                                                      cy="65.01900000000002" cx="205.1501953125" j="2" val="15"
                                                      barHeight="65.01899999999999" barWidth="21.910546875"></path>
                                                <path id="SvgjsPath1590"
                                                      d="M 208.1501953125 120.03800000000001L 208.1501953125 14.334600000000023Q 208.1501953125 4.334600000000023 218.1501953125 4.334600000000023L 214.06074218749998 4.334600000000023Q 224.06074218749998 4.334600000000023 224.06074218749998 14.334600000000023L 224.06074218749998 14.334600000000023L 224.06074218749998 120.03800000000001Q 224.06074218749998 130.038 214.06074218749998 130.038L 218.1501953125 130.038Q 208.1501953125 130.038 208.1501953125 120.03800000000001z"
                                                      fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                      stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                      stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                      clip-path="url(#gridRectMaskrecyafi8)"
                                                      pathTo="M 208.1501953125 120.03800000000001L 208.1501953125 14.334600000000023Q 208.1501953125 4.334600000000023 218.1501953125 4.334600000000023L 214.06074218749998 4.334600000000023Q 224.06074218749998 4.334600000000023 224.06074218749998 14.334600000000023L 224.06074218749998 14.334600000000023L 224.06074218749998 120.03800000000001Q 224.06074218749998 130.038 214.06074218749998 130.038L 218.1501953125 130.038Q 208.1501953125 130.038 208.1501953125 120.03800000000001z"
                                                      pathFrom="M 208.1501953125 120.03800000000001L 208.1501953125 120.03800000000001L 224.06074218749998 120.03800000000001L 224.06074218749998 120.03800000000001L 224.06074218749998 120.03800000000001L 224.06074218749998 120.03800000000001L 224.06074218749998 120.03800000000001L 208.1501953125 120.03800000000001"
                                                      cy="4.334600000000023" cx="267.7517578125" j="3" val="29"
                                                      barHeight="125.70339999999999" barWidth="21.910546875"></path>
                                                <path id="SvgjsPath1591"
                                                      d="M 270.7517578125 120.03800000000001L 270.7517578125 62.01520000000002Q 270.7517578125 52.01520000000002 280.7517578125 52.01520000000002L 276.6623046875 52.01520000000002Q 286.6623046875 52.01520000000002 286.6623046875 62.01520000000002L 286.6623046875 62.01520000000002L 286.6623046875 120.03800000000001Q 286.6623046875 130.038 276.6623046875 130.038L 280.7517578125 130.038Q 270.7517578125 130.038 270.7517578125 120.03800000000001z"
                                                      fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                      stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                      stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                      clip-path="url(#gridRectMaskrecyafi8)"
                                                      pathTo="M 270.7517578125 120.03800000000001L 270.7517578125 62.01520000000002Q 270.7517578125 52.01520000000002 280.7517578125 52.01520000000002L 276.6623046875 52.01520000000002Q 286.6623046875 52.01520000000002 286.6623046875 62.01520000000002L 286.6623046875 62.01520000000002L 286.6623046875 120.03800000000001Q 286.6623046875 130.038 276.6623046875 130.038L 280.7517578125 130.038Q 270.7517578125 130.038 270.7517578125 120.03800000000001z"
                                                      pathFrom="M 270.7517578125 120.03800000000001L 270.7517578125 120.03800000000001L 286.6623046875 120.03800000000001L 286.6623046875 120.03800000000001L 286.6623046875 120.03800000000001L 286.6623046875 120.03800000000001L 286.6623046875 120.03800000000001L 270.7517578125 120.03800000000001"
                                                      cy="52.01520000000002" cx="330.3533203125" j="4" val="18"
                                                      barHeight="78.02279999999999" barWidth="21.910546875"></path>
                                                <path id="SvgjsPath1592"
                                                      d="M 333.3533203125 120.03800000000001L 333.3533203125 88.02280000000002Q 333.3533203125 78.02280000000002 343.3533203125 78.02280000000002L 339.2638671875 78.02280000000002Q 349.2638671875 78.02280000000002 349.2638671875 88.02280000000002L 349.2638671875 88.02280000000002L 349.2638671875 120.03800000000001Q 349.2638671875 130.038 339.2638671875 130.038L 343.3533203125 130.038Q 333.3533203125 130.038 333.3533203125 120.03800000000001z"
                                                      fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                      stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                      stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                      clip-path="url(#gridRectMaskrecyafi8)"
                                                      pathTo="M 333.3533203125 120.03800000000001L 333.3533203125 88.02280000000002Q 333.3533203125 78.02280000000002 343.3533203125 78.02280000000002L 339.2638671875 78.02280000000002Q 349.2638671875 78.02280000000002 349.2638671875 88.02280000000002L 349.2638671875 88.02280000000002L 349.2638671875 120.03800000000001Q 349.2638671875 130.038 339.2638671875 130.038L 343.3533203125 130.038Q 333.3533203125 130.038 333.3533203125 120.03800000000001z"
                                                      pathFrom="M 333.3533203125 120.03800000000001L 333.3533203125 120.03800000000001L 349.2638671875 120.03800000000001L 349.2638671875 120.03800000000001L 349.2638671875 120.03800000000001L 349.2638671875 120.03800000000001L 349.2638671875 120.03800000000001L 333.3533203125 120.03800000000001"
                                                      cy="78.02280000000002" cx="392.9548828125" j="5" val="12"
                                                      barHeight="52.01519999999999" barWidth="21.910546875"></path>
                                                <path id="SvgjsPath1593"
                                                      d="M 395.9548828125 120.03800000000001L 395.9548828125 101.02660000000002Q 395.9548828125 91.02660000000002 405.9548828125 91.02660000000002L 401.8654296875 91.02660000000002Q 411.8654296875 91.02660000000002 411.8654296875 101.02660000000002L 411.8654296875 101.02660000000002L 411.8654296875 120.03800000000001Q 411.8654296875 130.038 401.8654296875 130.038L 405.9548828125 130.038Q 395.9548828125 130.038 395.9548828125 120.03800000000001z"
                                                      fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                      stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                      stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                      clip-path="url(#gridRectMaskrecyafi8)"
                                                      pathTo="M 395.9548828125 120.03800000000001L 395.9548828125 101.02660000000002Q 395.9548828125 91.02660000000002 405.9548828125 91.02660000000002L 401.8654296875 91.02660000000002Q 411.8654296875 91.02660000000002 411.8654296875 101.02660000000002L 411.8654296875 101.02660000000002L 411.8654296875 120.03800000000001Q 411.8654296875 130.038 401.8654296875 130.038L 405.9548828125 130.038Q 395.9548828125 130.038 395.9548828125 120.03800000000001z"
                                                      pathFrom="M 395.9548828125 120.03800000000001L 395.9548828125 120.03800000000001L 411.8654296875 120.03800000000001L 411.8654296875 120.03800000000001L 411.8654296875 120.03800000000001L 411.8654296875 120.03800000000001L 411.8654296875 120.03800000000001L 395.9548828125 120.03800000000001"
                                                      cy="91.02660000000002" cx="455.5564453125" j="6" val="9"
                                                      barHeight="39.011399999999995" barWidth="21.910546875"></path>
                                            </g>
                                            <g id="SvgjsG1594" class="apexcharts-series" seriesName="2020" rel="2"
                                               data:realIndex="1">
                                                <path id="SvgjsPath1596"
                                                      d="M 20.3455078125 150.038L 20.3455078125 186.3878Q 20.3455078125 196.3878 30.3455078125 196.3878L 26.256054687499997 196.3878Q 36.2560546875 196.3878 36.2560546875 186.3878L 36.2560546875 186.3878L 36.2560546875 150.038Q 36.2560546875 140.038 26.256054687499997 140.038L 30.3455078125 140.038Q 20.3455078125 140.038 20.3455078125 150.038z"
                                                      fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                      stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                      stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                      clip-path="url(#gridRectMaskrecyafi8)"
                                                      pathTo="M 20.3455078125 150.038L 20.3455078125 186.3878Q 20.3455078125 196.3878 30.3455078125 196.3878L 26.256054687499997 196.3878Q 36.2560546875 196.3878 36.2560546875 186.3878L 36.2560546875 186.3878L 36.2560546875 150.038Q 36.2560546875 140.038 26.256054687499997 140.038L 30.3455078125 140.038Q 20.3455078125 140.038 20.3455078125 150.038z"
                                                      pathFrom="M 20.3455078125 150.038L 20.3455078125 150.038L 36.2560546875 150.038L 36.2560546875 150.038L 36.2560546875 150.038L 36.2560546875 150.038L 36.2560546875 150.038L 20.3455078125 150.038"
                                                      cy="176.3878" cx="79.9470703125" j="0" val="-13"
                                                      barHeight="-56.349799999999995" barWidth="21.910546875"></path>
                                                <path id="SvgjsPath1597"
                                                      d="M 82.9470703125 150.038L 82.9470703125 208.0608Q 82.9470703125 218.0608 92.9470703125 218.0608L 88.85761718750001 218.0608Q 98.85761718750001 218.0608 98.85761718750001 208.0608L 98.85761718750001 208.0608L 98.85761718750001 150.038Q 98.85761718750001 140.038 88.85761718750001 140.038L 92.9470703125 140.038Q 82.9470703125 140.038 82.9470703125 150.038z"
                                                      fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                      stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                      stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                      clip-path="url(#gridRectMaskrecyafi8)"
                                                      pathTo="M 82.9470703125 150.038L 82.9470703125 208.0608Q 82.9470703125 218.0608 92.9470703125 218.0608L 88.85761718750001 218.0608Q 98.85761718750001 218.0608 98.85761718750001 208.0608L 98.85761718750001 208.0608L 98.85761718750001 150.038Q 98.85761718750001 140.038 88.85761718750001 140.038L 92.9470703125 140.038Q 82.9470703125 140.038 82.9470703125 150.038z"
                                                      pathFrom="M 82.9470703125 150.038L 82.9470703125 150.038L 98.85761718750001 150.038L 98.85761718750001 150.038L 98.85761718750001 150.038L 98.85761718750001 150.038L 98.85761718750001 150.038L 82.9470703125 150.038"
                                                      cy="198.0608" cx="142.5486328125" j="1" val="-18"
                                                      barHeight="-78.02279999999999" barWidth="21.910546875"></path>
                                                <path id="SvgjsPath1598"
                                                      d="M 145.5486328125 150.038L 145.5486328125 169.0494Q 145.5486328125 179.0494 155.5486328125 179.0494L 151.45917968749998 179.0494Q 161.45917968749998 179.0494 161.45917968749998 169.0494L 161.45917968749998 169.0494L 161.45917968749998 150.038Q 161.45917968749998 140.038 151.45917968749998 140.038L 155.5486328125 140.038Q 145.5486328125 140.038 145.5486328125 150.038z"
                                                      fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                      stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                      stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                      clip-path="url(#gridRectMaskrecyafi8)"
                                                      pathTo="M 145.5486328125 150.038L 145.5486328125 169.0494Q 145.5486328125 179.0494 155.5486328125 179.0494L 151.45917968749998 179.0494Q 161.45917968749998 179.0494 161.45917968749998 169.0494L 161.45917968749998 169.0494L 161.45917968749998 150.038Q 161.45917968749998 140.038 151.45917968749998 140.038L 155.5486328125 140.038Q 145.5486328125 140.038 145.5486328125 150.038z"
                                                      pathFrom="M 145.5486328125 150.038L 145.5486328125 150.038L 161.45917968749998 150.038L 161.45917968749998 150.038L 161.45917968749998 150.038L 161.45917968749998 150.038L 161.45917968749998 150.038L 145.5486328125 150.038"
                                                      cy="159.0494" cx="205.1501953125" j="2" val="-9"
                                                      barHeight="-39.011399999999995" barWidth="21.910546875"></path>
                                                <path id="SvgjsPath1599"
                                                      d="M 208.1501953125 150.038L 208.1501953125 190.7224Q 208.1501953125 200.7224 218.1501953125 200.7224L 214.06074218749998 200.7224Q 224.06074218749998 200.7224 224.06074218749998 190.7224L 224.06074218749998 190.7224L 224.06074218749998 150.038Q 224.06074218749998 140.038 214.06074218749998 140.038L 218.1501953125 140.038Q 208.1501953125 140.038 208.1501953125 150.038z"
                                                      fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                      stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                      stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                      clip-path="url(#gridRectMaskrecyafi8)"
                                                      pathTo="M 208.1501953125 150.038L 208.1501953125 190.7224Q 208.1501953125 200.7224 218.1501953125 200.7224L 214.06074218749998 200.7224Q 224.06074218749998 200.7224 224.06074218749998 190.7224L 224.06074218749998 190.7224L 224.06074218749998 150.038Q 224.06074218749998 140.038 214.06074218749998 140.038L 218.1501953125 140.038Q 208.1501953125 140.038 208.1501953125 150.038z"
                                                      pathFrom="M 208.1501953125 150.038L 208.1501953125 150.038L 224.06074218749998 150.038L 224.06074218749998 150.038L 224.06074218749998 150.038L 224.06074218749998 150.038L 224.06074218749998 150.038L 208.1501953125 150.038"
                                                      cy="180.7224" cx="267.7517578125" j="3" val="-14"
                                                      barHeight="-60.6844" barWidth="21.910546875"></path>
                                                <path id="SvgjsPath1600"
                                                      d="M 270.7517578125 150.038L 270.7517578125 151.711Q 270.7517578125 161.711 280.7517578125 161.711L 276.6623046875 161.711Q 286.6623046875 161.711 286.6623046875 151.711L 286.6623046875 151.711L 286.6623046875 150.038Q 286.6623046875 140.038 276.6623046875 140.038L 280.7517578125 140.038Q 270.7517578125 140.038 270.7517578125 150.038z"
                                                      fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                      stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                      stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                      clip-path="url(#gridRectMaskrecyafi8)"
                                                      pathTo="M 270.7517578125 150.038L 270.7517578125 151.711Q 270.7517578125 161.711 280.7517578125 161.711L 276.6623046875 161.711Q 286.6623046875 161.711 286.6623046875 151.711L 286.6623046875 151.711L 286.6623046875 150.038Q 286.6623046875 140.038 276.6623046875 140.038L 280.7517578125 140.038Q 270.7517578125 140.038 270.7517578125 150.038z"
                                                      pathFrom="M 270.7517578125 150.038L 270.7517578125 150.038L 286.6623046875 150.038L 286.6623046875 150.038L 286.6623046875 150.038L 286.6623046875 150.038L 286.6623046875 150.038L 270.7517578125 150.038"
                                                      cy="141.711" cx="330.3533203125" j="4" val="-5"
                                                      barHeight="-21.673" barWidth="21.910546875"></path>
                                                <path id="SvgjsPath1601"
                                                      d="M 333.3533203125 150.038L 333.3533203125 203.7262Q 333.3533203125 213.7262 343.3533203125 213.7262L 339.2638671875 213.7262Q 349.2638671875 213.7262 349.2638671875 203.7262L 349.2638671875 203.7262L 349.2638671875 150.038Q 349.2638671875 140.038 339.2638671875 140.038L 343.3533203125 140.038Q 333.3533203125 140.038 333.3533203125 150.038z"
                                                      fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                      stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                      stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                      clip-path="url(#gridRectMaskrecyafi8)"
                                                      pathTo="M 333.3533203125 150.038L 333.3533203125 203.7262Q 333.3533203125 213.7262 343.3533203125 213.7262L 339.2638671875 213.7262Q 349.2638671875 213.7262 349.2638671875 203.7262L 349.2638671875 203.7262L 349.2638671875 150.038Q 349.2638671875 140.038 339.2638671875 140.038L 343.3533203125 140.038Q 333.3533203125 140.038 333.3533203125 150.038z"
                                                      pathFrom="M 333.3533203125 150.038L 333.3533203125 150.038L 349.2638671875 150.038L 349.2638671875 150.038L 349.2638671875 150.038L 349.2638671875 150.038L 349.2638671875 150.038L 333.3533203125 150.038"
                                                      cy="193.7262" cx="392.9548828125" j="5" val="-17"
                                                      barHeight="-73.6882" barWidth="21.910546875"></path>
                                                <path id="SvgjsPath1602"
                                                      d="M 395.9548828125 150.038L 395.9548828125 195.05700000000002Q 395.9548828125 205.05700000000002 405.9548828125 205.05700000000002L 401.8654296875 205.05700000000002Q 411.8654296875 205.05700000000002 411.8654296875 195.05700000000002L 411.8654296875 195.05700000000002L 411.8654296875 150.038Q 411.8654296875 140.038 401.8654296875 140.038L 405.9548828125 140.038Q 395.9548828125 140.038 395.9548828125 150.038z"
                                                      fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                      stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                      stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                      clip-path="url(#gridRectMaskrecyafi8)"
                                                      pathTo="M 395.9548828125 150.038L 395.9548828125 195.05700000000002Q 395.9548828125 205.05700000000002 405.9548828125 205.05700000000002L 401.8654296875 205.05700000000002Q 411.8654296875 205.05700000000002 411.8654296875 195.05700000000002L 411.8654296875 195.05700000000002L 411.8654296875 150.038Q 411.8654296875 140.038 401.8654296875 140.038L 405.9548828125 140.038Q 395.9548828125 140.038 395.9548828125 150.038z"
                                                      pathFrom="M 395.9548828125 150.038L 395.9548828125 150.038L 411.8654296875 150.038L 411.8654296875 150.038L 411.8654296875 150.038L 411.8654296875 150.038L 411.8654296875 150.038L 395.9548828125 150.038"
                                                      cy="185.05700000000002" cx="455.5564453125" j="6" val="-15"
                                                      barHeight="-65.01899999999999" barWidth="21.910546875"></path>
                                            </g>
                                            <g id="SvgjsG1586" class="apexcharts-datalabels" data:realIndex="0"></g>
                                            <g id="SvgjsG1595" class="apexcharts-datalabels" data:realIndex="1"></g>
                                        </g>
                                        <line id="SvgjsLine1651" x1="0" y1="0" x2="438.2109375" y2="0" stroke="#b6b6b6"
                                              stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                              class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1652" x1="0" y1="0" x2="438.2109375" y2="0"
                                              stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                              class="apexcharts-ycrosshairs-hidden"></line>
                                        <g id="SvgjsG1653" class="apexcharts-yaxis-annotations"></g>
                                        <g id="SvgjsG1654" class="apexcharts-xaxis-annotations"></g>
                                        <g id="SvgjsG1655" class="apexcharts-point-annotations"></g>
                                    </g>
                                    <g id="SvgjsG1626" class="apexcharts-yaxis" rel="0"
                                       transform="translate(15.7890625, 0)">
                                        <g id="SvgjsG1627" class="apexcharts-yaxis-texts-g">
                                            <text id="SvgjsText1628" font-family="Helvetica, Arial, sans-serif" x="20"
                                                  y="53.5" text-anchor="end" dominant-baseline="auto" font-size="13px"
                                                  font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-yaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1629">30</tspan>
                                                <title>30</title></text>
                                            <text id="SvgjsText1630" font-family="Helvetica, Arial, sans-serif" x="20"
                                                  y="96.846" text-anchor="end" dominant-baseline="auto" font-size="13px"
                                                  font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-yaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1631">20</tspan>
                                                <title>20</title></text>
                                            <text id="SvgjsText1632" font-family="Helvetica, Arial, sans-serif" x="20"
                                                  y="140.192" text-anchor="end" dominant-baseline="auto"
                                                  font-size="13px" font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-yaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1633">10</tspan>
                                                <title>10</title></text>
                                            <text id="SvgjsText1634" font-family="Helvetica, Arial, sans-serif" x="20"
                                                  y="183.538" text-anchor="end" dominant-baseline="auto"
                                                  font-size="13px" font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-yaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1635">0</tspan>
                                                <title>0</title></text>
                                            <text id="SvgjsText1636" font-family="Helvetica, Arial, sans-serif" x="20"
                                                  y="226.88400000000001" text-anchor="end" dominant-baseline="auto"
                                                  font-size="13px" font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-yaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1637">-10</tspan>
                                                <title>-10</title></text>
                                            <text id="SvgjsText1638" font-family="Helvetica, Arial, sans-serif" x="20"
                                                  y="270.23" text-anchor="end" dominant-baseline="auto" font-size="13px"
                                                  font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-yaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1639">-20</tspan>
                                                <title>-20</title></text>
                                        </g>
                                    </g>
                                    <g id="SvgjsG1574" class="apexcharts-annotations"></g>
                                </svg>
                                <div class="apexcharts-tooltip apexcharts-theme-light">
                                    <div class="apexcharts-tooltip-title"
                                         style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                    <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(105, 108, 255);"></span>
                                        <div class="apexcharts-tooltip-text"
                                             style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(3, 195, 236);"></span>
                                        <div class="apexcharts-tooltip-text"
                                             style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                    <div class="apexcharts-yaxistooltip-text"></div>
                                </div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 529px; height: 377px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                            id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        2022
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                        <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                        <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                        <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="growthChart" style="min-height: 154.875px;">
                            <div id="apexchartsjq60me3t"
                                 class="apexcharts-canvas apexchartsjq60me3t apexcharts-theme-light"
                                 style="width: 264px; height: 154.875px;">
                                <svg id="SvgjsSvg1656" width="264" height="154.875" xmlns="http://www.w3.org/2000/svg"
                                     version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                     transform="translate(0, 0)" style="background: transparent;">
                                    <g id="SvgjsG1658" class="apexcharts-inner apexcharts-graphical"
                                       transform="translate(25, -25)">
                                        <defs id="SvgjsDefs1657">
                                            <clipPath id="gridRectMaskjq60me3t">
                                                <rect id="SvgjsRect1660" width="222" height="285" x="-3" y="-1" rx="0"
                                                      ry="0" opacity="1" stroke-width="0" stroke="none"
                                                      stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMaskjq60me3t"></clipPath>
                                            <clipPath id="nonForecastMaskjq60me3t"></clipPath>
                                            <clipPath id="gridRectMarkerMaskjq60me3t">
                                                <rect id="SvgjsRect1661" width="220" height="287" x="-2" y="-2" rx="0"
                                                      ry="0" opacity="1" stroke-width="0" stroke="none"
                                                      stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <linearGradient id="SvgjsLinearGradient1666" x1="1" y1="0" x2="0" y2="1">
                                                <stop id="SvgjsStop1667" stop-opacity="1"
                                                      stop-color="rgba(105,108,255,1)" offset="0.3"></stop>
                                                <stop id="SvgjsStop1668" stop-opacity="0.6"
                                                      stop-color="rgba(255,255,255,0.6)" offset="0.7"></stop>
                                                <stop id="SvgjsStop1669" stop-opacity="0.6"
                                                      stop-color="rgba(255,255,255,0.6)" offset="1"></stop>
                                            </linearGradient>
                                            <linearGradient id="SvgjsLinearGradient1677" x1="1" y1="0" x2="0" y2="1">
                                                <stop id="SvgjsStop1678" stop-opacity="1"
                                                      stop-color="rgba(105,108,255,1)" offset="0.3"></stop>
                                                <stop id="SvgjsStop1679" stop-opacity="0.6"
                                                      stop-color="rgba(105,108,255,0.6)" offset="0.7"></stop>
                                                <stop id="SvgjsStop1680" stop-opacity="0.6"
                                                      stop-color="rgba(105,108,255,0.6)" offset="1"></stop>
                                            </linearGradient>
                                        </defs>
                                        <g id="SvgjsG1662" class="apexcharts-radialbar">
                                            <g id="SvgjsG1663">
                                                <g id="SvgjsG1664" class="apexcharts-tracks">
                                                    <g id="SvgjsG1665"
                                                       class="apexcharts-radialbar-track apexcharts-track" rel="1">
                                                        <path id="apexcharts-radialbarTrack-0"
                                                              d="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 142.16493902439026 167.17541022773656"
                                                              fill="none" fill-opacity="1"
                                                              stroke="rgba(255,255,255,0.85)" stroke-opacity="1"
                                                              stroke-linecap="butt" stroke-width="17.357317073170734"
                                                              stroke-dasharray="0" class="apexcharts-radialbar-area"
                                                              data:pathOrig="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 142.16493902439026 167.17541022773656"></path>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1671">
                                                    <g id="SvgjsG1676"
                                                       class="apexcharts-series apexcharts-radial-series"
                                                       seriesName="Growth" rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath1681"
                                                              d="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 175.95555982735613 100.85758285229481"
                                                              fill="none" fill-opacity="0.85"
                                                              stroke="url(#SvgjsLinearGradient1677)" stroke-opacity="1"
                                                              stroke-linecap="butt" stroke-width="17.357317073170734"
                                                              stroke-dasharray="5"
                                                              class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                              data:angle="234" data:value="78" index="0" j="0"
                                                              data:pathOrig="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 175.95555982735613 100.85758285229481"></path>
                                                    </g>
                                                    <circle id="SvgjsCircle1672" r="54.65121951219512" cx="108" cy="108"
                                                            class="apexcharts-radialbar-hollow"
                                                            fill="transparent"></circle>
                                                    <g id="SvgjsG1673" class="apexcharts-datalabels-group"
                                                       transform="translate(0, 0) scale(1)" style="opacity: 1;">
                                                        <text id="SvgjsText1674" font-family="Public Sans" x="108"
                                                              y="123" text-anchor="middle" dominant-baseline="auto"
                                                              font-size="15px" font-weight="500" fill="#566a7f"
                                                              class="apexcharts-text apexcharts-datalabel-label"
                                                              style="font-family: &quot;Public Sans&quot;;">Growth
                                                        </text>
                                                        <text id="SvgjsText1675" font-family="Public Sans" x="108"
                                                              y="99" text-anchor="middle" dominant-baseline="auto"
                                                              font-size="22px" font-weight="500" fill="#566a7f"
                                                              class="apexcharts-text apexcharts-datalabel-value"
                                                              style="font-family: &quot;Public Sans&quot;;">78%
                                                        </text>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                        <line id="SvgjsLine1682" x1="0" y1="0" x2="216" y2="0" stroke="#b6b6b6"
                                              stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                              class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1683" x1="0" y1="0" x2="216" y2="0" stroke-dasharray="0"
                                              stroke-width="0" stroke-linecap="butt"
                                              class="apexcharts-ycrosshairs-hidden"></line>
                                    </g>
                                    <g id="SvgjsG1659" class="apexcharts-annotations"></g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                            </div>
                        </div>
                        <div class="text-center fw-medium pt-3 mb-2">62% Company Growth</div>

                        <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                            <div class="d-flex">
                                <div class="me-2">
                                    <span class="badge bg-label-primary p-2"><i
                                            class="bx bx-dollar text-primary"></i></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <small>2022</small>
                                    <h6 class="mb-0">$32.5k</h6>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="me-2">
                                    <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <small>2021</small>
                                    <h6 class="mb-0">$41.2k</h6>
                                </div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 265px; height: 377px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Total Revenue -->
        <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded">
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="d-block mb-1">Payments</span>
                            <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                            <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                         class="rounded">
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-medium d-block mb-1">Transactions</span>
                            <h3 class="card-title mb-2">$14,857</h3>
                            <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                        </div>
                    </div>
                </div>
                <!-- </div>
<div class="row"> -->
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3"
                                 style="position: relative;">
                                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                    <div class="card-title">
                                        <h5 class="text-nowrap mb-2">Profile Report</h5>
                                        <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                                    </div>
                                    <div class="mt-sm-auto">
                                        <small class="text-success text-nowrap fw-medium"><i
                                                class="bx bx-chevron-up"></i> 68.2%</small>
                                        <h3 class="mb-0">$84,686k</h3>
                                    </div>
                                </div>
                                <div id="profileReportChart" style="min-height: 80px;">
                                    <div id="apexcharts8a6o9lys"
                                         class="apexcharts-canvas apexcharts8a6o9lys apexcharts-theme-light"
                                         style="width: 197px; height: 80px;">
                                        <svg id="SvgjsSvg1685" width="197" height="80"
                                             xmlns="http://www.w3.org/2000/svg" version="1.1"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                             class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                             transform="translate(0, 0)" style="background: transparent;">
                                            <g id="SvgjsG1687" class="apexcharts-inner apexcharts-graphical"
                                               transform="translate(0, 0)">
                                                <defs id="SvgjsDefs1686">
                                                    <clipPath id="gridRectMask8a6o9lys">
                                                        <rect id="SvgjsRect1692" width="198" height="85" x="-4.5"
                                                              y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0"
                                                              stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMask8a6o9lys"></clipPath>
                                                    <clipPath id="nonForecastMask8a6o9lys"></clipPath>
                                                    <clipPath id="gridRectMarkerMask8a6o9lys">
                                                        <rect id="SvgjsRect1693" width="193" height="84" x="-2" y="-2"
                                                              rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                              stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <filter id="SvgjsFilter1699" filterUnits="userSpaceOnUse"
                                                            width="200%" height="200%" x="-50%" y="-50%">
                                                        <feFlood id="SvgjsFeFlood1700" flood-color="#ffab00"
                                                                 flood-opacity="0.15" result="SvgjsFeFlood1700Out"
                                                                 in="SourceGraphic"></feFlood>
                                                        <feComposite id="SvgjsFeComposite1701" in="SvgjsFeFlood1700Out"
                                                                     in2="SourceAlpha" operator="in"
                                                                     result="SvgjsFeComposite1701Out"></feComposite>
                                                        <feOffset id="SvgjsFeOffset1702" dx="5" dy="10"
                                                                  result="SvgjsFeOffset1702Out"
                                                                  in="SvgjsFeComposite1701Out"></feOffset>
                                                        <feGaussianBlur id="SvgjsFeGaussianBlur1703" stdDeviation="3 "
                                                                        result="SvgjsFeGaussianBlur1703Out"
                                                                        in="SvgjsFeOffset1702Out"></feGaussianBlur>
                                                        <feMerge id="SvgjsFeMerge1704" result="SvgjsFeMerge1704Out"
                                                                 in="SourceGraphic">
                                                            <feMergeNode id="SvgjsFeMergeNode1705"
                                                                         in="SvgjsFeGaussianBlur1703Out"></feMergeNode>
                                                            <feMergeNode id="SvgjsFeMergeNode1706"
                                                                         in="[object Arguments]"></feMergeNode>
                                                        </feMerge>
                                                        <feBlend id="SvgjsFeBlend1707" in="SourceGraphic"
                                                                 in2="SvgjsFeMerge1704Out" mode="normal"
                                                                 result="SvgjsFeBlend1707Out"></feBlend>
                                                    </filter>
                                                </defs>
                                                <line id="SvgjsLine1691" x1="0" y1="0" x2="0" y2="80" stroke="#b6b6b6"
                                                      stroke-dasharray="3" stroke-linecap="butt"
                                                      class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="80"
                                                      fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                                      stroke-width="1"></line>
                                                <g id="SvgjsG1708" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                    <g id="SvgjsG1709" class="apexcharts-xaxis-texts-g"
                                                       transform="translate(0, -4)"></g>
                                                </g>
                                                <g id="SvgjsG1717" class="apexcharts-grid">
                                                    <g id="SvgjsG1718" class="apexcharts-gridlines-horizontal"
                                                       style="display: none;">
                                                        <line id="SvgjsLine1720" x1="0" y1="0" x2="189" y2="0"
                                                              stroke="#e0e0e0" stroke-dasharray="0"
                                                              stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1721" x1="0" y1="20" x2="189" y2="20"
                                                              stroke="#e0e0e0" stroke-dasharray="0"
                                                              stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1722" x1="0" y1="40" x2="189" y2="40"
                                                              stroke="#e0e0e0" stroke-dasharray="0"
                                                              stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1723" x1="0" y1="60" x2="189" y2="60"
                                                              stroke="#e0e0e0" stroke-dasharray="0"
                                                              stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1724" x1="0" y1="80" x2="189" y2="80"
                                                              stroke="#e0e0e0" stroke-dasharray="0"
                                                              stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                    </g>
                                                    <g id="SvgjsG1719" class="apexcharts-gridlines-vertical"
                                                       style="display: none;"></g>
                                                    <line id="SvgjsLine1726" x1="0" y1="80" x2="189" y2="80"
                                                          stroke="transparent" stroke-dasharray="0"
                                                          stroke-linecap="butt"></line>
                                                    <line id="SvgjsLine1725" x1="0" y1="1" x2="0" y2="80"
                                                          stroke="transparent" stroke-dasharray="0"
                                                          stroke-linecap="butt"></line>
                                                </g>
                                                <g id="SvgjsG1694"
                                                   class="apexcharts-line-series apexcharts-plot-series">
                                                    <g id="SvgjsG1695" class="apexcharts-series" seriesName="seriesx1"
                                                       data:longestSeries="true" rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath1698"
                                                              d="M 0 76C 13.23 76 24.570000000000004 12 37.800000000000004 12C 51.03 12 62.370000000000005 62 75.60000000000001 62C 88.83000000000001 62 100.17 22 113.4 22C 126.63000000000001 22 137.97000000000003 38 151.20000000000002 38C 164.43 38 175.77 6 189 6"
                                                              fill="none" fill-opacity="1" stroke="rgba(255,171,0,0.85)"
                                                              stroke-opacity="1" stroke-linecap="butt" stroke-width="5"
                                                              stroke-dasharray="0" class="apexcharts-line" index="0"
                                                              clip-path="url(#gridRectMask8a6o9lys)"
                                                              filter="url(#SvgjsFilter1699)"
                                                              pathTo="M 0 76C 13.23 76 24.570000000000004 12 37.800000000000004 12C 51.03 12 62.370000000000005 62 75.60000000000001 62C 88.83000000000001 62 100.17 22 113.4 22C 126.63000000000001 22 137.97000000000003 38 151.20000000000002 38C 164.43 38 175.77 6 189 6"
                                                              pathFrom="M -1 120L -1 120L 37.800000000000004 120L 75.60000000000001 120L 113.4 120L 151.20000000000002 120L 189 120"></path>
                                                        <g id="SvgjsG1696" class="apexcharts-series-markers-wrap"
                                                           data:realIndex="0">
                                                            <g class="apexcharts-series-markers">
                                                                <circle id="SvgjsCircle1732" r="0" cx="0" cy="0"
                                                                        class="apexcharts-marker w1b7qszbg no-pointer-events"
                                                                        stroke="#ffffff" fill="#ffab00" fill-opacity="1"
                                                                        stroke-width="2" stroke-opacity="0.9"
                                                                        default-marker-size="0"></circle>
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG1697" class="apexcharts-datalabels"
                                                       data:realIndex="0"></g>
                                                </g>
                                                <line id="SvgjsLine1727" x1="0" y1="0" x2="189" y2="0" stroke="#b6b6b6"
                                                      stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                      class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine1728" x1="0" y1="0" x2="189" y2="0"
                                                      stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                                      class="apexcharts-ycrosshairs-hidden"></line>
                                                <g id="SvgjsG1729" class="apexcharts-yaxis-annotations"></g>
                                                <g id="SvgjsG1730" class="apexcharts-xaxis-annotations"></g>
                                                <g id="SvgjsG1731" class="apexcharts-point-annotations"></g>
                                            </g>
                                            <rect id="SvgjsRect1690" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                                  opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                  fill="#fefefe"></rect>
                                            <g id="SvgjsG1716" class="apexcharts-yaxis" rel="0"
                                               transform="translate(-18, 0)"></g>
                                            <g id="SvgjsG1688" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend" style="max-height: 40px;"></div>
                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                            <div class="apexcharts-tooltip-title"
                                                 style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                            <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(255, 171, 0);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                     style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                            class="apexcharts-tooltip-text-y-value"></span></div>
                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                            class="apexcharts-tooltip-text-goals-value"></span></div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                            <div class="apexcharts-yaxistooltip-text"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 336px; height: 118px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
