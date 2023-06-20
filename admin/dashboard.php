<?php
include_once './header.php';
?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Sales <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Revenue <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$3,264</h6>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Customers <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart" style="min-height: 365px;"><div id="apexcharts39fjguqg" class="apexcharts-canvas apexcharts39fjguqg apexcharts-theme-light" style="width: 530px; height: 350px;"><svg id="SvgjsSvg2082" width="530" height="350" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignObject x="0" y="0" width="530" height="350"><div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom" xmlns="http://www.w3.org/1999/xhtml" style="inset: auto 0px 1px; position: absolute; max-height: 175px;"><div class="apexcharts-legend-series" rel="1" seriesname="Sales" data:collapsed="false" style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="1" data:collapsed="false" style="background: rgb(65, 84, 241) !important; color: rgb(65, 84, 241); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="1" i="0" data:default-text="Sales" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Sales</span></div><div class="apexcharts-legend-series" rel="2" seriesname="Revenue" data:collapsed="false" style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="2" data:collapsed="false" style="background: rgb(46, 202, 106) !important; color: rgb(46, 202, 106); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="2" i="1" data:default-text="Revenue" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Revenue</span></div><div class="apexcharts-legend-series" rel="3" seriesname="Customers" data:collapsed="false" style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="3" data:collapsed="false" style="background: rgb(255, 119, 29) !important; color: rgb(255, 119, 29); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="3" i="2" data:default-text="Customers" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Customers</span></div></div><style type="text/css">	
    	
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
      .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series, .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series{	
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
      	
      .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series, .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series{	
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
      }</style></foreignObject><g id="SvgjsG2084" class="apexcharts-inner apexcharts-graphical" transform="translate(45.59896469116211, 30)"><defs id="SvgjsDefs2083"><clipPath id="gridRectMask39fjguqg"><rect id="SvgjsRect2096" width="480.4010353088379" height="272.636364364624" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask39fjguqg"></clipPath><clipPath id="nonForecastMask39fjguqg"></clipPath><clipPath id="gridRectMarkerMask39fjguqg"><rect id="SvgjsRect2097" width="522.4010353088379" height="318.636364364624" x="-24" y="-24" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient2115" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop2116" stop-opacity="0.3" stop-color="rgba(65,84,241,0.3)" offset="0"></stop><stop id="SvgjsStop2117" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="0.9"></stop><stop id="SvgjsStop2118" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient2137" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop2138" stop-opacity="0.3" stop-color="rgba(46,202,106,0.3)" offset="0"></stop><stop id="SvgjsStop2139" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="0.9"></stop><stop id="SvgjsStop2140" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient2159" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop2160" stop-opacity="0.3" stop-color="rgba(255,119,29,0.3)" offset="0"></stop><stop id="SvgjsStop2161" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="0.9"></stop><stop id="SvgjsStop2162" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine2092" x1="0" y1="0" x2="0" y2="216.98304443359376" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="216.98304443359376" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG2165" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG2166" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText2168" font-family="Helvetica, Arial, sans-serif" x="0" y="299.636364364624" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2169">00:00</tspan><title>00:00</title></text><text id="SvgjsText2171" font-family="Helvetica, Arial, sans-serif" x="72.98477466289815" y="299.636364364624" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2172">01:00</tspan><title>01:00</title></text><text id="SvgjsText2174" font-family="Helvetica, Arial, sans-serif" x="145.9695493257963" y="299.636364364624" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2175">02:00</tspan><title>02:00</title></text><text id="SvgjsText2177" font-family="Helvetica, Arial, sans-serif" x="218.95432398869445" y="299.636364364624" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2178">03:00</tspan><title>03:00</title></text><text id="SvgjsText2180" font-family="Helvetica, Arial, sans-serif" x="291.9390986515926" y="299.636364364624" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2181">04:00</tspan><title>04:00</title></text><text id="SvgjsText2183" font-family="Helvetica, Arial, sans-serif" x="364.9238733144907" y="299.636364364624" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2184">05:00</tspan><title>05:00</title></text><text id="SvgjsText2186" font-family="Helvetica, Arial, sans-serif" x="437.90864797738885" y="299.636364364624" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2187">06:00</tspan><title>06:00</title></text></g><line id="SvgjsLine2188" x1="0" y1="271.636364364624" x2="474.4010353088379" y2="271.636364364624" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line></g><g id="SvgjsG2209" class="apexcharts-grid"><g id="SvgjsG2210" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine2219" x1="0" y1="0" x2="474.4010353088379" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2220" x1="0" y1="54.1272728729248" x2="474.4010353088379" y2="54.1272728729248" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2221" x1="0" y1="108.2545457458496" x2="474.4010353088379" y2="108.2545457458496" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2222" x1="0" y1="162.3818186187744" x2="474.4010353088379" y2="162.3818186187744" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2223" x1="0" y1="216.5090914916992" x2="474.4010353088379" y2="216.5090914916992" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2224" x1="0" y1="270.636364364624" x2="474.4010353088379" y2="270.636364364624" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG2211" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine2212" x1="0" y1="271.636364364624" x2="0" y2="277.636364364624" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine2213" x1="72.98477466289815" y1="271.636364364624" x2="72.98477466289815" y2="277.636364364624" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine2214" x1="145.9695493257963" y1="271.636364364624" x2="145.9695493257963" y2="277.636364364624" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine2215" x1="218.95432398869445" y1="271.636364364624" x2="218.95432398869445" y2="277.636364364624" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine2216" x1="291.9390986515926" y1="271.636364364624" x2="291.9390986515926" y2="277.636364364624" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine2217" x1="364.9238733144907" y1="271.636364364624" x2="364.9238733144907" y2="277.636364364624" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine2218" x1="437.90864797738885" y1="271.636364364624" x2="437.90864797738885" y2="277.636364364624" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine2226" x1="0" y1="270.636364364624" x2="474.4010353088379" y2="270.636364364624" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine2225" x1="0" y1="1" x2="0" y2="270.636364364624" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG2098" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG2099" class="apexcharts-series" seriesName="Sales" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath2119" d="M 0 270.636364364624L 0 186.73909141159055C 38.31700669802152 186.73909141159055 71.16015529632568 162.3818186187744 109.47716199434721 162.3818186187744C 135.02183312636157 162.3818186187744 156.91726552523102 194.8581823425293 182.46193665724536 194.8581823425293C 208.0066077892597 194.8581823425293 229.90204018812915 132.61181853866577 255.4467113201435 132.61181853866577C 280.99138245215784 132.61181853866577 302.8868148510273 156.96909133148193 328.4314859830416 156.96909133148193C 353.97615711505597 156.96909133148193 375.8715895139254 48.71454558563232 401.41626064593976 48.71454558563232C 426.9609317779541 48.71454558563232 448.85636417682355 119.08000032043458 474.4010353088379 119.08000032043458C 474.4010353088379 119.08000032043458 474.4010353088379 119.08000032043458 474.4010353088379 270.636364364624M 474.4010353088379 119.08000032043458z" fill="url(#SvgjsLinearGradient2115)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask39fjguqg)" pathTo="M 0 270.636364364624L 0 186.73909141159055C 38.31700669802152 186.73909141159055 71.16015529632568 162.3818186187744 109.47716199434721 162.3818186187744C 135.02183312636157 162.3818186187744 156.91726552523102 194.8581823425293 182.46193665724536 194.8581823425293C 208.0066077892597 194.8581823425293 229.90204018812915 132.61181853866577 255.4467113201435 132.61181853866577C 280.99138245215784 132.61181853866577 302.8868148510273 156.96909133148193 328.4314859830416 156.96909133148193C 353.97615711505597 156.96909133148193 375.8715895139254 48.71454558563232 401.41626064593976 48.71454558563232C 426.9609317779541 48.71454558563232 448.85636417682355 119.08000032043458 474.4010353088379 119.08000032043458C 474.4010353088379 119.08000032043458 474.4010353088379 119.08000032043458 474.4010353088379 270.636364364624M 474.4010353088379 119.08000032043458z" pathFrom="M -1 270.636364364624L -1 270.636364364624L 109.47716199434721 270.636364364624L 182.46193665724536 270.636364364624L 255.4467113201435 270.636364364624L 328.4314859830416 270.636364364624L 401.41626064593976 270.636364364624L 474.4010353088379 270.636364364624"></path><path id="SvgjsPath2120" d="M 0 186.73909141159055C 38.31700669802152 186.73909141159055 71.16015529632568 162.3818186187744 109.47716199434721 162.3818186187744C 135.02183312636157 162.3818186187744 156.91726552523102 194.8581823425293 182.46193665724536 194.8581823425293C 208.0066077892597 194.8581823425293 229.90204018812915 132.61181853866577 255.4467113201435 132.61181853866577C 280.99138245215784 132.61181853866577 302.8868148510273 156.96909133148193 328.4314859830416 156.96909133148193C 353.97615711505597 156.96909133148193 375.8715895139254 48.71454558563232 401.41626064593976 48.71454558563232C 426.9609317779541 48.71454558563232 448.85636417682355 119.08000032043458 474.4010353088379 119.08000032043458" fill="none" fill-opacity="1" stroke="#4154f1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask39fjguqg)" pathTo="M 0 186.73909141159055C 38.31700669802152 186.73909141159055 71.16015529632568 162.3818186187744 109.47716199434721 162.3818186187744C 135.02183312636157 162.3818186187744 156.91726552523102 194.8581823425293 182.46193665724536 194.8581823425293C 208.0066077892597 194.8581823425293 229.90204018812915 132.61181853866577 255.4467113201435 132.61181853866577C 280.99138245215784 132.61181853866577 302.8868148510273 156.96909133148193 328.4314859830416 156.96909133148193C 353.97615711505597 156.96909133148193 375.8715895139254 48.71454558563232 401.41626064593976 48.71454558563232C 426.9609317779541 48.71454558563232 448.85636417682355 119.08000032043458 474.4010353088379 119.08000032043458" pathFrom="M -1 270.636364364624L -1 270.636364364624L 109.47716199434721 270.636364364624L 182.46193665724536 270.636364364624L 255.4467113201435 270.636364364624L 328.4314859830416 270.636364364624L 401.41626064593976 270.636364364624L 474.4010353088379 270.636364364624"></path><g id="SvgjsG2100" class="apexcharts-series-markers-wrap" data:realIndex="0"><g id="SvgjsG2102" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2103" r="4" cx="0" cy="186.73909141159055" class="apexcharts-marker no-pointer-events wnknsgfkk" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="0" j="0" index="0" default-marker-size="4"></circle><circle id="SvgjsCircle2104" r="4" cx="109.47716199434721" cy="162.3818186187744" class="apexcharts-marker no-pointer-events w6wa0g8l7" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="1" j="1" index="0" default-marker-size="4"></circle></g><g id="SvgjsG2105" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2106" r="4" cx="182.46193665724536" cy="194.8581823425293" class="apexcharts-marker no-pointer-events wzqni3712" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="2" j="2" index="0" default-marker-size="4"></circle></g><g id="SvgjsG2107" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2108" r="4" cx="255.4467113201435" cy="132.61181853866577" class="apexcharts-marker no-pointer-events weglp0veo" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="3" j="3" index="0" default-marker-size="4"></circle></g><g id="SvgjsG2109" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2110" r="4" cx="328.4314859830416" cy="156.96909133148193" class="apexcharts-marker no-pointer-events wohguybj1" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="4" j="4" index="0" default-marker-size="4"></circle></g><g id="SvgjsG2111" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2112" r="4" cx="401.41626064593976" cy="48.71454558563232" class="apexcharts-marker no-pointer-events wwynunz6kg" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="5" j="5" index="0" default-marker-size="4"></circle></g><g id="SvgjsG2113" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2114" r="4" cx="474.4010353088379" cy="119.08000032043458" class="apexcharts-marker no-pointer-events wjqgna5cm" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="6" j="6" index="0" default-marker-size="4"></circle></g></g></g><g id="SvgjsG2121" class="apexcharts-series" seriesName="Revenue" data:longestSeries="true" rel="2" data:realIndex="1"><path id="SvgjsPath2141" d="M 0 270.636364364624L 0 240.86636428451536C 38.31700669802152 240.86636428451536 71.16015529632568 184.03272776794432 109.47716199434721 184.03272776794432C 135.02183312636157 184.03272776794432 156.91726552523102 148.8500004005432 182.46193665724536 148.8500004005432C 208.0066077892597 148.8500004005432 229.90204018812915 184.03272776794432 255.4467113201435 184.03272776794432C 280.99138245215784 184.03272776794432 302.8868148510273 178.62000048065184 328.4314859830416 178.62000048065184C 353.97615711505597 178.62000048065184 375.8715895139254 129.90545489501952 401.41626064593976 129.90545489501952C 426.9609317779541 129.90545489501952 448.85636417682355 159.67545497512816 474.4010353088379 159.67545497512816C 474.4010353088379 159.67545497512816 474.4010353088379 159.67545497512816 474.4010353088379 270.636364364624M 474.4010353088379 159.67545497512816z" fill="url(#SvgjsLinearGradient2137)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="1" clip-path="url(#gridRectMask39fjguqg)" pathTo="M 0 270.636364364624L 0 240.86636428451536C 38.31700669802152 240.86636428451536 71.16015529632568 184.03272776794432 109.47716199434721 184.03272776794432C 135.02183312636157 184.03272776794432 156.91726552523102 148.8500004005432 182.46193665724536 148.8500004005432C 208.0066077892597 148.8500004005432 229.90204018812915 184.03272776794432 255.4467113201435 184.03272776794432C 280.99138245215784 184.03272776794432 302.8868148510273 178.62000048065184 328.4314859830416 178.62000048065184C 353.97615711505597 178.62000048065184 375.8715895139254 129.90545489501952 401.41626064593976 129.90545489501952C 426.9609317779541 129.90545489501952 448.85636417682355 159.67545497512816 474.4010353088379 159.67545497512816C 474.4010353088379 159.67545497512816 474.4010353088379 159.67545497512816 474.4010353088379 270.636364364624M 474.4010353088379 159.67545497512816z" pathFrom="M -1 270.636364364624L -1 270.636364364624L 109.47716199434721 270.636364364624L 182.46193665724536 270.636364364624L 255.4467113201435 270.636364364624L 328.4314859830416 270.636364364624L 401.41626064593976 270.636364364624L 474.4010353088379 270.636364364624"></path><path id="SvgjsPath2142" d="M 0 240.86636428451536C 38.31700669802152 240.86636428451536 71.16015529632568 184.03272776794432 109.47716199434721 184.03272776794432C 135.02183312636157 184.03272776794432 156.91726552523102 148.8500004005432 182.46193665724536 148.8500004005432C 208.0066077892597 148.8500004005432 229.90204018812915 184.03272776794432 255.4467113201435 184.03272776794432C 280.99138245215784 184.03272776794432 302.8868148510273 178.62000048065184 328.4314859830416 178.62000048065184C 353.97615711505597 178.62000048065184 375.8715895139254 129.90545489501952 401.41626064593976 129.90545489501952C 426.9609317779541 129.90545489501952 448.85636417682355 159.67545497512816 474.4010353088379 159.67545497512816" fill="none" fill-opacity="1" stroke="#2eca6a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="1" clip-path="url(#gridRectMask39fjguqg)" pathTo="M 0 240.86636428451536C 38.31700669802152 240.86636428451536 71.16015529632568 184.03272776794432 109.47716199434721 184.03272776794432C 135.02183312636157 184.03272776794432 156.91726552523102 148.8500004005432 182.46193665724536 148.8500004005432C 208.0066077892597 148.8500004005432 229.90204018812915 184.03272776794432 255.4467113201435 184.03272776794432C 280.99138245215784 184.03272776794432 302.8868148510273 178.62000048065184 328.4314859830416 178.62000048065184C 353.97615711505597 178.62000048065184 375.8715895139254 129.90545489501952 401.41626064593976 129.90545489501952C 426.9609317779541 129.90545489501952 448.85636417682355 159.67545497512816 474.4010353088379 159.67545497512816" pathFrom="M -1 270.636364364624L -1 270.636364364624L 109.47716199434721 270.636364364624L 182.46193665724536 270.636364364624L 255.4467113201435 270.636364364624L 328.4314859830416 270.636364364624L 401.41626064593976 270.636364364624L 474.4010353088379 270.636364364624"></path><g id="SvgjsG2122" class="apexcharts-series-markers-wrap" data:realIndex="1"><g id="SvgjsG2124" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2125" r="4" cx="0" cy="240.86636428451536" class="apexcharts-marker no-pointer-events wa8qztt5g" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="0" j="0" index="1" default-marker-size="4"></circle><circle id="SvgjsCircle2126" r="4" cx="109.47716199434721" cy="184.03272776794432" class="apexcharts-marker no-pointer-events wnw9kbfw" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="1" j="1" index="1" default-marker-size="4"></circle></g><g id="SvgjsG2127" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2128" r="4" cx="182.46193665724536" cy="148.8500004005432" class="apexcharts-marker no-pointer-events wlg3nqa32" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="2" j="2" index="1" default-marker-size="4"></circle></g><g id="SvgjsG2129" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2130" r="4" cx="255.4467113201435" cy="184.03272776794432" class="apexcharts-marker no-pointer-events wbimfcd9i" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="3" j="3" index="1" default-marker-size="4"></circle></g><g id="SvgjsG2131" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2132" r="4" cx="328.4314859830416" cy="178.62000048065184" class="apexcharts-marker no-pointer-events wp8zlkqevj" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="4" j="4" index="1" default-marker-size="4"></circle></g><g id="SvgjsG2133" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2134" r="4" cx="401.41626064593976" cy="129.90545489501952" class="apexcharts-marker no-pointer-events w4svmvcd7" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="5" j="5" index="1" default-marker-size="4"></circle></g><g id="SvgjsG2135" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2136" r="4" cx="474.4010353088379" cy="159.67545497512816" class="apexcharts-marker no-pointer-events wq8x2z2a7" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="6" j="6" index="1" default-marker-size="4"></circle></g></g></g><g id="SvgjsG2143" class="apexcharts-series" seriesName="Customers" data:longestSeries="true" rel="3" data:realIndex="2"><path id="SvgjsPath2163" d="M 0 270.636364364624L 0 230.04090970993042C 38.31700669802152 230.04090970993042 71.16015529632568 240.86636428451536 109.47716199434721 240.86636428451536C 135.02183312636157 240.86636428451536 156.91726552523102 184.03272776794432 182.46193665724536 184.03272776794432C 208.0066077892597 184.03272776794432 229.90204018812915 221.92181877899168 255.4467113201435 221.92181877899168C 280.99138245215784 221.92181877899168 302.8868148510273 246.27909157180784 328.4314859830416 246.27909157180784C 353.97615711505597 246.27909157180784 375.8715895139254 205.68363691711426 401.41626064593976 205.68363691711426C 426.9609317779541 205.68363691711426 448.85636417682355 240.86636428451536 474.4010353088379 240.86636428451536C 474.4010353088379 240.86636428451536 474.4010353088379 240.86636428451536 474.4010353088379 270.636364364624M 474.4010353088379 240.86636428451536z" fill="url(#SvgjsLinearGradient2159)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="2" clip-path="url(#gridRectMask39fjguqg)" pathTo="M 0 270.636364364624L 0 230.04090970993042C 38.31700669802152 230.04090970993042 71.16015529632568 240.86636428451536 109.47716199434721 240.86636428451536C 135.02183312636157 240.86636428451536 156.91726552523102 184.03272776794432 182.46193665724536 184.03272776794432C 208.0066077892597 184.03272776794432 229.90204018812915 221.92181877899168 255.4467113201435 221.92181877899168C 280.99138245215784 221.92181877899168 302.8868148510273 246.27909157180784 328.4314859830416 246.27909157180784C 353.97615711505597 246.27909157180784 375.8715895139254 205.68363691711426 401.41626064593976 205.68363691711426C 426.9609317779541 205.68363691711426 448.85636417682355 240.86636428451536 474.4010353088379 240.86636428451536C 474.4010353088379 240.86636428451536 474.4010353088379 240.86636428451536 474.4010353088379 270.636364364624M 474.4010353088379 240.86636428451536z" pathFrom="M -1 270.636364364624L -1 270.636364364624L 109.47716199434721 270.636364364624L 182.46193665724536 270.636364364624L 255.4467113201435 270.636364364624L 328.4314859830416 270.636364364624L 401.41626064593976 270.636364364624L 474.4010353088379 270.636364364624"></path><path id="SvgjsPath2164" d="M 0 230.04090970993042C 38.31700669802152 230.04090970993042 71.16015529632568 240.86636428451536 109.47716199434721 240.86636428451536C 135.02183312636157 240.86636428451536 156.91726552523102 184.03272776794432 182.46193665724536 184.03272776794432C 208.0066077892597 184.03272776794432 229.90204018812915 221.92181877899168 255.4467113201435 221.92181877899168C 280.99138245215784 221.92181877899168 302.8868148510273 246.27909157180784 328.4314859830416 246.27909157180784C 353.97615711505597 246.27909157180784 375.8715895139254 205.68363691711426 401.41626064593976 205.68363691711426C 426.9609317779541 205.68363691711426 448.85636417682355 240.86636428451536 474.4010353088379 240.86636428451536" fill="none" fill-opacity="1" stroke="#ff771d" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="2" clip-path="url(#gridRectMask39fjguqg)" pathTo="M 0 230.04090970993042C 38.31700669802152 230.04090970993042 71.16015529632568 240.86636428451536 109.47716199434721 240.86636428451536C 135.02183312636157 240.86636428451536 156.91726552523102 184.03272776794432 182.46193665724536 184.03272776794432C 208.0066077892597 184.03272776794432 229.90204018812915 221.92181877899168 255.4467113201435 221.92181877899168C 280.99138245215784 221.92181877899168 302.8868148510273 246.27909157180784 328.4314859830416 246.27909157180784C 353.97615711505597 246.27909157180784 375.8715895139254 205.68363691711426 401.41626064593976 205.68363691711426C 426.9609317779541 205.68363691711426 448.85636417682355 240.86636428451536 474.4010353088379 240.86636428451536" pathFrom="M -1 270.636364364624L -1 270.636364364624L 109.47716199434721 270.636364364624L 182.46193665724536 270.636364364624L 255.4467113201435 270.636364364624L 328.4314859830416 270.636364364624L 401.41626064593976 270.636364364624L 474.4010353088379 270.636364364624"></path><g id="SvgjsG2144" class="apexcharts-series-markers-wrap" data:realIndex="2"><g id="SvgjsG2146" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2147" r="4" cx="0" cy="230.04090970993042" class="apexcharts-marker no-pointer-events w5yy3bmi4" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="0" j="0" index="2" default-marker-size="4"></circle><circle id="SvgjsCircle2148" r="4" cx="109.47716199434721" cy="240.86636428451536" class="apexcharts-marker no-pointer-events wkxzisbitg" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="1" j="1" index="2" default-marker-size="4"></circle></g><g id="SvgjsG2149" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2150" r="4" cx="182.46193665724536" cy="184.03272776794432" class="apexcharts-marker no-pointer-events wyqrhwruf" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="2" j="2" index="2" default-marker-size="4"></circle></g><g id="SvgjsG2151" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2152" r="4" cx="255.4467113201435" cy="221.92181877899168" class="apexcharts-marker no-pointer-events wceivsxrp" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="3" j="3" index="2" default-marker-size="4"></circle></g><g id="SvgjsG2153" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2154" r="4" cx="328.4314859830416" cy="246.27909157180784" class="apexcharts-marker no-pointer-events wdxqlse1ei" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="4" j="4" index="2" default-marker-size="4"></circle></g><g id="SvgjsG2155" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2156" r="4" cx="401.41626064593976" cy="205.68363691711426" class="apexcharts-marker no-pointer-events wl8e7n8fvg" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="5" j="5" index="2" default-marker-size="4"></circle></g><g id="SvgjsG2157" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask39fjguqg)"><circle id="SvgjsCircle2158" r="4" cx="474.4010353088379" cy="240.86636428451536" class="apexcharts-marker no-pointer-events wc67vnw9c" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="6" j="6" index="2" default-marker-size="4"></circle></g></g></g><g id="SvgjsG2101" class="apexcharts-datalabels" data:realIndex="0"></g><g id="SvgjsG2123" class="apexcharts-datalabels" data:realIndex="1"></g><g id="SvgjsG2145" class="apexcharts-datalabels" data:realIndex="2"></g></g><line id="SvgjsLine2227" x1="0" y1="0" x2="474.4010353088379" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine2228" x1="0" y1="0" x2="474.4010353088379" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG2229" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG2230" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG2231" class="apexcharts-point-annotations"></g><rect id="SvgjsRect2232" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect id="SvgjsRect2233" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></g><rect id="SvgjsRect2091" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG2189" class="apexcharts-yaxis" rel="0" transform="translate(15.59896469116211, 0)"><g id="SvgjsG2190" class="apexcharts-yaxis-texts-g"><text id="SvgjsText2192" font-family="Helvetica, Arial, sans-serif" x="20" y="31.5" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2193">100</tspan><title>100</title></text><text id="SvgjsText2195" font-family="Helvetica, Arial, sans-serif" x="20" y="85.6272728729248" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2196">80</tspan><title>80</title></text><text id="SvgjsText2198" font-family="Helvetica, Arial, sans-serif" x="20" y="139.7545457458496" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2199">60</tspan><title>60</title></text><text id="SvgjsText2201" font-family="Helvetica, Arial, sans-serif" x="20" y="193.88181861877442" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2202">40</tspan><title>40</title></text><text id="SvgjsText2204" font-family="Helvetica, Arial, sans-serif" x="20" y="248.00909149169922" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2205">20</tspan><title>20</title></text><text id="SvgjsText2207" font-family="Helvetica, Arial, sans-serif" x="20" y="302.136364364624" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2208">0</tspan><title>0</title></text></g></g><g id="SvgjsG2085" class="apexcharts-annotations"></g></svg><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(65, 84, 241);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(46, 202, 106);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 3;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 119, 29);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Sales',
                          data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                          name: 'Revenue',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'Customers',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                  <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns"><div class="dataTable-top"><div class="dataTable-dropdown"><label><select class="dataTable-selector"><option value="5">5</option><option value="10" selected="">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option></select> entries per page</label></div><div class="dataTable-search"><input class="dataTable-input" placeholder="Search..." type="text"></div></div><div class="dataTable-container"><table class="table table-borderless datatable dataTable-table">
                    <thead>
                      <tr><th scope="col" data-sortable="" style="width: 11.5312%;"><a href="#" class="dataTable-sorter">#</a></th><th scope="col" data-sortable="" style="width: 23.8185%;"><a href="#" class="dataTable-sorter">Customer</a></th><th scope="col" data-sortable="" style="width: 38.3743%;"><a href="#" class="dataTable-sorter">Product</a></th><th scope="col" data-sortable="" style="width: 10.397%;"><a href="#" class="dataTable-sorter">Price</a></th><th scope="col" data-sortable="" style="width: 15.879%;"><a href="#" class="dataTable-sorter">Status</a></th></tr>
                    </thead>
                    <tbody><tr><th scope="row"><a href="#">#2457</a></th><td>Brandon Jacob</td><td><a href="#" class="text-primary">At praesentium minu</a></td><td>$64</td><td><span class="badge bg-success">Approved</span></td></tr><tr><th scope="row"><a href="#">#2147</a></th><td>Bridie Kessler</td><td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td><td>$47</td><td><span class="badge bg-warning">Pending</span></td></tr><tr><th scope="row"><a href="#">#2049</a></th><td>Ashleigh Langosh</td><td><a href="#" class="text-primary">At recusandae consectetur</a></td><td>$147</td><td><span class="badge bg-success">Approved</span></td></tr><tr><th scope="row"><a href="#">#2644</a></th><td>Angus Grady</td><td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td><td>$67</td><td><span class="badge bg-danger">Rejected</span></td></tr><tr><th scope="row"><a href="#">#2644</a></th><td>Raheem Lehner</td><td><a href="#" class="text-primary">Sunt similique distinctio</a></td><td>$165</td><td><span class="badge bg-success">Approved</span></td></tr></tbody>
                  </table></div><div class="dataTable-bottom"><div class="dataTable-info">Showing 1 to 5 of 5 entries</div><nav class="dataTable-pagination"><ul class="dataTable-pagination-list"></ul></nav></div></div>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Selling <span>| Today</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                        <td>$64</td>
                        <td class="fw-bold">124</td>
                        <td>$5,828</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                        <td>$46</td>
                        <td class="fw-bold">98</td>
                        <td>$4,508</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                        <td>$59</td>
                        <td class="fw-bold">74</td>
                        <td>$4,366</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                        <td>$32</td>
                        <td class="fw-bold">63</td>
                        <td>$2,016</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                        <td>$79</td>
                        <td class="fw-bold">41</td>
                        <td>$3,239</td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                  <div class="activity-content">
                    Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class="bi bi-circle-fill activity-badge text-danger align-self-start"></i>
                  <div class="activity-content">
                    Voluptatem blanditiis blanditiis eveniet
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class="bi bi-circle-fill activity-badge text-primary align-self-start"></i>
                  <div class="activity-content">
                    Voluptates corrupti molestias voluptatem
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class="bi bi-circle-fill activity-badge text-info align-self-start"></i>
                  <div class="activity-content">
                    Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class="bi bi-circle-fill activity-badge text-warning align-self-start"></i>
                  <div class="activity-content">
                    Est sit eum reiciendis exercitationem
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class="bi bi-circle-fill activity-badge text-muted align-self-start"></i>
                  <div class="activity-content">
                    Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                  </div>
                </div><!-- End activity item-->

              </div>

            </div>
          </div><!-- End Recent Activity -->

          <!-- Budget Report -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Budget Report <span>| This Month</span></h5>

              <div id="budgetChart" style="min-height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);" class="echart" _echarts_instance_="ec_1670783353553"><div style="position: relative; width: 233px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="256" height="440" style="position: absolute; left: 0px; top: 0px; width: 233px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                    legend: {
                      data: ['Allocated Budget', 'Actual Spending']
                    },
                    radar: {
                      // shape: 'circle',
                      indicator: [{
                          name: 'Sales',
                          max: 6500
                        },
                        {
                          name: 'Administration',
                          max: 16000
                        },
                        {
                          name: 'Information Technology',
                          max: 30000
                        },
                        {
                          name: 'Customer Support',
                          max: 38000
                        },
                        {
                          name: 'Development',
                          max: 52000
                        },
                        {
                          name: 'Marketing',
                          max: 25000
                        }
                      ]
                    },
                    series: [{
                      name: 'Budget vs spending',
                      type: 'radar',
                      data: [{
                          value: [4200, 3000, 20000, 35000, 50000, 18000],
                          name: 'Allocated Budget'
                        },
                        {
                          value: [5000, 14000, 28000, 26000, 42000, 21000],
                          name: 'Actual Spending'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Budget Report -->

          <!-- Website Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Website Traffic <span>| Today</span></h5>

              <div id="trafficChart" style="min-height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" class="echart" _echarts_instance_="ec_1670783353554"><div style="position: relative; width: 233px; height: 400px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="256" height="440" style="position: absolute; left: 0px; top: 0px; width: 233px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class=""></div></div>

        

            </div>
          </div><!-- End Website Traffic -->

          <!-- News & Updates Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

              <div class="news">
                <div class="post-item clearfix">
                  <img src="assets/img/news-1.jpg" alt="">
                  <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                  <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-2.jpg" alt="">
                  <h4><a href="#">Quidem autem et impedit</a></h4>
                  <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-3.jpg" alt="">
                  <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                  <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-4.jpg" alt="">
                  <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                  <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-5.jpg" alt="">
                  <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                  <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
                </div>

              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main>

  <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
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
                      data: [{
                          value: 1048,
                          name: 'Search Engine'
                        },
                        {
                          value: 735,
                          name: 'Direct'
                        },
                        {
                          value: 580,
                          name: 'Email'
                        },
                        {
                          value: 484,
                          name: 'Union Ads'
                        },
                        {
                          value: 300,
                          name: 'Video Ads'
                        }
                      ]
                    }]
                  });
                });
              </script>

<?php include './footer.php' ?>