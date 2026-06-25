<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    use RegistersUsers;



    // Validation
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // Register Function
    public function register(Request $request)
    {
        // Validate request
        $this->validator($request->all())->validate();

        $imageName = null;

        // Image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/users'), $imageName);
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $imageName,
            'password' => Hash::make($request->password),
        ]);

        // Assign default role (user)
        if (!Role::query()->where('name', 'user')->exists()) {
            Role::create(['name' => 'user']);
        }

        $user->assignRole('user');

        // Auto login after register (optional)
        auth()->login($user);

//        return redirect($this->redirectTo)->with('success', 'Registration successful');
        return  redirect()->route('users.login')->with('success', 'Registration successful. Please login.');
    }
}
