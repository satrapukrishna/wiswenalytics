
SELECT * FROM `energy_consumption_report_tbl_undp_hourly` WHERE report_date='2024-10-19' AND `location_name` IN ('Solar Incomer','MCC-1 Incomer','East Wing UNDP','Central Wing UNDP','West Wing UNDP Sou_1','MCC1-1','Pump House','MDB Panel Incomer','West Wing UNDP Sou_2','Transformer','New Wing DB','O/G (Server Room DB)','Main DB','DG Incomer') ORDER BY `updated_date` DESC

//UNCW
SELECT * FROM `energy_consumption_report_tbl_undp_hourly` WHERE report_date BETWEEN '2024-11-09' AND '2025-01-10' AND `location_name` IN ('CW-GF-LIT','CW-GF-PWR','CW-FF-LIT','CW-FF-PWR','CW-SF-LIT','CW-SF-PWR','CW-TF-LIT','CW-TF-PWR','CW-BM-LIT-PWR','Annexe Build Incom','Annexe Building Ligh','Annexe Building Fcus','Annexe Building TFA') ORDER BY `updated_date` DESC

SELECT * FROM `energy_consumption_report_tbl_undp` WHERE report_date BETWEEN '2025-01-09' AND '2025-01-10' AND `location_name` IN ('CW-GF-LIT','CW-GF-PWR','CW-FF-LIT','CW-FF-PWR','CW-SF-LIT','CW-SF-PWR','CW-TF-LIT','CW-TF-PWR','CW-BM-LIT-PWR','Annexe Build Incom','Annexe Building Ligh','Annexe Building Fcus','Annexe Building TFA') ORDER BY `updated_date` DESC;

SELECT * FROM `current_report_tbl_undp` WHERE report_date BETWEEN '2025-01-09' AND '2025-01-10' AND `location_name` IN ('CW-GF-LIT','CW-GF-PWR','CW-FF-LIT','CW-FF-PWR','CW-SF-LIT','CW-SF-PWR','CW-TF-LIT','CW-TF-PWR','CW-BM-LIT-PWR','Annexe Build Incom','Annexe Building Ligh','Annexe Building Fcus','Annexe Building TFA') ORDER BY `updated_date` DESC;

SELECT * FROM `pf_report_tbl_undp` WHERE report_date BETWEEN '2025-01-09' AND '2025-01-10' AND `location_name` IN ('CW-GF-LIT','CW-GF-PWR','CW-FF-LIT','CW-FF-PWR','CW-SF-LIT','CW-SF-PWR','CW-TF-LIT','CW-TF-PWR','CW-BM-LIT-PWR','Annexe Build Incom','Annexe Building Ligh','Annexe Building Fcus','Annexe Building TFA') ORDER BY `updated_date` DESC;

SELECT * FROM `voltage_report_tbl_undp` WHERE report_date BETWEEN '2025-01-09' AND '2025-01-10' AND `location_name` IN ('CW-GF-LIT','CW-GF-PWR','CW-FF-LIT','CW-FF-PWR','CW-SF-LIT','CW-SF-PWR','CW-TF-LIT','CW-TF-PWR','CW-BM-LIT-PWR','Annexe Build Incom','Annexe Building Ligh','Annexe Building Fcus','Annexe Building TFA') ORDER BY `updated_date` DESC;


delete FROM `energy_consumption_report_tbl_undp_hourly` WHERE report_date BETWEEN '2024-08-24' AND '2024-08-24' AND `location_name` IN ('CW-GF-LIT','CW-GF-PWR','CW-FF-LIT','CW-FF-PWR','CW-SF-LIT','CW-SF-PWR','CW-TF-LIT','CW-TF-PWR','CW-BM-LIT-PWR','Annexe Build Incom','Annexe Building Ligh','Annexe Building Fcus','Annexe Building TFA') ORDER BY `updated_date` DESC;

delete FROM `energy_consumption_report_tbl_undp` WHERE report_date BETWEEN '2024-08-24' AND '2024-08-24' AND `location_name` IN ('CW-GF-LIT','CW-GF-PWR','CW-FF-LIT','CW-FF-PWR','CW-SF-LIT','CW-SF-PWR','CW-TF-LIT','CW-TF-PWR','CW-BM-LIT-PWR','Annexe Build Incom','Annexe Building Ligh','Annexe Building Fcus','Annexe Building TFA') ORDER BY `updated_date` DESC;

delete FROM `current_report_tbl_undp` WHERE report_date BETWEEN '2024-08-24' AND '2024-08-24' AND `location_name` IN ('CW-GF-LIT','CW-GF-PWR','CW-FF-LIT','CW-FF-PWR','CW-SF-LIT','CW-SF-PWR','CW-TF-LIT','CW-TF-PWR','CW-BM-LIT-PWR','Annexe Build Incom','Annexe Building Ligh','Annexe Building Fcus','Annexe Building TFA') ORDER BY `updated_date` DESC;

delete FROM `pf_report_tbl_undp` WHERE report_date BETWEEN '2024-08-24' AND '2024-08-24' AND `location_name` IN ('CW-GF-LIT','CW-GF-PWR','CW-FF-LIT','CW-FF-PWR','CW-SF-LIT','CW-SF-PWR','CW-TF-LIT','CW-TF-PWR','CW-BM-LIT-PWR','Annexe Build Incom','Annexe Building Ligh','Annexe Building Fcus','Annexe Building TFA') ORDER BY `updated_date` DESC;

delete FROM `voltage_report_tbl_undp` WHERE report_date BETWEEN '2024-08-24' AND '2024-08-24' AND `location_name` IN ('CW-GF-LIT','CW-GF-PWR','CW-FF-LIT','CW-FF-PWR','CW-SF-LIT','CW-SF-PWR','CW-TF-LIT','CW-TF-PWR','CW-BM-LIT-PWR','Annexe Build Incom','Annexe Building Ligh','Annexe Building Fcus','Annexe Building TFA') ORDER BY `updated_date` DESC;



//UNDP

SELECT * FROM `energy_consumption_report_tbl_undp_hourly` WHERE report_date BETWEEN '2024-11-15' AND '2024-11-16' AND `location_name` IN ('Top Floor AHU','Conference AHU','Chiller_1','Secondary Pump_1','Hot Water Generator1','West Wing AHU','Hot Water Generator2','Central AHU','Solar
Primary Pump','Condenser Pump 2','primary Chiller Pump','Condenser Pump 3','Condenser Pump 1','Main Incomer','Secondary Pump_2','East Wing AHU','Chiller _2') ORDER BY `updated_date` DESC

SELECT * FROM `energy_consumption_report_tbl_undp` WHERE report_date BETWEEN '2024-11-15' AND '2024-11-16' AND `location_name` IN ('Top Floor AHU','Conference AHU','Chiller_1','Secondary Pump_1','Hot Water Generator1','West Wing AHU','Hot Water Generator2','Central AHU','Solar
Primary Pump','Condenser Pump 2','primary Chiller Pump','Condenser Pump 3','Condenser Pump 1','Main Incomer','Secondary Pump_2','East Wing AHU','Chiller _2') ORDER BY `updated_date` DESC;

SELECT * FROM `current_report_tbl_undp` WHERE report_date BETWEEN '2024-11-15' AND '2024-11-16' AND `location_name` IN ('Top Floor AHU','Conference AHU','Chiller_1','Secondary Pump_1','Hot Water Generator1','West Wing AHU','Hot Water Generator2','Central AHU','Solar
Primary Pump','Condenser Pump 2','primary Chiller Pump','Condenser Pump 3','Condenser Pump 1','Main Incomer','Secondary Pump_2','East Wing AHU','Chiller _2') ORDER BY `updated_date` DESC;

SELECT * FROM `pf_report_tbl_undp` WHERE report_date BETWEEN '2024-11-15' AND '2024-11-16' AND `location_name` IN ('Top Floor AHU','Conference AHU','Chiller_1','Secondary Pump_1','Hot Water Generator1','West Wing AHU','Hot Water Generator2','Central AHU','Solar
Primary Pump','Condenser Pump 2','primary Chiller Pump','Condenser Pump 3','Condenser Pump 1','Main Incomer','Secondary Pump_2','East Wing AHU','Chiller _2') ORDER BY `updated_date` DESC;

SELECT * FROM `voltage_report_tbl_undp` WHERE report_date BETWEEN '2024-11-15' AND '2024-11-16' AND `location_name` IN ('Top Floor AHU','Conference AHU','Chiller_1','Secondary Pump_1','Hot Water Generator1','West Wing AHU','Hot Water Generator2','Central AHU','Solar
Primary Pump','Condenser Pump 2','primary Chiller Pump','Condenser Pump 3','Condenser Pump 1','Main Incomer','Secondary Pump_2','East Wing AHU','Chiller _2') ORDER BY `updated_date` DESC;





delete FROM `energy_consumption_report_tbl_undp_hourly` WHERE report_date BETWEEN '2024-11-15' AND '2024-11-16' AND `location_name` IN ('Top Floor AHU','Conference AHU','Chiller_1','Secondary Pump_1','Hot Water Generator1','West Wing AHU','Hot Water Generator2','Central AHU','Solar
Primary Pump','Condenser Pump 2','primary Chiller Pump','Condenser Pump 3','Condenser Pump 1','Main Incomer','Secondary Pump_2','East Wing AHU','Chiller _2') ORDER BY `updated_date` DESC;

delete FROM `energy_consumption_report_tbl_undp` WHERE report_date BETWEEN '2024-11-15' AND '2024-11-16' AND `location_name` IN ('Top Floor AHU','Conference AHU','Chiller_1','Secondary Pump_1','Hot Water Generator1','West Wing AHU','Hot Water Generator2','Central AHU','Solar
Primary Pump','Condenser Pump 2','primary Chiller Pump','Condenser Pump 3','Condenser Pump 1','Main Incomer','Secondary Pump_2','East Wing AHU','Chiller _2') ORDER BY `updated_date` DESC;

delete FROM `current_report_tbl_undp` WHERE report_date BETWEEN '2024-11-15' AND '2024-11-16' AND `location_name` IN ('Top Floor AHU','Conference AHU','Chiller_1','Secondary Pump_1','Hot Water Generator1','West Wing AHU','Hot Water Generator2','Central AHU','Solar
Primary Pump','Condenser Pump 2','primary Chiller Pump','Condenser Pump 3','Condenser Pump 1','Main Incomer','Secondary Pump_2','East Wing AHU','Chiller _2') ORDER BY `updated_date` DESC;

delete FROM `pf_report_tbl_undp` WHERE report_date BETWEEN '2024-11-15' AND '2024-11-16' AND `location_name` IN ('Top Floor AHU','Conference AHU','Chiller_1','Secondary Pump_1','Hot Water Generator1','West Wing AHU','Hot Water Generator2','Central AHU','Solar
Primary Pump','Condenser Pump 2','primary Chiller Pump','Condenser Pump 3','Condenser Pump 1','Main Incomer','Secondary Pump_2','East Wing AHU','Chiller _2') ORDER BY `updated_date` DESC;

delete FROM `voltage_report_tbl_undp` WHERE report_date BETWEEN '2024-11-15' AND '2024-11-16' AND `location_name` IN ('Top Floor AHU','Conference AHU','Chiller_1','Secondary Pump_1','Hot Water Generator1','West Wing AHU','Hot Water Generator2','Central AHU','Solar
Primary Pump','Condenser Pump 2','primary Chiller Pump','Condenser Pump 3','Condenser Pump 1','Main Incomer','Secondary Pump_2','East Wing AHU','Chiller _2') ORDER BY `updated_date` DESC;

//UNWW
SELECT * FROM `energy_consumption_report_tbl_undp_hourly` WHERE report_date BETWEEN '2024-11-15' AND '2024-11-16' AND `location_name` IN ('WW-BM-LIT','WW-BM-PWR','WW-GF-LIT','WW-GF-PWR','WW-FF-WB') ORDER BY `updated_date` DESC;

SELECT * FROM `energy_consumption_report_tbl_undp` WHERE report_date BETWEEN '2024-11-15' AND '2024-11-16' AND `location_name` IN ('WW-BM-LIT','WW-BM-PWR','WW-GF-LIT','WW-GF-PWR','WW-FF-WB') ORDER BY `updated_date` DESC;

SELECT * FROM `current_report_tbl_undp` WHERE report_date BETWEEN '2024-11-15' AND '2024-11-16' AND `location_name` IN ('WW-BM-LIT','WW-BM-PWR','WW-GF-LIT','WW-GF-PWR','WW-FF-WB') ORDER BY `updated_date` DESC;

SELECT * FROM `pf_report_tbl_undp` WHERE report_date BETWEEN '2024-11-15' AND '2024-11-16' AND `location_name` IN ('WW-BM-LIT','WW-BM-PWR','WW-GF-LIT','WW-GF-PWR','WW-FF-WB') ORDER BY `updated_date` DESC;

SELECT * FROM `voltage_report_tbl_undp` WHERE report_date BETWEEN '2024-11-15' AND '2024-11-16' AND `location_name` IN ('WW-BM-LIT','WW-BM-PWR','WW-GF-LIT','WW-GF-PWR','WW-FF-WB') ORDER BY `updated_date` DESC;

delete FROM `energy_consumption_report_tbl_undp_hourly` WHERE report_date BETWEEN '2024-11-01' AND '2024-11-01' AND `location_name` IN ('WW-BM-LIT','WW-BM-PWR','WW-GF-LIT','WW-GF-PWR','WW-FF-WB') ORDER BY `updated_date` DESC;

delete FROM `energy_consumption_report_tbl_undp` WHERE report_date BETWEEN '2024-11-01' AND '2024-11-01' AND `location_name` IN ('WW-BM-LIT','WW-BM-PWR','WW-GF-LIT','WW-GF-PWR','WW-FF-WB') ORDER BY `updated_date` DESC;

delete FROM `current_report_tbl_undp` WHERE report_date BETWEEN '2024-11-01' AND '2024-11-01' AND `location_name` IN ('WW-BM-LIT','WW-BM-PWR','WW-GF-LIT','WW-GF-PWR','WW-FF-WB') ORDER BY `updated_date` DESC;

delete FROM `pf_report_tbl_undp` WHERE report_date BETWEEN '2024-11-01' AND '2024-11-01' AND `location_name` IN ('WW-BM-LIT','WW-BM-PWR','WW-GF-LIT','WW-GF-PWR','WW-FF-WB') ORDER BY `updated_date` DESC;

delete FROM `voltage_report_tbl_undp` WHERE report_date BETWEEN '2024-11-01' AND '2024-11-01' AND `location_name` IN ('WW-BM-LIT','WW-BM-PWR','WW-GF-LIT','WW-GF-PWR','WW-FF-WB') ORDER BY `updated_date` DESC;
