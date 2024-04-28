<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\Called;
use App\Models\Categories;
use App\Models\Situation;
use Carbon\Carbon;
use SoftDeletes;

class CrudController extends Controller
{
    private $objCalled;
    private $objCategories;
    private $objSituation;

    public function __construct() {
        $this-> objCalled = new Called();
        $this-> objCategories = new Categories();
        $this-> objSituation = new Situation();
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $calledDeadline = Called::where('id_situation', 3)->count();

        $totalCalled = Called::count();

        $totalPercentage = $totalCalled > 0 ? ($calledDeadline / $totalCalled) * 100 : 0;

        $startMonth = Carbon::now()->startOfMonth();
        $endMonth = Carbon::now()->endOfMonth();

        $totalCalledCurrentMonth = Called::whereBetween('created_at', [$startMonth, $endMonth])->count();

        $calledDeadlineCurrentMonth = Called::whereBetween('call_resolved', [$startMonth, $endMonth])->where('id_situation', 3)->count();

        $percentage = $totalCalledCurrentMonth > 0 ? ($calledDeadlineCurrentMonth  / $totalCalledCurrentMonth) * 100 : 0;
        
        $percentage = min($percentage, 100);

        $deletedItems = Called::withTrashed()->whereNotNull('deleted_at')->get();

        if ($deletedItems->isNotEmpty()) {
            foreach ($deletedItems as $deletedItem) {
                // Se o chamado deletado estiver dentro do mês atual
                if ($deletedItem->deleted_at->between($startMonth, $endMonth)) {
                    // Diminua a contagem de chamados resolvidos
                    if ($deletedItem->id_situation == 3) {
                        $calledDeadlineCurrentMonth--;
                    }
                }
            }
        }
        

        return view('index', compact('percentage', 'totalPercentage', 'totalCalled'));
    }

    public function calleds()
    {
        $called = $this->objCalled->paginate(15);


        return view('called', compact('called'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->objCategories->all(); 
        $situations = $this->objSituation->all(); 

        return view('create', compact('categories', 'situations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        App::setLocale('pt_BR');

        $request->validate([
            'title' => 'required|max:190',
            'id_categories' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'O campo título é obrigatório.',
            'title.max' => 'O campo título não pode ter mais de 190 caracteres.',
            'id_categories.required' => 'O campo categoria é obrigatório.',
            'description.required' => 'O campo descrição é obrigatório.',
        ]);
        

        $situation_id = Situation::where('name', 'Novo')->firstOrFail()->id;
        
        $situation_term = Carbon::now()->addDays(3);

        $called = $this->objCalled->create([
            'title' => $request->title,
            'description' => $request->description,
            'situation_term' => $situation_term,
            'id_categories' => $request->id_categories,
            'id_situation' => $situation_id,
            'call_resolved',
        ]);
        $called->save();

        return redirect('chamados');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $called = $this->objCalled ->find($id);
        return view('show', compact('called'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $called = $this->objCalled->find($id);
        $categories = $this->objCategories->all();
        $situations = $this->objSituation->all();

        return view('create', compact('called', 'categories', 'situations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        App::setLocale('pt_BR');

        $called = Called::findOrFail($id);
        
        $situation_id_resolved = 3; 
        if ($request->id_situation == $situation_id_resolved) {
            $called->call_resolved = Carbon::now();
        } else {
            $called->call_resolved = null;
        }

        $called->title = $request->title;
        $called->description = $request->description;
        $called->id_categories = $request->id_categories;
        $called->id_situation = $request->id_situation;

        $called->save();

        return redirect('chamados');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Called::findOrFail($id)->delete();
        
        return redirect('chamados');
    }

}
