<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('max_execution_time', 900);
class HospitalAdmin extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Demo_model');
        
    }
    public function index()
	{
        $this->load->view('Login');
		
	}
    public function dashboard()
	{
        $this->load->view('Dashboard');
		
	}
    function notifications(){
        $this->load->view('Notifications');
    }
    function settings(){
        $this->load->view('Settings');
    }
    function login(){
        $this->load->view('Login');
    }
    function hospitalSelection(){
        $this->load->view('HospitalSelection');
    }
    function engineering(){
        $this->load->view('Engineering');
    }
    function machinery(){
        $this->load->view('Machinery');
    }
    function resources(){
        $this->load->view('Resources');
    }
    function sanitation(){
        $this->load->view('Sanitation');
    }
    function repairMaintenance(){
        $this->load->view('RepairMaintenance');
    }
    function inventoryManagement(){
        $this->load->view('InventoryManagement');
    }
    function checklist(){
        $this->load->view('Checklist');
    }
    function pPM(){
        $this->load->view('PPM');
    }
    function aMC(){
        $this->load->view('AMC');
    }
    function attendence(){
        $this->load->view('Attendence');
    }
    function bedsOccupancy(){
        $this->load->view('BedsOccupancy');
    }
    function manpowerUtilization(){
        $this->load->view('ManpowerUtilization');
    }
    function billingSoftware(){
        $this->load->view('BillingSoftware');
    }
    function complaintFeedback(){
        $this->load->view('ComplaintFeedback');
    }
    function audits(){
        $this->load->view('Audits');
    }
    function benchmarking(){
        $this->load->view('Benchmarking');
    }
    function recommendations(){
        $this->load->view('Recommendations');
    }
    function comparisions(){
        $this->load->view('Comparisions');
    }
    function carbonFootprint(){
        $this->load->view('CarbonFootprint');
    }
    function plans(){
        $this->load->view('Plans');
    }
    function engineering_Water(){
        $this->load->view('Engineering-Water');
    }
    function engineering_Energy(){
        $this->load->view('Engineering-Energy');
    }
    function engineering_AirConditioning(){
        $this->load->view('Engineering-AirConditioning');
    }
    function engineering_AirQuality(){
        $this->load->view('Engineering-AirQuality');
    }
    function engineering_SoftIntegration(){
        $this->load->view('Engineering-SoftIntegration');
    }
    function engineering_SpecializedSolutions(){
        $this->load->view('Engineering-SpecializedSolutions');
    }
    function machineryDetails(){
        $this->load->view('MachineryDetails');
    }
    function sanitation_Washroom(){
        $this->load->view('Sanitation-Washroom');
    }
    function sanitation_WasteManagement(){
        $this->load->view('Sanitation-WasteManagement');
    }
    function sanitation_PestControl(){
        $this->load->view('Sanitation-PestControl');
    }
    function sanitation_FacadeCleaning(){
        $this->load->view('Sanitation-FacadeCleaning');
    }
    function sanitation_Washroom_Details(){
        $this->load->view('Sanitation-Washroom-Details');
    }
    function inventorySanitation(){
        $this->load->view('InventorySanitation');
    }
    function inventorySanitationDetails(){
        $this->load->view('InventorySanitationDetails');
    }
    function attendenceCustomDate(){
        $this->load->view('AttendenceCustomDate');
    }
    function checklistDetails(){
        $this->load->view('ChecklistDetails');
    }
    function checklistDetails_electrical(){
        $this->load->view('ChecklistDetails_electrical');
    }
    function checklistDetails_elv(){
        $this->load->view('ChecklistDetails_elv');
    }
    function checklistDetails_fire(){
        $this->load->view('ChecklistDetails_fire');
    }
    function checklistDetails_hvac(){
        $this->load->view('ChecklistDetails_hvac');
    }
    function checklistDetails_phe(){
        $this->load->view('ChecklistDetails_phe');
    }
    function checklistSubDetails(){
        $this->load->view('ChecklistSubDetails');
    }
    function attendenceDeptDetail(){
        $this->load->view('AttendenceDeptDetail');
    }
    function bedsOccupancyDetails(){
        $this->load->view('BedsOccupancyDetails');
    }
    function audit_Observations(){
        $this->load->view('Audit-Observations');
    }
    function audit_Recommendations(){
        $this->load->view('Audit-Recommendations');
    }
    function amc_Observations(){
        $this->load->view('Amc-Observations');
    }
    function amc_Recommendations(){
        $this->load->view('Amc-Recommendations');
    }
    function floorPlans(){
        $this->load->view('FloorPlans');
    }
    function fireEvacuationPlans(){
        $this->load->view('FireEvacuationPlans');
    }
    function about(){
        $this->load->view('About');
    }
    function listView(){
        $this->load->view('ListView');
    }
    function updateList(){
        $this->load->view('UpdateList');
    }
    function listViewDepartment(){
        $this->load->view('ListViewDepartment');
    }
    function listViewVacancy(){
        $this->load->view('ListViewVacancy');
    }
    function leadershipTeam(){
        $this->load->view('LeadershipTeam');
    }
    function bedsOccupancyFullDetails(){
        $this->load->view('BedsOccupancyFullDetails');
    }

    function complaintDashboard(){
		$this->load->view('web/ComplaintsNDashboard');
	}
    function complaintList(){
		$this->load->view('web/ComplaintsNList');
	}
    function complaintAttendence(){
		$this->load->view('web/ComplaintsNAttendance');
	}
    function complaintEReports(){
		$this->load->view('web/ComplaintsNEReport');
	}
    function complaintCReports(){
		$this->load->view('web/ComplaintsNCReport');
	}
    function complaintDetReports(){
		$this->load->view('web/ComplaintAttendenceDeptDetail');
	}
    function sanitation_Washroom_Full_Details(){
        $this->load->view('Sanitation-Washroom-Full-Details');
    }
}