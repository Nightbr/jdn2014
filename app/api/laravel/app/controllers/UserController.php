<?php

class UserController extends \BaseController {

    public function logout()
    {
        Auth::logout();
  
        return Redirect::route("user/login");
    }

    public function login()
    {

        $data = [];
        if ($this->isPostRequest()) {
            $validator = $this->getLoginValidator();
        
            if ($validator->passes()) {

                $credentials = $this->getLoginCredentials();
                if (Auth::attempt($credentials)) {
                  return Redirect::route("admin_dashboard");
                }
            } else {
                $data["error"] = "Username and/or password invalid.";
            }
        }
    
      return View::make("user/login");
    }
    
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }
    
    protected function getLoginValidator()
    {
        return Validator::make(Input::all(), [
            "username" => "required",
            "password" => "required"
        ]);
    }

    protected function getLoginCredentials()
    {
        return [
            "username" => Input::get("username"),
            "password" => Input::get("password")
        ];
    }

}
