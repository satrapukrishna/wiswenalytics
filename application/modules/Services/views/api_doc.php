<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Wenalytics - web services api</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="robots" content="noindex, nofollow"/>

    <!-- Le styles -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
	  
	  
      .sidebar-nav {
        padding: 9px 0;
        position: fixed;
      }
      pre{
        max-height: 300px;
        overflow-y: scroll;
      }
      .dropdown-menu {
          min-width: 450px;
      }
	  .nav>li>a{
	      padding: 17px 20px;
	  }
	  h1,h2{
	  margin-top:85px;}
    </style>
   

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    
  </head>

  <body>

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Wenalytics</a>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
			<li><a href="#introduction">Introduction</a></li>
			
			<li><a href="#login">Employee Login</a></li>
			<li><a href="#dashboard">Dashboard</a></li>
			<li><a href="#fire_run">Firepump Running Report</a></li>
			<li><a href="#fire_graph">Firepump Graph Report</a></li>
			
          	 
          </ul>
              
          
        </div><!-- /.navbar-collapse -->
        
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        
        <div class="span9">
          
          <div class="row-fluid">
            <div class="span12">
            <h1 id="introduction">Introduction</h1>
            <p>This document describes how to use the Wenalytics web services api</p>
            
                        <p>Response format is JSON</p>
            
    <hr />
	
	<div  id="login"></div>
	<h2>Login</h2>
              <p>
              URL: http://wenalytics.in/Services/employee_login_post<br />
                METHOD: POST
              </p>
              <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Required / Optional</th>
                        <th>Values</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <tr>
                        <td>email</td>
                        <td>Required</td>
                        <td></td>
                        <td>Email of the Employee</td>
                    </tr>
					 <tr>
                        <td>password</td>
                        <td>Required</td>
                        <td></td>
                        <td>Password of the Employee</td>
                    </tr>
                </tbody>
              </table>
              <strong>Input</strong>
              <pre>http://wenalytics.in/Services/employee_login_post</pre>
			  
			<strong>Response</strong>
              <pre>{"success": 1,
    "message": "",
    "data": {
        "session": "69016092020",
        "user_id": "4",
        "email": "aparna@gmail.com",
        "name": "aparna akula",
        "client_id": "9",
        "client_name": "CBRE",
        "station_id": "2020000005",
        "permissions": "WATER_LEVEL_SENSOR,WATER_MOTORS,FIRE_PUMP,ENERGY_METER,FIRE_PUMP1"
    }}
{"success":0,"message":"Invalid email or password"}
{"success":0,"message":"Account Inactive"}

              </pre>
              <strong>Response Details</strong>
              <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>parameters</th>
                        <th>values</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td>message</td>
                        <td>Different message return from server</td>
                    </tr>
                   					
				</tbody>
			</table>

            </div>
            
            
          </div><!--/row-->
          <!--/row-->
        </div><!--/span-->
      </div><!--/row-->
<hr />
			
			<div  id="dashboard"></div>
			<h2>Employee Dashboard</h2>
              <p>
              URL: http://wenalytics.in/Services/dashboard_get<br />
                METHOD: GET
              </p>
              <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Required / Optional</th>
                        <th>Values</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>client_id</td>
                        <td>Required</td>
                        <td></td>
                        <td>client id</td>
                    </tr>
                    <tr>
                        <td>station_id</td>
                        <td>Required</td>
                        <td></td>
                        <td>station_id code </td>
                    </tr>
                   
                </tbody>
              </table>
              <strong>Input</strong>
			  <pre>http://wenalytics.in/Services/employee_login_post?client_id=9&station_id=2020000005
              </pre>
			  
			  <strong>Response</strong>
              <pre>{
    "success": 1,
    "message": "",
    "data": [
        {
            "device_id": "9",
            "device_name": "FIRE PUMP",
            "category_id": "3",
            "client_id": "1",
            "dashboard_icon": "1",
            "menu_icon": "1",
            "data": {
                "pumps": [
                    {
                        "hardware_id": "1",
                        "pump_name": "Sprinkler Jockey Pump",
                        "api_name": "Jockey Pump",
                        "qr_code": "9101",
                        "UtilityName": "Jockey Pump",
                        "LineConnected": "Unit RHT",
                        "LineConnectedAuto": "HJ_Auto",
                        "LineConnectedManual": "HJ_Manual",
                        "CutInPressure": "6.5Kg/cm2",
                        "CutOutPressure": "6.5Kg/cm2",
                        "PumpsCapacity": "10.8CU.M/HR/20HP",
                        "PressureMaintained": "8.5Kg/cm2",
                        "SwitchStatus": "Manual",
                        "meter": "Manual",
                        "RunningStatus": "Jockey Pump",
                        "TodayRunn": "0",
                        "YesterdayRunn": null,
                        "LastWeekRunn": null
                    },
                    {
                        "hardware_id": "6",
                        "pump_name": "Main Sprinkler Pump",
                        "api_name": "Sprinkler Pump",
                        "qr_code": "996",
                        "UtilityName": "Sprinkler Pump",
                        "LineConnected": "Unit RHT",
                        "LineConnectedAuto": "MSP_Auto",
                        "LineConnectedManual": "MSP_Manual",
                        "CutInPressure": "5Kg/cm2",
                        "CutOutPressure": "Mannual",
                        "PumpsCapacity": "171CU.M/HR/100HP",
                        "PressureMaintained": "8Kg/cm2",
                        "SwitchStatus": "Manual",
                        "meter": "Manual",
                        "RunningStatus": "Sprinkler Pump",
                        "TodayRunn": "0",
                        "YesterdayRunn": null,
                        "LastWeekRunn": null
                    },
                    {
                        "hardware_id": "7",
                        "pump_name": "Main Hydrant Pump",
                        "api_name": "Hydrant Pump",
                        "qr_code": "997",
                        "UtilityName": "Hydrant Pump",
                        "LineConnected": "Unit RHT",
                        "LineConnectedAuto": "MHP_Auto",
                        "LineConnectedManual": "MHP_Manual",
                        "CutInPressure": "4Kg/cm2",
                        "CutOutPressure": "Mannual",
                        "PumpsCapacity": "171CU.M/HR/100HP",
                        "PressureMaintained": "8.5Kg/cm2",
                        "SwitchStatus": "Manual",
                        "meter": "Manual",
                        "RunningStatus": "Hydrant Pump",
                        "TodayRunn": "0",
                        "YesterdayRunn": null,
                        "LastWeekRunn": null
                    }
                ],
                "line_pressure": [
                    {
                        "api_name": "Pressure",
                        "data": [
                            {
                                "CurReading": "8.05",
                                "TxnTime": "00:08:57"
                            },
                            {
                                "CurReading": "8.03",
                                "TxnTime": "00:20:30"
                            },
                            {
                                "CurReading": "8.02",
                                "TxnTime": "00:31:56"
                            },
                            {
                                "CurReading": "8.00",
                                "TxnTime": "00:43:42"
                            },
                            {
                                "CurReading": "7.99",
                                "TxnTime": "00:54:53"
                            },
                            {
                                "CurReading": "7.98",
                                "TxnTime": "01:06:41"
                            },
                            {
                                "CurReading": "7.96",
                                "TxnTime": "01:17:30"
                            },
                            {
                                "CurReading": "7.50",
                                "TxnTime": "07:40:46"
                            },
                            {
                                "CurReading": "7.49",
                                "TxnTime": "07:51:48"
                            },
                            {
                                "CurReading": "7.49",
                                "TxnTime": "08:02:46"
                            },
                            {
                                "CurReading": "7.47",
                                "TxnTime": "08:13:48"
                            },
                            {
                                "CurReading": "7.46",
                                "TxnTime": "08:24:51"
                            },
                            {
                                "CurReading": "7.45",
                                "TxnTime": "08:36:52"
                            },
                            {
                                "CurReading": "7.44",
                                "TxnTime": "08:48:52"
                            },
                            {
                                "CurReading": "7.43",
                                "TxnTime": "09:00:52"
                            },
                            {
                                "CurReading": "7.39",
                                "TxnTime": "09:12:52"
                            },
                            {
                                "CurReading": "7.33",
                                "TxnTime": "09:24:55"
                            },
                            {
                                "CurReading": "7.33",
                                "TxnTime": "09:36:55"
                            },
                            {
                                "CurReading": "7.31",
                                "TxnTime": "09:48:56"
                            },
                            {
                                "CurReading": "7.30",
                                "TxnTime": "10:00:56"
                            },
                            {
                                "CurReading": "7.29",
                                "TxnTime": "10:12:57"
                            },
                            {
                                "CurReading": "7.28",
                                "TxnTime": "10:24:53"
                            },
                            {
                                "CurReading": "7.27",
                                "TxnTime": "10:36:55"
                            },
                            {
                                "CurReading": "7.26",
                                "TxnTime": "10:48:55"
                            },
                            {
                                "CurReading": "7.25",
                                "TxnTime": "11:00:56"
                            },
                            {
                                "CurReading": "7.24",
                                "TxnTime": "11:12:57"
                            },
                            {
                                "CurReading": "7.23",
                                "TxnTime": "11:24:57"
                            },
                            {
                                "CurReading": "7.22",
                                "TxnTime": "11:36:57"
                            },
                            {
                                "CurReading": "7.20",
                                "TxnTime": "11:48:57"
                            },
                            {
                                "CurReading": "7.20",
                                "TxnTime": "12:00:30"
                            },
                            {
                                "CurReading": "7.19",
                                "TxnTime": "12:11:33"
                            },
                            {
                                "CurReading": "7.18",
                                "TxnTime": "12:22:36"
                            },
                            {
                                "CurReading": "7.17",
                                "TxnTime": "12:33:38"
                            },
                            {
                                "CurReading": "7.16",
                                "TxnTime": "12:44:36"
                            },
                            {
                                "CurReading": "7.15",
                                "TxnTime": "12:55:39"
                            },
                            {
                                "CurReading": "7.14",
                                "TxnTime": "13:06:42"
                            },
                            {
                                "CurReading": "7.14",
                                "TxnTime": "13:17:45"
                            },
                            {
                                "CurReading": "7.13",
                                "TxnTime": "13:28:47"
                            },
                            {
                                "CurReading": "7.11",
                                "TxnTime": "13:39:50"
                            },
                            {
                                "CurReading": "7.11",
                                "TxnTime": "13:51:50"
                            }
                        ]
                    },
                    {
                        "api_name": "Pressure2",
                        "data": [
                            {
                                "CurReading": "7.09",
                                "TxnTime": "14:03:50"
                            },
                            {
                                "CurReading": "7.08",
                                "TxnTime": "14:15:30"
                            },
                            {
                                "CurReading": "7.08",
                                "TxnTime": "14:26:34"
                            },
                            {
                                "CurReading": "7.07",
                                "TxnTime": "14:37:37"
                            },
                            {
                                "CurReading": "7.06",
                                "TxnTime": "14:48:39"
                            },
                            {
                                "CurReading": "7.06",
                                "TxnTime": "14:59:53"
                            },
                            {
                                "CurReading": "7.05",
                                "TxnTime": "15:11:50"
                            },
                            {
                                "CurReading": "7.04",
                                "TxnTime": "15:23:51"
                            },
                            {
                                "CurReading": "7.03",
                                "TxnTime": "15:35:51"
                            },
                            {
                                "CurReading": "7.02",
                                "TxnTime": "15:47:52"
                            },
                            {
                                "CurReading": "7.01",
                                "TxnTime": "15:59:52"
                            },
                            {
                                "CurReading": "7.01",
                                "TxnTime": "16:11:52"
                            },
                            {
                                "CurReading": "7.00",
                                "TxnTime": "16:23:53"
                            },
                            {
                                "CurReading": "6.99",
                                "TxnTime": "16:35:54"
                            },
                            {
                                "CurReading": "6.98",
                                "TxnTime": "16:59:56"
                            },
                            {
                                "CurReading": "6.97",
                                "TxnTime": "17:11:56"
                            },
                            {
                                "CurReading": "6.96",
                                "TxnTime": "17:23:56"
                            },
                            {
                                "CurReading": "6.95",
                                "TxnTime": "17:35:53"
                            },
                            {
                                "CurReading": "6.94",
                                "TxnTime": "17:47:54"
                            },
                            {
                                "CurReading": "6.93",
                                "TxnTime": "17:59:53"
                            },
                            {
                                "CurReading": "6.92",
                                "TxnTime": "18:11:54"
                            },
                            {
                                "CurReading": "6.91",
                                "TxnTime": "18:23:54"
                            },
                            {
                                "CurReading": "6.90",
                                "TxnTime": "18:35:54"
                            },
                            {
                                "CurReading": "6.89",
                                "TxnTime": "18:47:56"
                            },
                            {
                                "CurReading": "6.88",
                                "TxnTime": "18:59:57"
                            },
                            {
                                "CurReading": "6.87",
                                "TxnTime": "19:11:57"
                            },
                            {
                                "CurReading": "6.86",
                                "TxnTime": "19:23:57"
                            },
                            {
                                "CurReading": "6.86",
                                "TxnTime": "19:35:57"
                            },
                            {
                                "CurReading": "6.85",
                                "TxnTime": "19:47:57"
                            },
                            {
                                "CurReading": "6.83",
                                "TxnTime": "19:59:54"
                            },
                            {
                                "CurReading": "6.82",
                                "TxnTime": "20:11:54"
                            },
                            {
                                "CurReading": "6.82",
                                "TxnTime": "20:23:54"
                            },
                            {
                                "CurReading": "6.80",
                                "TxnTime": "20:35:54"
                            },
                            {
                                "CurReading": "6.79",
                                "TxnTime": "20:47:54"
                            },
                            {
                                "CurReading": "6.79",
                                "TxnTime": "20:59:54"
                            },
                            {
                                "CurReading": "6.78",
                                "TxnTime": "21:11:54"
                            },
                            {
                                "CurReading": "6.77",
                                "TxnTime": "21:23:53"
                            },
                            {
                                "CurReading": "6.76",
                                "TxnTime": "21:35:53"
                            },
                            {
                                "CurReading": "6.76",
                                "TxnTime": "21:47:53"
                            },
                            {
                                "CurReading": "6.74",
                                "TxnTime": "21:59:53"
                            },
                            {
                                "CurReading": "6.73",
                                "TxnTime": "22:11:53"
                            },
                            {
                                "CurReading": "6.73",
                                "TxnTime": "22:23:51"
                            },
                            {
                                "CurReading": "6.72",
                                "TxnTime": "22:35:51"
                            },
                            {
                                "CurReading": "6.71",
                                "TxnTime": "22:48:02"
                            },
                            {
                                "CurReading": "6.70",
                                "TxnTime": "22:59:33"
                            },
                            {
                                "CurReading": "6.70",
                                "TxnTime": "23:10:38"
                            },
                            {
                                "CurReading": "6.69",
                                "TxnTime": "23:21:39"
                            },
                            {
                                "CurReading": "6.68",
                                "TxnTime": "23:32:41"
                            },
                            {
                                "CurReading": "6.67",
                                "TxnTime": "23:43:44"
                            }
                        ]
                    }
                ],
                "water_level": [
                    {
                        "api_name": "CT_1-6",
                        "Total_Capacity": "20000",
                        "Current_Level": "40625.648"
                    }
                ]
            }
        },
        {
            "device_id": "10",
            "device_name": "FIRE PUMP1",
            "category_id": "3",
            "client_id": "1",
            "dashboard_icon": "1",
            "menu_icon": "1",
            "data": {
                "pumps": [
                    {
                        "hardware_id": "9",
                        "pump_name": "jhjhjh",
                        "api_name": "jhj",
                        "qr_code": "9109",
                        "UtilityName": "jh",
                        "LineConnected": "jh",
                        "LineConnectedAuto": "jh",
                        "LineConnectedManual": "jh",
                        "CutInPressure": "hj",
                        "CutOutPressure": "hj",
                        "PumpsCapacity": "hj",
                        "PressureMaintained": "h",
                        "SwitchStatus": "NA",
                        "meter": "NA",
                        "RunningStatus": "jhj",
                        "TodayRunn": "NA",
                        "YesterdayRunn": "NA",
                        "LastWeekRunn": "NA"
                    }
                ],
                "line_pressure": [
                    {
                        "api_name": "Pressure",
                        "data": [
                            {
                                "CurReading": "8.05",
                                "TxnTime": "00:08:57"
                            },
                            {
                                "CurReading": "8.03",
                                "TxnTime": "00:20:30"
                            },
                            {
                                "CurReading": "8.02",
                                "TxnTime": "00:31:56"
                            },
                            {
                                "CurReading": "8.00",
                                "TxnTime": "00:43:42"
                            },
                            {
                                "CurReading": "7.99",
                                "TxnTime": "00:54:53"
                            },
                            {
                                "CurReading": "7.98",
                                "TxnTime": "01:06:41"
                            },
                            {
                                "CurReading": "7.96",
                                "TxnTime": "01:17:30"
                            },
                            {
                                "CurReading": "7.50",
                                "TxnTime": "07:40:46"
                            },
                            {
                                "CurReading": "7.49",
                                "TxnTime": "07:51:48"
                            },
                            {
                                "CurReading": "7.49",
                                "TxnTime": "08:02:46"
                            },
                            {
                                "CurReading": "7.47",
                                "TxnTime": "08:13:48"
                            },
                            {
                                "CurReading": "7.46",
                                "TxnTime": "08:24:51"
                            },
                            {
                                "CurReading": "7.45",
                                "TxnTime": "08:36:52"
                            },
                            {
                                "CurReading": "7.44",
                                "TxnTime": "08:48:52"
                            },
                            {
                                "CurReading": "7.43",
                                "TxnTime": "09:00:52"
                            },
                            {
                                "CurReading": "7.39",
                                "TxnTime": "09:12:52"
                            },
                            {
                                "CurReading": "7.33",
                                "TxnTime": "09:24:55"
                            },
                            {
                                "CurReading": "7.33",
                                "TxnTime": "09:36:55"
                            },
                            {
                                "CurReading": "7.31",
                                "TxnTime": "09:48:56"
                            },
                            {
                                "CurReading": "7.30",
                                "TxnTime": "10:00:56"
                            },
                            {
                                "CurReading": "7.29",
                                "TxnTime": "10:12:57"
                            },
                            {
                                "CurReading": "7.28",
                                "TxnTime": "10:24:53"
                            },
                            {
                                "CurReading": "7.27",
                                "TxnTime": "10:36:55"
                            },
                            {
                                "CurReading": "7.26",
                                "TxnTime": "10:48:55"
                            },
                            {
                                "CurReading": "7.25",
                                "TxnTime": "11:00:56"
                            },
                            {
                                "CurReading": "7.24",
                                "TxnTime": "11:12:57"
                            },
                            {
                                "CurReading": "7.23",
                                "TxnTime": "11:24:57"
                            },
                            {
                                "CurReading": "7.22",
                                "TxnTime": "11:36:57"
                            },
                            {
                                "CurReading": "7.20",
                                "TxnTime": "11:48:57"
                            },
                            {
                                "CurReading": "7.20",
                                "TxnTime": "12:00:30"
                            },
                            {
                                "CurReading": "7.19",
                                "TxnTime": "12:11:33"
                            },
                            {
                                "CurReading": "7.18",
                                "TxnTime": "12:22:36"
                            },
                            {
                                "CurReading": "7.17",
                                "TxnTime": "12:33:38"
                            },
                            {
                                "CurReading": "7.16",
                                "TxnTime": "12:44:36"
                            },
                            {
                                "CurReading": "7.15",
                                "TxnTime": "12:55:39"
                            },
                            {
                                "CurReading": "7.14",
                                "TxnTime": "13:06:42"
                            },
                            {
                                "CurReading": "7.14",
                                "TxnTime": "13:17:45"
                            },
                            {
                                "CurReading": "7.13",
                                "TxnTime": "13:28:47"
                            },
                            {
                                "CurReading": "7.11",
                                "TxnTime": "13:39:50"
                            },
                            {
                                "CurReading": "7.11",
                                "TxnTime": "13:51:50"
                            }
                        ]
                    }
                ],
                "water_level": []
            }
        }
    ]
}
{"success":0,"message":"Station ID and Client ID required"}
              </pre>
              <strong>Response Details</strong>
              <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th width="20%">parameters</th>
                        <th>values</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td>client_id</td>
                        <td>unique value</td>
                    </tr>
					
					<tr>
                        <td>station_id</td>
                        <td>unique value</td>
                    </tr>
					
                   					
				</tbody>
			</table>
			
	<hr />
	
	<div  id="fire_run"></div>
	<h2>Firepump Running Report</h2>
              <p>
              URL: http://wenalytics.in/Services/firepump_run_report_post<br />
                METHOD: POST
              </p>
              <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Required / Optional</th>
                        <th>Values</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                   
                   <tr>
                        <td>client_id</td>
                        <td>Required</td>
                        <td></td>
                        <td>client id</td>
                    </tr>
                    <tr>
                        <td>station_id</td>
                        <td>Required</td>
                        <td></td>
                        <td>station_id code </td>
                    </tr>
					<tr>
                        <td>device_id</td>
                        <td>Required</td>
                        <td>9/10</td>
                        <td>Hardware Device id</td>
                    </tr>
                    <tr>
                        <td>from_date</td>
                        <td>Required</td>
                        <td>2020-09-21(ex)</td>
                        <td>from date </td>
                    </tr>
					<tr>
                        <td>to_date</td>
                        <td>Required</td>
                        <td>2020-09-23(ex)</td>
                        <td>to date </td>
                    </tr>
                </tbody>
              </table>
              <strong>Input</strong>
              <pre>http://wenalytics.in/Services/firepump_run_report_post</pre>
			  
			<strong>Response</strong>
              <pre>{
    "success": 1,
    "message": "",
    "data": [
        [
            {
                "meter": "Jockey Pump",
                "date": "2020-09-10",
                "RunningHours": 0
            },
            {
                "meter": "Sprinkler Pump",
                "date": "2020-09-10",
                "RunningHours": 0
            },
            {
                "meter": "Hydrant Pump",
                "date": "2020-09-10",
                "RunningHours": 0
            }
        ],
        [
            {
                "meter": "Jockey Pump",
                "date": "2020-09-11",
                "RunningHours": 0
            },
            {
                "meter": "Sprinkler Pump",
                "date": "2020-09-11",
                "RunningHours": 0
            },
            {
                "meter": "Hydrant Pump",
                "date": "2020-09-11",
                "RunningHours": 0
            }
        ],
        [
            {
                "meter": "Jockey Pump",
                "date": "2020-09-12",
                "RunningHours": 0
            },
            {
                "meter": "Sprinkler Pump",
                "date": "2020-09-12",
                "RunningHours": 0
            },
            {
                "meter": "Hydrant Pump",
                "date": "2020-09-12",
                "RunningHours": 0
            }
        ]
    ]
}
{"success":0,"message":"Invalid Station ID and Client ID"}
{"success":0,"message":"Hardware Device, Fromdate and Todate required"}

              </pre>
              <strong>Response Details</strong>
              <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>parameters</th>
                        <th>values</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td>meter</td>
                        <td>meter name</td>
                    </tr>
					<tr>
                        <td>date</td>
                        <td>Date</td>
                    </tr>
					<tr>
                        <td>RunningHours</td>
                        <td>Total Running hrs</td>
                    </tr>
                   					
				</tbody>
			</table>

            </div>
            
            
          </div><!--/row-->
          <!--/row-->
        </div><!--/span-->
      </div><!--/row-->
	  <hr/>
	  <div  id="fire_graph"></div>
	<h2>Firepump Graph Report</h2>
              <p>
              URL: http://wenalytics.in/Services/firepump_run_report_post<br />
                METHOD: POST
              </p>
              <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Required / Optional</th>
                        <th>Values</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                   
                   <tr>
                        <td>client_id</td>
                        <td>Required</td>
                        <td></td>
                        <td>client id</td>
                    </tr>
                    <tr>
                        <td>station_id</td>
                        <td>Required</td>
                        <td></td>
                        <td>station_id code </td>
                    </tr>
					<tr>
                        <td>device_id</td>
                        <td>Required</td>
                        <td>9/10</td>
                        <td>Hardware Device id</td>
                    </tr>
                    <tr>
                        <td>from_date</td>
                        <td>Required</td>
                        <td>2020-09-21(ex)</td>
                        <td>from date </td>
                    </tr>
					<tr>
                        <td>to_date</td>
                        <td>Required</td>
                        <td>2020-09-23(ex)</td>
                        <td>to date </td>
                    </tr>
                </tbody>
              </table>
              <strong>Input</strong>
              <pre>http://wenalytics.in/Services/firepump_run_report_post</pre>
			  
			<strong>Response</strong>
              <pre>{
    "success": 1,
    "message": "",
    "data": [
        [
            {
                "meter": "Jockey Pump",
                "date": "2020-09-10",
                "RunningHours": 0
            },
            {
                "meter": "Sprinkler Pump",
                "date": "2020-09-10",
                "RunningHours": 0
            },
            {
                "meter": "Hydrant Pump",
                "date": "2020-09-10",
                "RunningHours": 0
            }
        ],
        [
            {
                "meter": "Jockey Pump",
                "date": "2020-09-11",
                "RunningHours": 0
            },
            {
                "meter": "Sprinkler Pump",
                "date": "2020-09-11",
                "RunningHours": 0
            },
            {
                "meter": "Hydrant Pump",
                "date": "2020-09-11",
                "RunningHours": 0
            }
        ],
        [
            {
                "meter": "Jockey Pump",
                "date": "2020-09-12",
                "RunningHours": 0
            },
            {
                "meter": "Sprinkler Pump",
                "date": "2020-09-12",
                "RunningHours": 0
            },
            {
                "meter": "Hydrant Pump",
                "date": "2020-09-12",
                "RunningHours": 0
            }
        ]
    ]
}
{"success":0,"message":"Invalid Station ID and Client ID"}
{"success":0,"message":"Hardware Device, Fromdate and Todate required"}

              </pre>
              <strong>Response Details</strong>
              <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>parameters</th>
                        <th>values</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td>meter</td>
                        <td>meter name</td>
                    </tr>
					<tr>
                        <td>date</td>
                        <td>Date</td>
                    </tr>
					<tr>
                        <td>RunningHours</td>
                        <td>Total Running hrs</td>
                    </tr>
                   					
				</tbody>
			</table>

            </div>
            
            
          </div><!--/row-->
          <!--/row-->
        </div><!--/span-->
      </div><!--/row-->
	  <hr/>
	  
	  

      <footer>
        <p>&copy; Company 2020</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
   

  </body>
</html>