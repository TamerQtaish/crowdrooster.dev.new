<?php
return array(
    'register' => array(
            'title'     => 'Company Register',
            'form' => array(
                            'email' => 'email',
                            'password' => 'Password',
                            'password_confirmation' => 'Re-Password',
                            'first_name' => 'First Name',
                            'last_name' => 'Last Name',
                            'company_name' => 'Company Name',
                            'phone' => 'Phone',
                            'submit' => 'Register',
                            'accept_t_and_c' => 'Accept Terms and Conditions',
                            ),
            'errors' => array(
                              'email_used' => 'This email is already used by another account.',
                             ), 
    ),
    'register_success' => array(
                                'title' => 'Company Register Success',
                                ),
);
