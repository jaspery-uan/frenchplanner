<?php

/**
 * French Learning Tracker Application
 * ICS4U
 * Laura, Joshua, Jasper
 * Controller for handling user authentication:
 * - Registration
 * - Login
 * - Logout
 * - Displaying related views
 * 
 * History:
 * February 12: File creation
 * April 21: Added all specific adjustments
 * May 22: Added comments
 */

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /** The following lines display the registration form view.
     * @return \Illuminate\View\View
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /** The following lines display the login form view.
     * @return \Illuminate\View\View
     */
    public function showLogin()
    {
        return view('auth.login');
    }
    
    /** The following lines handle the registration of a new user.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // These lines validate input fields according to the specifications (e.g. the name, email, and password fields are required).
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // This line creates a new user in the database.
        $user = User::create($validated);

        // This line immediately logs the user in.
        Auth::login($user);

        // This line redirects the user to the login screen with a success message.
        return redirect()->route('show.login')->with('success', 'Inscription réussie! Connectez-vous maintenant');
    }

    /** The following lines handle the login of an existing user.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        // These lines validate the submitted email and password fields.
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // These lines check if the credentials are valid.
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route('reflections.index')->with('success', 'Connexion réussie!');
        }

        // If the credentials are invalid, this line throws a validation exception.
        throw ValidationException::withMessages([
            'credentials' => 'Identifiants invalides.',
        ]);
    }

    /** The following lines handle the logout of the user.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // This line logs out the user.
        Auth::logout();

        // This line invalidates the session and regenerates the session to clear the data.
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.login')->with('success', 'Déconnexion réussie!');
    }
}
