<?php

    function getTemp(){
        $url = 'https://www.yahoo.com/news/weather/italy/veneto/verona-725791/';
        $content = file_get_contents($url);
        $first_step = explode( '<span class="Va(t)" data-reactid="37">' , $content );
        $second_step = explode("</span>" , $first_step[1] );
        $raised = trim($second_step[0]);
        return round((($raised-32)/1.8),0);
    }