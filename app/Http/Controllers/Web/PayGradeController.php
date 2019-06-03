<?php

namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
use App\PayGrade;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class PayGradeController extends Controller
{
       public function index()
    {
        $pay_grades = PayGrade::orderBy('id', 'desc')->paginate(10);
        return view('pages.admin.pay_grade.list', compact('pay_grades'));
    }


    public function create()
    {
        return view('pages.admin.pay_grade.create'); 
    }

    public function store(Request $request)
    {
       $rules = [
            'title' => 'required|unique:pay_grades,title',
            'currency' => 'required',
            'min_salary' => 'required|numeric',
            'max_salary' => 'required|numeric',
        ];

        $customMessages = [
            'title.required' => 'Please provide the pay grade title.',
            'title.unique' => 'Pay grade already exist.',
            'currency.required' => 'Please provide the currency.',
            'min_salary.required' => 'Please provide min. salary.',
            'max_salary.required' => 'Please provide max. salary.',
            'min_salary.numeric' => 'Please provide numeric value for min. salary.',
            'max_salary.numeric' => 'Please provide numeric value for max. salary.',
            
        ];

        $this->validate($request, $rules, $customMessages); 

        PayGrade::create($request->all());

        return redirect('pay_grade')->with('success','Successfully created!');
    }

   
    public function show(PayGrade $pay_grade)
    {
        return view('pages.admin.pay_grade.edit',compact('pay_grade'));
    }



    public function update(Request $request, PayGrade $pay_grade){

       $rules = [
            'title' => 'required|unique:pay_grades,title,'.$pay_grade->id,  //unique field validation on update
            'currency' => 'required',
            'min_salary' => 'required|numeric',
            'max_salary' => 'required|numeric',
        ];

        $customMessages = [
            'title.required' => 'Please provide the pay grade title.',
            'title.unique' => 'Pay grade already exist.',
            'currency.required' => 'Please provide the currency.',
            'min_salary.required' => 'Please provide min. salary.',
            'max_salary.required' => 'Please provide max. salary.',
            'min_salary.numeric' => 'Please provide numeric value for min. salary.',
            'max_salary.numeric' => 'Please provide numeric value for max. salary.',
            
        ];

        $this->validate($request, $rules, $customMessages);  
         $pay_grade->update($request->all());

        return redirect('pay_grade')->with('success','Successfully Updated!');
        
    }

    public function destroy(PayGrade $pay_grade)
    {
        if($pay_grade->employees->count() > 0){
            return redirect('pay_grade')->with('warning','Pay grade could not be deleted!, employees currently attached to this pay grade.');
        }else{
            $pay_grade->delete();
            return redirect('pay_grade')->with('success','Successfully Deleted!');
        }
    }
}
