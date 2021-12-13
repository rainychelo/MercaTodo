<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $users=User::all();

        return view('admin.index',compact('users'));
    }



    public function destroy($id){
        $user=User::find($id);
        $user->delete();
        return redirect()->route('admin.index');
    }

    public function update($id){
        $user=User::find($id);
        if ($user->status=='DEACTIVE'){
            $user->status='ACTIVE';
        }else{
            $user->status='DEACTIVE';
        }
        $user->save();
        return redirect()->route('admin.index');
    }
}
