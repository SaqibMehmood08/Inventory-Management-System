<?php

namespace App\Http\Controllers;
use App\Models\Donor;
use Illuminate\Http\Request;
use App\Exports\DonorsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class DonorController extends Controller
{
    public function Index(){

        $donor_count = Donor::count();
        $donor = Donor::all();
        return view('donor.index',compact('donor_count','donor'));
    }
    public function createIndex(){

        $donor_count = Donor::count();

        return view('donor.create',compact('donor_count'));
    }
    public function createSave(Request $request){
     $donor=new Donor();
     $donor->name=$request->name;
     $donor->email=$request->email;
     $donor->phone_number=$request->phone_number;
     $donor->cnic=$request->cnic;
     $donor->payment=$request->payment;
     $donor->address=$request->address;
     $donor->save();
     if($donor){
        return redirect()->route('donor.index')->with('success','Donor Created Successfuly');
     }else{
        return redirect()->back()->with('error','Create donor Failed.');
     }
    
        
    }

    public function Delete($id){
        
        $result=Donor::where('id',$id)->delete();
        if($result){
            return redirect()->route('donor.index')->with('success','Donor Deleted Successfuly');

        }else{
            return redirect()->back()->with('error','Failed to delete.please try again');

        }
     }
     public function update($id){
        
        $result=Donor::where('id',$id)->first();
        return view('donor.edit',compact('result'));

     }
     public function updateSave(Request $request, $id)
     {
         // Validate the incoming request
         $validator = Validator::make($request->all(), [
             'name' => 'required|string|max:255',
             'email' => 'nullable|email|max:255',
             'phone_number' => 'nullable|string|max:15',
             'payment' => 'required|numeric',
             'address' => 'nullable|string|max:255',
             'description' => 'nullable|string|max:500'
         ]);
 
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
         }
 
         // Find the donor record by ID
         $donor = Donor::find($id);
 
         if (!$donor) {
             return redirect()->back()->with('error', 'Donor not found.');
         }
 
         // Update the donor record
         $donor->name = $request->input('name');
         $donor->email = $request->input('email');
         $donor->phone_number = $request->input('phone_number');
         $donor->payment = $request->input('payment');
         $donor->address = $request->input('address');
        //  $donor->description = $request->input('description');
         $donor->update();
         if( $donor){
            return redirect()->route('donor.index')->with('success', 'Donor updated successfully.');

         }else{
            return redirect()->back()->with('error', 'Donor updated Failed.');

         }
     }
     public function export() 
     {
         return Excel::download(new DonorsExport, 'donors.xlsx');
     }
        

    
    
}
