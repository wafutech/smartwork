<?php
namespace App\Traits;
/**
*  Over-ridden the register method from the "RegistersUsers" trait
*  Remember to take care while upgrading laravel
*/
public function register(Request $request)
{
    // Laravel validation
    $validator = $this->validator($request->all());
    if ($validator->fails()) 
    {
        $this->throwValidationException($request, $validator);
    }
    // Using database transactions is useful here because stuff happening is actually a transaction
    // I don't know what I said in the last line! Weird!
    DB::beginTransaction();
    try
    {
        $user = $this->create($request->all());
        // After creating the user send an email with the random token generated in the create method above
        $email = new EmailVerification(new User(['activation_code' => $user->activation_code, 'name' => $user->name]));
        Mail::to($user->email)->send($email);
        DB::commit();
        return back();
    }
    catch(Exception $e)
    {
        DB::rollback(); 
        return back();
    }
}
?>