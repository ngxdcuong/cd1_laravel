<?php
namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Recruitment;
use Illuminate\Http\Request;
use App\Models\Location;
class RecruitmentController extends Controller
{

public function create() {
    $positions = Position::all();
    $locations = Location::all();
    return view('recruitments.index', compact('positions', 'locations'));
}
public function store(Request $request) {
    $request->validate([
        'full_name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'email' => 'required|email|unique:recruitments,email',
        'position_id' => 'required|exists:positions,id',
        'description' => 'required|string',
        'location' => 'required|string',
    ]);

    Recruitment::create($request->all());

    return redirect()->route('recruitments.create')->with('submit', 'Gửi ứng tuyển thành công!');
}

public function index()
{
    $positions = Position::all();
    $locations = Location::all(); 
    return view('recruitments.index', compact('positions', 'locations')); 
}

public function manager()
{
    $locations = Location::all(); 
    $positions = Position::all();  
    $recruitments = Recruitment::all(); 
    return view('recruitments.manager', compact('locations', 'positions', 'recruitments'));
}

public function approve($id)
{
    $recruitment = Recruitment::findOrFail($id);
    $recruitment->status = 'approved';
    $recruitment->save();

    return redirect()->route('recruitments.manager')->with('success', 'Hồ sơ đã được xét duyệt!');
}

public function reject($id)
{
    $recruitment = Recruitment::findOrFail($id);
    $recruitment->status = 'rejected';
    $recruitment->save();

    return redirect()->route('recruitments.manager')->with('error', 'Hồ sơ đã bị từ chối!');
}


}