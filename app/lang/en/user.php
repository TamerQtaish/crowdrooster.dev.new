<?php
return array(
    'register' => array(
            'title'     => 'Register',
            'form' => array(
                            'email' => 'email',
                            'password' => 'Password',
                            'password_confirmation' => 'Re-Password',
                            'first_name' => 'First Name',
                            'last_name' => 'Last Name',
                            'phone' => 'Phone',
                            'submit' => 'Register',
                            'accept_t_and_c' => 'Accept Terms and Conditions',
                            ),
            'errors' => array(
                              'email_used' => 'This email is already used by another account.',
                             ), 
        ),
    'login' => array(
            'title'     => 'Login',
            'form' => array(
                            'email' => 'email',
                            'password' => 'Password',
                            'submit' => 'Login',
                            'remember_me' => 'Keep me logged in',
                            ),
            'error' => array(
                              'error' => 'Login Failed',
                             ), 
        ),
    'register_success' => array(
                                'title' => 'Register Success',
                                ),
);
