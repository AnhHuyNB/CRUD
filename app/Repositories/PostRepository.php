<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PostRepository
{
    public function create(array $attributes)
    {

       return User::create([
            'name'=>data_get($attributes, 'name'),
            'email'=>data_get($attributes, 'email'),
            'password'=>Hash::make(data_get($attributes, 'password'))
        ]);
        
    }
    public function update(array $attributes, $id)
    {
        $password= data_get($attributes, 'password');
        if(empty($password)){
            $cari=User::find($id);
            $cari->update([
                'name'=>data_get($attributes, 'name'),
                'email'=>data_get($attributes, 'email')
            ]);
        }else{
            $cari=User::find($id);
            $cari->update([
                'name'=>data_get($attributes, 'name'),
                'email'=>data_get($attributes, 'email'),
                'password'=>Hash::make(data_get($attributes, 'password'))
            ]);
        }

    }
    public function forceDelete($id)
    {
        $cari=User::find($id);
        $cari->delete();
        return redirect()->route('user');
    }
}
