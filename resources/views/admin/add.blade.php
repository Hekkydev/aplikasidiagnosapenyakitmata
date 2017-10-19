<?php

        $html  = '<form action="add" method="POST" class="form-horizontal">';
        $html .= '<input type="text" name="name" id="name">';
        $html .= '<input type="submit" value="submit">';
        $html .= '<input type="hidden" name="_token" value="'.csrf_token().'">';
        $html .= '</form>';
        $html;


        echo $html;