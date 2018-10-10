<?php
    
    
    /**
    * Return default plugin options
    * 
    */
    function tto_get_settings()
        {
            
            $settings = get_option('tto_options'); 
            
            $defaults   = array (
                                    'capability'                =>  'manage_options',
                                    'autosort'                  =>  '1',
                                    'adminsort'                 =>  '1'
                                );
            $settings          = wp_parse_args( $settings, $defaults );
            
            return $settings;   
            
        }
    
        
    /**
    * @desc 
    * 
    * Return UserLevel
    * 
    */
    function tto_userdata_get_user_level($return_as_numeric = FALSE)
        {
            global $userdata;
            
            $user_level = '';
            for ($i=10; $i >= 0;$i--)
                {
                    if (current_user_can('level_' . $i) === TRUE)
                        {
                            $user_level = $i;
                            if ($return_as_numeric === FALSE)
                                $user_level = 'level_'.$i; 
                            break;
                        }    
                }        
            return ($user_level);
        } 
        
    function tto_info_box() {
        //empty      
    }

?>