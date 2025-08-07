<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Form;
use App\Models\BankDetail;
use App\Models\landForm;
use App\Models\PondForm;
use App\Models\FileUpload;
use App\Models\PlantForm;



class coorController extends Controller
{

    public function coorDashboard()
{
    $userId = session()->get('user_id');

    $totalSubmitted = DB::table('forms')
        ->whereIn('status', [1])
        ->count();

    $approved = DB::table('forms')
        ->where('user_id', $userId)
        ->whereIn('status', [4])
        ->count();

    $changeupdate = DB::table('forms')
        ->where('user_id', $userId)
        ->whereIn('status', [2, 8])
        ->count();

    $completed = DB::table('forms')
        ->where('user_id', $userId)
        ->where('status', 11)
        ->count();

    return view('coor.coordash', compact('totalSubmitted', 'approved', 'changeupdate', 'completed'));
}
    public function fetch_appl_coor(){
        $form1 = Form::Where('form_type',1)->where('user_id', '!=', session('user_id'))->get();
        $form2 = Form::Where('form_type',2)->where('user_id', '!=', session('user_id'))->get();
        $form3 = Form::Where('form_type',3)->where('user_id', '!=', session('user_id'))->get();
        if($form1||$form2||$form3){
            return view('coor/coor',compact('form1','form2','form3'));
        }

    }

    public function fetch_appl_coor1(){
        $form1 = Form::Where('form_type','land')->where('user_id',session('user_id'))->get();
        $form2 = Form::Where('form_type','pond')->where('user_id',session('user_id'))->get();
        $form3 = Form::Where('form_type','plant')->where('user_id',session('user_id'))->get();
        if($form1||$form2||$form3){
            return view('coor/cappl',compact('form1','form2','form3'));
        }

    }
            public function fetch_coor_mem(){
            $user = User::all();
          
            if($user){
                return view('coor/coor_mem',compact('user'));
            }

    }

    public function coor_appr($id)
        {
    Form::where('id', $id)->update(['status' => 4]);

    return response()->json(["status"=>200,"message"=>"done"]);
        }

    public function coor_reject($id)
        {
            Form::where('id', $id)->update(['status' => 3]);
            return response()->json(["status"=>200,"message"=>"done"]);
        }

public function coor_rem(Request $req)
{
  
    // Find the form and update
    $form = Form::find($req->form_id);

    if ($form) {
        $form->remarks = $req->remarks;
        $form->status = 2; // 2 = Request Change
        $form->save();

        return response()->json([
            'status' => 200,
            'message' => 'Remarks updated successfully. Form sent back to associate.'
        ]);
    }

    return response()->json([
        'status' => 500,
        'message' => 'Form not found.'
    ], 404);
}

public function getRemarks($id)
{
    $form = Form::find($id);

    if ($form) {
        return response()->json([
            'success' => 200,
            'remarks' => $form->remarks
        ]);
    }

    return response()->json([
        'success' => 404,
        'message' => 'Form not found'
    ]);
}

public function form_lands(Request $req)
    {
        $req->validate([
            // Basic Details
            'farmerName' => 'required',
            'mobileNumber' => 'required',
            'gender' => 'required',
            'fatherSpouse' => 'required',
            'hh_members' => 'required',
            'identityCard' => 'required',
            'idCardNumber' => 'required',
            'hamlet' => 'required',
            'panchayat' => 'required',
            'block' => 'required',
            'householdType'=> 'required',
            'hh_occupation'=>'required',
            'specialCategory'=>'required',
            'caste'=>'required',
            'houseOwnership'=>'required',
            'houseType'=>'required',
            'drinkingWater'=>'required',
            'potability'=>'required',
            'domesticWater'=>'required',
            'toilet'=>'required',
            'toiletWorking'=>'required',
            'education'=>'required',

            // Land Ownership
            'pattaNumber' => 'required',
            'totalArea' => 'required',
            'revenueVillage' => 'required',
            'landOwnership'=> 'required',
            'wellIrrigation'=> 'required',
            'irrigatedLand'=> 'required',
            'cropSeason'=> 'required',
            'livestock'=> 'required',
            'areaIrrigated'=> 'required',



        
            // Land Development Activity
            'sf_number' => 'required',
            'land_to_benefit' => 'required',
            'soil_type' => 'required',
            'inspection' => 'required',
            'approved_by' => 'required',
            'inspection_date' => 'required',
            'approval_date' => 'required',
            'estimateAmount' => 'required',
        
            'workType' => 'required',
            'areaBenefited' => 'required',
            'otherWorks' => 'required',
            'pradanContribution' => 'required',
            'farmerContribution' => 'required',
        
            // Bank Details
            'account_holder' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'branch' => 'required',
            'ifsc' => 'required',
            'farmer_agreement'=> 'required',
        ]);
        
        $form = new Form();
        $form->user_id = $req->user_id;
        $form->form_type = 'land';
        $form->farmer_name = $req->farmerName;
        $form->mobile_number = $req->mobileNumber;
        $form->gender = $req->gender;
        $form->spouse = $req->fatherSpouse;
        $form->h_members = implode(',', $req->hh_members);//[]
        $form->id_type = $req->identityCard;
        $form->id_number = $req->idCardNumber;
        $form->hamlet = $req->hamlet;
        $form->panchayat = $req->panchayat;
        $form->block = $req->block;
        $form->type_of_households = $req->householdType;
        $form->hh_occupation = implode(',', $req->hh_occupation);//[]
        $form->special_catog =  implode(',', $req->specialCategory);
        $form->caste = $req->caste;
        $form->house_owner = $req->houseOwnership;
        $form->type_of_house = $req->houseType;
        $form->drinking_water  = implode(',', $req->drinkingWater);
        $form->potability = implode(',', $req->potability);
        $form->domestic_water =  implode(',', $req->domesticWater);
        $form->toilet_avail = $req->toilet;
        $form->toilet_cond = $req->toiletWorking;
        $form->household_education = $req->education;
        $form->age = $req->age;
        $form->district = $req->district;
        $form->taluk = $req->taluk;
        $form->firca = $req->firca;
        $form->lat = $req->lat;
        $form->lon = $req->lon;
        $form->status = 4;
        $form->save();

// Get the auto-generated form_id
    $form_id = $form->id;

    // Insert into `form_lands` table
    $landForm = new LandForm();
    $landForm->form_id = $form_id; // Foreign key reference
    $landForm->ownership = $req->landOwnership;
    $landForm->patta = $req->pattaNumber;
    $landForm->total_area = $req->totalArea;
    $landForm->revenue = $req->revenueVillage;
    $landForm->well_irrigation = $req->wellIrrigation;
    $landForm->area_irrigated = $req->areaIrrigated;
    $landForm->irrigated_lands = $req->irrigatedLand;
    $landForm->crop_season = $req->cropSeason;
    $landForm->livestocks = implode(',', $req->livestock);



    $landForm->sf_number = $req->sf_number;
    $landForm->soil_type = $req->soil_type;
    $landForm->land_to_benefit = $req->land_to_benefit;
    $landForm->field_insp = $req->inspection;
    $landForm->site_app = $req->approved_by;
    $landForm->date_of_ins = $req->inspection_date;
    $landForm->date_of_app = $req->approval_date;
    $landForm->type_of_work = implode(',', $req->workType); // Convert array to string
    $landForm->area_benefited = $req->areaBenefited;
    $landForm->any_other_works = $req->otherWorks;
    $landForm->p_contribution = $req->pradanContribution;
    $landForm->f_contribution = $req->farmerContribution;
    $landForm->total_est = $req->estimateAmount;
    $landForm->save();

        // Insert into `bank_details` table
        $bankDetail = new BankDetail();
        $bankDetail->form_id = $form_id;
        $bankDetail->account_holder_name = $req->account_holder;
        $bankDetail->account_number = $req->account_number;
        $bankDetail->bank_name = $req->bank_name;
        $bankDetail->branch = $req->branch;
        $bankDetail->ifsc_code = $req->ifsc;
        $bankDetail->farmer_ack = $req->farmer_agreement;

        $bankDetail->save();
        $pattaFile = $req->file('patta');
        $pattaName = 'patta_' . time() . '.' . $pattaFile->getClientOriginalExtension();
        $pattaFile->move(public_path('documents'), $pattaName);
        
        $identityFile = $req->file('id_card');
        $identityName = 'id_' . time() . '.' . $identityFile->getClientOriginalExtension();
        $identityFile->move(public_path('documents'), $identityName);
        
        $fmbFile = $req->file('fmb');
        $fmbName = 'fmb_' . time() . '.' . $fmbFile->getClientOriginalExtension();
        $fmbFile->move(public_path('documents'), $fmbName);
        
        $photoFile = $req->file('photo_farmer');
        $photoName = 'photo_' . time() . '.' . $photoFile->getClientOriginalExtension();
        $photoFile->move(public_path('documents'), $photoName);
        
        $passbookFile = $req->file('bank_passbook');
        $passbookName = 'passbook_' . time() . '.' . $passbookFile->getClientOriginalExtension();
        $passbookFile->move(public_path('documents'), $passbookName);
        
        
        $fileUpload = new FileUpload();
        $fileUpload->form_id  = $form_id;
        $fileUpload->patta    = $pattaName;
        $fileUpload->identity = $identityName;
        $fileUpload->fmb      = $fmbName;
        $fileUpload->photo    = $photoName;
        $fileUpload->passbook = $passbookName;
        $fileUpload->save();
        
    
        return response()->json(['status' => 200, 'message' => 'inserted succesfully']);




    
    }


    public function pond_form(Request $req)
    {
        $validatedData = $req->validate([
            // Basic Details
            'farmerName' => 'required',
            'mobileNumber' => 'required',
            'gender' => 'required',
            'fatherSpouse' => 'required',
            'hh_members' => 'required',
            'identityCard' => 'required',
            'idCardNumber' => 'required',
            'hamlet' => 'required',
            'panchayat' => 'required',
            'block' => 'required',
            'householdType'=> 'required',
            'hh_occupation'=>'required',
            'specialCategory'=>'required',
            'caste'=>'required',
            'houseOwnership'=>'required',
            'houseType'=>'required',
            'drinkingWater'=>'required',
            'potability'=>'required',
            'domesticWater'=>'required',
            'toilet'=>'required',
            'toiletWorking'=>'required',
            'education'=>'required',


             // Pond Ownership
             'pattaNumber' => 'required',
             'totalArea' => 'required',
             'revenueVillage' => 'required',
             'landOwnership'=> 'required',
             'wellIrrigation'=> 'required',
             'irrigatedLand'=> 'required',
             'cropSeason'=> 'required',
             'livestock'=> 'required',
 
 
 
         
             // Pond Development Activity
             'sf_number' => 'required',
             'land_to_benefit' => 'required',
             'soil_type' => 'required',
             'inspection' => 'required',
             'approved_by' => 'required',
             'inspection_date' => 'required',
             'approval_date' => 'required',
             'estimateAmount' => 'required',
             'length' => 'required',
             'breadth' => 'required',
             'depth' => 'required',
             'volume' => 'required',
             'otherWorks' => 'required',
             'pradanContribution' => 'required',
             'farmerContribution' => 'required',




            
            'bank_name' => 'required',
            'branch' => 'required',
            'account_holder' => 'required',
            'account_number' => 'required',
            'ifsc' => 'required',
            'farmer_agreement' => 'required',
        ]);


        $form = new Form();
        $form->user_id = $req->user_id;
        $form->form_type = 'pond';
        $form->farmer_name = $req->farmerName;
        $form->mobile = $req->mobileNumber;
        $form->gender = $req->gender;
        $form->spouse = $req->fatherSpouse;
        $form->h_members = implode(',', $req->hh_members);//[]
        $form->id_type = $req->identityCard;
        $form->id_number = $req->idCardNumber;
        $form->hamlet = $req->hamlet;
        $form->panchayat = $req->panchayat;
        $form->block = $req->block;
        $form->type_of_households = $req->householdType;
        $form->hh_occupation = implode(',', $req->hh_occupation);//[]
        $form->special_catog =  implode(',', $req->specialCategory);
        $form->caste = $req->caste;
        $form->house_owner = $req->houseOwnership;
        $form->type_of_house = $req->houseType;
        $form->drinking_water  = implode(',', $req->drinkingWater);
        $form->potability = implode(',', $req->potability);
        $form->domestic_water =  implode(',', $req->domesticWater);
        $form->toilet_avail = $req->toilet;
        $form->toilet_cond = $req->toiletWorking;
        $form->age = $req->age;
        $form->district = $req->district;
        $form->taluk = $req->taluk;
        $form->firca = $req->firca;
        $form->lat = $req->lat;
        $form->lon = $req->lon;
        $form->household_education = $req->education;
        $form->status = 1;
        $form->save();

    $form_id = $form->id;

    

 // Insert into `form_lands` table
 $pondForm = new PondForm();
 $pondForm->form_id = $form_id; // Foreign key reference
 $pondForm->ownership = $req->landOwnership;
 $pondForm->patta = $req->pattaNumber;
 $pondForm->total_area = $req->totalArea;
 $pondForm->revenue = $req->revenueVillage;
 $pondForm->well_irrigation = $req->wellIrrigation;
 $pondForm->irrigated_lands = $req->irrigatedLand;
 $pondForm->crop_season = $req->cropSeason;
 $pondForm->area_irrigated = $req->area_irrigated;
 $pondForm->area_benefited = $req->areaBenefitted;

 $pondForm->livestocks = implode(',', $req->livestock);



 $pondForm->sf_number = $req->sf_number;
 $pondForm->soil_type = $req->soil_type;
 $pondForm->land_serve = $req->land_to_benefit;
 $pondForm->field_insp = $req->inspection;
 $pondForm->site_app = $req->approved_by;
 $pondForm->date_of_ins = $req->inspection_date;
 $pondForm->date_of_app = $req->approval_date;
 $pondForm->length = $req->length;
 $pondForm->breadth = $req->breadth;
 $pondForm->depth = $req->depth;
 $pondForm->volume = $req->volume;
 $pondForm->p_contribution = $req->pradanContribution;
 $pondForm->f_contribution = $req->farmerContribution;
 $pondForm->total_est = $req->estimateAmount;
 $pondForm->save();


// Now insert into BankDetail table using the form_id
$bankDetail = new BankDetail();
$bankDetail->form_id = $form_id;
$bankDetail->account_holder_name = $req->account_holder;
$bankDetail->account_number = $req->account_number;
$bankDetail->bank_name = $req->bank_name;
$bankDetail->branch = $req->branch;
$bankDetail->ifsc_code = $req->ifsc;
$bankDetail->farmer_ack = $req->farmer_agreement;
$bankDetail->save();

$pattaFile = $req->file('patta');
$pattaName = 'patta_' . time() . '.' . $pattaFile->getClientOriginalExtension();
$pattaFile->move(public_path('documents'), $pattaName);

$identityFile = $req->file('id_card');
$identityName = 'id_' . time() . '.' . $identityFile->getClientOriginalExtension();
$identityFile->move(public_path('documents'), $identityName);

$fmbFile = $req->file('fmb');
$fmbName = 'fmb_' . time() . '.' . $fmbFile->getClientOriginalExtension();
$fmbFile->move(public_path('documents'), $fmbName);

$photoFile = $req->file('photo_farmer');
$photoName = 'photo_' . time() . '.' . $photoFile->getClientOriginalExtension();
$photoFile->move(public_path('documents'), $photoName);

$passbookFile = $req->file('bank_passbook');
$passbookName = 'passbook_' . time() . '.' . $passbookFile->getClientOriginalExtension();
$passbookFile->move(public_path('documents'), $passbookName);


$fileUpload = new FileUpload();
$fileUpload->form_id  = $form_id;
$fileUpload->patta    = $pattaName;
$fileUpload->identity = $identityName;
$fileUpload->fmb      = $fmbName;
$fileUpload->photo    = $photoName;
$fileUpload->passbook = $passbookName;
$fileUpload->save();


return response()->json(['status' => 200, 'message' => 'inserted succesfully']);

    }

    public function plantation_details(Request $req)
    {
        $req->validate([
            // Basic Details
            'farmerName' => 'required',
            'mobileNumber' => 'required',
            'gender' => 'required',
            'fatherSpouse' => 'required',
            'hh_members' => 'required',
            'identityCard' => 'required',
            'idCardNumber' => 'required',
            'hamlet' => 'required',
            'panchayat' => 'required',
            'block' => 'required',
            'householdType'=> 'required',
            'hh_occupation'=>'required',
            'specialCategory'=>'required',
            'caste'=>'required',
            'houseOwnership'=>'required',
            'houseType'=>'required',
            'drinkingWater'=>'required',
            'potability'=>'required',
            'domesticWater'=>'required',
            'toilet'=>'required',
            'toiletWorking'=>'required',
            'education'=>'required',

            // Land Ownership
            'pattaNumber' => 'required',
            'totalArea' => 'required',
            'revenueVillage' => 'required',
            'landOwnership'=> 'required',
            'wellIrrigation'=> 'required',
            'irrigatedLand'=> 'required',
            'cropSeason'=> 'required',
            'livestock'=> 'required',
            'areaIrrigated'=> 'required',



        
            // Land Development Activity
            'sf_number' => 'required',
            'land_to_benefit' => 'required',
            'soil_type' => 'required',
            'inspection' => 'required',
            'approved_by' => 'required',
            'inspection_date' => 'required',
            'approval_date' => 'required',
            'estimateAmount' => 'required',
        
            'workType' => 'required',
            'areaBenefited' => 'required',
            'otherWorks' => 'required',
            'pradanContribution' => 'required',
            'farmerContribution' => 'required',
            'plantaions'=>'required',
        
            // Bank Details
            'account_holder' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'branch' => 'required',
            'ifsc' => 'required',
            'farmer_agreement'=> 'required',
        ]);
        
        $form = new Form();
        $form->user_id = $req->user_id;
        $form->form_type = 'plant';
        $form->farmer_name = $req->farmerName;
        $form->mobile = $req->mobileNumber;
        $form->gender = $req->gender;
        $form->spouse = $req->fatherSpouse;
        $form->h_members = implode(',', $req->hh_members);//[]
        $form->id_type = $req->identityCard;
        $form->id_number = $req->idCardNumber;
        $form->hamlet = $req->hamlet;
        $form->panchayat = $req->panchayat;
        $form->block = $req->block;
        $form->type_of_households = $req->householdType;
        $form->hh_occupation = implode(',', $req->hh_occupation);//[]
        $form->special_catog =  implode(',', $req->specialCategory);
        $form->caste = $req->caste;
        $form->house_owner = $req->houseOwnership;
        $form->type_of_house = $req->houseType;
        $form->drinking_water  = implode(',', $req->drinkingWater);
        $form->potability = implode(',', $req->potability);
        $form->age = $req->age;
        $form->district = $req->district;
        $form->taluk = $req->taluk;
        $form->firca = $req->firca;
        $form->lat = $req->lat;
        $form->lon = $req->lon;
        $form->domestic_water =  implode(',', $req->domesticWater);
        $form->toilet_avail = $req->toilet;
        $form->toilet_cond = $req->toiletWorking;
        $form->household_education = $req->education;
        $form->status = 1;
        $form->save();

// Get the auto-generated form_id
    $form_id = $form->id;

    $landForm = new PlantForm();
    $landForm->form_id = $form_id; // Foreign key reference
    $landForm->ownership = $req->landOwnership;
    $landForm->patta = $req->pattaNumber;
    $landForm->total_area = $req->totalArea;
    $landForm->revenue = $req->revenueVillage;
    $landForm->well_irrigation = $req->wellIrrigation;
    $landForm->area_irrigated = $req->areaIrrigated;
    $landForm->irrigated_lands = $req->irrigatedLand;
    $landForm->crop_season = $req->cropSeason;
    $landForm->livestocks = implode(',', $req->livestock);
    $landForm->plantaions = implode(',', $req->plantaions);




    $landForm->sf_number = $req->sf_number;
    $landForm->soil_type = $req->soil_type;
    $landForm->land_to_benefit = $req->land_to_benefit;
    $landForm->field_insp = $req->inspection;
    $landForm->site_app = $req->approved_by;
    $landForm->date_of_ins = $req->inspection_date;
    $landForm->date_of_app = $req->approval_date;
    $landForm->type_of_work = implode(',', $req->workType); // Convert array to string
    $landForm->area_benefited = $req->areaBenefited;
    $landForm->any_other_works = $req->otherWorks;
    $landForm->p_contribution = $req->pradanContribution;
    $landForm->f_contribution = $req->farmerContribution;
    $landForm->total_est = $req->estimateAmount;
    
    $landForm->save();

        // Insert into `bank_details` table
        $bankDetail = new BankDetail();
        $bankDetail->form_id = $form_id;
        $bankDetail->account_holder_name = $req->account_holder;
        $bankDetail->account_number = $req->account_number;
        $bankDetail->bank_name = $req->bank_name;
        $bankDetail->branch = $req->branch;
        $bankDetail->ifsc_code = $req->ifsc;
        $bankDetail->farmer_ack = $req->farmer_agreement;

        $bankDetail->save();

        $pattaFile = $req->file('patta');
$pattaName = 'patta_' . time() . '.' . $pattaFile->getClientOriginalExtension();
$pattaFile->move(public_path('documents'), $pattaName);

$identityFile = $req->file('id_card');
$identityName = 'id_' . time() . '.' . $identityFile->getClientOriginalExtension();
$identityFile->move(public_path('documents'), $identityName);

$fmbFile = $req->file('fmb');
$fmbName = 'fmb_' . time() . '.' . $fmbFile->getClientOriginalExtension();
$fmbFile->move(public_path('documents'), $fmbName);

$photoFile = $req->file('photo_farmer');
$photoName = 'photo_' . time() . '.' . $photoFile->getClientOriginalExtension();
$photoFile->move(public_path('documents'), $photoName);

$passbookFile = $req->file('bank_passbook');
$passbookName = 'passbook_' . time() . '.' . $passbookFile->getClientOriginalExtension();
$passbookFile->move(public_path('documents'), $passbookName);


$fileUpload = new FileUpload();
$fileUpload->form_id  = $form_id;
$fileUpload->patta    = $pattaName;
$fileUpload->identity = $identityName;
$fileUpload->fmb      = $fmbName;
$fileUpload->photo    = $photoName;
$fileUpload->passbook = $passbookName;
$fileUpload->save();


    
        return response()->json(['status' => 200, 'message' => 'inserted succesfully']);




    
    }
    public function approvePF($id)
    {
        $form = Form::findOrFail($id);
        
        if ($form->status == 7) {
            $form->status = 9;
            $form->save();
    
            return response()->json(['success' => true]);
        }
    
        return response()->json(['error' => 'Invalid status'], 400);
    }
    
    public function requestEditPF(Request $request, $id)
{
    $form = Form::findOrFail($id);

    // Only allow if current status is 7 (PF submitted by associate)
    if ($form->status == 7) {
        $form->status = 8; // Status: Change Requested
        $form->remarks = $request->input('reason');
        $form->save();

        return response()->json(['success' => true]);
    }

    return response()->json(['error' => 'Invalid status or action not allowed.'], 400);
}



public function viewPFLand($id)
{
    $land = LandForm::where('form_id', $id)->first();

    if ($land) {
        return response()->json([
            'area_benefited_postfunding' => $land->area_benefited_postfunding,
        ]);
    } else {
        return response()->json([], 404);
    }
}
public function viewPFPond($id)
{
    $pond = PondForm::where('form_id', $id)->first();

    if ($pond) {
        return response()->json([
            'len_pf' => $pond->len_pf,
            'bre_pf' => $pond->bre_pf,
            'dep_pf' => $pond->dep_pf,
            'vol_pf' => $pond->vol_pf,
            'area_benefited_postfunding' => $pond->area_benefited_postfunding,
        ]);
    } else {
        return response()->json([], 404);
    }
}

public function viewPFPlant($id)
{
    $plant = PlantForm::where('form_id', $id)->first();

    if ($plant) {
        return response()->json([
            'nos' => $plant->nos,
            'price' => $plant->price,
            'other_exp' => $plant->other_exp,
            'total_no' => $plant->total_no,
            'total_price' => $plant->total_price,
        ]);
    } else {
        return response()->json([], 404);
    }
}
public function pfEditRequest(Request $request)
{
    $request->validate([
        'form_id' => 'required|integer|exists:forms,id',
        'reason' => 'required|string|max:1000',
    ]);

    $form = Form::find($request->form_id);
    $form->remarks = $request->reason;
    $form->status = 8; // Assuming 8 = PF Edit Requested by Coordinator
    $form->save();

    return response()->json(['message' => 'Edit request submitted']);
}
public function viewReason($id)
{
    $form = Form::find($id);

    if (!$form) {
        return response()->json(['reason' => 'Form not found'], 404);
    }

    return response()->json(['reason' => $form->remarks]);
}
public function submit_pf_land(Request $request)
{
    $request->validate([
        'pf_land_id' => 'required',
        'area_land' => 'required|numeric',
    ]);

    landForm::where('form_id', $request->pf_land_id)
        ->update([
            'area_benefited_postfunding' => $request->area_land
        ]);
        Form::where('id', $request->pf_land_id)
        ->update([
            'status' => 9 
        ]);

    return response()->json(['status' => 200, 'message' => 'Land Post-Funding details updated.']);
}

public function submit_pf_pond(Request $request)
{
    $request->validate([
        'pf_pond_id' => 'required',
        'length' => 'required',
        'breadth' => 'required',
        'depth' => 'required',
        'volume' => 'required',
        'area_benefited' => 'required',
    ]);

    PondForm::where('form_id', $request->pf_pond_id)
        ->update([
            'len_pf' => $request->length,
            'bre_pf' => $request->breadth,
            'dep_pf' => $request->depth,
            'vol_pf' => $request->volume,
            'area_benefited_postfunding' => $request->area_benefited
        ]);
        Form::where('id', $request->pf_pond_id)
        ->update([
            'status' => 9
        ]);

    return response()->json(['status' => 200, 'message' => 'Pond Post-Funding details updated.']);
}

public function submit_pf_plant(Request $request)
{
    $request->validate([
        'pf_plant_id' => 'required',
        'nos' => 'required',
        'price' => 'required',
        'other_expenses' => 'required',
        'total_nos' => 'required',
        'total_price' => 'required',
    ]);

    PlantForm::where('form_id', $request->pf_plant_id)
        ->update([
            'nos' => $request->nos,
            'price' => $request->price,
            'other_exp' => $request->other_expenses,
            'total_nos' => $request->total_nos,
            'total_price' => $request->total_price
        ]);
        Form::where('id', $request->pf_plant_id)
        ->update([
            'status' => 9
        ]);

    return response()->json(['status' => 200, 'message' => 'Plantation Post-Funding details updated.']);
}

}
