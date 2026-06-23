<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthApiController extends Controller
{
    /**
     * Provision an administrative user profile via username/password access logic.
     */
    public function register(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'alpha_num', 'min:4', 'max:50', 'unique:users,username'],
            'password' => ['required', 'string', Password::min(8)->letters()->numbers()],
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);


        return response()->json([
            'status' => 'success',
            'message' => 'Administrative profile provisioned successfully.',
            'profile' => [
                'id' => $user->id,
                'username' => $user->username
            ],
        ], 21);
    }

    /**
     * Execute an authenticated security parameter override / direct verification reset.
     */
    public function resetPassword(Request $request): JsonResponse
    {
        // For a username-only model without email loops, identity verification relies on current verification challenge
        $validated = $request->validate([
            'username'         => ['required', 'string', 'exists:users,username'],
            'password'     => ['required', 'string', Password::min(8)->letters()->numbers()],
        ]);

        $user = User::where('username', $validated['username'])->firstOrFail();

        $user->update([
            'password' => Hash::make($validated['password'])
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'System authentication credentials updated successfully.',
        ], 200);
    }
}
