<?php
	class TableheaderComponent extends Component{		
		
		public function tableheaders($headers =null){
			switch($headers){
				case "Applicants":
				$headers = array("Employee Number", "Date", "Time In", "Time Out", "Late", "OT In", "OT Out") break;				
				case "Groups":
				$headers = array("Access Name", "Desciption", "Action"); break;
				case "Regions":
				$headers = array("Map Id", "Region", "Alias", "Total Area", "Total Applicants", "Action"); break;
				case "Mappings":
				$headers = array("Map Name", "Description", "Total Region", "Total Area", "Total Applicants", "Action"); break;
				case "Statistics":
				$headers = array("Map Name", "Regions"); break;
				case "Statisticsarea":
				$headers = array("Area Manager", "MD5", "IQ", "Total"); break;
				case "Statisticsexam":
				$headers = array("Failed %", "Passed %"); break;
				case "Areas":
				$headers = array("Area A" => "Area A", "Area B" => "Area B", "Area C" => "Area C", "Area D" => "Area D", "Area E" => "Area E", "Area F" => "Area F", "MHO" => "MHO"); break;
				case "Area Managers":
				$headers = array("Region", "Area", "Firstname", "Lastname", "Contact", "Email", "Total Applicants", "Actions"); break;
				case "Area Statistics":
				$headers = array("Area Manager", "Region", "Examinations", "Applicants", "Examinee", "No Show", "Actions"); break;
				case "Users":
				$headers = array("Account", "Area/Department", "Firstname", "Lastname", "LastIp", "Last Access"); break;
				case "Users1":
				$headers = array("Account", "Region", "Area/Department", "Firstname", "Lastname", "LastIp", "Last Access"); break;
				case "Regional Managers":
				$headers = array("Region", "Regional Manager", "Contact", "Email", "Actions"); break;
				case "Course Category":
				$headers = array("Category Name", "Description", "Total Course", "Action"); break;
				case "Course Category View":
				$headers = array("Category Name", "Description", "Total Course", "Action"); break;
				case "Course":
				$headers = array("Course", "Short Name", "Total Applicants", "Actions"); break;
				case "Examinations":				
				$headers = array("Region", "Area Manager", "Examination", "Entry Status", "Action"); break;
				case "Examinationsrecent":
				$headers = array("Region", "Area", "Examination Date", "MD5 Result", "IQ Result", "Status", "Total", "Action"); break;
				case "Examination View":
				$headers = array("Region", "Area Manager", "Date Of Examination", "Entry Status", "Date Set", "Encoder"); break;				
				case "Examtype":
				$headers = array("Name", "Short Name", "Passed", "Failed", "Total Score", "Action"); break;
				case "Examinationresults":
				$headers = array("Region", "Area Manager", "Type", "Date of Examination", "Extracted", "Action"); break;
				case "Examinationresults View":
				$headers = array("Map", "Region", "Area Manager", "Date of Examination", "Filename", "Extracted", "Action"); break;
				case "Extractexamination":
				$headers = array("Findings", "Username", "Firstname", "Lastname", "Started", "Completed", "Time Taken", "Grade", "Feedback"); break;
				case "Applicantviewexam":
				$headers = array("Started", "Completed", "Time Taken", "Grade", "Feedback", "Examination", "Area Manager", "Actions"); break;
				case "Exportpdf":
				$headers = array("Firstname", "Lastname", "Birthdate", "Username", "Password"); break;
				case "Examinationtype View":
				$headers = array("Name", "Shortname", "Description", "Passing Score", "Failed Score", "Total Score", "Actions"); break;				
				case "examinationviewapplicant":
				$headers = array("Result File", "Examiation type", "Started", "Completed", "Time Taken", "Score", "Feedback");  break;
				case "applicant extract":
				$headers = array("Findings", "Firstname", "Middlename", "Lastname", "Gender", "Birthdate", "Age", "Contact", "Email Address",); break;

			}
			
			return $headers;
		}
		
	}
?>