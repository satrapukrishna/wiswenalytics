<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beds & Occupancy</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>asset/hospital_admin/Images/ClientIcon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/hospital_admin/CSS/StyleSheet.css?ver=1" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/hospital_admin/Scripts/Script.js"></script>
</head>
<body>
<?php $this->load->view('common/leftmenu') ?>
    <?php $this->load->view('common/footer') ?>
    <?php $this->load->view('common/header') ?>
    <?php $this->load->view('common/header_sub') ?>
    <div class="AppFllContainer">
        <div class="ContainerLeft">
            <span class="SctnTtl BdsOccpncy">Beds & Occupancy</span>
            <div class="SctnInnerLnks">
                <ul class="InnrLnksHldr">
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt Icn Twr">Tower 01</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt Icn Twr">Tower 02</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt Icn Twr">Tower 03</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ContainerRight">
            <div class="SctnDtlsTtlHldr">
                <div class="BrcmnbHldr">
                    <ul class="DtlsBrdCrmb">
                        <li>
                            <span class="PgTtl">All Towers</span>
                        </li>
                    </ul>
                </div>
                <div class="SlctDrpdwnHldr">
                    <ul class="TbTtlLnkHldr">
                        <li>
                            <span class="TbLnk Grphvw Actv">Graph View</span>
                        </li>
                        <li>
                            <span class="TbLnk Grdvw">Grid View</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="SctnGrphDsh">
                <div class="GrphCol BdsOccu">
                    <div class="GraphHldr">
                        <span class="GrphTtl">Operation Theatre</span>
                        <canvas id="OpThChart" height="200"></canvas>
                        <script>
                            var ctx = document.getElementById('OpThChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar', // line, bar, radar, doughnut, polarArea, bubble, scatter
                                data: {
                                    labels: ['Tower 01', 'Tower 02', 'Tower 03'],
                                    datasets: [
                                        {
                                            label: 'Beds Available',
                                            data: [7, 9, 5],
                                            borderRadius: 5,
                                            backgroundColor: [
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)'
                                            ]
                                        },
                                        {
                                            label: 'Beds Occupied',
                                            data: [3, 1, 1],
                                            borderRadius: 5,
                                            backgroundColor: [
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)'
                                            ]
                                        }
                                    ]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            labels: {
                                                // This more specific font property overrides the global property
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            },

                                        }
                                    },
                                    scales: {
                                        x: {
                                            grid: {
                                                color: 'rgba(0,0,0,0)'
                                            },
                                            ticks: {
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            }
                                        },
                                        y: {
                                            grid: {
                                                color: 'rgba(0,0,0,0)'
                                            },
                                            ticks: {
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            }
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="GrphCol BdsOccu">
                    <div class="GraphHldr">
                        <span class="GrphTtl">Intensive Care Unit</span>
                        <canvas id="ICUChart" height="200"></canvas>
                        <script>
                            var ctx = document.getElementById('ICUChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar', // line, bar, radar, doughnut, polarArea, bubble, scatter
                                data: {
                                    labels: ['Tower 01', 'Tower 02', 'Tower 03'],
                                    datasets: [
                                        {
                                            label: 'Beds Available',
                                            data: [14, 40, 8],
                                            borderRadius: 5,
                                            backgroundColor: [
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)'
                                            ]
                                        },
                                        {
                                            label: 'Beds Occupied',
                                            data: [8, 12, 20],
                                            borderRadius: 5,
                                            backgroundColor: [
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)'
                                            ]
                                        }
                                    ]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            labels: {
                                                // This more specific font property overrides the global property
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            },

                                        }
                                    },
                                    scales: {
                                        x: {
                                            grid: {
                                                color: 'rgba(0,0,0,0)'
                                            },
                                            ticks: {
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            }
                                        },
                                        y: {
                                            grid: {
                                                color: 'rgba(0,0,0,0)'
                                            },
                                            ticks: {
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            }
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="GrphCol BdsOccu">
                    <div class="GraphHldr">
                        <span class="GrphTtl">Medical Intensive Care Unit</span>
                        <canvas id="MICUChart" height="200"></canvas>
                        <script>
                            var ctx = document.getElementById('MICUChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar', // line, bar, radar, doughnut, polarArea, bubble, scatter
                                data: {
                                    labels: ['Tower 01', 'Tower 02', 'Tower 03'],
                                    datasets: [
                                        {
                                            label: 'Beds Available',
                                            data: [14, 40, 8],
                                            borderRadius: 5,
                                            backgroundColor: [
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)'
                                            ]
                                        },
                                        {
                                            label: 'Beds Occupied',
                                            data: [8, 12, 20],
                                            borderRadius: 5,
                                            backgroundColor: [
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)'
                                            ]
                                        }
                                    ]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            labels: {
                                                // This more specific font property overrides the global property
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            },

                                        }
                                    },
                                    scales: {
                                        x: {
                                            grid: {
                                                color: 'rgba(0,0,0,0)'
                                            },
                                            ticks: {
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            }
                                        },
                                        y: {
                                            grid: {
                                                color: 'rgba(0,0,0,0)'
                                            },
                                            ticks: {
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            }
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="GrphCol BdsOccu">
                    <div class="GraphHldr">
                        <span class="GrphTtl">Paediatric Intensive Care Unit</span>
                        <canvas id="PICUChart" height="200"></canvas>
                        <script>
                            var ctx = document.getElementById('PICUChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar', // line, bar, radar, doughnut, polarArea, bubble, scatter
                                data: {
                                    labels: ['Tower 01', 'Tower 02', 'Tower 03'],
                                    datasets: [
                                        {
                                            label: 'Beds Available',
                                            data: [14, 40, 8],
                                            borderRadius: 5,
                                            backgroundColor: [
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)'
                                            ]
                                        },
                                        {
                                            label: 'Beds Occupied',
                                            data: [8, 12, 20],
                                            borderRadius: 5,
                                            backgroundColor: [
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)'
                                            ]
                                        }
                                    ]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            labels: {
                                                // This more specific font property overrides the global property
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            },

                                        }
                                    },
                                    scales: {
                                        x: {
                                            grid: {
                                                color: 'rgba(0,0,0,0)'
                                            },
                                            ticks: {
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            }
                                        },
                                        y: {
                                            grid: {
                                                color: 'rgba(0,0,0,0)'
                                            },
                                            ticks: {
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            }
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="GrphCol BdsOccu">
                    <div class="GraphHldr">
                        <span class="GrphTtl">Neonatal Intensive Care Unit</span>
                        <canvas id="NICUChart" height="200"></canvas>
                        <script>
                            var ctx = document.getElementById('NICUChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar', // line, bar, radar, doughnut, polarArea, bubble, scatter
                                data: {
                                    labels: ['Tower 01', 'Tower 02', 'Tower 03'],
                                    datasets: [
                                        {
                                            label: 'Beds Available',
                                            data: [14, 40, 8],
                                            borderRadius: 5,
                                            backgroundColor: [
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)'
                                            ]
                                        },
                                        {
                                            label: 'Beds Occupied',
                                            data: [8, 12, 20],
                                            borderRadius: 5,
                                            backgroundColor: [
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)'
                                            ]
                                        }
                                    ]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            labels: {
                                                // This more specific font property overrides the global property
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            },

                                        }
                                    },
                                    scales: {
                                        x: {
                                            grid: {
                                                color: 'rgba(0,0,0,0)'
                                            },
                                            ticks: {
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            }
                                        },
                                        y: {
                                            grid: {
                                                color: 'rgba(0,0,0,0)'
                                            },
                                            ticks: {
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            }
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="GrphCol BdsOccu">
                    <div class="GraphHldr">
                        <span class="GrphTtl">General Ward</span>
                        <canvas id="GeWaChart" height="200"></canvas>
                        <script>
                            var ctx = document.getElementById('GeWaChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar', // line, bar, radar, doughnut, polarArea, bubble, scatter
                                data: {
                                    labels: ['Tower 01', 'Tower 02', 'Tower 03'],
                                    datasets: [
                                        {
                                            label: 'Beds Available',
                                            data: [14, 40, 8],
                                            borderRadius: 5,
                                            backgroundColor: [
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)',
                                                'rgba(23, 163, 0, 0.5)'
                                            ]
                                        },
                                        {
                                            label: 'Beds Occupied',
                                            data: [8, 12, 20],
                                            borderRadius: 5,
                                            backgroundColor: [
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)',
                                                'rgba(237, 115, 2, 0.5)'
                                            ]
                                        }
                                    ]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            labels: {
                                                // This more specific font property overrides the global property
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            },

                                        }
                                    },
                                    scales: {
                                        x: {
                                            grid: {
                                                color: 'rgba(0,0,0,0)'
                                            },
                                            ticks: {
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            }
                                        },
                                        y: {
                                            grid: {
                                                color: 'rgba(0,0,0,0)'
                                            },
                                            ticks: {
                                                font: {
                                                    family: "'Open Sans'",
                                                    weight: 600,
                                                    size: 13
                                                },
                                                color: "#444",
                                            }
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="InnrPgBgHldr">
                <div class="ChcklstDshbrdHldr">
                    <div class="FtrTtlHldr Icn Twr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="FtrTtl"><span class="LnkTxt">Tower 01</span></a>
                    </div>
                    <div class="BdsOccuFleDv">
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Operations</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">23</span>
                                        <span class="BdsOccuQtyTtl">Total</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">23</span>
                                        <span class="BdsOccuQtyTtl">Planned</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">18</span>
                                        <span class="BdsOccuQtyTtl Good">Complete</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">5</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">On-going</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Intensive Care Unit</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">23</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">15</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">8</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Medical Intensive Care Unit</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">24</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">18</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">8</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Paediatric Intensive Care Unit</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">23</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">15</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">8</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Bad">5 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Neonatal Intensive Care Unit</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">23</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">15</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">8</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">General Ward</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">24</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">16</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">8</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Sharing Room</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">24</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">16</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">8</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Room</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">24</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">16</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">8</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Executive Room</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">24</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">16</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">8</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ChcklstDshbrdHldr">
                    <div class="FtrTtlHldr Icn Twr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="FtrTtl"><span class="LnkTxt">Tower 02</span></a>
                    </div>
                    <div class="BdsOccuFleDv">
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Operations</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">10</span>
                                        <span class="BdsOccuQtyTtl">Total</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">9</span>
                                        <span class="BdsOccuQtyTtl">Planned</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">6</span>
                                        <span class="BdsOccuQtyTtl Good">Complete</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">3</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">On-going</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Intensive Care Unit</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">10</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">5</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">5</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Medical Intensive Care Unit</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">15</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">14</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">1</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Paediatric Intensive Care Unit</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">8</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">5</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">3</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Bad">5 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Neonatal Intensive Care Unit</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">12</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">8</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">4</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">General Ward</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">20</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">14</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">6</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Sharing Room</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">24</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">16</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">8</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Room</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">24</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">16</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">8</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Executive Room</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">24</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">16</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">8</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ChcklstDshbrdHldr">
                    <div class="FtrTtlHldr Icn Twr">
                        <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="FtrTtl"><span class="LnkTxt">Tower 03</span></a>
                    </div>
                    <div class="BdsOccuFleDv">
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Operations</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">12</span>
                                        <span class="BdsOccuQtyTtl">Total</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">10</span>
                                        <span class="BdsOccuQtyTtl">Planned</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">7</span>
                                        <span class="BdsOccuQtyTtl Good">Complete</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">3</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">On-going</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Intensive Care Unit</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">10</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">8</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">2</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Medical Intensive Care Unit</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">15</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">11</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">4</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Paediatric Intensive Care Unit</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">13</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">5</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">8</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Bad">5 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Neonatal Intensive Care Unit</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">10</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">8</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">2</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">General Ward</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">27</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">20</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">7</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Sharing Room</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">24</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">16</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">8</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Room</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">24</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">16</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">8</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                        <div class="BdsOccuFleHldr">
                            <span class="BdsOccuArName">Executive Room</span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 BdsOccuQtyDtsHldr Brdr">
                                        <span class="BdsOccuQty">24</span>
                                        <span class="BdsOccuQtyTtl">Total Beds</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Good">16</span>
                                        <span class="BdsOccuQtyTtl Good">Available</span>
                                    </div>
                                    <div class="col-6 BdsOccuQtyDtsHldr">
                                        <span class="BdsOccuQty Stsfctry">8</span>
                                        <span class="BdsOccuQtyTtl Stsfctry">Occupied</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BdsOccuBtns">
                                <span class="BdsOccuIsss Good">0 Issues</span>
                                <a href="<?php echo base_url(); ?>HospitalAdmin_demo/bedsOccupancyDetails" class="LnkTxt">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
