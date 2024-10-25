<?php

namespace App\Http\Controllers;
use App\Models\Practices;
use App\Models\States;
use App\Models\Districts;
use App\Models\Locations;
use App\Models\Marks;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MarksExport;
use App\Exports\PracticesExport;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home() {
        return view('welcome');
    }
    public function create() {
        $dist=Districts::all();
        $state=States::all();
        $loc=Locations::all();
        return view('register', compact('dist','state','loc'));
    }
    public function store(Request $request) {
        $state=States::Find($request->state);
        $dis=Districts::Find($request->district);
        $loc=Locations::Find($request->location);
        $stud= Practices::create(request 
        (['name','age','gender','phone','email','state','district','location','address','impt_file']));
        $stud['state'] = $state->state;
        $stud['district'] = $dis->district;
        $stud['location'] = $loc->location;
        $stud->update();
        return redirect()->route('index')->with('message','Added Succesfully');
    }
    public function index() {
        $stud= Practices::all();
        return view('index', compact('stud'));
    }
    public function edit(Request $request,Practices $Practices,$id) {
        $dist=Districts::all();
        $state=States::all();
        $loc=Locations::all();
        $stud= Practices::Find($id);
        return view('edit', compact('stud','dist','state','loc'));
    }
    public function update(Request $request, $id) {
        $state=States::Find($request->state);
        $dis=Districts::Find($request->district);
        $loc=Locations::Find($request->location);
        $stud= Practices::FindOrFail($id);
        $val= array();
        $val['name'] = $stud->name;
        $val['age'] = $stud->age;
        $val['gender'] = $stud->gender;
        $val['phone'] = $stud->phone;
        $val['email'] = $stud->email;
        $val['state'] = $state->state;
        $val['district'] = $dis->district;
        $val['location'] = $loc->location;
        $val['address'] = $stud->address;
        $stud->update($val);
        return redirect()->route('index')->with('message','Updated Succesfully');
    }
    public function delete($id) {
        $stud= Practices::FindOrFail($id);
        $stud->delete();
        return redirect()->route('index')->with('message','Deleted Succesfully');
    }
    public function insert(Request $request) {
        $stud= Practices::all();
        $request->validate([
            'import_file' => 'required|file|mimes:csv,txt',
            ]);
            if ($request->hasFile('import_file')) {
                $file = $request->file('import_file');
                $path = $file->getRealPath();
                if (($handle = fopen($path, 'r')) !== false) {
                    while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                        DB::table('practices')->insert([
                            'name' => $row[0],
                            'age' => (int)$row[1],
                            'gender' => $row[2],
                            'phone' => $row[3],
                            'email' => $row[4],
                            'state' => $row[5],
                            'district' => $row[6],
                            'location' => $row[7],
                            'address' => $row[8],
                        ]);
                    }
                fclose($handle);
            }
            return redirect()->route('index')->with('message', 'CSV file uploaded and data inserted successfully!');     
        }
    }
    public function export() {
        $data = Practices::all();
        $csvFileName = 'students.csv';
        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=\"$csvFileName\"",
            "Pragma" => "no-cache",
            "Expires" => "0"
        ];
        ob_start();
        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['name', 'age', 'gender', 'phone','email','state', 'district', 'location', 'address']); 
        foreach ($data as $row) {
            fputcsv($handle, [$row->name, $row->age, $row->gender, $row->phone, $row->email, $row->state, $row->district, $row->location, $row->address]); // Adjust columns accordingly
        }
        fclose($handle);
        $csvContent = ob_get_clean();
        return response($csvContent, 200, $headers);
    }
    public function studpdf() {
        return Excel::download(new PracticesExport, 'students_list.pdf', \Maatwebsite\Excel\Excel::DOMPDF); 
    }
    public function signout(Request $request) {
        $request->session()->flush();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    } 

// States
    public function statereg() {
        return view('state.statereg');
    }
    public function storestate(Request $request) {
        $st=States::create(request 
        (['state']));
        return redirect()->route('state')->with('message','Added Succesfully');
    }
    public function state() {
        $state= States::all();
        return view('state.states', compact('state'));
    }
    public function editstate(Request $request,States $States,$id) {
        $state=States::Find($id);
        return view('state.editstate', compact('state'));
    }
    public function updatestate(Request $request, $id) {
        $state= States::FindOrFail($id);
        $val= $request->validate([
            'state' => 'required'
        ]);
        $state->fill($request->post())->update();
        return redirect()->route('state')->with('message','Updated Succesfully');
    }
    public function deletestate($id) {
        $state= States::FindOrFail($id);
        $state->delete();
        return redirect()->route('state')->with('message','Deleted Succesfully');
    }

// Districts
    public function districtreg() {
        $state= States::all();
        return view('district.distreg', compact('state'));
    }
    public function storedistrict(Request $request) {
        $dist=Districts::create(request 
        (['state_id','district']));
        return redirect()->route('district')->with('message','Added Succesfully');
    }
    public function district() {
        $dist=Districts::all();
        return view('district.dist', compact('dist'));
    }
    public function editdistrict(Request $request,Districts $Districts,$id) {
        $state=States::all();
        $dist=Districts::Find($id);
        return view('district.editdist', compact('state','dist'));
    }
    public function updatedistrict(Request $request, $id) {
        $dist=Districts::FindOrFail($id);
        $val= $request->validate([
            'state_id' => 'required',
            'district' => 'required'
        ]);
        $dist->fill($request->post())->update();
        return redirect()->route('district')->with('message','Updated Succesfully');
    }
    public function deletedistrict($id) {
        $dist=Districts::FindOrFail($id);
        $dist->delete();
        return redirect()->route('district')->with('message','Deleted Succesfully');
    }
    public function filter(Request $request) {
        $state_id = $request->state_id;
        $DistrictsAll = Districts::where('state_id', $state_id)->get()->pluck('district','id');
        $set='';
        foreach($DistrictsAll as $key=>$dist) {
            $set.= "<option value='$key'>$dist</option>";  
        }
        echo $set;
        exit;  
    }

// Locations
    public function locationreg() {
        $dist= Districts::all();
        return view('location.locationreg', compact('dist'));
    }
    public function storelocation(Request $request) {
        $dt=Locations::create(request   
        (['district_id','location']));
        return redirect()->route('location')->with('message','Added Succesfully');
    }
    public function location() {
        $loc=Locations::all();
        return view('location.location', compact('loc'));
    }
    public function editlocation(Request $request,Locations $Location,$id) {
        $dist=Districts::all();
        $loct=Locations::Find($id);
        return view('location.editlocation', compact('dist','loct'));
    }
    public function updatelocation(Request $request, $id) {
        $loct=Locations::FindOrFail($id);
        $val= $request->validate([
            'location' => 'required'
        ]);
        $loct->fill($request->post())->update();
        return redirect()->route('location')->with('message','Updated Succesfully');
    }
    public function deletelocation($id) {
        $loct=Locations::FindOrFail($id);
        $loct->delete();
        return redirect()->route('location')->with('message','Deleted Succesfully');
    }
    public function fltloc(Request $request) {
        $dist = $request->district;
        $location = Locations::where('district_id', $dist)->pluck('location','id')->toArray();
        $loc='';
        foreach($location as $key=>$lt) {
            $loc.="<option value='$key'>$lt</option>";
        }
        echo $loc;
        exit;
    }

// Import-Export
    public function import_or_export() {
        return view('imtext');
    }
    public function import_stud() {
        return view('imtext.importstud');
    }
    public function import_mark() {
        return view('imtext.importmark');
    }
    
// Marks
    public function regmark() {
        $stud=Practices::all();
        return view('mark.regmarks',compact('stud'));
    }
    public function storemarks() {
        $mark= Marks::create(request 
        (['student_id','tamil','english','maths','science','social']));
        return redirect()->route('markindex');
    }
    public function markindex() {
        $mark=Marks::all();
        return view('mark.markindex',compact('mark'));
    }
    public function show(Marks $mark,$student_id) {
        $mark = Marks::where('student_id',$student_id)->first();
        return view('show', compact('mark'));
    }
    public function editmarks(Request $request, Marks $marks,$id) {
        $stud= Practices::all();
        $mark= Marks::Find($id);
        return view('mark.editmarks',compact('mark','stud'));
    }
    public function updatemarks(Request $request, Marks $marks,$id) {
        $mark=Marks::FindOrFail($id);
        $val= $request->validate([
            'student_id' => 'required',
            'tamil' => 'required',
            'english' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'social' => 'required',
        ]);
        $mark->fill($request->post())->update();
        return redirect()->route('markindex')->with('message','Updated Succesfully');
    }
    public function import_marks(Request $request) {
        $student_ids = Practices::pluck('id')->toArray(); 
            $request->validate([
                'import_file' => 'required|file|mimes:csv,txt',
                ]);
                if ($request->hasFile('import_file')) {
                    $file = $request->file('import_file');
                    $path = $file->getRealPath();
                    if (($handle = fopen($path, 'r')) !== false) {
                        while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                            if(in_array($row[0],$student_ids)) {
                                 DB::table('marks')->insert([
                                    'student_id' => (int)$row[0],
                                    'tamil' => (int)$row[1],
                                    'english' => (int)$row[2],
                                    'maths' => (int)$row[3],
                                    'science' => (int)$row[4],
                                    'social' => (int)$row[5],
                                ]);
                            }  
                        }
                    fclose($handle);
                    }
                return redirect()->route('index')->with('message', 'CSV file uploaded and data inserted successfully!');     
        }
    }
    public function export_mark() {
        $data = Marks::all();
        $csvFileName = 'student_marks.csv';
        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=\"$csvFileName\"",
            "Pragma" => "no-cache",
            "Expires" => "0"
        ];
        ob_start();
        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['student_id', 'tamil', 'english', 'maths','science','social']); 
        foreach ($data as $row) {
            fputcsv($handle, [$row->student_id, $row->tamil, $row->english, $row->maths, $row->science, $row->social]); 
        }
        fclose($handle);
        $csvContent = ob_get_clean();
        return response($csvContent, 200, $headers);
    }
    public function downloadPDF() {
        return Excel::download(new MarksExport, 'student_marks.pdf', \Maatwebsite\Excel\Excel::DOMPDF); 
    }
}