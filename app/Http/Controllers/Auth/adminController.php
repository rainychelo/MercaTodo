<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

class adminController extends Controller
{
    public function index(){

        $users=User::all();

        return view('admin.index',compact('users'));
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

    public function destroy($id){
        $user=User::find($id);
        $user->delete();
        return redirect()->route('admin.index');
    }
}
