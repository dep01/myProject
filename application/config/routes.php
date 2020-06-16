<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// -----Route Default
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'welcome';
$route['Home']='App/Home/index';


// -----Route Auth
$route['Login']='Auth/Login/index';
$route['Auth']='Auth/Login/Validate';

// ----Route Team
$route['Team']='App/Team/index';
$route['TeamProfile']='App/Team/profile';
$route['ProfileTeam/:num']='App/Team/profile_team';
$route['AddTeam/:num']='App/Team/add_team';
$route['DeclineTeam/:num']='App/Team/decline_team';

// -----Route Project
$route['RequestTeam/:any']='App/Project/search_team_project';
$route['CreateProject']='App/Project/Project_create';
$route['NewProject']='App/Project/save_new_project';
$route['ManageMyProject']='App/Project/manage_project';
$route['AddTeamProject']='App/Project/add_team';
$route['AddJobProject/:any']='App/Project/add_job';
$route['UpdateStatus/:any/:any']='App/Project/update_project_status';
$route['Settings/:any']='App/Project/project_settings';
$route['AcceptProject/:any']='App/Home/accept_project';
$route['DeclineProject/:any']='App/Home/decline_project';

// -----Route Job
$route['Job']='App/Job_base/index';
$route['Jobadd']='App/Job_base/Add_job';
$route['saveJob']='App/Job_base/saveAdd';
$route['saveJobUpdate']='App/Job_base/saveUpdate';
$route['deletejob/:num']='App/Job_base/delete';
$route['Updatejob/:num']='App/Job_base/Update_job';


// -----Route Profile
$route['MyProfile']='App/Home/edit_profile';
$route['UpdateProfile']='App/Home/update_profile';

// ----- Print Document
$route['Print/:any']='App/Project/print';








