<?php

namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
use App\PayGrade;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class PayGradeController extends Controller
{
    function __construct()
    {

         $this->middleware('permission:browse_pay_grades'); //index func. if cant browse then you cant access the rest
         $this->middleware('permission:add_pay_grades', ['only' => 'create']);
         $this->middleware('permission:edit_pay_grades', ['only' => 'show']);
 

    }
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

        if ($request->min_salary > $request->max_salary) {
            throw ValidationException::withMessages([
                'min_salary' => "Minimum salary cannot be greater than maximun salary.",
                'max_salary' => "Minimum salary cannot be greater than maximun salary.",
            ]);
        }

        PayGrade::create($request->all());

        notify()->success("Successfully created!","","bottomRight");
        return redirect('pay-grade');
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
        
        if ($request->min_salary > $request->max_salary) {
            throw ValidationException::withMessages([
                'min_salary' => "Minimum salary cannot be greater than maximun salary.",
                'max_salary' => "Minimum salary cannot be greater than maximun salary.",
            ]);
        }
        
        $pay_grade->update($request->all());

        notify()->success("Successfully Updated!","","bottomRight");
        return redirect('pay-grade');        
    }

    public function destroy(PayGrade $pay_grade)
    {
        if($pay_grade->employees->count() > 0){
            notify()->warning("Pay grade could not be deleted!, employees currently attached to this pay grade.","Warning","bottomRight");
            return redirect('pay-grade');
        }else{
            $pay_grade->delete();

            notify()->success("Successfully Deleted!","","bottomRight");
            return redirect('pay-grade');
        }
    }
}
