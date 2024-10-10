<?php

namespace App\Http\Controllers;
use App\Models\Practices;
use App\Models\States;
use App\Models\Districts;
use App\Models\Locations;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home() {
        return view('welcome');
    }
    public function index() {
        $stud= Practices::all();
        return view('index', compact('stud'));
    }
    public function create() {
        $dist=Districts::all();
        $state=States::all();
        $loc=Locations::all();
        return view('register', compact('dist','state','loc'));
    }
    public function store(Request $request) {
        $stud= Practices::create(request 
        (['name','age','gender','phone','email','state','district','location','address']));
        return redirect()->route('index')->with('message','Added Succesfully');
    }
    public function edit(Request $request,Practices $Practices,$id) {
        $dist=Districts::all();
        $state=States::all();
        $loc=Locations::all();
        $stud= Practices::Find($id);
        return view('edit', compact('stud','dist','state','loc'));
    }
    public function update(Request $request, $id) {
        $stud= Practices::FindOrFail($id);
        $val= $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => ['required', 'email',
            Rule::unique('practices', 'email')->ignore($stud->id)],
            'state' => 'required',
            'district' => 'required',
            'location' => 'required',
            'address' => 'required'
        ]);
        $stud->fill($request->post())->update();
        return redirect()->route('index')->with('message','Updated Succesfully');
    }
    public function delete($id) {
        $stud= Practices::FindOrFail($id);
        $stud->delete();
        return redirect()->route('index')->with('message','Deleted Succesfully');
    }
    public function signout(Request $request) {
        $request->session()->flush();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    } 


    public function statereg() {
        return view('state.statereg');
    }
    public function state() {
        $state= States::all();
        return view('state.states', compact('state'));
    }
    public function storestate(Request $request) {
        $st=States::create(request 
        (['state']));
        return redirect()->route('state')->with('message','Added Succesfully');
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


    public function districtreg() {
        $state= States::all();
        return view('district.distreg', compact('state'));
    }
    public function district() {
        $dist=Districts::all();
        return view('district.dist', compact('dist'));
    }
    public function storedistrict(Request $request) {
        $dist=Districts::create(request 
        (['state_id','district']));
        return redirect()->route('district')->with('message','Added Succesfully');
    }
    public function editdistrict(Request $request,Districts $Districts,$id) {
        $dist=Districts::Find($id);
        return view('district.editdist', compact('dist'));
    }
    public function updatedistrict(Request $request, $id) {
        $dist=Districts::FindOrFail($id);
        $val= $request->validate([
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


    public function locationreg() {
        return view('location.locationreg');
    }
    public function location() {
        $loc=Locations::all();
        return view('location.location', compact('loc'));
    }
    public function storelocation(Request $request) {
        $dt=Locations::create(request 
        (['location']));
        return redirect()->route('location')->with('message','Added Succesfully');
    }
    public function editlocation(Request $request,Locations $Location,$id) {
        $loct=Locations::Find($id);
        return view('location.editlocation', compact('loct'));
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

   
    public function filter(Request $request, Districts $Districts) {
        
        $state_id = $request->input('state_id');
        $DistrictsAll = Districts::where('state_id', $request->state_id)->pluck('district','id');
        return response()->json($DistrictsAll);
    }
}