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
    'forgot_password' => array(
                               'title' => 'Password Recovery',
                               'description' => 'Enter your password and an email will be sent with a link to recover your password.',
                               'form' => array(
                                                'email' => 'email',
                                                'submit' => 'Recover Password',
                                            ),
                                'errors' => array(
                                                'account_not_found' => 'Ops! That account was not found!',
                                                ),
                                'email' =>array(
                                                'subject' => 'Password Recovery', 
                                                'description' => 'Click the link below to go to password Recovery', 
                                                ),
                                
                               ),
);
